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
      <H1>Gérer les commentaires <span class="signaler">signalés</span></H1>


      <table class="table table-dark">
      <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Auteur</th>
      <th scope="col">Contenu</th>
      <th scope="col">date</th>
      <th scope="col"></th>
      <th scope="col"></th>
      </tr>
      </thead>

       <tbody>
       	<?php
        //var_dump($listepages);
        $i =0;
        //var_dump($listecomments);
        //die();
       	 foreach ($listeCommentsignaler as $comments)

      {
        $i++;
      	?>
        <tr>
         <td scope="row"><?= $i; ?></td>
         <td scope="row"><a href="/admin/pages" title=""><?= $comments['auteur']; ?></a></td>
         <td scope="row"><a href="/admin/pages" title=""><?= $comments['contenu']; ?></a></td>
         <td scope="row"><a href="/admin/pages" title=""><?= $comments['date']->format('Y-m-d H:i:s'); ?></a></td>
         <td scope="row"><a href="/admin/comment-update-<?= $comments['id']; ?>.html" title="">Modifier</a></td>
         <td scope="row"><a href="/admin/comment-delete-<?= $comments['id']; ?>.html" title="">Supprimer</a></td>
       </tr>
    <?php

    }
    ?>
       </tbody>
      </table>

      <H1>Gérer les commentaires <span class="signaler">non signalés</span></H1>


      <table class="table table-dark">
      <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Auteur</th>
      <th scope="col">Contenu</th>
      <th scope="col">date</th>
      <th scope="col"></th>
      <th scope="col"></th>
      </tr>
      </thead>

       <tbody>
        <?php
        //var_dump($listepages);
        $i =0;
        //var_dump($listecomments);
        //die();
         foreach ($listeCommentNONsignaler as $comments)

      {
        $i++;
        ?>
        <tr>
         <td scope="row"><?= $i; ?></td>
         <td scope="row"><a href="/admin/pages" title=""><?= $comments['auteur']; ?></a></td>
         <td scope="row"><a href="/admin/pages" title=""><?= $comments['contenu']; ?></a></td>
         <td scope="row"><a href="/admin/pages" title=""><?= $comments['date']->format('Y-m-d H:i:s'); ?></a></td>
         <td scope="row"><a href="/admin/comment-update-<?= $comments['id']; ?>.html" title="">Modifier</a></td>
         <td scope="row"><a href="/admin/comment-delete-<?= $comments['id']; ?>.html" title="">Supprimer</a></td>
       </tr>
    <?php

    }
    ?>
       </tbody>
      </table>
</div>

