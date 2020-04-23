<?php get_header(); ?>

<!-- INFO DEL QUERIED OBJECT -->
<?php // var_dump(get_queried_object()); ?>


<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo wp_get_attachment_url(get_woocommerce_term_meta(get_queried_object()->term_id, 'thumbnail_id', true )); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php echo get_queried_object()->name; ?></h2>
  </figcaption>
</figure>

<?php if (category_has_children( get_queried_object()->term_id, 'product_cat' )) { ?>





<div class="subCatArchive">

  <?php
  $args = array(
   // 'hierarchical' => 1,
   // 'show_option_none' => '',
   'hide_empty' => 0,
   'parent' => get_queried_object()->term_id,
   'taxonomy' => 'product_cat',
   // 'number' => 3,
  );
  $subcats = get_categories($args);
  foreach ($subcats as $sc) {
    $link = get_term_link( $sc->slug, $sc->taxonomy );
    $thumbnail_id = get_woocommerce_term_meta( $sc->term_id, 'thumbnail_id', true );
  ?>

    <figure class="subcatCard">
      <a class="subcatImg rowcol1" href="<?php echo $link; ?>">
        <img class="sucatImg lazy" data-url="<?php echo wp_get_attachment_url($thumbnail_id); ?>" alt="">
      </a>
      <figcaption class="subcatCaption rowcol1">
        <h5 class="subcatTitle"><a href="<?php echo $link; ?>"><?php echo $sc->name; ?></a></h5>
      </figcaption>
    </figure>
  <?php } ?>
  <?php // echo misha_paginator(get_pagenum_link()); ?>

</div>



<?php } else { ?>
  <div class="shopArchive" id="slider">



    <?php

    //   $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    //   $args = array(
    //     'post_type'=>'product',
    //     'posts_per_page'=>9,
    //     'paged' => $paged,
    //   );
    //   if (isset($_GET['filter_year']) AND $_GET['filter_year']!=0) {
    //     $args['tax_query'] = array(
    //         array(
    //             'taxonomy' => 'product_cat',
    //             'field'    => 'slug',
    //             'terms'    => $_GET['filter_year'],
    //         ),
    //     );
    //   }
    //   if (isset($_GET['filter_search']) AND $_GET['filter_search']!='') {
    //     $args['s'] = $_GET['filter_search'];
    //   }
    //
    // $blogPosts=new WP_Query($args);
    // while($blogPosts->have_posts()){$blogPosts->the_post();$product_id = get_the_ID(); ?>

    <?php while (have_posts()){the_post(); ?>

    <figure class="productCard">
      <?php
      // global $product;
      // $newness_days = 1;
      // $created = strtotime( $product->get_date_created() );
      // if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
        <span class="newArrival"><i>New arrival</i></span>
      <?php // } ?>
      <a class="productCardImg" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
      <figcaption class="productCardCaption">
        <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
        <p class="productCardPrice">
          <?php
          // $product = wc_get_product( $product_id );
          // echo $product->get_price_html(); ?>
        </p>
      </figcaption>
    </figure>
    <?php } ?>
    <?php echo misha_paginator(get_pagenum_link()); ?>

  </div>

<?php } ?>

<?php
  // echo basename($_SERVER['REQUEST_URI']);

  // $urlVars = basename($_SERVER['REQUEST_URI']);
  // echo $urlVars;
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // echo $actual_link;
?>

<article class="banner0">

  <?php
  $args = array(
    'post_type'=>'banner',
    'posts_per_page'=> 1,
  );
  $banners=new WP_Query($args); $i=0;
  while($banners->have_posts()){$banners->the_post();?>
    <?php $background1 = get_post_meta( get_the_id(), 'background1' )[0]; ?>
    <?php if($background1){ ?>
      <img class="banner0Img banner0Img1" src="<?php echo $background1; ?>" alt="">
    <?php } ?>
    <?php $link1 = get_post_meta( get_the_id(), 'link1' )[0]; ?>
    <?php if($link1){ ?>
      <a href="<?php echo site_url($link1); ?>" class="banner0Link1"></a>
    <?php } ?>
    <div class="banner0FigCap1 banner0FigCap">
      <?php $bannerTxt1 = get_post_meta( get_the_id(), 'txt1' )[0]; ?>
      <?php if($bannerTxt1){ ?>
        <p class="banner0Txt banner0FigCap"><?php echo $bannerTxt1; ?></p>
      <?php } ?>
      <?php $bannerTxt2 = get_post_meta( get_the_id(), 'txt2' )[0]; ?>
      <?php if($bannerTxt2){ ?>
        <p class="banner0Txt banner0FigCap"><?php echo $bannerTxt2; ?></p>
      <?php } ?>
    </div>


    <?php $background2 = get_post_meta( get_the_id(), 'background2' )[0]; ?>
    <?php if($background2){ ?>
      <img class="banner0Img banner0Img2" src="<?php echo $background2; ?>" alt="">
    <?php } ?>
    <?php $link2 = get_post_meta( get_the_id(), 'link2' )[0]; ?>
    <?php if($link2){ ?>
      <a href="<?php echo site_url($link2); ?>" class="banner0Link2"></a>
    <?php } ?>
    <?php $bannerTxt3 = get_post_meta( get_the_id(), 'txt3' )[0]; ?>
    <?php if($bannerTxt3){ ?>
      <p class="banner0FigCap2 banner0FigCap"><?php echo $bannerTxt3; ?></p>
    <?php } ?>

    <?php $floatingImg = get_post_meta( get_the_id(), 'floatingImg' )[0]; ?>
    <?php if($floatingImg){ ?>
      <img class="banner0FloatingImg" src="<?php echo $floatingImg; ?>" alt="">
    <?php } ?>
  <?php } ?>
</article>

<?php get_footer(); ?>
