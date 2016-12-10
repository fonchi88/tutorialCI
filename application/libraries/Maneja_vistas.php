<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maneja_vistas{

	function lista_articulos(){
		$CI =& get_instance();
		
		$CI->load->helper(array('url','form'));
			  
		//cargo el modelo de artículos
		$CI->load->model('Articulos_model');
			  
		//pido los ultimos artículos al modelo
		$ultimosArticulos = $CI->Articulos_model->dame_ultimos_articulos();
		//print_r($ultimosArticulos);
		//creo el array con datos de configuración para la vista
		$datos_vista = array('rs_articulos' => $ultimosArticulos);
			  
		//print_r($datos_vista);
		//cargo la vista pasando los datos de configuacion
		//$this->load->view('cabecera');
		//$this->load->view('articulos', $datos_vista);
			  
		$datos_plantilla['titulo']='Catalogo de articulos...Bienvenido al sitio';
		$datos_plantilla['cabecera']=$CI->load->view('cabecera','',true);
		$datos_plantilla['cuerpo']=$CI->load->view('articulos', $datos_vista,true);
		//$this->load->view('plantilla_principal',$datos_plantilla);
		
		return $CI->load->view('plantilla_principal',$datos_plantilla);
			

	}
	
	function detalle_articulo($id=0){
			$CI =& get_instance();
			
			$CI->load->helper('url');
			
			$CI->load->model('Articulos_model');
			
			$CI->load->library('conversor_fechas');
			
			$arrayArticulo=$CI->Articulos_model->dame_articulo($id);

			if(!$arrayArticulo){
				show_404();
				exit;
			}else{
				foreach($arrayArticulo as $key => $value){
					if($key=='fec_alta'){
						$arrayArticuloEsp[$key]= $CI->conversor_fechas->fecha_mysql_a_espanol($value);
					}else{
						$arrayArticuloEsp[$key]= $value;
					}

				}
			
				$data = array($arrayArticulo);
				$datos_plantilla['titulo']='Detalles del articulos...Bienvenido al sitio';
				$datos_plantilla['cabecera']=$CI->load->view('cabecera','',true);
				$datos_plantilla['cuerpo']=$CI->load->view('muestra_articulo',$arrayArticuloEsp,true);
				//$this->load->view('plantilla_principal',$datos_plantilla);
				
				return $CI->load->view('plantilla_principal',$datos_plantilla);
			}
	}
	
	function muestra_login(){
			$CI =& get_instance();
			$CI->load->helper(array('url','form'));
			$datos = array (
					'btn_text' => 'Login',
					'msg_text' => 'Not registered?',
					'link_text'=> 'Create an account'
			);
			  
			$datos_plantilla['titulo']='Login...Bienvenido al sitio';
			$datos_plantilla['cabecera']=$CI->load->view('cabecera','',true);
			$datos_plantilla['cuerpo']=$CI->load->view('login',$datos,true);
			//$this->load->view('plantilla_principal',$datos_plantilla);
			//return $datos_plantilla;
			return $CI->load->view('plantilla_principal',$datos_plantilla);
	}
	
	
	
}
?>