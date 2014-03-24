
<!DOCTYPE html>
<html lang="en">
	<?php 
		session_start();
		include('config.php');
		if(isset($_SESSION['login'])){
			include('header_logado.php');
			$login = $_SESSION['login'];
		
			$res = mysql_query("SELECT * FROM admin WHERE email='$login'");
			$res2 = mysql_query("SELECT * FROM corridaatual");
			$res3 = mysql_query("SELECT * FROM corrida order by id DESC");
			$user = mysql_fetch_array($res);
			$id_last = mysql_fetch_array($res2); //id da ultima corrida para dar a possibilidade de finalizar com um link
			$id_last= $id_last['id'];
		}else{
			header('Location:login.php');
			
		}
	?>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <body>
	<div class="container">
		<div>
			<br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>N°</th>
						<th>Milhar1</th>
						<th>Milhar2</th>
						<th>Milhar3</th>
						<th>Milhar4</th>
						<th>Milhar5</th>
						<th>Status</th>
						<th>Valor Arrecadado</th>
						<th>Qnt Prêmios</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($linha = mysql_fetch_array($res3)){
						echo '<tr>';
							echo '<td>'.$linha['id'].'</td>';
							echo '<td>'.$linha['m1'].'</td>';
							echo '<td>'.$linha['m2'].'</td>';
							echo '<td>'.$linha['m3'].'</td>';
							echo '<td>'.$linha['m4'].'</td>';
							echo '<td>'.$linha['m5'].'</td>';
							$id_last = SHA1($id_last);
							if($linha['status'] == 1){
								echo '<td><a href="finalizar.php">Finalizar</a></td>';
							}else{
								echo '<td>Finalizada</td>';
							}
							$idcorrida = $linha['id'];
							$sha1corrida = $linha['sha1_id'];
							$valor_arrecadado = mysql_query("SELECT SUM(valor) as soma FROM aposta WHERE id_corrida='$idcorrida'");
							$valor_arrecadado = mysql_fetch_array($valor_arrecadado);
							echo '<td>R$ '.$valor_arrecadado['soma'].'</td>';
							if($linha['status'] == 0){
								$qnt_premios = mysql_query("SELECT p.*,a.* FROM premios p JOIN aposta a WHERE a.id_corrida='$idcorrida' AND a.id_aposta = p.id");
								$num_premios = mysql_num_rows($qnt_premios);
								echo '<td><a href="premios.php?key='.$sha1corrida.'">'.$num_premios.'</a></td>';
							}else{
								echo '<td>Não Disponível</td>';
							}
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
		</div>
	  
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
