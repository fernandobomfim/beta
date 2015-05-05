<?php
use application\libraries\File\FileAbstract;
use application\libraries\File\FileCollection;
use application\libraries\File\FileFinanceMoviment;
use application\libraries\File\FileReturn;
use application\libraries\Dbase\Dbase;

class Welcome extends CI_Controller {

	public function index()
	{

		$data['page'] = "home";
		$data['page_title'] = "Início";
		$data['page_icon'] = "fa-home";
		$this->load->view('home', $data);
	}

	public function teste()
	{

		$arquivo = realpath("./dbf/CADFUN.dbf");
		$dbase = new Dbase();
		$dbase->setFile($arquivo);
		$dbase->open();

		if ($dbase->getNumRecords()) {

			$data = new FileFinanceMoviment();
			foreach ($dbase->getCollection() AS $row) {
				$data->setMatricula(trim($row->F_MATRIC));
				$data->setCpf(trim($row->F_CPF));
				$data->setNomeServidor(trim($row->F_NOME));
				$data->setEstabelecimento('1E1');
				$data->setOrgao('222');
				$data->setCodigoDesconto('101');
				$data->setValorDesconto('115.24');
				$data->setPrazoTotal('48');
				$data->setNumeroParcelasPagas('12');
				$data->setDataInclusaoDesconto('01012014');
				$data->setPeriodo('012015');
				$data->attachIntoCollection($data);
			}
		}
			
		$data->createFile();
		echo "<meta charset=UTF-8'><pre>";
		print_r($data->renderFile());
		echo "</pre>";

	}

	public function retorno()
	{
		// $data = new FileReturn;
		// $data->setMatricula('MAT123')
		// 	 ->setCpf('07172976916')
		// 	 ->setNomeServidor('Fernando Henrique Urbano Bomfim')
		// 	 ->setEstabelecimento('033')
		// 	 ->setOrgao('034')
		// 	 ->setCodigoDesconto('035')
		// 	 ->setValorDescontoPrevisto('120.34')
		// 	 ->setValorDescontoRealizado('107.43')
		// 	 ->setMotivoNaoDesconto('Servidor excedeu o limite de 30% do desconto em folha')
		// 	 ->setSituacao('P')
		// 	 ->setPeriodo('012015');
		// $data->attachIntoCollection($data);
		// $data->createFile();

		// echo "<meta charset=UTF-8'><pre>";
		// print_r($data->renderFile());
		// echo "</pre>"; die;

		$arquivo = new FileReturn();
		$arquivo->setFile(realpath('./retornos/retorno.txt'));
		$arquivo->processFile();
		$collection = $arquivo->getCollection();
		var_dump($collection);

	}
}
