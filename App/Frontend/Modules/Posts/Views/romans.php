<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:29
 */

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

  <div id="workwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h1 class="color-acceuil">BILLET SIMPLE POUR L'ALASKA</h1>
          <h2>LISTE DES CHAPITRES</h2>
        </div>
      </div>
    </div>
    <!-- /container -->
  </div>

 <section id="works"></section>
  <div class="container">
      <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2">

  <?php
  foreach ($listePosts as $posts)
  {
      ?>
      <h3><a href="posts-<?= $posts['id'] ?>.html"><?= $posts['menu'] ?></a></h3>
      <p><?= $posts['content'] ?></p>
      <a href="posts-<?= $posts['id'] ?>.html">Lire la suite...</a>
      <?php
  }
  ?>

 </div>
  </div>
  </div>