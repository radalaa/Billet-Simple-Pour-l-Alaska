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
      <H1>Gestion des pages</H1><a href="/admin/page-insert.html" title="Ajouter une page">Ajouter une page</a> 


      <table class="table table-dark">
      <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Nom de la Pages</th>
      <th scope="col"></th>
      <th scope="col"></th>
      </tr>
      </thead>

       <tbody>
       	<?php
        //var_dump($listepages);
        $i =0;
       	 foreach ($listepages as $pages)

      {
        $i++;
      	?>
        <tr>
         <td scope="row"><?= $i; ?></td>
         <td scope="row"><a href="/admin/pages" title=""><?= $pages['menu']; ?></a></td>
         <td scope="row"><a href="posts-update-<?= $pages['id']; ?>.html" title="">Modifier</a></td>
         <td scope="row"><a href="/admin/posts-delete-<?= $pages['id']; ?>.html" title="">Supprimer</a></td>
       </tr>
    <?php

    }
    ?>
       </tbody>
      </table>
</div>
