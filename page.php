<?php get_header(); ?>

<h1>Page.php</h1>
<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>

<?php while(have_posts()){the_post();the_content();} ?>



<?php

 if (is_shop())
 {

    echo "LOLOLOLOLOL";
 }
?>


<?php get_footer(); ?>
