<!DOCTYPE html>
<html lang="en">
    <?php 
    
      include('header_logado.php'); 
      include('config.php');
      
      session_start();
        
	  if(isset($_POST['nome'])){
		  $nome = $_POST['nome'];
		  $email = $_POST['email'];
		  $password = SHA1($_POST['password']);
		  $cpf = $_POST['cpf'];
		  $res_cpf = mysql_query("SELECT cpf FROM admin WHERE cpf='$cpf'");
		  $res_email = mysql_query("SELECT email FROM admin WHERE email='$email'");
		  $CPFWRONG = mysql_num_rows($res_cpf);
		  $EMAILWRONG = mysql_num_rows($res_email);
		  
		  if(!$EMAILWRONG && !$CPFWRONG){
			
			$res = mysql_query("INSERT INTO admin (nome,cpf,email,senha) values ('$nome','$cpf','$email','$password')");
			echo '<center><h5 style="color:green"><br><br>Cadastrado com Sucesso!!!!</h5></center>';
			header('refresh: 10; url=index.php');
		  }
	  }   
    ?>
	<!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  <body>
    
    <div class="container">

      <form class="form-signin" role="form" method="post" submit="cadastrar.php">
        <h3 class="form-signin-heading"><center>Preencha todos os campos marcados corretamente:</center></h2>
        <input name="nome" type="nome" class="form-control" placeholder="Seu Nome Completo *" required autofocus>
        <?php if(isset($CPFWRONG)){ if($CPFWRONG == 1) {echo'<center><h5 style="color:red">Cpf Inválido ou já utilizado!!</h5></center>';}} ?>
        <input name="cpf" type="cpf" class="form-control" placeholder="CPF *" required>
		<?php if(isset($EMAILWRONG)){ if($EMAILWRONG == 1){echo'<center><h5 style="color:red">Email existente em nossa base de dados,!!</h5></center>';}} ?>
        <input name="email" type="email" class="form-control" placeholder="Seu Endereço de Email *" required>
        <input name="password" type="password" class="form-control" placeholder="Sua Senha *" required>
        
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Fazer Cadastro</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
