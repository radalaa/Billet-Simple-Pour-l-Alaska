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
  background: url(img/uploads/<?= $listePage[0]['image'] ?>) no-repeat center top;
    margin-top: -70px;
  padding-top: 250px;
  text-align:center;
  background-attachment: relative !important;
  background-position: center center;
  min-height: 650px;
  width: 100%;

    margin-top: -70px;
  padding-top: 250px;
  text-align:center;
  background-attachment: relative;
  background-position: center center;
  min-height: 650px;
  width: 100%;

    -webkit-background-size: 100%;
    -moz-background-size: 100%;
    -o-background-size: 100%;
    background-size: 100%;

    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
  <div id="workwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h1 class="color-acceuil"><?= $listePage[0]['firsttitle'] ?></h1>
          <h2><?= $listePage[0]['secondtitle'] ?></h2>
          <p><?= $listePage[0]['thirdtitle'] ?></p>
        </div>
      </div>
    </div>
    <!-- /container -->
  </div>

 <section id="works"></section>
  <div class="container">
    <div class="row centered mt mb">
      <div class="col-lg-6  ">
      <img class="img-responsive" src="img/uploads/<?= $listePage[0]['image'] ?>">
      </div>
      <div class="col-lg-6 ">

        <p><?= nl2br($listePage[0]['content']) ?></p>

      </div>
      <div class="col-lg-8 col-lg-offset-2">

        <?php
        foreach ($listePosts as $posts)
        {
            ?>
            <h3>Dernier chapitre</h3>
            <p><?= strip_tags($posts['content']) ?></p>
            <a href="chapitre-<?= $posts['id'] ?>.html">Lire la suite...</a>
            <?php
        }
        ?>

      </div>


    </div>
  </div>
