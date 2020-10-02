<?php get_header(); ?>
<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>


<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>
  <?php $categories = get_the_terms( get_the_ID(), 'product_cat' ); ?>
  <?php function selection($v){return $v->slug;}if($categories){$cates=array_map('selection',$categories);} ?>

  <!-- <h1>single-product.php</h1> -->


    <?php if($product->is_type( 'auction' )){
      include 'auction-product-template.php';
    } else {
      include 'normal-product-template.php';
     } ?>


<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
