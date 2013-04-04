
<?php 
//print_r( get_loaded_extensions() );

echo extension_loaded('pgsql') ? 'yes':'no'," <br/> ";
/*
$user = 'tebasdev';
$passwd = '2013%2013';
$db = 'tebasdev_visitas';
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
echo "Conexion exitosa <hr>"; 
*/
?>
