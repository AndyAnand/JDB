<?php

# >> Defina o título do site
   $titulo="Cadastro";
   
# >> Dados do mySql
   $user="root"; # usuário do mySql
   $pass=""; # senha do mySql
   $bd="jdb"; # nome do banco de dados
   
# >> Conexão
   $con = mysql_connect("localhost", $user, $pass);
   mysql_select_db($bd);
   
   
?>
