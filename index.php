<!DOCTYPE html>

<head>

	<meta charset="utf-8"/>
			
			<title>Gerador de cpf</title>
	</head>
	
<body>

	<?php 
			
		$server   = $_SERVER['SERVER_NAME'];
        $endereco   = $_SERVER ['REQUEST_URI'];

        $nendereco  = explode("/", $endereco);
        $endereco   = $nendereco[1].'/'.$nendereco[2];
        

			 ?>



			 <form action="gerarcpf.php" method="post"> 
			
			 			<p><input type='text' name='cpf' id='cpf' maxlength=9 size=10/> 
			 			
					<input type="hidden" name="url" value="<?php echo $endereco; ?>">
						<p><input type="submit" value="Enviar" name="enviar" /></p>
					</form>

					

</body>
</html>