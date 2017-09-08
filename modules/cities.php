<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api/v1/cities', function() use($conn){

    $this->map(['OPTIONS'], '/[{id}]',function(){
      echo '';
    });

    //todos ou vários registros
  	$this->get('/', function(Request $request, Response $response) use($conn) {
  		$qb = $conn->createQueryBuilder();
  		$result = $qb->select('*')
  			->from('cities')
  			->execute()
  			->fetchAll();
      $arr = array_map('utf8_encode', $arr);
      $json = json_encode($arr);
      $response = $response->withHeader('Content-Type', 'application/json', 'charset=utf-8');
  		$response->getBody()->write(json_encode($result));
  		return $response;
  	});

    //apenas um registro
	$this->get('/{id}', function(Request $request, Response $response, $args) use($conn) {
    $qb = $conn->createQueryBuilder();
    $result = $qb->select('*')
      ->from('cities')
      ->where('id', $args['id'])
      ->execute()
      ->fetchAll();
    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode($result));
    return $response;
	});
});
