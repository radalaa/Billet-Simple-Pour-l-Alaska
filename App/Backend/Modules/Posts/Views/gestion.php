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
      <H1>Gestion du Blog</H1>

      <table class="table table-dark">
      <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Pages</th>
      <th scope="col">Chapitres</th>
      <th scope="col">Commentaires</th>
      </tr>
      </thead>

       <tbody>
        <tr>
        <td scope="row"></td>
         <td scope="row"><a href="/admin/pages" title="">Afficher</a></td>
         <td scope="row"><a href="/admin/romans" title="">Afficher</a></td>
         <td scope="row"><a href="/admin/commentaires" title="">Afficher</a></td>
       </tbody>
     </tr>
      </table>
</div>
