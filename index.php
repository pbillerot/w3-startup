<?php get_header();?>

<section>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top: 64px">
    <?php if (have_posts()): ?>
      <?php while (have_posts()): the_post();?>
	        <!-- Header -->
	        <div class="w3-container" style="">
	          <h1 class="w3-xxxlarge w3-text-theme"><b><?php the_title();?></b></h1>
	          <hr style="width:50px;border:5px solid red" class="w3-round">
	        </div>

			    <?php the_content();?>

			  <?php endwhile;?>
    <?php endif;?>
  </div><!-- w3-main -->
</section>

<?php get_footer();?>
