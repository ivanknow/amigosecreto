<?php
$loader = require __DIR__ . '/vendor/autoload.php';

use AmigoSecreto\Conn;


$app = new \Slim\Slim ();
$app->get ( '/hello/:name', function ($name) {
	echo "Hello, $name";
} );

$app->get ( '/', function () {
	$app = \Slim\Slim::getInstance ();
	$app->redirect("index.html");
} );

/*
 * ROUTES
 */
$app->post ( '/cadastrar(/)', function () {
	$app = \Slim\Slim::getInstance ();
	$request = $app->request();
	$body = $request->getBody();
	$json = json_decode($body);
	$codigo = "";
	for($i=0;$i<4;$i++){
		$a= rand(0,35);

	if($a>9){
		$a = chr($a-10+65);
	}
	$codigo.=$a;
	}
	$sql = "insert into pessoa (nome,codigo) values ('".$json->nome."','$codigo');";
	$conn = new Conn();
	$conn->Conecta();
	$result = $conn->Executa($sql);
	$result2 = $conn->grav("select * from pessoa;");
	$conn->Desconecta();
	echo json_encode(array("codigo"=>$codigo,"pessoas"=>$result2));
} );
$app->get ( '/buscar(/)', function () {
	$conn = new Conn();
	$conn->Conecta();
	$result = $conn->grav("select * from pessoa;");
	$conn->Desconecta();
	echo json_encode($result);
} );
$app->post ( '/sortear(/)', function () {
	echo "{\"todo\":\"yes\"}";
} );
$app->post ( '/sorteado(/)', function () {
	echo "{\"todo\":\"yes\"}";
} );

$app->run ();




