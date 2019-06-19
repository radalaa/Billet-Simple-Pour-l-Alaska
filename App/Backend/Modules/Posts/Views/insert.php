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
	<?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
<h3>Cliquez <span style="color: red;" id="postInsert">Ici</span> pour ajouter un chapitre </h3><br>
<h3>Cliquez <span style="color: red;" id="pageInsert">Ici</span> pour ajouter une page</h3>
<h2 id="titre-insert">Ajouter une page ou un chapitre</h2>

<form action="" method="post">
  <p>
    <?= $form ?>
    
    <input type="submit" value="Ajouter" />
  </p>
</form>

</div>