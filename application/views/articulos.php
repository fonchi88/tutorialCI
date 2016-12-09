<div class="form">
		<h1>Bienvenido a mi web</h1>
		<p>Estos son los últimos artículos publicados.</p>
		<table>
			<?php
			$this->load->library('email');
	
			/**
			while ($fila = mysql_fetch_array($rs_articulos)){
			   echo '<td>';
			   echo '<a href="' . site_url('/articulos/muestra/' . $fila['id']) . '">' . $fila['titulo'] . '</a>';
			   
			   echo '</td>';
			   echo '<td>';
			   echo $fila['descripcion'];
			   echo '</td>';
			}
			**/
			foreach($rs_articulos as $fila){
			   echo '<td>';
			   echo '<a href="' . site_url('/articulos/muestra/' . $fila['id']) . '">' . $fila['titulo'] . '</a>';
			   
			   echo '</td>';
			   echo '<td>';
			   echo $fila['descripcion'];
			   echo '</td>';				
			}
			?>
		</table>

		<a href="articulos/logout"><button>logout</button></a>
</div>
