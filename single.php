<?php get_header();?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top: 64px">
  <!-- Grid -->
  <div class="w3-row">
    <!-- Content -->
    <div class="w3-col l8 s12">
    <?php if (have_posts()): ?>
      <?php while (have_posts()): the_post();?>
        <?php get_template_part('content');?>
	    <?php endwhile;?>
    <?php endif;?>
    </div><!-- w3-col -->
    <?php get_template_part('sidebar');?>
  </div><!-- w3-row -->
</div><!-- w3-main -->

<?php get_footer();?>
