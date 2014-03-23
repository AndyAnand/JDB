
<!DOCTYPE html>
<html lang="en">
	<?php 
		session_start();
		include('config.php');
		if(isset($_SESSION['login'])){
			include('header_logado.php');
		}else{
			include('header.php');
		}
		$login = $_SESSION['login'];
		if(isset($_POST['recarga'])){
			$res = mysql_query("SELECT * FROM login WHERE email='$login'");
			$user = mysql_fetch_array($res);
			
			$saldo = $user['saldo'];
			$saldo = $saldo + floatval($_POST['recarga']);
			$res2 = mysql_query("UPDATE login SET saldo='$saldo' WHERE email='$login'");
			
		}
	?>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  <body>
	<br><br>
	<?php if(isset($_POST['recarga'])){
		if($res2){
			echo '<center><h4 style="color:green"> Crédito comprado com sucesso, seu novo saldo é: R$ '.$saldo.'. </h4></center>';
			header('refresh:5;url=index.php');
		}
	} ?>
    <div class="container" align="center">
		
      <div style="background-color:#40E0D0">
        <h3><i><b>Comprar Crédito</b></i></h3>
      </div>
	<br>
	<div style='width:320px'>
		<form class="form-signin" role="form" method="post" action="comprar.php">
			<input name="recarga" class="form-control"pattern="\d+(\.\d*)?" placeholder="Digite o valor a ser recarregado. Ex.: 2.50" required autofocus>
			<br>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Efetuar Compra</button>
			<br> <h5>Obs.: Formas de pagamento como cartão de crédito, débito, podem ser implementadas</h5>
		</form>
	</div>
    </div><!-- /.container -->
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
