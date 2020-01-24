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
      <svg width="50" height="50" viewBox="0 0 275 231" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9167 50L263.542 50L264 50L264 49.9902C270.116 49.7277 275 44.2361 275 37.5C275 30.7639 270.116 25.2723 264 25.0098L264 25L263.542 25L11.9167 25L11.9167 25.0098C11.7647 25.0033 11.612 25 11.4586 25C5.1304 25 0.000335449 30.5964 0.000335147 37.5C0.000334845 44.4035 5.1304 50 11.4586 50C11.612 50 11.7647 49.9967 11.9167 49.9902L11.9167 50Z" fill="black"/>
        <circle cx="202.5" cy="37.5" r="37.5" transform="rotate(90 202.5 37.5)" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.4167 114.828C23.4449 114.828 23.4731 114.829 23.5012 114.829L252.167 114.829L252.167 114.838C252.305 114.832 252.444 114.829 252.584 114.829C258.336 114.829 263 119.917 263 126.192C263 132.468 258.336 137.556 252.584 137.556C252.444 137.556 252.305 137.553 252.167 137.547L252.167 137.556L22.9999 137.556L22.9999 137.547C17.4402 137.308 13 132.316 13 126.192C13 120.068 17.4402 115.076 22.9999 114.837L22.9999 114.829L23.3322 114.829C23.3603 114.829 23.3885 114.828 23.4167 114.828Z" fill="black"/>
        <circle cx="79" cy="126" r="34" transform="rotate(-90 79 126)" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M238 204.154C238 209.053 234.448 213.047 230.001 213.238L230.001 213.245L229.684 213.245L229.667 213.245L229.651 213.245L46.6668 213.245L46.6668 213.238C46.5563 213.243 46.4452 213.245 46.3336 213.245C41.7312 213.245 38.0002 209.175 38.0002 204.154C38.0002 199.133 41.7312 195.063 46.3336 195.063C46.4452 195.063 46.5563 195.066 46.6668 195.07L46.6668 195.063L230.001 195.063L230.001 195.07C234.448 195.261 238 199.255 238 204.154Z" fill="black"/>
        <ellipse rx="27" ry="27" transform="matrix(-4.37114e-08 -1 -1 4.37114e-08 185 204)" fill="black"/>
      </svg>
    </div>
    <div class="filterSeparator"></div>
    <input class="filterBarSearch" placeholder="Search" type="text" name="filter_search" value="">
    <button class="searchBtn">
      <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
      </svg>
    </button>
    <a href="" class="filterBarLink buttonType1">inventory</a>
    <a href="" class="filterBarLink buttonType1">auctions</a>
    <a href="" class="filterBarLink buttonType1">sold</a>
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


    <?php woocommerce_subcats_from_parentcat_by_ID(24); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(23); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(22); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(19); ?>

    <button class="filterSearch buttonType1" type="submit">Search</button>




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
