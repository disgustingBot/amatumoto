<?php get_header(); ?>

<!-- INFO DEL QUERIED OBJECT -->
<?php // var_dump(get_queried_object()); ?>




<figure class="inventory">
  <img class="inventoryImg rowcol1" src="<?php echo wp_get_attachment_url(get_woocommerce_term_meta(get_queried_object()->term_id, 'thumbnail_id', true )); ?>" alt="">
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
</div>


<?php
if (function_exists("pagination")) {
    pagination($custom_query->max_num_pages);
}
?>
<?php get_footer(); ?>
