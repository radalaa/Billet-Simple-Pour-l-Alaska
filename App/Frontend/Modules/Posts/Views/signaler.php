<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:29
 */

		?>
          <li><a href="/">Voir le site</a></li>
          <?php if ($user->isAuthenticated()) { ?>
           <li><a href="/admin/gestion">Gestion de blog</a></li>
          <li><a href="/admin/logout">Déconnexion</a></li>
          <?php } ?>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
<div class="amin-section container">

<?php //var_dump($comment); die(); ?>

<h2>Signaler le commenatire</h2>
<form action="" method="post">

  	<label>Posté par  <?= $comment['auteur']; ?> le  <?= $comment['date']; ?></label> <br>
  	<label>Contenu : </label> <?= $comment->contenu(); ?>
    
    
    <input type="submit" value="Signaler" />

</form>

</div>