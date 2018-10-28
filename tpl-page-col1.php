<?php
/*
Template Name: Page Une Colonne
 */
?>
<?php get_header();?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
    <section class="w3-container" style="margin-top: 20px" id="showcase">
        <div class="w3-hide-large" style="margin-top: 60px"></div>
        <!--  Le contenuu de la page -->
        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post();?>
            <!-- Header -->
            <h1 class="w3-xxxlarge w3-text-theme"><b><?php the_title();?></b></h1>
            <hr style="width:50px;border:5px solid" class="w3-round w3-text-theme">

        <?php the_content();?>

        <?php endwhile;?>
        <?php endif;?>

    </section>
  </div><!-- w3-main -->

<?php get_footer();?>
