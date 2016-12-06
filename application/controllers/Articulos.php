<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Articulos extends CI_Controller {
   function index(){
      //cargo el helper de url, con funciones para trabajo con URL del sitio
      $this->load->helper('url');
	  if($this->session->userdata('logged_in')){
		  $this->load->helper('url');
		  
		  //cargo el modelo de artículos
		  $this->load->model('Articulos_model');
		  
		  //pido los ultimos artículos al modelo
		  $ultimosArticulos = $this->Articulos_model->dame_ultimos_articulos();
		  //print_r($ultimosArticulos);
		  //creo el array con datos de configuración para la vista
		  $datos_vista = array('rs_articulos' => $ultimosArticulos);
		  
		  //print_r($datos_vista);
		  //cargo la vista pasando los datos de configuacion
		  //$this->load->view('cabecera');
		  //$this->load->view('articulos', $datos_vista);
		  
		  $datos_plantilla['titulo']='Catalogo de articulos...Bienvenido al sitio';
		  $datos_plantilla['cabecera']=$this->load->view('cabecera','',true);
		  $datos_plantilla['cuerpo']=$this->load->view('articulos', $datos_vista,true);
		  $this->load->view('plantilla_principal',$datos_plantilla);
		  
		}else{
			redirect('login', 'refresh');
		}  
   }
   
    function logout()
	 {
	   $this->load->helper('url');
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	   
	 }
	 
	 function muestra($id=0){
			$this->load->helper('url');
			
			$this->load->model('Articulos_model');
			
			$this->load->library('conversor_fechas');
			
			$arrayArticulo=$this->Articulos_model->dame_articulo($id);
			/**
			$arrayArticuloEsp=array('titulo'=>$arrayArticulo['titulo'],
			'id'=>$arrayArticulo['id'],
			'descripcion'=>$arrayArticulo['descripcion'],
			'cuerpo'=>$arrayArticulo['cuerpo'],
			'fec_alta'=>fecha_mysql_a_espanol($arrayArticulo['fec_alta']));
			**/
			foreach($arrayArticulo as $key => $value){
				if($key=='fec_alta'){
					$arrayArticuloEsp[$key]= $this->conversor_fechas->fecha_mysql_a_espanol($value);
				}else{
					$arrayArticuloEsp[$key]= $value;
				}

			}
			
			
			$data = array($arrayArticulo);
			
			
			
			if(!$arrayArticulo){
				show_404();
				//print_r($data);
			}else{
				//$this->load->view('cabecera');
				//$this->load->view('muestra_articulo',$arrayArticulo);
				
				$datos_plantilla['titulo']='Detalles del articulos...Bienvenido al sitio';
				$datos_plantilla['cabecera']=$this->load->view('cabecera','',true);
				$datos_plantilla['cuerpo']=$this->load->view('muestra_articulo',$arrayArticuloEsp,true);
				$this->load->view('plantilla_principal',$datos_plantilla);
				
				//print_r($data['articulo']);
				//var_dump($arrayArticulo);
			}
			
	 }
}
?>