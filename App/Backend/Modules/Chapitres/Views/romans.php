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
      <H1>Gestion des Chapitres</H1><a href="/admin/chapitre-insert.html" title="Ajouter une page">Ajouter un chapitre</a> 


      <table class="table table-dark">
      <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Nom du chapitre</th>
      <th scope="col">Titre</th>
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
http://localhost/admin/chapitres-delete-1.html        ?>
        <tr>
         <td scope="row"><?= $i; ?></td>
         <td scope="row"><a href="/posts-<?= $pages['id']; ?>.html" title=""><?= $pages['name']; ?></a></td>
         <td scope="row"><a href="/posts-<?= $pages['id']; ?>.html" title=""><?= $pages['firsttitle']; ?></a></td>
         <td scope="row"><a href="chapitres-update-<?= $pages['id']; ?>.html" class="modifier-<?= $pages['type']; ?>">Modifier</a></td>
         <td scope="row"><a href="/admin/chapitres-delete-<?= $pages['id']; ?>.html" title="">Supprimer</a></td>
       </tr>
    <?php

    }
    ?>
       </tbody>
      </table>
</div>
