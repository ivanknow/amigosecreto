<?php
$loader = require __DIR__ . '/vendor/autoload.php';

use Professore\Entity\User;
use Professore\Resource\UserResource;

$app = new \Slim\Slim ();
$app->get ( '/hello/:name', function ($name) {
	echo "Hello, $name";
} );

$app->get ( '/', function () {
	echo "Hello";
} );
$user = new User ();

/*
 * Recursos
 */
$userResource = new UserResource ();
$professorResource = new ProfessorResource ();
$alunoResource = new AlunoResource ();
$aulaResource = new AulaResource ();
/*
 * ROUTES
 */
$app->get ( '/users(/(:id)(/))', function ($id = null) use($userResource) {
	echo $userResource->get ( $id );
} );

$app->post ( '/users', function () use($userResource) {
	echo $userResource->post ();
} );

$app->get ( '/professor(/(:id)(/))', function ($id = null) use($userResource) {
	echo $userResource->get ( $id );
} );

$app->post ( '/profesor', function () use($userResource) {
	echo $userResource->post ();
} );
$app->delete('/professor/:id(/))', function ($id ) use($professorResource) {
	echo $userResource->get ( $id );
} );

$app->put('/professor/:id(/))', function ($id ) use($professorResource) {
	echo $userResource->get ( $id );
} );

$app->run ();


