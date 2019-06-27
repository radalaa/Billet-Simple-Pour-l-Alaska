<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 21:10
 */
?>



		<?php 
		foreach ($listeMenu as $menu)
		{
		?>
		    <li><a href="menu-<?= $menu['id'] ?>.html"><?= $menu['name'] ?></a></li>     
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
 <section id="works"></section>
  <div class="container">
    <div class="row centered mt mb">
      	<div class="col-lg-8 col-lg-offset-2">	      	
			<h2>Ajouter un commentaire</h2>
			<form action="" method="post">
			  <div class="form-group">
			    <?= $form ?>

			    <input type="submit" value="Commenter" />
			  </div>
			</form>

		</div>
    </div>
  </div>