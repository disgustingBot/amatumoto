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


// Backoffice Stylesheet

function initialization() { // phpcs:ignore
 wp_enqueue_style('backoffice', get_stylesheet_uri(), NULL, microtime(), 'all');
}
add_action( 'init', 'initialization' );
