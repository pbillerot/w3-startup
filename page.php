<?php get_header();?>

<!-- !PAGE CONTENT! -->
<section class="w3-main" style="margin-top: 64px">
  <div class="w3-row">
    <!-- Content -->
    <div class="w3-col l8 s12">
      <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post();?>
          <!-- Header -->
          <div class="w3-card-4 w3-margin w3-white">
            <div class="w3-container">
              <h3><b><?php the_title();?></b></h3>
            </div>
            <div class="w3-container">
              <?php the_content();?>
            </div><!-- /container -->
          </div><!-- /w3-card -->
        <?php endwhile;?>
      <?php endif;?>
    </div><!-- end w3-col -->

    <?php get_template_part('sidebar');?>

  </div><!-- /row -->
  </section><!-- w3-main -->

<?php get_footer();?>
