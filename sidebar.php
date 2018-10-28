
<!-- SIDEBAR -->
<div class="w3-col l4">
  <!-- A LA UNE -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-center w3-theme" style="">
      <h5 class="">À la Une</h5>
    </div>
<?php
$args_blog = array(
    'post_type' => 'post',
    'post__in' => get_option( 'sticky_posts')
);
$req_blog = new WP_Query($args_blog);
?>
    <ul class="w3-ul w3-hoverable w3-white">
    <?php if ($req_blog->have_posts()): ?>
      <?php while ($req_blog->have_posts()): $req_blog->the_post();?>
        <?php 
          if ( is_user_logged_in()
          and is_pbi_cookie("pbi_private_checked") ):
            if ( $post->post_status == 'private'):?>
              <li class="w3-padding-16 w3-text-theme">
                <a href="<?php the_permalink();?>" style="text-decoration: none;"><span class="w3-large"><?php the_title();?></span></a>
              </li>
            <?php endif; ?>
          <?php else: ?>
            <? if ( $post->post_status == 'publish'):?>
              <li class="w3-padding-16 w3-text-theme">
                <a href="<?php the_permalink();?>" style="text-decoration: none;"><span class="w3-large"><?php the_title();?></span></a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile;?>
    <?php endif;?>
    <?php wp_reset_postdata();?>
      <li class="w3-padding-16">
      <a href="/blog" type="button" class="w3-btn w3-theme w3-small w3-right">Tous les articles...</a>
      </li>
    </ul>
  </div><!-- w3-card -->
  <!-- /A LA UNE -->
  <!-- CLASSEMENT -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-center w3-theme" style="margin-top:80px">
      <h5 class="">Classement</h5>
    </div>
    <div class="w3-container">
      <p>
    <?php
      if ( is_user_logged_in(  ) ) {
        if ( is_pbi_cookie("pbi_private_checked")) {
          $cats_tags = pbi_get_categories_tags('private'); 
        } else {
          $cats_tags = pbi_get_categories_tags('publish,private'); 
        }
      } else {
        $cats_tags = pbi_get_categories_tags('publish'); 
      }
      $cats = $cats_tags['categories'];
      $tags = $cats_tags['tags'];
      ?>
    <?php foreach ($cats as $slug => $name): ?>
      <span class="w3-tag w3-round-large w3-margin-bottom w3-theme-l4">
      <a href="/category/<?php echo $slug;?>" style="text-decoration: none;">
      <?php echo $name;?></a>
      </span>
    <?php endforeach;?>
      </p>
      <p>
    <?php foreach ($tags as $slug => $name): ?>
      <span class="w3-tag w3-round-large w3-margin-bottom w3-theme-l4">
      <a href="/tag/<?php echo $slug;?>" style="text-decoration: none;">
      <?php echo $name;?></a>
      </span>
    <?php endforeach;?>
      </p>
      <!-- Coche Privé seulement -->
      <?php if ( is_user_logged_in() ): ?>
        <p>
        <input id="pbi_private_checked_id" class="w3-check" type="checkbox" <?php echo is_pbi_cookie('pbi_private_checked') ? 'checked="checked"' : '';?>>
        <label for="pbi_private_checked_id">Voir les articles privés</label>
        </p>
      <?php endif; ?>
    </div><!-- container -->
  </div><!-- w3-card -->
  <!-- /CLASSEMENT -->
  <!-- MENU SIDEBAR -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-center w3-theme" style="margin-top:80px">
      <h5 class="">Liens autres</h5>
    </div>
    <?php
      $locations = get_nav_menu_locations(); 
      $menuID = $locations['location_menu_sidebar'];
      if (! empty ($menuID)) {
        echo '<ul class="w3-ul w3-hoverable w3-white">';
        if ( is_user_logged_in() ) {
          $menuNav = wp_get_nav_menu_items($menuID);
          foreach ( $menuNav as $navItem ):
            echo '<li class="w3-padding-16 w3-text-theme">';
            echo '<a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a>';
            echo '</li>';
          endforeach;
          echo '<li class="w3-padding-16 w3-text-theme">';
          echo '<a href="'.wp_logout_url("/").'" title="Se déconnecter">'."Se déconnecter".'</a>';
          echo '</li>';
        } else {
          echo '<li class="w3-padding-16 w3-text-theme">';
          echo '<a href="'.wp_login_url("/").'" title="Se connecter" >'."Se connecter...".'</a>';
          echo '</li>';
        } // endif
        echo '</ul>';
      }
    ?>
  </div><!-- w3-card -->
  <!-- /MENU SIDEBAR -->
  </div><!-- w3-col -->
<!-- /SIDEBAR -->
