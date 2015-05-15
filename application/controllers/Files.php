<?php
use application\libraries\Dbase\Dbase;
use application\libraries\File\FileMargin;
use application\libraries\File\FileHistory;

class Files extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
		$this->BIConfig->estabelecimento = 1;
		$this->BIConfig->orgao = 2;

		$this->load->helper('form_helper');
	}

	public function history()
	{	
		$this->load->model('File');
		$history = $this->File->fetchAll('1');

		$this->load->model('Dbf_evento', 'DBFEvento');
		$data['eventos'] = $this->DBFEvento->fetchAllForSelectInput();

		$data['files'] = $history;
		$data['page'] = "history";
		$data['page_title'] = "Arquivos de Histórico";
		$data['page_icon'] = "fa-file-excel-o";
		$this->load->view('history_list', $data);
	}

	public function createHistoryFile() {
		$this->load->model('DBF_cadfun', 'DBFCadfun');
		$this->load->model('DBF_movger', 'DBFMovger');
		$this->load->model('DBF_config', 'DBFConfig');

		$history = $this->DBFCadfun->fetchAll(TRUE);
		$movger = $this->DBFMovger->fetchAll(TRUE);
		$config = $this->DBFConfig->fetchAll();

		if ($movger && count($movger)) {
			$historyFile = new FileHistory;
			foreach ($movger as $mov) {
				/**
				 * Filtro por Eventos
				 */
				if (!empty($this->input->post('evento'))) {
					if (trim($mov->O_RENDIMEN) != (string)$this->input->post('evento')) {
						continue;
					}
				}

				$historyFile->setMatricula(trim($history[$mov->O_FUNCIONA]->F_MATRIC));
				$historyFile->setCpf(trim($history[$mov->O_FUNCIONA]->F_CPF));
				$historyFile->setNomeServidor(trim($history[$mov->O_FUNCIONA]->F_NOME));
				$historyFile->setEstabelecimento('');
				$historyFile->setOrgao('');
				$historyFile->setCodigoDesconto(trim($mov->O_RENDIMEN));
				$historyFile->setPrazoTotal(trim($mov->O_TOTPARCF));
				$historyFile->setNumeroParcelasPagas(trim($mov->O_QTDPARCF));
				$historyFile->setValorDesconto(trim($mov->O_VALOR));
				$historyFile->setDataInclusaoDesconto(trim($config[0]->INI_FOLHA));
				$historyFile->attachIntoCollection($historyFile);
			}
			
			$historyFile->createFile();
			$fileRendered = $historyFile->renderFile(TRUE);

			$path = 'uploads/arquivos/';
			$basePath = realpath($path);
			if ($basePath) {
				if (is_writable($basePath)) {
					$fileName = 'historico_'.date('Y-m-d_H-i-s').'.txt';
					$filePath = $basePath.'/'.$fileName;
					if (write_file($filePath, $fileRendered)) {
						$this->db->trans_begin();
						$fileInfo['file_type'] = '1';
						$fileInfo['file_upload_date'] = date('Y-m-d H:i:s');
						$fileInfo['file_path'] = $path.$fileName;
						$this->db->insert('bi_files', $fileInfo);
						if ($this->db->trans_status() === FALSE) {
							$this->db->trans_rollback();
						} else {
							$this->db->trans_commit();
						}
						redirect('files/history');
					} else {
						exit("Houve um erro ao salvar o arquivo!");
					}
				} else {
					exit("O diretório ". $basePath. " não tem permissão de escrita!");
				}
			} else {
				exit("O diretório ". $basePath. " não existe!");
			}	
		}
	}

	public function margin()
	{	
		$this->load->model('File');
		$margin = $this->File->fetchAll('2');
		$data['files'] = $margin;

		$this->load->model('Dbf_evento', 'DBFEvento');
		$data['eventos'] = $this->DBFEvento->fetchAllForSelectInput();

		$data['page'] = "margin";
		$data['page_title'] = "Arquivos de Margem";
		$data['page_icon'] = "fa-file-excel-o";
		$this->load->view('margin_list', $data);
	}

	public function createMarginFile()
	{
		$this->load->model('DBF_cadfun', 'DBFCadfun');
		$this->load->model('DBF_fichaf', 'DBFFichaf');
		$this->load->model('DBF_depart', 'DBFDepart');

		$funcionarios = $this->DBFCadfun->fetchAll(TRUE);
		$ficha = $this->DBFFichaf->fetchAll(TRUE);
		$departamento = $this->DBFDepart->fetchAll(TRUE);

		$regime = array(
			'10' => 'CELETISTA',
			'30' => 'EFETIVO',
			'31' => 'EFETIVO',
			'35' => 'COMISSIONADO',
			'97' => 'CONTRATADO'
		);

		/**
		 * Filtro por Eventos
		 */
		if (!empty($this->input->post('evento'))) {
			$eventoFicha = $this->input->post('evento');
		} else {
			$this->message->add('Erro! Para gerar o arquivo de margem é necessário selecionar um evento!', 'error');
			redirect('files/margin');
		}

		if ($funcionarios && count($funcionarios)) {
			$marginFile = new FileMargin;
			foreach ($funcionarios as $row) {
				$marginFile->setMatricula(trim($row->F_MATRIC));
				$marginFile->setCpf(trim($row->F_CPF));
				$marginFile->setNomeServidor(trim($row->F_NOME));
				$marginFile->setEstabelecimento($this->BIConfig->estabelecimento);
				$marginFile->setOrgao($this->BIConfig->orgao);
				$marginFile->setMargem(isset($ficha[trim($row->F_MATRIC)][$eventoFicha]) ? $ficha[trim($row->F_MATRIC)][$eventoFicha]->A_VAL01 : '');
				$marginFile->setMargemCartao(isset($ficha[trim($row->F_MATRIC)][$eventoFicha]) ? number_format($ficha[trim($row->F_MATRIC)][$eventoFicha]->A_VAL01/3, 2) : '');
				$marginFile->setDataNascimento($marginFile->dateToFile($row->F_DATANASC));
				$marginFile->setDataAdmissao($marginFile->dateToFile($row->F_ADMISSAO));
				$marginFile->setDataFimContrato(empty(trim($row->F_DTFIMCTA)) ? '' : $marginFile->dateToFile($row->F_DTFIMCTA));
				$marginFile->setRegimeTrabalho($regime[trim($row->F_VINCULO)]);
				$marginFile->setLocalTrabalho(utf8_encode(trim($departamento[trim($row->F_CNTCUSTO)]->D_NOME)));
				$marginFile->setCarteiraIdentidade(trim($row->F_IDENTIDA).trim($row->F_CI_UF));
				$marginFile->attachIntoCollection($marginFile);
			}

			$marginFile->createFile();
			$fileRendered = $marginFile->renderFile(TRUE);

			var_dump($fileRendered); die;

			$path = 'uploads/arquivos/';
			$basePath = realpath($path);
			if ($basePath) {
				if (is_writable($basePath)) {
					$fileName = 'margem_'.date('Y-m-d_H-i-s').'.txt';
					$filePath = $basePath.'/'.$fileName;
					if (write_file($filePath, $fileRendered)) {
						$this->db->trans_begin();
						$fileInfo['file_type'] = '2';
						$fileInfo['file_upload_date'] = date('Y-m-d H:i:s');
						$fileInfo['file_path'] = $path.$fileName;
						$this->db->insert('bi_files', $fileInfo);
						if ($this->db->trans_status() === FALSE) {
							$this->db->trans_rollback();
						} else {
							$this->db->trans_commit();
						}
						redirect('files/margin');
					} else {
						exit("Houve um erro ao salvar o arquivo!");
					}
				} else {
					exit("O diretório ". $basePath. " não tem permissão de escrita!");
				}
			} else {
				exit("O diretório ". $basePath. " não existe!");
			}	
		}


	}

	public function moviment()
	{	
		$this->load->model('File');
		$moviment = $this->File->fetchAll('3');
		$data['files'] = $moviment;

		$data['page'] = "moviment";
		$data['page_title'] = "Arquivos de Movimento";
		$data['page_icon'] = "fa-file-excel-o";
		$this->load->view('margin_list', $data);
	}

	public function returns()
	{	
		$this->load->model('File');
		$returns = $this->File->fetchAll('4');
		$data['files'] = $returns;

		$data['page'] = "return";
		$data['page_title'] = "Arquivos de Retorno";
		$data['page_icon'] = "fa-file-excel-o";
		$this->load->view('margin_list', $data);
	}

	public function download($fileId) {
		$this->db->join('bi_files_types', 'type_id = file_type');
		$this->db->where('file_id', $fileId);
		$file = $this->db->get("bi_files");
		if ($file->num_rows()) {
			$this->load->helper('download');
			$data = file_get_contents($file->row()->file_path);
			force_download(str_replace(" ", "_",$file->row()->type_name)."_".date('Y-m-d_H-i-s').'.txt', $data);
		} else {
			redirect();
		}
	}

	public function delete($fileId = 0, $redirect = 'history')
	{
		if ((int)$fileId > 0) {
			$this->db->trans_begin();
			$this->db->where('file_id', $fileId);
			$this->db->delete('bi_files');

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->message->add('Houve um erro ao excluir o arquivo $fileId!', 'error');
			} else {
				$this->db->trans_rollback();
				$this->message->add('O arquivo $fileId foi excluído com sucesso!', 'success');
			}
		}

		redirect('files/'.$redirect);
	}

	public function test()
	{
		$this->load->model('Dbf_evento', 'DBFEvento');
		$eventos = $this->DBFEvento->fetchAllForSelectInput(TRUE);
		var_dump($eventos);
	}
}