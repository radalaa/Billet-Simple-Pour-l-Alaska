<?php
foreach ($listePosts as $posts)
{
?>
  <h2><a href="posts-<?= $posts['id'] ?>.html"><?= $posts['titre'] ?></a></h2>
  <p><?= nl2br($posts['contenu']) ?></p>
<?php
}