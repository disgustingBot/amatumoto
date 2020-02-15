<?php get_header(); ?>

<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <p>CURRENT</p>
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>


<?php include 'filterBar.php'; ?>


<div class="shopArchive shopInventory">

  <?php


    if(get_query_var('paged')){$paged=get_query_var('paged');}elseif(get_query_var('page')){$paged=get_query_var('page');}else{$paged=1;}
    $args = array(
      'post_type'=>'product',
      'posts_per_page'=>9,
      'paged' => $paged,
    );
    if (isset($_GET['filter_year']) AND $_GET['filter_year']!=0) {
      $args['tax_query'][] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $_GET['filter_year'],
      );
    }
    if (isset($_GET['type']) AND $_GET['type']=='auction') {
      $args['tax_query'][] = array(
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => 'auction',
      );
    }
    // chequea si hay una busqueda de texto solicitada por el usuario, de haberla la pasa al query
    if (isset($_GET['filter_search']) AND $_GET['filter_search']!=''){$args['s']=$_GET['filter_search'];}

  $blogPosts=new WP_Query($args);
  while($blogPosts->have_posts()){$blogPosts->the_post();$product_id = get_the_ID(); ?>



  <figure class="productCard">
    <?php
    global $product;
    $newness_days = 1;
    $created = strtotime( $product->get_date_created() );
    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
      <span class="newArrival"><i>New arrival</i></span>
      <?php } ?>
      <!-- <span class="newArrival"><i>New arrival</i></span> -->
      <a class="productCardImg" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
      <figcaption class="productCardCaption">
      <?php
        // get all the categories on the product
        $terms = get_the_terms( get_the_ID(), 'product_cat' );
        // for each category
        if($terms){ ?>
          <p class="productCardAnoMarca"><a href="<?php echo get_permalink(); ?>">
          <?php foreach ($terms as $term) {
            // get the parent category
            $parent=get_term_by('id', $term->parent, 'product_cat', 'ARRAY_A')['slug'];
            // check if parent is either year or brand
            if ($parent=="year-bikes" OR $parent=="brand") { ?>
              <span><?php echo $term->name; ?></span>
            <?php }
          } ?>
        </a></p>
      <?php } ?>
      <h5 class="productCardTitle"><a class="productCardTitle" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
      <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
      <p class="productCardPrice"><?php echo $product->get_price_html(); ?></p>
    </figcaption>
  </figure>
  <?php

} ?>
</div>



<?php echo latte_pagination($blogPosts->max_num_pages); ?>



<?php get_footer(); ?>
