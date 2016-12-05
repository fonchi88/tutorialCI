<?php
	class Valid_user extends CI_Model{
		
		function __constructor(){
			parent::Model();
		}
		
		 function login($username, $password)
		 {
		   $this -> db -> select("usuario","AES_DECRYPT(contrasena,'privado')");
		   $this -> db -> from('usuarios');
		   $this -> db -> where('usuario', $username);
		   $this -> db -> where("AES_DECRYPT(contrasena,'privado')", $password);
		   //$this -> db -> limit(1);
		 
		   $query = $this -> db -> get();
		 
		   if($query -> num_rows() == 1)
		   {
			 return $query -> num_rows();

		   }
		   else
		   {
			 return "error";
		   }
		 }
	}
?>