<?php
use Symfony\Component\HttpFoundation\Response;

function list_action() {
  $posts = get_all_posts();
  $html = render_template('templates/list.html.php', [
    'posts' => $posts,
  ]);

  return new Response($html);
}

function show_action($id) {
  $post = get_post_by_id($_GET['id']);
  $html = render_template('templates/show.html.php', [
    'post' => $post
  ]);

  return new Response($html);
}

function render_template($path, array $args) {
  extract($args);
  ob_start();
  require __DIR__ . '/' . $path;
  return ob_get_clean();
}