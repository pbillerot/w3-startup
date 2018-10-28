<?php
/*
Template Name: Page ACCUEIL
 */
?>
<?php get_header(); ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top: 64px">
    <div class="w3-hide-large" style="margin-top: 60px"></div>
    <!-- Grid -->
    <div class="w3-row">
        <!-- Content -->
        <div class="w3-col l8 s12">
            <!--  Le contenuu de l'article article-accueil -->
            <?php 
            $query = new WP_Query(array(
                'post_type' => 'post',
                'name' => 'accueil',
                'post_status' => 'publish'
            ));
            if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('content'); ?>
                <?php endwhile;
                wp_reset_postdata(); ?>                    
            <?php endif; ?>
        </div><!-- /w3-col -->
        <?php get_template_part('sidebar'); ?>
    </div><!-- /w3-row -->
</div><!-- w3-main -->

<?php get_footer(); ?>
