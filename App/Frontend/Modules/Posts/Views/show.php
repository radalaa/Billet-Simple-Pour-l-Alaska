


		<?php 
		foreach ($listeMenu as $menu)
		{
		?>
		    <li><a href="menu-<?= $menu['id'] ?>.html"><?= $menu['menu'] ?></a></li>     
		<?php
		}
		?>

 		  <li class="active"><a href="chapitres" class="smoothscroll">Les romans</a></li>
          <?php if ($user->isAuthenticated()) { ?>
          <li><a href="/admin/gestion">Admin</a></li>
          <?php } ?>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

 <!----------------------------------------------------------------------------------->
 <section id="works"></section>
  <div class="container">
    <div class="row centered mt mb">
      	<div class="col-lg-8 col-lg-offset-2">




<h2><?= $posts['slug'] ?></h2>

<p><?= nl2br($posts['content']) ?></p>

<?php if ($posts['created'] != $posts['modified']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $posts['modified']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>

<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
?>
<fieldset>
  <legend>
    Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
    <?php if ($user->isAuthenticated()) { ?> -
      <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
     | <a href="comment-signaler-<?= $comment['id'] ?>.html">Signaler</a>
  </legend>
  <p><?= nl2br($comment['contenu']) ?></p>
  <?php
   if ($comment['signaler']== 1) {
    echo '<span style="color:red;"">Commentaire signalé</span>';
  }  ?>
</fieldset>
<?php
}
?>

<p><a class="ajouter" href="commenter-<?= $posts['id'] ?>.html">Ajouter un commentaire</a></p>


</div>
    </div>
  </div>