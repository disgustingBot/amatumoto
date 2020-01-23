<?php get_header(); ?>

<figure class="inventory">
  <img class="inventoryImg rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/inventoryBanner.jpg" alt="">
  <figcaption class="inventoryCaption rowcol1">
    <p>CURRENT</p>
    <h2>Inventory</h2>
  </figcaption>
</figure>





<!-- <form action="<?php // echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="get" class="filterBar" id="filterBar"> -->
<form method="get" class="filterBar" id="filterBar">
  <?php // $filter_nonce = wp_create_nonce( 'filer' ); ?>
  <!-- <input type="hidden" name="action" value="nds_form_response"> -->
  <!-- <input type="hidden" name="filter_nonce" value="<?php echo $filter_nonce ?>" /> -->


  <div class="filterBarTop">
    <div class="filterButton" onclick="altClassFromSelector('alt', '#filterBar')">
      <svg width="45" height="45" viewBox="0 0 350 350" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="12.5" y="12.5" width="325" height="325" fill="white" stroke="black" stroke-width="25"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M187 49.9167V301.542V302H186.99C186.728 308.116 181.236 313 174.5 313C167.764 313 162.272 308.116 162.01 302H162V301.542V49.9167H162.01C162.003 49.7647 162 49.6119 162 49.4585C162 43.1302 167.596 38.0002 174.5 38.0002C181.404 38.0002 187 43.1302 187 49.4585C187 49.6119 186.997 49.7647 186.99 49.9167H187Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M284 301.083V49.4583V49H283.99C283.728 42.8842 278.236 38 271.5 38C264.764 38 259.272 42.8842 259.01 49H259V49.4583V301.083H259.01C259.003 301.235 259 301.388 259 301.542C259 307.87 264.596 313 271.5 313C278.404 313 284 307.87 284 301.542C284 301.388 283.997 301.235 283.99 301.083H284Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M90 301.083V49.4583V49H89.9902C89.7277 42.8842 84.2361 38 77.5 38C70.7639 38 65.2723 42.8842 65.0098 49H65V49.4583V301.083H65.0098C65.0033 301.235 65 301.388 65 301.542C65 307.87 70.5964 313 77.5 313C84.4036 313 90 307.87 90 301.542C90 301.388 89.9967 301.235 89.9902 301.083H90Z" fill="black"/>
        <circle cx="271" cy="264" r="18.75" fill="white" stroke="black" stroke-width="12.5"/>
        <circle cx="78" cy="264" r="18.75" fill="white" stroke="black" stroke-width="12.5"/>
        <circle r="18.75" transform="matrix(1 0 0 -1 175 87)" fill="white" stroke="black" stroke-width="12.5"/>
      </svg>
    </div>
    <input class="filterBarSearch" placeholder="Search" type="text" name="filter_search" value="">
    <a href="" class="filterBarLink">inventory</a>
    <a href="" class="filterBarLink">auctions</a>
    <a href="" class="filterBarLink">sold</a>
  </div>
  <div class="filterBarBotttom">



    <?php function woocommerce_subcats_from_parentcat_by_ID($id){
      $term = get_term( $id, 'product_cat' );
      $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       'parent' => $id,
       'taxonomy' => 'product_cat'
      );
      $subcats = get_categories($args); ?>

      <div class="selectBox" tabindex="1" id="selectBox<?php echo $id; ?>">
        <div class="selectBoxButton">
          <span class="selectBoxPlaceholder"><?php echo $term->name; ?></span>
          <p class="selectBoxCurrent" id="selectBoxCurrent<?php echo $id; ?>"></p>
        </div>
        <div class="selectBoxList">
          <label for="nul<?php echo $id; ?>" class="selectBoxOption">
            <input type="radio" name="filter_<?php echo $term->slug; ?>" id="nul<?php echo $id; ?>" class="selectBoxInput" onclick="selectBoxControler('','#selectBox<?php echo $id; ?>','#selectBoxCurrent<?php echo $id; ?>')" value="0">
            <span class="checkmark"></span>
            <p class="colrOptP"></p>
          </label>
          <?php foreach ($subcats as $sc) { ?>
            <label for="<?php echo $sc->slug; ?>" class="selectBoxOption">
              <input type="radio" name="filter_<?php echo $term->slug; ?>" id="<?php echo $sc->slug; ?>" class="selectBoxInput" onclick="selectBoxControler('<?php echo $sc->name ?>', '#selectBox<?php echo $id; ?>', '#selectBoxCurrent<?php echo $id; ?>')" value="<?php echo $sc->slug; ?>">
              <span class="checkmark"></span>
              <p class="colrOptP"><?php echo $sc->name ?></p>
            </label>
          <?php } ?>
        </div>
      </div>
    <?php } ?>





<!-- Voy a tener un porro pronto -->


    <?php woocommerce_subcats_from_parentcat_by_ID(27); ?>


  </div>
</form>




<div class="shopArchive">



  <?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'post_type'=>'product',
      'posts_per_page'=>9,
      'paged' => $paged,
    );
    if (isset($_GET['filter_year']) AND $_GET['filter_year']!=0) {
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'product_cat',
              'field'    => 'slug',
              'terms'    => $_GET['filter_year'],
          ),
      );
    }
    if (isset($_GET['filter_search']) AND $_GET['filter_search']!='') {
      $args['s'] = $_GET['filter_search'];
    }

  // echo json_encode($args['tax_query']);
  // echo json_encode($args['s']);
  // var_dump($args);
  $blogPosts=new WP_Query($args);
  while($blogPosts->have_posts()){$blogPosts->the_post();$product_id = get_the_ID(); ?>

  <figure class="productCard">
    <span class="newArrival"><i>New arrival</i></span>
    <a class="productCardImg" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
    <figcaption class="productCardCaption">
      <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
      <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
      <p class="productCardPrice">
        <?php
        // $key_1_value = get_post_meta( get_the_ID(), '_auction_start_price', true );
        // Check if the custom field has a value.
        // if(!empty($key_1_value)){echo $key_1_value;}


        $product = wc_get_product( $product_id );
        echo $product->get_price_html(); ?>
      </p>
    </figcaption>
  </figure>
  <?php

} ?>
</div>
      <?php if (function_exists("pagination")) {
          pagination($custom_query->max_num_pages);
      } ?>


<?php get_footer(); ?>
