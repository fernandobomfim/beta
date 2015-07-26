<?php
use application\libraries\Dbase\Dbase;
use application\libraries\File\FileMargin;
use application\libraries\File\FileHistory;
use application\libraries\File\FileMoviment;
use application\libraries\File\FileReturn;
use application\libraries\Dbase\Dbase_codfix;

class Files extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
		$this->BIConfig->orgao = $this->session->userdata('orgao');

		$this->load->helper('form_helper');
	}

	public function history()
	{	
		$this->load->model('File');
		$history = $this->File->fetchAll('1', $this->betaconfig->orgId);

		$this->load->model('Dbf_evento', 'DBFEvento');
		$data['eventos'] = $this->DBFEvento->fetchAllForSelectInput();

		$data['files'] = $history;
		$data['page'] = "history";
		$data['page_title'] = "Arquivos de Histórico";
		$data['page_icon'] = "fa-file-excel-o";
		$this->load->view('history_list', $data);
	}

	public function createHistoryFile()
	{
		$this->load->model('DBF_cadfun', 'DBFCadfun');
		$this->load->model('DBF_movger', 'DBFMovger');
		$this->load->model('DBF_config', 'DBFConfig');

		$history = $this->DBFCadfun->fetchAllTyped(TRUE);
		$movger = $this->DBFMovger->fetchAll();
		$config = $this->DBFConfig->fetchAll();

		$filtroEventos = $this->input->post('eventos');
		$count = 0;

		if ($movger && count($movger)) {

			$historyFile = new FileHistory;

			foreach ($movger as $mov) {
				
				/**
				 * Filtro por Eventos
				 */
				$evento = $mov->O_RENDIMEN;
				if ($filtroEventos) {	
					if (!in_array($evento, $filtroEventos)) {
						continue;
					}
				}

				/**
				 * Verifica a Data de Inclusão do Desconto
				 */
				$totalParcelas = $mov->O_TOTPARCF;
				$totalParcelasRestantes = $mov->O_QTDPARCF;
				$parcelasPagas = $totalParcelas-$totalParcelasRestantes;
				$dataInclusaoDesconto = strtotime(trim($config[1]->INI_FOLHA));
				$dataInclusaoDesconto = date_create(date('Y-m-d', $dataInclusaoDesconto));
				$dataInclusaoDesconto = date_sub($dataInclusaoDesconto, date_interval_create_from_date_string(($parcelasPagas).' months'));
				$dataInclusaoDesconto = date_format($dataInclusaoDesconto, 'dmY');
				
				/**
				 * Configura registros do Arquivo de Histórico
				 */
				$historyFile->setMatricula($mov->O_FUNCIONA);
				$historyFile->setCpf($history[$mov->O_FUNCIONA]->F_CPF);
				$historyFile->setNomeServidor($history[$mov->O_FUNCIONA]->F_NOME);
				$historyFile->setEstabelecimento($this->betaconfig->orgEstablishmentCode);
				$historyFile->setOrgao($this->betaconfig->orgCode);
				$historyFile->setCodigoDesconto($mov->O_RENDIMEN);
				$historyFile->setPrazoTotal($totalParcelas);
				$historyFile->setNumeroParcelasPagas($parcelasPagas);
				$historyFile->setValorDesconto($mov->O_VALOR);
				$historyFile->setDataInclusaoDesconto($dataInclusaoDesconto);
				$historyFile->attachIntoCollection($historyFile);
			}
			
			$historyFile->createFile();
			$fileRendered = $historyFile->renderFile(TRUE);
			if (empty($fileRendered)) {
				$this->message->add('Nenhum registro foi gerado! Verifique o filtro selecionado.', 'error');
				redirect('files/history');
			}

			$path = 'uploads/arquivos/';
			$basePath = realpath($path);
			if ($basePath) {
				if (is_writable($basePath)) {
					$fileName = 'historico_'.$this->betaconfig->orgEstablishmentCode.'_'.$this->betaconfig->orgCode.'_'.date('Y-m-d_H-i-s').'.txt';
					$filePath = $basePath.'/'.$fileName;
					if (write_file($filePath, $fileRendered)) {
						$this->db->trans_begin();
						$fileInfo['file_type'] = '1';
						$fileInfo['file_upload_date'] = date('Y-m-d H:i:s');
						$fileInfo['file_path'] = $path.$fileName;
						$fileInfo['file_org_id'] = $this->betaconfig->orgId;
						$fileInfo['file_org_name'] = $this->betaconfig->orgName;
						$fileInfo['file_establishment_code'] = $this->betaconfig->orgEstablishmentCode;
						$fileInfo['file_filter_serialized'] = implode(', ', $this->input->post('eventos'));
						$this->db->insert('bi_files', $fileInfo);
						if ($this->db->trans_status() === FALSE) {
							$this->db->trans_rollback();
						} else {
							$this->db->trans_commit();
							$this->message->add('O arquivo de Histórico foi gerado com sucesso!', 'success');
						}
						redirect('files/history');
					} else {
						exit("Houve um erro ao salvar o arquivo $filePath!");
					}
				} else {
					exit("O diretório ". $basePath. " não tem permissão de escrita!");
				}
			} else {
				exit("O diretório ". $basePath. " não existe!");
			}	
		} else {
			$this->message->add('O arquivo MOVGER não contém registros!', 'error');
			redirect('files/history');
		}
	}

	public function margin()
	{	
		$this->load->model('File');
		$margin = $this->File->fetchAll('2', $this->betaconfig->orgId);
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
		$this->load->model('DBF_config', 'DBFConfig');
		$this->load->model('DBF_movger', 'DBFMovger');

		$funcionarios = $this->DBFCadfun->fetchAllTyped(TRUE);
		$ficha = $this->DBFFichaf->fetchAll();
		$departamento = $this->DBFDepart->fetchAll(TRUE);
		$config = $this->DBFConfig->fetchAll();
		$movger = $this->DBFMovger->fetchAllTyped();
		
		if (!count($funcionarios)) {
			$this->message->add('Nenhum registro encontrado no arquivo CADFUN.DBF.','error');
			redirect('files/margin');
		}

		$regime = array(
			'10' => 'CELETISTA',
			'30' => 'EFETIVO',
			'31' => 'EFETIVO',
			'35' => 'COMISSIONADO',
			'97' => 'CONTRATADO'
		);

		/**
		 * Checa Filtro por Eventos
		 */
		$filtroEventos = $this->input->post('eventos');
		if (!is_array($filtroEventos) OR !count($filtroEventos)) {
			$this->message->add('Erro! Para gerar o arquivo de margem é necessário selecionar um evento!', 'error');
			redirect('files/margin');
		}

		if ($movger && count($movger)) {

			$marginFile = new FileMargin;

			foreach ($movger as $row) {

				/**
				 * Filtro por Eventos
				 */
				$evento = $row->O_RENDIMEN;
				if ($filtroEventos) {	
					if (!in_array($evento, $filtroEventos)) {
						continue;
					}
				}

				$margem = number_format($row->O_VALOR, 2, '.', '');
				$margemCartao = number_format($row->O_VALOR/3, 2, '.', '');

				$marginFile->setMatricula($row->O_FUNCIONA);
				$marginFile->setCpf(trim($funcionarios[$row->O_FUNCIONA]->F_CPF));
				$marginFile->setNomeServidor(trim($funcionarios[$row->O_FUNCIONA]->F_NOME));
				$marginFile->setEstabelecimento($this->BIConfig->orgao->org_establishment_code);
				$marginFile->setOrgao($this->BIConfig->orgao->org_id);
				$marginFile->setMargem($margem);
				$marginFile->setMargemCartao($margemCartao);
				$marginFile->setDataNascimento($marginFile->dateToFile($funcionarios[$row->O_FUNCIONA]->F_DATANASC));
				$marginFile->setDataAdmissao($marginFile->dateToFile($funcionarios[$row->O_FUNCIONA]->F_ADMISSAO));
				$marginFile->setDataFimContrato(empty(trim($funcionarios[$row->O_FUNCIONA]->F_DTFIMCTA)) ? '' : $marginFile->dateToFile($funcionarios[$row->O_FUNCIONA]->F_DTFIMCTA));
				$marginFile->setRegimeTrabalho($regime[trim($funcionarios[$row->O_FUNCIONA]->F_VINCULO)]);
				$marginFile->setLocalTrabalho(iconv('UTF-8', 'ISO-8859-1///TRANSLIT', utf8_encode(trim($departamento[trim($funcionarios[$row->O_FUNCIONA]->F_CNTCUSTO)]->D_NOME))));
				$marginFile->setCarteiraIdentidade($funcionarios[$row->O_FUNCIONA]->F_IDENTIDA.$funcionarios[$row->O_FUNCIONA]->F_UF);
				$marginFile->attachIntoCollection($marginFile);
			}

			$marginFile->createFile();
			$fileRendered = $marginFile->renderFile(TRUE);
			
			if (empty($fileRendered)) {
				$this->message->add('Nenhum registro encontrado. Verifique o filtro selecionado.', 'error');
				redirect('files/margin');
			}

			$path = 'uploads/arquivos/';
			$basePath = realpath($path);
			if ($basePath) {
				if (is_writable($basePath)) {
					$fileName = 'margem_'.$this->betaconfig->orgEstablishmentCode.'_'.$this->betaconfig->orgCode.'_'.date('Y-m-d_H-i-s').'.txt';
					$filePath = $basePath.'/'.$fileName;
					if (write_file($filePath, $fileRendered)) {
						$this->db->trans_begin();
						$fileInfo['file_type'] = '2';
						$fileInfo['file_upload_date'] = date('Y-m-d H:i:s');
						$fileInfo['file_path'] = $path.$fileName;
						$fileInfo['file_org_id'] = $this->BIConfig->orgao->org_id;
						$fileInfo['file_org_name'] = $this->BIConfig->orgao->org_name;
						$fileInfo['file_filter_serialized'] = implode(', ', $this->input->post('eventos'));
						$this->db->insert('bi_files', $fileInfo);
						if ($this->db->trans_status() === FALSE) {
							$this->db->trans_rollback();
							$this->message->add('Houve um erro ao salvar o Arquivo de Margem! Tente novamente.', 'error');
						} else {
							$this->db->trans_commit();
							$this->message->add('O Arquivo de Margem foi gerado com sucesso!', 'success');
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
		$moviment = $this->File->fetchAll('3', $this->BIConfig->orgao->org_id);
		$data['files'] = $moviment;

		$data['page'] = "moviment";
		$data['page_title'] = "Arquivos de Movimento";
		$data['page_icon'] = "fa-file-excel-o";
		$this->load->view('moviment_list', $data);
	}

	public function movimentProcess($file_id = 0)
	{
		if ($file_id > 0) {
			$this->load->model('File');

			$moviment = $this->File->getFile($file_id);

			if ($moviment && $moviment->file_status == '0') {
				$movimentFile = new FileMoviment;
				$movimentFile->setFile($moviment->file_path);
				$movimentFile->processFile();
				$collection = $movimentFile->getCollection();

				if ($collection && count($collection) > 0) {
					
					$this->load->model('Dbf_codfix', 'Codfix');
				
					foreach ($collection as $key => $mov) {
						$movRegisterObj = new FileMoviment();
						$movRegisterObj->hydrate($mov);
						
						$registerObj = $this->Codfix->fetchOne($movRegisterObj->matricula);
						if ($registerObj) {
							$update = $this->Codfix->updateCodfixRecordFromMoviment($registerObj, $movRegisterObj);
							if (!$update) {
								$mensagem = "Matricula  ".$registerObj->F_MATRIC.": FALHA na atualização! DADOS: ".serialize(
									array(
										'matricula' => $movRegisterObj->matricula,
									 	'codigoDesconto' => $movRegisterObj->codigoDesconto,
									 	'valorDesconto' => $movRegisterObj->valorDesconto, 
									 	'prazoTotal' => $movRegisterObj->prazoTotal, 
									 	'numeroParcelasPagas' => $movRegisterObj->numeroParcelasPagas
									)
								);
							}
						} else {
							$create = $this->Codfix->createCodfixRecordFromMoviment($movRegisterObj);
							if (!$create) {
								$mensagem = "Matricula  ".$registerObj->F_MATRIC.": FALHA na criação! DADOS: ".serialize(array($movRegisterObj->matricula, $movRegisterObj->codigoDesconto, $movRegisterObj->valorDesconto, $movRegisterObj->prazoTotal, $movRegisterObj->numeroParcelasPagas));
							}
						}

						if (isset($mensagem)) {
							$this->db->insert('bi_moviment_process_log', array(
								'log_file_id'	=> $file_id,
								'log_date'		=> date('Y-m-d H:i:s'),
								'log_message'	=> $mensagem
							));
						}
					}
				}

				$this->db->where('file_id', $file_id);
				$this->db->update('bi_files', array('file_status' => '1'));

				$this->message->add('Arquivo #'.$file_id.' processado com sucesso!');
				redirect('files/moviment');
			} else {
				$this->message->add('O Arquivo #'.$file_id.' ja foi processado', 'error');
				redirect('files/moviment');
			}
		}
	}

	public function uploadFile()
	{
		$path = 'uploads/arquivos/';
		$basePath = realpath($path);
		if ($basePath) {
			if (is_writable($basePath)) {
				$upload_folder = $basePath;
				$config['upload_path']	= $upload_folder;
				$config['allowed_types']= 'txt';
				$config['max_size']		= '2048';
				$config['file_name']	= "Arquivo_de_Movimento_".date("Y-m-d_H-i-s");

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('movimento'))
				{
					$this->message->add('Erro ao fazer o upload do arquivo! '.$this->upload->display_errors(), 'error');
					redirect('files/moviment');
				}
				else
				{
					$data = $this->upload->data();
					$file = $data['file_name'];
					$filePath = $path.$file;

					if (!$this->CheckMovmentFile($filePath) ) {
						unset($filePath);
						$this->message->add('Este arquivo pertence a outro órgão ou é inválido! Verifique o arquivo de tente novamente.', 'error');
						redirect('files/moviment');
						exit();
					}

					$fileInfo['file_type'] = '3';
					$fileInfo['file_upload_date'] = date('Y-m-d H:i:s');
					$fileInfo['file_path'] = $filePath;
					$fileInfo['file_org_id'] = $this->BIConfig->orgao->org_id;
					$fileInfo['file_org_name'] = $this->BIConfig->orgao->org_name;
					$fileInfo['file_establishment_code'] = $this->BIConfig->orgao->org_id;
					$this->db->insert('bi_files', $fileInfo);
					if ($this->db->trans_status() === FALSE) {
						$this->db->trans_rollback();
					} else {
						$this->db->trans_commit();
					}

					$this->message->add('O arquivo de movimento foi adicionado com sucesso', 'success');
					redirect('files/moviment');
				}
			} else {
				show_error("O diretório ". $basePath. " não tem permissão de escrita!");
				exit();
			}
		} else {
			show_error("O diretório ". $basePath. " não existe!");
			exit();
		}	
	}

	private function CheckMovmentFile($file = false)
	{	
		if ($file) {
			$m = new FileMoviment;
			$m->setFile($file);
			$m->processFile();
			$collection = $m->getCollection();

			if ($collection && count($collection) > 0) {
				if ((int)$collection[0]['orgao'] == $this->BIConfig->orgao->org_code && (int)$collection[0]['estabelecimento'] == $this->BIConfig->orgao->org_establishment_code) {
					return TRUE;
				}
			}
			return FALSE;
		}
	}

	public function returns()
	{	
		$this->load->model('File');
		$returns = $this->File->fetchAll('4', $this->betaconfig->orgId);
		$data['files'] = $returns;

		$this->load->model('Dbf_evento', 'DBFEvento');
		$data['eventos'] = $this->DBFEvento->fetchAllForSelectInput();

		$data['page'] = "return";
		$data['page_title'] = "Arquivos de Retorno";
		$data['page_icon'] = "fa-file-excel-o";
		$this->load->view('returns_list', $data);
	}

	public function createReturnsFile() 
	{
		$this->benchmark->mark('startProcessBenchmark');
		
		$this->load->model('Dbf_codfix', 'Codfix');
		$codfixCollection = $this->Codfix->fetchAll();

		$this->load->model('Dbf_movger', 'Movger');
		$movgerCollection = $this->Movger->fetchAllTyped();

		$this->load->model('Dbf_cadfun', 'Cadfun');
		$cadfunCollection = $this->Cadfun->fetchAllTyped(TRUE);

		$this->load->model('Dbf_config', 'Config');
		$configCollection = $this->Config->fetchAll();
		$iniFolha = date("mY", strtotime($configCollection[1]->INI_FOLHA));

		$filtroEventos = $this->input->post('eventos');

		if ($codfixCollection && count($codfixCollection)) {

			$fileReturn = new FileReturn;

			foreach ($codfixCollection as $index => $register) {

				if (!isset($cadfunCollection[(int)$register->F_MATRIC])) {
					continue;
				}

				$columnsWithContent = $this->Codfix->getColumnsNumberWithContent($register);
				foreach ($columnsWithContent as $column) {

					/**
					 * Filtro por Eventos das Colunas do Codfix
					 */
					$evento = $column['F_COD'.$column['columnNumber']];
					if ($filtroEventos) {	
						if (!in_array($evento, $filtroEventos)) {
							continue;
						}
					}

					$F_COD = $column['F_COD'.$column['columnNumber']];
					$F_VAL = $column['F_VAL'.$column['columnNumber']];
					$F_PRA = $column['F_PRA'.$column['columnNumber']];
					$F_QTD = $column['F_QTD'.$column['columnNumber']];
					$F_SIT = $column['F_SIT'.$column['columnNumber']];

					/**
					 * Inicia a Criação de um Novo Objeto (linha do arquivo retorno)
					 */
					$ret = new FileReturn;
					$ret->setMatricula($register->F_MATRIC);
					$ret->setCpf($cadfunCollection[(int)$register->F_MATRIC]->F_CPF);
					$ret->setNomeServidor($cadfunCollection[(int)$register->F_MATRIC]->F_NOME);
					$ret->setEstabelecimento($this->BIConfig->orgao->org_establishment_code);
					$ret->setOrgao($this->BIConfig->orgao->org_code);
					$ret->setCodigoDesconto(substr($F_COD, -3, 3));
					$ret->setValorDescontoPrevisto($F_VAL);
					$ret->setPeriodo($iniFolha);

					$movgerRegisterReturn = $this->Movger->checkRegisterIntoMovger($movgerCollection, $register->F_MATRIC, $F_COD);
					if ($movgerRegisterReturn && isset($movgerRegisterReturn['codigoDesconto']) && isset($movgerRegisterReturn['valorDescontado'])) {
						if ($F_VAL == $movgerRegisterReturn['valorDescontado']) {
							$ret->setSituacao('T');
							$ret->setValorDescontoRealizado($movgerRegisterReturn['valorDescontado']);
							$ret->setMotivoNaoDesconto("");
						} elseif ($movgerRegisterReturn['valorDescontado'] < $F_VAL) {
							$ret->setSituacao('P');
							$ret->setValorDescontoRealizado($movgerRegisterReturn['valorDescontado']);
							$ret->setMotivoNaoDesconto("PARCELA DESCONTADA PARCIALMENTE");
						} elseif ($movgerRegisterReturn['valorDescontado'] > $F_VAL) {
							$ret->setSituacao('P');
							$ret->setValorDescontoRealizado($movgerRegisterReturn['valorDescontado']);
							$ret->setMotivoNaoDesconto("PARCELA DESCONTADA ACIMA DO VALOR");
						}
					} else {
						$ret->setSituacao('R');
						$ret->setValorDescontoRealizado(0);
						$ret->setMotivoNaoDesconto("SERVIDOR SEM MOVIMENTACAO FINANCEIRA NO PERIODO");
					}

					$fileReturn->attachIntoCollection($ret);
				}	
			}

			$this->benchmark->mark('endProcessBenchmark');
		

			$fileReturn->createFile();
			$fileRendered = $fileReturn->renderFile(TRUE);
			
			if (empty($fileRendered)) {
				$this->message->add('Nenhum registro encontrado para gerar o Arquivo de Retorno! Verifique o filtro selecionado.', 'error');
				redirect('files/returns');
			}

			$path = 'uploads/arquivos/';
			$basePath = realpath($path);
			if ($basePath) {
				if (is_writable($basePath)) {
					$fileName = 'retorno_'.$this->betaconfig->orgEstablishmentCode.'_'.$this->betaconfig->orgCode.'_'.date('Y-m-d_H-i-s').'.txt';
					$filePath = $basePath.'/'.$fileName;
					if (write_file($filePath, $fileRendered)) {
						$this->db->trans_begin();
						$fileInfo['file_type'] = '4';
						$fileInfo['file_upload_date'] = date('Y-m-d H:i:s');
						$fileInfo['file_path'] = $path.$fileName;
						$fileInfo['file_org_id'] = $this->BIConfig->orgao->org_id;
						$fileInfo['file_org_name'] = $this->BIConfig->orgao->org_name;
						$fileInfo['file_filter_serialized'] = implode(', ', $this->input->post('eventos'));
						$this->db->insert('bi_files', $fileInfo);
						if ($this->db->trans_status() === FALSE) {
							$this->db->trans_rollback();
						} else {
							$this->db->trans_commit();
						}
						$this->message->add('Arquivo de Retorno criado com sucesso em '.$this->benchmark->elapsed_time('startProcessBenchmark', 'endProcessBenchmark'). ' segundos');
						redirect('files/returns');
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

	public function download($fileId) {
		$this->db->join('bi_files_types', 'type_id = file_type');
		$this->db->where('file_id', $fileId);
		$file = $this->db->get("bi_files");
		if ($file->num_rows()) {
			$this->load->helper('download');
			$data = file_get_contents($file->row()->file_path);
			$file_name = explode("/", $file->row()->file_path);
			force_download($file_name[count($file_name)-1], $data);
		} else {
			redirect();
		}
	}

	public function delete($fileId = 0, $redirect = 'history')
	{
		if ((int)$fileId > 0) {
			$this->db->trans_begin();

			$this->load->model('File');
			$file = $this->File->getFile($fileId);			

			$this->db->where('file_id', $fileId);
			$this->db->delete('bi_files');

			if ($this->db->trans_status() === TRUE && unlink(realpath($file->file_path)) === TRUE) {
				$this->db->trans_commit();
				$this->message->add("O arquivo $fileId foi excluído com sucesso!", 'success');
			} else {
				$this->db->trans_rollback();
				$this->message->add("Houve um erro ao excluir o arquivo $fileId!", 'error');
			}
		}

		redirect('files/'.$redirect);
	}

	public function test($test = FALSE)
	{
		$this->load->model('Dbf_codfix', 'CF');
		$collection = $this->CF->fetchAll();

		if ($test) {
			foreach ($collection as $key => $value) {
				if ($key <= 5) {
					$value->F_VAL01 = 123.55;
					$value->F_VAL02 = 456.07;
					$update = $this->CF->updateCodfixRecord($value);
					if ($update) {
						var_dump("Registro $key atualizado com sucesso!");
					} else {
						var_dump("Falha ao atualizar registro $key!");
					}
				}
			}
		} else {
			foreach ($collection as $key => $value) {
				if ($key <= 5) {
					var_dump($value);
				}
			}
		}

	}

	public function MarginTest()
	{
		$arquivo = realpath("public/Arquivo_de_Margem_2015-05-25_02-52-38.txt");
		
		$marginFile = new FileMargin;
		$marginFile->setFile($arquivo);
		$marginFile->processFile();
		$collection = $marginFile->getCollection();
		var_dump($collection);
	}

	public function destroy() {
		$this->session->sess_destroy();
	}

	public function testCodfixTable()
	{
		$this->load->model('DBF_Codfix', 'codfix');
		$this->codfix->checkCodfixTableStructure();
	}

	public function mountTableStructure($file)
	{
		$codfix = new Dbase;
		$codfix->setFile(realpath($this->betaconfig->orgBasepath.$file));
		$codfix->open();
		$codfixHeader = $codfix->getHeader();
		
		echo "<pre>";

		foreach ($codfixHeader as $key => $column) {
			$defaultValue = ($column['type'] == 'number') ? 0 : "''";
			echo 'public $' . $column['name'] . ' = ' . $defaultValue . ";\n";
		}

		echo "\n".'public function hydrate($data)'."\n{\n";
		echo "\t".'if (!empty($data)) {'."\n";
		echo "\t\t".'$data = (is_array($data)) ? (object)$data : $data;'."\n";
		foreach ($codfixHeader as $key => $column) {
			$defaultValue = ($column['type'] == 'number') ? 0 : "''";
			if ($column['type'] == 'number') {
				if ($column['precision'] > 0) {
					$castValue = '(float)$data->'.$column['name'];
				} else{
					$castValue = '(int)$data->'.$column['name'];
				}
			} else {
				$castValue = 'trim($data->'.$column['name'].')';
			}
			echo "\t\t".'$this->' . $column['name'] . ' = (isset($data->' . $column['name'] . ')) ? ' . $castValue . ' : '.$defaultValue.';'."\n";
		}
		echo "\n\t}\n";
		echo "\n}\n";
	}
}
