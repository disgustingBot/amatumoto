<?php

require_once 'customPosts.php';

function lattte_setup(){
  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
  wp_enqueue_script('main', get_theme_file_uri('/js/custom.js'), NULL, microtime(), true);
}
add_action('wp_enqueue_scripts', 'lattte_setup');

// Adding Theme Support

function gp_init() {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form')
  );
  // add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action('after_setup_theme', 'gp_init');








// this removes the "Archive" word from the archive title in the archive page
add_filter('get_the_archive_title',function($title){
  if(is_category()){$title=single_cat_title('',false);
  }elseif(is_tag()){$title=single_tag_title('',false);
  }elseif(is_author()){$title='<span class="vcard">'.get_the_author().'</span>';
  }return $title;
});






function excerpt($charNumber){
  if(!$charNumber){$charNumber=1000000;}
  $excerpt = get_the_excerpt();
  if(strlen($excerpt)<=$charNumber){return $excerpt;}else{
    $excerpt = substr($excerpt, 0, $charNumber);
    $result  = substr($excerpt, 0, strrpos($excerpt, ' '));
    // $result .= $result . '(...)';
    // return var_dump($excerpt);
    return $result;
  }
}









 function register_menus() {
   register_nav_menu('navBar',__( 'Header' ));
   register_nav_menu('navBarMobile',__( 'Header Mobile' ));
   // register_nav_menu('homeMobile-menu',__( 'Home Mobile Menu' ));
   // register_nav_menu('magazine-menu',__( 'Magazine Menu' ));
   // register_nav_menu('magazineMobile-menu',__( 'Magazine Mobile Menu' ));
 }
 add_action( 'init', 'register_menus' );




// DISABLES AUTO SPAN ON CONTACT FORM 7

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});


// add_action( 'admin_post_nopriv_nds_form_response', 'the_form_response');
// function the_form_response() {
//  if( isset( $_POST['filter_nonce'] ) && wp_verify_nonce( $_POST['filter_nonce'], 'nds_add_user_meta_form_nonce') ) {
//    var_dump($_POST['year']);
//    echo 'hello World';
//    $url = 'http://localhost/grandPrix/test/';
//    wp_redirect( $url );
//    exit;
//  }
// }
