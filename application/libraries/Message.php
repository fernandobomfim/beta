<?php
class Message {

	public function add( $msg,$tipo = "success" ){

		switch ($tipo) {
			case 'info':
				$html = '<div class="col-md-12 alert alert-info">'.$msg.'</div>';
				break;

			case 'error':
				$html = '<div class="col-md-12 alert alert-danger">'.$msg.'</div>';
				break;
			
			default:
				$html = '<div class="col-md-12 alert alert-success">'.$msg.'</div>';
				break;
		}

		$CI =& get_instance();

		$session = $CI->session->userdata('trans_message');

		if( empty($session) ) $CI->session->set_userdata('trans_message', '');
		
		$session = $CI->session->userdata('trans_message');
		$session .= $html;
		$CI->session->set_userdata('trans_message', $session);

		return true;

	}

	public function get($return = FALSE){
		
		$CI =& get_instance();

		$session = $CI->session->userdata('trans_message');

		if(!empty( $session )){

			$CI->session->unset_userdata('trans_message');

			if ($return)
			{
				return $session;
			}
			else
			{
				echo $session;
			}
		}
	}

}