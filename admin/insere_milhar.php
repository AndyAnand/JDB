
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
		$res2 = mysql_query("SELECT * FROM corridaatual");
		
		$id = mysql_fetch_array($res2);
		$last_id = $id['id'];
		
		$user = mysql_fetch_array($res);
		
		if($last_id != -1){
			echo '<center><h5 style="color:red"><br><br><br><br>Há uma corrida não finalizada, finalize-a antes de inserir uma nova!</h5></center>';
			return;
		}
		
		if(isset($_POST['m1'])){
			$m1 = '';
			$m2 = '';
			$m3 = '';
			$m4 = '';
			$m5 = '';
			
			$m1 = $m1.$_POST['m1'];
			$m1 = $m1.$_POST['c1'];
			$m1 = $m1.$_POST['d1'];
			$m1 = $m1.$_POST['u1'];

			$m2 = $m2.$_POST['m2'];
			$m2 = $m2.$_POST['c2'];
			$m2 = $m2.$_POST['d2'];
			$m2 = $m2.$_POST['u2'];
			
			$m3 = $m3.$_POST['m3'];
			$m3 = $m3.$_POST['c3'];
			$m3 = $m3.$_POST['d3'];
			$m3 = $m3.$_POST['u3'];
			
			$m4 = $m4.$_POST['m4'];
			$m4 = $m4.$_POST['c4'];
			$m4 = $m4.$_POST['d4'];
			$m4 = $m4.$_POST['u4'];
			
			$m5 = $m5.$_POST['m5'];
			$m5 = $m5.$_POST['c5'];
			$m5 = $m5.$_POST['d5'];
			$m5 = $m5.$_POST['u5'];

			$res = mysql_query("INSERT INTO corrida (m1,m2,m3,m4,m5,status) VALUES ('$m1','$m2','$m3','$m4','$m5','1')");
			$last_id = mysql_insert_id();
			$res2 = mysql_query("UPDATE corridaatual SET id='$last_id'");
			$res3 = mysql_query("UPDATE corrida SET sha1_id='SHA1($last_id)' WHERE id='$last_id'");
			
			echo '<center><h5 style="color:green"><br><br>Milhares Inseridas com Sucesso!!!!</h5></center>';
			header('refresh: 3; url=index.php');
			
		}
	?>
	
	<!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <body>
	
    <div class="container">
		<br>
		<div style="background-color:#40E0D0">
			<center><h3><i><b>Inserir Milhares</b></i></h1></center>
		</div>
		<form role="form" method="post" submit="insere_milhar.php">
			<table align="center">
				<tr>
					<center><td><b><h4>1ª:&nbsp;</h4></b></td><td><input name="m1" type="number" min="0" max="9" step="1" value="0" /><input name="c1" type="number" min="0" max="9" step="1" value="0"/><input name="d1" type="number" min="0" max="9" step="1" value="0"/><input name="u1" type="number" min="0" max="9" step="1" value="0"/></td></center>
				</tr>
				<tr>
					<center><td><b><h4>2ª:&nbsp;</h4></b></td><td><input name="m2" type="number" min="0" max="9" step="1" value="0" /><input name="c2" type="number" min="0" max="9" step="1" value="0"/><input name="d2" type="number" min="0" max="9" step="1" value="0"/><input name="u2" type="number" min="0" max="9" step="1" value="0"/></td></center>
				</tr>
				<tr>
					<center><td><b><h4>3ª:&nbsp;</h4></b></td><td><input name="m3" type="number" min="0" max="9" step="1" value="0" /><input name="c3" type="number" min="0" max="9" step="1" value="0"/><input name="d3" type="number" min="0" max="9" step="1" value="0"/><input name="u3" type="number" min="0" max="9" step="1" value="0"/></td></center>
				</tr>
				<tr>
					<center><td><b><h4>4ª:&nbsp;</h4></b></td><td><input name="m4" type="number" min="0" max="9" step="1" value="0" /><input name="c4" type="number" min="0" max="9" step="1" value="0"/><input name="d4" type="number" min="0" max="9" step="1" value="0"/><input name="u4" type="number" min="0" max="9" step="1" value="0"/></td></center>
				</tr>
				<tr>
					<center><td><b><h4>5ª:&nbsp;</h4></b></td><td><input name="m5" type="number" min="0" max="9" step="1" value="0" /><input name="c5" type="number" min="0" max="9" step="1" value="0"/><input name="d5" type="number" min="0" max="9" step="1" value="0"/><input name="u5" type="number" min="0" max="9" step="1" value="0"/></td></center>
				</tr>
			</table>
			
			<br>
			<table align="center">
				<tr width = "40">
					<td align="center">
						<button class="btn btn-lg btn-primary btn-block" type="submit">Inserir Corrida</button>
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

