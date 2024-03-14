<?php $title = 'List of posts'; ?>

<?php ob_start() ?>
<h1>List of posts</h1>
<ul>
  <?php foreach($posts as $post) { ?>
    <li>
      <a href="/2-why-do-i-need-framework-at-all/show?id=<?=$post['id']?>">
        <?=$post['title']?>
      </a>
    </li>
  <?php } ?>
</ul>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/layout.html.php';