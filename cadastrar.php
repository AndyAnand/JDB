<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>
	<!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  <body>
    
    <div class="container">

      <form class="form-signin" role="form">
        <h3 class="form-signin-heading"><center>Preencha todos os campos marcados corretamente:</center></h2>
        <input type="nome" class="form-control" placeholder="Seu Nome Completo *" required autofocus>
        <input type="cpf" class="form-control" placeholder="CPF *" required>
		<td class="tdform">
			<select class="form-control" type="estado">
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
        <input type="cidade" class="form-control" placeholder="Cidade *" required>
        <input type="email" class="form-control" placeholder="Seu Endereço de Email *" required>
        <input type="password" class="form-control" placeholder="Sua Senha *" required>
        
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Fazer Cadastro</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
