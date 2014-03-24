
<!DOCTYPE html>
<html lang="en">
	<?php 
		session_start();
		include('config.php');
		if(isset($_SESSION['login'])){
			include('header_logado.php');
			$login = $_SESSION['login'];
		
			$res = mysql_query("SELECT * FROM login WHERE email='$login'");
		
			$user = mysql_fetch_array($res);
		}else{
			include('header.php');
		}
	?>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <body>
    <div class="container">

      <div class="starter-template">
		<?php if(isset($_SESSION['login'])){
				echo '<h1>Seja Bem Vindo ao Jogo do Bicho, '.$user['nome'].'!</h1>';
				echo '<p class="lead">Faça já sua aposta! Clique <a href="aposta.php">aqui</a>!</p>';
			  }else{
				echo '<h1>Seja Bem Vindo ao Jogo do Bicho!</h1>';
				echo '<p class="lead">Faça já sua aposta! Basta fazer login e boa sorte!.</p>';
			  }
		?>
      </div>
	  <div align="center">
		<img src="images/jb.jpg" alt="jogodobicho.jpg" width="600" height="300">
	  </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
