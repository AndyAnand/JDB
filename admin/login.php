
<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); 
		session_start();
    ?>
	<!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  <body>
    
    <div class="container">
	
    <?php
		include('config.php');

		if(isset($_POST['login'])){
			if(isset($_SESSION['login'])){
				session_unset($_SESSION['login']);
			}
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			$res = mysql_query("SELECT * FROM admin WHERE email='$login'");
			if(mysql_num_rows($res) == 0){
				echo '
					<form class="form-signin" role="form" method="post" action="login.php">
						<h3 class="form-signin-heading"><center>Por favor, faça seu login:</center></h2>
						<input name="login" type="email" class="form-control" placeholder="Seu Endereço de Email" required autofocus>
						<input name="senha" type="password" class="form-control" placeholder="Sua Senha" required>
						<h5 style="color:red"><center>Usuário ou senha incorretos!</center></h5>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Fazer Login</button>
					</form>
				';
			}else{
				$ar = mysql_fetch_array($res);
				if($ar['senha'] == SHA1($senha)){
					$_SESSION['login'] = $login;
					header('Location: index.php');
				}else{
					echo '
					<form class="form-signin" role="form" method="post" action="login.php">
						<h3 class="form-signin-heading"><center>Por favor, faça seu login:</center></h2>
						<input name="login" type="email" class="form-control" placeholder="Seu Endereço de Email" required autofocus>
						<input name="senha" type="password" class="form-control" placeholder="Sua Senha" required>
						<h5 style="color:red"><center>Usuário ou senha incorretos!</center></h5>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Fazer Login</button>
					</form>
				';
				}
			}
		}else{
			echo '      <form class="form-signin" role="form" method="post" action="login.php">
							<h3 class="form-signin-heading"><center>Por favor, faça seu login:</center></h2>
							<input name="login" type="email" class="form-control" placeholder="Seu Endereço de Email" required autofocus>
							<input name="senha" type="password" class="form-control" placeholder="Sua Senha" required>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Fazer Login</button>
						</form>';
		}
	?>
	<br>
	</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
