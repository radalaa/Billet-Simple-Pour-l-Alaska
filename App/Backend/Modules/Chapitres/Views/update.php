
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

<h2>Modifier</h2>
<form action="" method="post" enctype="multipart/form-data">
  <p>
    <?= $form ?>
    
    <input type="submit" value="Modifier" name="submit" />
  </p>
</form>

</div>