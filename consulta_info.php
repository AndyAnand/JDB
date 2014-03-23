
<!DOCTYPE html>
<html lang="en">
	<?php 
		include('config.php');
		session_start();
		
		if(isset($_SESSION['login'])){
			include('header_logado.php');
		}else{
			header('Location: index.php');
		}
		$login = $_SESSION['login'];
		
		$res = mysql_query("SELECT * FROM login WHERE email='$login'");
		
		$user = mysql_fetch_array($res);
		
		$res_apostas = mysql_query("SELECT l.id,a.id,a.valor,a.data FROM login l JOIN aposta a ON l.id=a.id ORDER BY a.data DESC LIMIT 0,1");
		
		if(mysql_num_rows($res_apostas) == 0){
			$semapostas = 1;
			$msg = 'Você ainda não apostou, faça já a sua! Clique <a style="color:#008000" href="aposta.php">aqui</a>.';
		}
		
		$res_premios = mysql_query("SELECT l.id,a.id,p.id,a.valor,a.data FROM login l JOIN aposta a JOIN premios p ON (l.id=a.id) AND (a.id_aposta=p.id) ORDER BY a.data DESC");
		if(mysql_num_rows($res_premios) == 0){
			$sempremios = 1;
			$msg2 = 'Você ainda não foi premiado, continue tentando! Faça já uma nova <a style="color:#008000" href="aposta.php">aposta</a>.';
		}
	?>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <body>
    <div class="container">

      <div class="starter-template">
		<div style="background-color:#40E0D0">
			<h3><i><b>Informações</b></i></h1>
		</div>
        <table align="center">
			<tr>
				<td align="left" width="250"><b><h4>Nome:&nbsp;&nbsp; </h4></b></td>
				<?php echo'<td align="left" width="250"><h5 style="color:#00BFFF"><i>'.$user['nome'].'</i></h5></td>';?>
			</tr>
			<tr>
				<td align="left" width="250"><b><h4>Última Aposta:&nbsp;&nbsp; </h4></b></td>
				<?php 
					if(isset($semapostas)){
						echo'<td align="left" width="250"><h5 style="color:#00BFFF"><i>'.$msg.'</i></h5></td>';
					}else{
						$aposta = mysql_fetch_array($res_apostas);
						echo'<td align="left" width="250"><h5 style="color:#00BFFF"><i>'.$aposta['data'].'</i></h5></td>';
					}
				?>
			</tr>
			<tr>
				<td align="left" width="250"><b><h4>Último Prêmio:&nbsp;&nbsp; </h4></b></td>
				<?php
					if(isset($sempremios)){
						echo'<td align="left" width="250"><h5 style="color:#00BFFF"><i>'.$msg2.'</i></h5></td>';
					}else{
						$premio = mysql_fetch_array($res_premios);
						echo'<td align="left" width="250"><h5 style="color:#00BFFF"><i> R$ '.$premio['valor'].'</i></h5></td>';
					}
				?>
			</tr>
			<tr>
				<td align="left" width="250"><b><h4>Saldo:&nbsp;&nbsp; </h4></b></td>
				<?php echo'<td align="left" width="250"><h5 style="color:#00BFFF"><i>R$&nbsp'.$user['saldo'].'    (Compre crédito <a style="color:#008000" href="comprar.php">aqui</a>)</i></h5></td>';?>
			</tr>
			
			
        </table>
		
      </div>
	  <!--<form class="form-signin" role="form" method="post" action="comprar.php" align="center">
			<button class="btn btn-lg btn-primary btn-block" >Comprar Crédito</button>
	  </form> -->
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
