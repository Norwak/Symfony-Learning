<?php
require __DIR__ . '/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// read request
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

// prepare response
if (in_array($uri, ['', '/'], true)) {
  $response = new Response('This is home page!');
} elseif ($uri === '/contact') {
  $response = new Response('This is a contact page!');
} elseif ($uri === '/blog') {
  $response = new Response('This is a blog page!');
} else {
  $response = new Response('Not Found', Response::HTTP_NOT_FOUND);
}

// send response
$response->send();
