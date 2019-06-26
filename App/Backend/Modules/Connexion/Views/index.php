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
          <li><a href="/admin/index">Admin</a></li>
          <li><a href="/admin/posts-insert.html">Ajouter</a></li>
          <li><a href="/admin/logout">Déconnexion</a></li>
          <?php } ?>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
<div class="amin-section container">



<h2>Connexion</h2>

<form action="" method="post">
  <label>Pseudo</label>
  <input type="text" name="login" /><br />
  
  <label>Mot de passe</label>
  <input type="password" name="password" /><br /><br />
  
  <input type="submit" value="Connexion" />
</form>

</div>