<?php get_header(); ?>

<!-- INFO DEL QUERIED OBJECT -->
<?php // var_dump(get_queried_object()); ?>




<figure class="inventory">
  <img class="inventoryImg rowcol1" src="<?php echo wp_get_attachment_url(get_queried_object()->term_id); ?>" alt="">
  <figcaption class="inventoryCaption rowcol1">
    <h2><?php echo get_queried_object()->name; ?></h2>
  </figcaption>
</figure>




<div class="shopArchive">
  <?php
  $args = array(
   'hierarchical' => 1,
   'show_option_none' => '',
   'hide_empty' => 0,
   'parent' => get_queried_object()->term_id,
   'taxonomy' => 'product_cat'
  );
  $subcats = get_categories($args);
  // echo '<ul class="wooc_sclist">';
  foreach ($subcats as $sc) {
    $link = get_term_link( $sc->slug, $sc->taxonomy );?>

    <figure class="productCard">
      <a class="productCardImg" href="<?php echo $link; ?>"><img class="productCardImg lazy" data-url="<?php echo wp_get_attachment_url($sc->term_id); ?>" alt=""></a>
      <figcaption class="productCardCaption">
        <h5 class="productCardTitle"><a href="<?php echo $link; ?>"><?php echo $sc->name; ?></a></h5>
        <!-- <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p> -->
      </figcaption>
    </figure>
  <?php } ?>
</div>


<?php
if (function_exists("pagination")) {
    pagination($custom_query->max_num_pages);
}
?>
<?php get_footer(); ?>
