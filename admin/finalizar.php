
<!DOCTYPE html>
<html lang="en">
	<?php 
		session_start();
		include('config.php');
		if(isset($_SESSION['login'])){
			include('header_logado.php');
			$login = $_SESSION['login'];
		
			$res = mysql_query("SELECT * FROM admin WHERE email='$login'");
		
			$user = mysql_fetch_array($res);
		}else{
			header('Location:login.php');
			
		}
		
		$res2 = mysql_query("SELECT * FROM corridaatual");
		$linha = mysql_fetch_array($res2);
		$id_last = $linha['id']; 
		
		//pega as apostas ganhadoras dessa corrida para inserir-las nos premios
		$apostas = mysql_query("SELECT * FROM aposta WHERE id_corrida = '$id_last'");
		$corridas = mysql_query("SELECT * FROM corrida WHERE id='$id_last'");
		$corrida = mysql_fetch_array($corridas);
		//dados da corrida a ser finalizada
		$m1 = $corrida['m1'];
		$m2 = $corrida['m2'];
		$m3 = $corrida['m3'];
		$m4 = $corrida['m4'];
		$m5 = $corrida['m5'];
		$ganhadores = 0;
		while($aposta = mysql_fetch_array($apostas)){
			
			$milhar = $aposta['numero'];
			$tipo = $aposta['tipo'];
			$valor = $aposta['valor'];
			$id_aposta = $aposta['id_aposta'];
			
			if($tipo == '001'){
				$vpremio = 10*$valor; //valor do premio na dezena
				$vpremio = $vpremio/5; //combinada
				$interesse = substr($milhar,2,3);
				$a = SHA1($id_aposta);
				if(strstr(substr($m1,2,3),$interesse) or strstr(substr($m2,2,3),$interesse) or strstr(substr($m3,2,3),$interesse) or strstr(substr($m4,2,3),$interesse) or strstr(substr($m5,2,3),$interesse)){
					//ganhou na dezena
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$vpremio','$a'");
					$ganhadores = $ganhadores + 1;
				}else{
					continue;
				}
			}
			if($tipo == '010'){
				$vpremio = 100*$valor; //valor do premio na dezena
				$vpremio = $vpremio/5; //combinada
				$interesse = substr($milhar,1,3);
				$a = SHA1($id_aposta);
				if(strstr(substr($m1,1,3),$interesse) or strstr(substr($m2,1,3),$interesse) or strstr(substr($m3,1,3),$interesse) or strstr(substr($m4,1,3),$interesse) or strstr(substr($m5,1,3),$interesse)){
					//ganhou na centena
					
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$vpremio','$a')");
					$ganhadores = $ganhadores + 1;
				}else{
					continue;
				}
			}
			if($tipo == '100'){
				$vpremio = 1000*$valor; //valor do premio na dezena
				$vpremio = $vpremio/5; //combinada
				$interesse = $milhar;
				$a = SHA1($id_aposta);
				if(strstr($m1,$interesse) or strstr($m2,$interesse) or strstr($m3,$interesse) or strstr($m4,$interesse) or strstr($m5,$interesse)){
					//ganhou na centena
					
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$vpremio','$a')");
					$ganhadores = $ganhadores + 1;
				}else{
					continue;
				}
			}
			if($tipo == '101'){
				$vpremio = 1000*$valor; //valor do premio na dezena
				$vpremio = $vpremio/5; //combinada
				$interesse = $milhar;
				$opremio = 0;
				$a = SHA1($id_aposta);
				if(strstr($m1,$interesse) or strstr($m2,$interesse) or strstr($m3,$interesse) or strstr($m4,$interesse) or strstr($m5,$interesse)){
					//ganhou na centena
					
					$opremio = $vpremio;
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$opremio','$a')");
					$ganhadores = $ganhadores+1;
					continue;
				}
				$vpremio2 = 10*$valor; //valor do premio na dezena
				$vpremio2 = $vpremio2/5; //combinada
				$interesse = substr($milhar,2,3);
				if(strstr(substr($m1,2,3),$interesse) or strstr(substr($m2,2,3),$interesse) or strstr(substr($m3,2,3),$interesse) or strstr(substr($m4,2,3),$interesse) or strstr(substr($m5,2,3),$interesse)){
					//ganhou na dezena
					
					$opremio = $vpremio2;
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$opremio','$a')");
					$ganhadores = $ganhadores + 1;
					continue;
				}else{
					continue;
				}
			}
			if($tipo == '110'){
				$vpremio = 1000*$valor; //valor do premio na dezena
				$vpremio = $vpremio/5; //combinada
				$interesse = $milhar;
				$opremio = 0;
				$a = SHA1($id_aposta);
				if(strstr($m1,$interesse) or strstr($m2,$interesse) or strstr($m3,$interesse) or strstr($m4,$interesse) or strstr($m5,$interesse)){
					//ganhou na centena
					$opremio = $vpremio;
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$opremio','$a')");
					$ganhadores = $ganhadores+1;
					continue;
				}
				
				$vpremio2 = 100*$valor; //valor do premio na centena
				$vpremio2 = $vpremio2/5; //combinada
				$interesse = substr($milhar,1,3);
				if(strstr(substr($m1,1,3),$interesse) or strstr(substr($m2,1,3),$interesse) or strstr(substr($m3,1,3),$interesse) or strstr(substr($m4,1,3),$interesse) or strstr(substr($m5,1,3),$interesse)){
					//ganhou na centena
					$opremio = $vpremio2;
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$opremio','$a')");
					$ganhadores = $ganhadores + 1;
					continue;
				}else{
					continue;
				}
			}
			if($tipo == '111'){
				$vpremio = 1000*$valor; //valor do premio na dezena
				$vpremio = $vpremio/5; //combinada
				$interesse = $milhar;
				$opremio = 0;
				$a = SHA1($id_aposta);
				if(strstr($m1,$interesse) or strstr($m2,$interesse) or strstr($m3,$interesse) or strstr($m4,$interesse) or strstr($m5,$interesse)){
					//ganhou na centena
					$opremio = $vpremio;
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$opremio','$a')");
					$ganhadores = $ganhadores+1;
					continue;
				}
				
				$vpremio2 = 100*$valor; //valor do premio na centena
				$vpremio2 = $vpremio2/5; //combinada
				$interesse = substr($milhar,1,3);
				if(strstr(substr($m1,1,3),$interesse) or strstr(substr($m2,1,3),$interesse) or strstr(substr($m3,1,3),$interesse) or strstr(substr($m4,1,3),$interesse) or strstr(substr($m5,1,3),$interesse)){
					//ganhou na centena
					$opremio = $vpremio2;
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$opremio','$a')");
					$ganhadores = $ganhadores+1;
					continue;
				}
				
				$vpremio3 = 10*$valor; //valor do premio na dezena
				$vpremio3 = $vpremio3/5; //combinada
				$interesse = substr($milhar,2,3);
				if(strstr(substr($m1,2,3),$interesse) or strstr(substr($m2,2,3),$interesse) or strstr(substr($m3,2,3),$interesse) or strstr(substr($m4,2,3),$interesse) or strstr(substr($m5,2,3),$interesse)){
					//ganhou na dezena
					$opremio = $vpremio3;
					$r = mysql_query("INSERT INTO premios (id,valor,sha1_id) VALUES ('$id_aposta','$opremio','$a')");
					$ganhadores = $ganhadores + 1;
					continue;
				}else{
					continue;
				}
			}
		}
		
		//finaliza a corrida e diz o num de ganhadores
		$resfinal = mysql_query("UPDATE corridaatual SET id='-1'");
		$resfinal2 = mysql_query("UPDATE corrida SET status='0' WHERE id='$id_last'");
	?>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <body>
    <div class="container">

      <div class="starter-template">
		<?php 
			echo '<center><h5 style="color:green"><br><br>Corrida Finalizada Com Sucesso!!!!<br>Houveram '.$ganhadores.' ganhadores nessa corrida, para mais detalhes cheque a aba corrida.</h5></center>';
			
		?>
      </div>
	  
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
