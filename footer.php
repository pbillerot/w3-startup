
<footer class="w3-main" style="">
    <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;">
        <div class="w3-row">
            <div class="w3-col m4">
                <?php
                    $locations = get_nav_menu_locations(); 
                    $menuID = $locations['location_menu_footer_public'];
                    if (! empty ($menuID)) {
                        // echo '<h5 class=""><b>Liens</b></h5>';
                        // echo '<hr style="width:50px;border:2px solid" class="w3-round w3-text-theme">';
                        echo '<div class="w3-bar-block">';
                                $menuNav = wp_get_nav_menu_items($menuID);
                        foreach ( $menuNav as $navItem ):
                            echo '<a href="'.$navItem->url.'" title="'.$navItem->title.'" class="w3-bar-item w3-button w3-hover-white w3-text-theme">'.$navItem->title.'</a>';
                        endforeach;
                    }
                ?>
                </div><!-- /w3-bar -->
            </div><!-- /w3-col -->
            <div class="w3-col m4">
                <!-- <h5 class=""><b>A venir</b></h5> -->
                <!-- <hr style="width:50px;border:2px solid" class="w3-round w3-text-theme"> -->
            </div><!-- /w3-col -->
            <div class="w3-col m4">
                <?php
                    $locations = get_nav_menu_locations(); 
                    $menuID = $locations['location_menu_footer_prive'];
                    if (! empty ($menuID)) {
                        // echo '<h5 class=""><b>Administration</b></h5>';
                        // echo '<hr style="width:50px;border:2px solid" class="w3-round w3-text-theme">';
                        echo '<div class="w3-bar-block">';
                        if ( is_user_logged_in() ) {
                            $menuNav = wp_get_nav_menu_items($menuID);
                            foreach ( $menuNav as $navItem ):
                                echo '<a href="'.$navItem->url.'" title="'.$navItem->title.'" class="w3-bar-item w3-button w3-hover-white w3-text-theme">'.$navItem->title.'</a>';
                            endforeach;
                            echo '<a href="'.wp_logout_url("/").'" title="Se déconnecter" class="w3-bar-item w3-button w3-hover-white w3-text-theme">'."Se déconnecter".'</a>';
                        } else {
                            echo '<a href="'.wp_login_url("/").'" title="Se connecter" class="w3-bar-item w3-button w3-hover-white w3-text-theme">'."Se connecter...".'</a>';
                        } // endif
                    }
                ?>
                </div><!-- /w3-bar -->
            </div><!-- /w3-col -->
        </div><!-- /w3-row -->
    </div><!-- /container -->
</footer>
<?php wp_footer();?>

</body>
</html>