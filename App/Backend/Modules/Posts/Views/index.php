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
      <p style="text-align: center">Il y a actuellement <?= $nombrePosts ?> Chapitres. En voici la liste : </p>

      <table>
      <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
      <?php
      foreach ($listePosts as $posts)
      {
      echo '<tr><td>', $posts['name'], '</td><td>', $posts['type'], '</td><td>le ', $posts['modified']->format('d/m/Y à H\hi'), '</td><td>', ($posts['created'] == $posts['modified'] ? '-' : 'le '.$posts['created']->format('d/m/Y à H\hi')), '</td><td><a href="posts-update-', $posts['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="posts-delete-', $posts['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
      }
      ?>
      </table>
</div>
