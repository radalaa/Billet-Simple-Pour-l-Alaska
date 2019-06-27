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

<style type="text/css">
#workwrap{
  background: url(img/uploads/<?= $listePosts['image'] ?>) no-repeat center top;
  margin-top: -70px;
  padding-top: 250px;
  text-align:center;
  background-attachment: fixed;
  position: relative;
  background-position: center center;
  min-height: 650px;
  width: 100%;

    margin-top: -70px;
  padding-top: 250px;
  text-align:center;
  background-attachment: fixed;
  position: relative;
  background-position: center center;
  min-height: 650px;
  width: 100%;

  
  background-size: 100%;
  background-size: cover;
} 
</style>
  <div id="workwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h1 class="color-acceuil"><?= $listePosts['firsttitle'] ?></h1>
          <h2><?= $listePosts['secondtitle'] ?></h2>
          <p><?= $listePosts['thirdtitle'] ?></p>
        </div>
      </div>
    </div>
    <!-- /container -->
  </div>
<!----------------------- section ------------------------------------------------------------>

 <section id="works"></section>
  <div class="container">
    <div class="row centered mt mb">
      <div class="col-lg-6  ">
      <img class="img-responsive" src="img/uploads/<?= $listePosts['image'] ?>">
      </div>
      <div class="col-lg-6 ">

        <p><?= nl2br($listePosts['content']) ?></p>
      </div>

      <div class="col-lg-8 col-lg-offset-2">

        <?php
        foreach ($listeChapitres as $chapitre)
        {
            ?>
            <h3>Dernier chapitre</h3>
            <p><?= strip_tags($chapitre['content']) ?></p>
            <a href="chapitre-<?= $chapitre['id'] ?>.html">Lire la suite...</a>
            <?php
        }
        ?>

      </div>

    </div>
  </div>
