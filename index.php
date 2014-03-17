
<!DOCTYPE html>
<html lang="en">
	<?php 
		session_start();
		
		if(isset($_SESSION['login'])){
			include('header_logado.php');
		}else{
			include('header.php');
		}
	?>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <body>
    <div class="container">

      <div class="starter-template">
        <h1>Seja Bem Vindo ao Jogo do Bicho!</h1>
        <p class="lead">Faça já sua aposta! Basta fazer login e boa sorte!.</p>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
