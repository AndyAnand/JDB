
<!DOCTYPE html>
<html lang="en">
	
	<?php 
		session_start();
		include("config.php");
		
		if(isset($_SESSION['login'])){
			include('header_logado.php');
		}else{
			include('header.php');
		}
		
		$login = $_SESSION['login'];
		
		$res = mysql_query("SELECT * FROM login WHERE email='$login'");
		
		$user = mysql_fetch_array($res);
		$tipo = '';
		if(isset($_POST['milhar'])){
			$tipo = $tipo.'1';
			$preco = 1.0;
		}else{
			$tipo = $tipo.'0';
			$preco = 0.0;
		}
		if(isset($_POST['centena'])){
			$tipo = $tipo.'1';
			$preco = $preco + 0.5;
		}else{
			$tipo = $tipo.'0';
		}
		if(isset($_POST['dezena'])){
			$tipo = $tipo.'1';
			$preco = $preco + 0.25;
		}else{
			$tipo = $tipo.'0';
		}
		$saldo = floatval($user['saldo']);
		if($tipo != '000'){
			if($saldo < $preco){
				echo '<br><br><center><b><h3 style="color:red">Saldo insuficiente! Comprar <a href="comprar.php">aqui</a></h3></b></center>';
				return;
			}else{
				$id = $user['id'];
				$numero ='';
				if(isset($_POST['m'])){
					$numero = $numero.$_POST['m'];
				}
				if(isset($_POST['c'])){
					$numero = $numero.$_POST['c'];
				}
				$numero = $numero.$_POST['d'];
				$numero = $numero.$_POST['u'];
				$res = mysql_query("INSERT INTO aposta (valor,id,tipo,numero) values ('$preco','$id','$tipo','$numero')");
				$novosaldo = $saldo - $preco;
				$res2 = mysql_query("UPDATE login SET saldo = '$novosaldo' WHERE id='$id'");
				echo '<center><h4 style="color:green"> Aposta submetida com sucesso, seu novo saldo é: R$ '.$novosaldo.'. </h4></center>';
				header('refresh:3;url=index.php');
			}
			
		}
		
		
	?>
	
	<script>
		function clique(){
			var checkedValue = null; 
			var c1 = document.getElementById("c1");
			var c2 = document.getElementById("c2");
			var c3 = document.getElementById("c3");
			var val = document.getElementById("val");
			var valor = 0.0;
			if(c1.checked == 1){
				valor += 1.00;
			}
			if(c2.checked == 1){
				valor += 0.50;
			}
			if(c3.checked == 1){
				valor += 0.25;
			}
			val.innerHTML="&nbsp;&nbsp;Preço R$: "+valor;
		}
	</script>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <body>
	
    <div class="container">
		<br>
		<div style="background-color:#40E0D0">
			<center><h3><i><b>Fazer Aposta</b></i></h1></center>
		</div>
		<?php echo '<b><h5 align="right">Seu Saldo: R$ '.$user['saldo'].'&nbsp;&nbsp;(<a href="comprar.php">Comprar</a>)</h5></b>'; ?>
		<form role="form" method="post" submit="aposta.php">
			<table align="center">
				<tr>
					<td>
						<center><b><h4>Tipo:&nbsp;</h4></b></center>
					</td>
					<td>
						<div class="checkbox">
							<label>
								<input name="milhar" type="checkbox" onclick="clique()" id="c1">Milhar&nbsp;
							</label>
						</div>                     
					</td>                          
					<td>
						<div class="checkbox">     
							<label>
								<input name="centena" type="checkbox" onclick="clique()" id="c2">Centena&nbsp;
							</label>
						</div>                     
					</td>                          
					<td>                           
						<div class="checkbox">     
							<label>
								<input name="dezena" type="checkbox" onclick="clique()" id="c3">Dezena&nbsp;
							</label>
						</div>
					</td>
				</tr>
			</table>
			<table align="center">
				<tr>
					<center><td><b><h4>Aposta:&nbsp;</h4></b></td><td><input name="m" type="number" min="0" max="9" step="1" value="0" /><input name="c" type="number" min="0" max="9" step="1" value="0"/><input name="d" type="number" min="0" max="9" step="1" value="0"/><input name="u" type="number" min="0" max="9" step="1" value="0"/></td><td align="center"><b><h4 id="val">&nbsp;&nbsp;Preço R$:&nbsp;1.00</h4></b></td></center>
				</tr>
			</table>
			
			<br>
			<table align="center">
				<tr width = "40">
					<td align="center">
						<button class="btn btn-lg btn-primary btn-block" type="submit">Submeter Aposta</button>
					</td>
				</tr>
			</table>
		</form>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>

