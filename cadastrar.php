<!DOCTYPE html>
<html lang="en">
    <?php 
    
      include('header.php'); 
      include('config.php');
      
      session_start();
      
      if(isset($_SESSION['login'])){
		header('Location: index.php');
	  }
	  
	  if(isset($_POST['nome'])){
		  $UFWRONG=false;
		  if($_POST['estado'] == '0'){
			$UFWRONG = true;
		  }
		  $nome = $_POST['nome'];
		  $cpf = $_POST['cpf'];
		  $estado = $_POST['estado'];
		  echo '<br>'.$estado.'<br>';
		  $cidade = $_POST['cidade'];
		  $email = $_POST['email'];
		  $password = SHA1($_POST['password']);
		  
		  $res_cpf = mysql_query("SELECT cpf FROM login WHERE cpf='$cpf'");
		  $res_email = mysql_query("SELECT email FROM login WHERE email='$email'");
		  $CPFWRONG = mysql_num_rows($res_cpf);
		  $EMAILWRONG = mysql_num_rows($res_email);
		  
		  if(!$UFWRONG && !$EMAILWRONG && !$CPFWRONG){
			$res = mysql_query("INSERT INTO login (nome,cpf,estado,cidade,email,senha) values ('$nome','$cpf','$estado','$cidade','$email','$password')");
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
		<?php if(isset($UFWRONG)){ if($UFWRONG == true) {echo'<center><h5 style="color:red">Selecione um estado!!</h5></center>';}} ?>
		<td class="tdform">
			<select class="form-control" type="estado" name="estado">
				  <option value="0">Selecione seu Estado *</option>
				  <option value="AC">AC</option>
				  <option value="AL">AL</option>
				  <option value="AP">AP</option>
				  <option value="AM">AM</option>
				  <option value="BA">BA</option>
				  <option value="CE">CE</option>
				  <option value="DF">DF</option>
				  <option value="ES">ES</option>
				  <option value="GO">GO</option>
				  <option value="MA">MA</option>
				  <option value="MT">MT</option>
				  <option value="MS">MS</option>
				  <option value="MG">MG</option>
				  <option value="PA">PA</option>
				  <option value="PB">PB</option>
				  <option value="PR">PR</option>
				  <option value="PE">PE</option>
				  <option value="PI">PI</option>
				  <option value="RJ">RJ</option>
				  <option value="RN">RN</option>
				  <option value="RS">RS</option>
				  <option value="RO">RO</option>
				  <option value="RR">RR</option>
				  <option value="SC">SC</option>
				  <option value="SP">SP</option>
				  <option value="SE">SE</option>
				  <option value="TO">TO</option>
			</select></td>
		</tr>
        <input name="cidade" type="cidade" class="form-control" placeholder="Cidade *" required>
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
