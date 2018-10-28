<?php
/*
Template Name: Foire en images
 */
?>
<?php get_header(); ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top: 64px">
    <div class="w3-hide-large" style="margin-top: 0px"></div>
    <!-- Grid -->
    <div class="w3-row">
        <!-- Content -->
        <div class="w3-col l8 s12" style="">
            <!-- Menu des Foires en images -->
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-padding-16">
                    <?php
                    $locations = get_nav_menu_locations();
                    $menuID = $locations['location_menu_foire_images'];
                    if (!empty($menuID)) {
                        $menuNav = wp_get_nav_menu_items($menuID);
                        foreach ($menuNav as $navItem) :
                            echo '<a href="' . $navItem->url . '" title="' . $navItem->title . '" class="w3-tag w3-round-large w3-theme w3-margin-bottom w3-margin-left w3-margin-right">' . $navItem->title . '</a>';
                        endforeach;
                    }
                    ?>
                </div><!-- /container -->
            </div><!-- end w3-card -->
            <!--  Le contenuu de la page -->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('content');?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div><!-- /w3-col -->
        <?php get_template_part('sidebar');?>
    </div><!-- /w3-row -->
</div><!-- w3-main -->

<?php get_footer(); ?>
