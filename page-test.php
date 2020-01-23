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
      <svg viewBox="0 0 293 293" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M40.671 31.8354C40.671 26.9557 44.6268 23 49.5064 23C54.386 23 58.3418 26.9557 58.3418 31.8354V74.5985C68.3623 78.296 75.5073 87.9319 75.5073 99.2366C75.5073 110.541 68.3623 120.177 58.3418 123.875V261.555C58.3418 266.435 54.386 270.39 49.5064 270.39C44.6268 270.39 40.671 266.435 40.671 261.555V124.055C30.3862 120.499 23 110.73 23 99.2366C23 87.7427 30.3862 77.9739 40.671 74.4179V31.8354ZM40.671 99.119C40.6705 99.1581 40.6702 99.1973 40.6702 99.2366C40.6702 99.2759 40.6705 99.3151 40.671 99.3542V99.119ZM49.2531 90.6537C49.2531 90.6537 49.2532 90.6537 49.2532 90.6537C53.9934 90.6537 57.8361 94.4964 57.8361 99.2366C57.8361 103.923 54.0794 107.733 49.4129 107.818C49.3601 107.819 49.3071 107.82 49.254 107.82C44.5138 107.82 40.6711 103.977 40.6711 99.2366C40.6711 94.7556 44.105 91.0766 48.4848 90.6877C48.7379 90.6652 48.9942 90.6537 49.2531 90.6537Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M234.671 31.8354C234.671 26.9557 238.627 23 243.506 23C248.386 23 252.342 26.9557 252.342 31.8354V74.5985C262.362 78.296 269.507 87.9319 269.507 99.2366C269.507 110.541 262.362 120.177 252.342 123.875V261.555C252.342 266.435 248.386 270.39 243.506 270.39C238.627 270.39 234.671 266.435 234.671 261.555V124.055C224.386 120.499 217 110.73 217 99.2366C217 87.7427 224.386 77.9739 234.671 74.4179V31.8354ZM234.671 99.119C234.671 99.1581 234.67 99.1973 234.67 99.2366C234.67 99.2759 234.671 99.3151 234.671 99.3542V99.119ZM243.253 90.6537C243.253 90.6537 243.253 90.6537 243.253 90.6537C247.993 90.6537 251.836 94.4964 251.836 99.2366C251.836 103.923 248.079 107.733 243.413 107.818C243.36 107.819 243.307 107.82 243.254 107.82C238.514 107.82 234.671 103.977 234.671 99.2366C234.671 94.7556 238.105 91.0766 242.485 90.6877C242.738 90.6652 242.994 90.6537 243.253 90.6537Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M137.671 261.555C137.671 266.434 141.627 270.39 146.506 270.39C151.386 270.39 155.342 266.434 155.342 261.555V218.792C165.362 215.094 172.507 205.458 172.507 194.154C172.507 182.849 165.362 173.213 155.342 169.515V31.8353C155.342 26.9556 151.386 22.9999 146.506 22.9999C141.627 22.9999 137.671 26.9556 137.671 31.8353V169.335C127.386 172.891 120 182.66 120 194.154C120 205.647 127.386 215.416 137.671 218.972V261.555ZM137.671 194.271C137.671 194.232 137.67 194.193 137.67 194.154C137.67 194.114 137.671 194.075 137.671 194.036V194.271ZM146.253 202.736C146.253 202.736 146.253 202.736 146.253 202.736C150.993 202.736 154.836 198.894 154.836 194.154C154.836 189.467 151.079 185.657 146.413 185.572C146.36 185.571 146.307 185.571 146.254 185.571C141.514 185.571 137.671 189.413 137.671 194.154C137.671 198.635 141.105 202.313 145.485 202.702C145.738 202.725 145.994 202.736 146.253 202.736Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M18 275L18 18H275V275H18ZM0 275V18L1.33514e-05 0H18H275H293V18V275V293H275H18H0V275Z" fill="black"/>
      </svg>

    </div>
    <div class="filterSeparator"></div>
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
