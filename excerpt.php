<!-- Contenu de l'article -->
<div class="w3-card-2 w3-margin w3-white">
  <div class="w3-container">
    <h1 class="w3-xlarge w3-text-theme"><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a></h1>
    <hr style="width:50px;border:3px solid" class="w3-round w3-text-theme">
    <?php if (has_excerpt()) : the_excerpt();
    else : the_content();
    endif ?>
    <?php 
    $page_name = add_query_arg(array(), $wp->request);
    get_template_part('meta');
    ?>
  </div>
</div>