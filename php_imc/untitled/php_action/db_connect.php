<?php
// conexão com banco de dados
$servername = 'localhost';
$username = 'dionisiohenriq';
$password = 'Rique89564712';
$db_name = 'pessoa';

$connect = mysqli_connect($servername, $username, $password, $db_name);

mysqli_set_charset($connect, 'utf-8');

if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;


?>