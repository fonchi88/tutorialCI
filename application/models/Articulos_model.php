<?php
	class Articulos_model extends CI_Model{
		
		function __constructor(){
			parent::Model();
		}
		
		function dame_ultimos_articulos(){
			//$link = mysql_connect('localhost', 'prestashop', 'prestashop');
			//mysql_select_db('codeigniter');
			//$ssql = "select * from articulo order by id desc limit 5";
			//return mysql_query($ssql);
			
			$this -> db -> select("*");
			$this -> db -> from('articulo');
			
			$query = $this -> db -> get();
			
			return $query->result_array();
			//$this -> db -> where('usuario', $username);
			//$this -> db -> where("AES_DECRYPT(contrasena,'privado')", $password);
 
		}
		
		function dame_articulo($id){
			$this -> db -> select("*");
			$this -> db -> from('articulo');
			$this -> db -> where('id', $id);
			$query = $this -> db -> get();
			
			
			if($query->num_rows()==1){
				return $query->row();
			}else{
				return false;
			}
			

		}
		
	}
?>