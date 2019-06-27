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
  foreach ($listeChapitres as $chapitre)
  {
      ?>
      <h3><a href="posts-<?= $chapitre['id'] ?>.html"><?= strtoupper($chapitre['name']) ?> : <?= strtoupper($chapitre['firsttitle']) ?> </a></h3>
      <p><?= $chapitre['content'] ?></p>
      <a href="chapitre-<?= $chapitre['id'] ?>.html">Lire la suite...</a>
      <?php
  }
  ?>

 </div>
  </div>
  </div>