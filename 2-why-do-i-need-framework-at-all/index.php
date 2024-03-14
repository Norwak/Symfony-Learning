<?php // index.php
require __DIR__ . '/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// route the request internally
$uri = $request->getPathInfo();
if ($uri === '/') {
  $response = list_action();
} elseif ($uri === '/show' && $request->query->has('id')) {
  $response = show_action($request->query->get('id'));
} else {
  $html = '<h1>Page not Found</h1>';
  $response = new Response($html, 404);
}

$response->send();