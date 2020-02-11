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
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action('after_setup_theme', 'gp_init');








add_action('woocommerce_before_shop_loop', 'daleQueVa');
function daleQueVa(){
  echo '<h1>soy un nene malo</h1>';
  echo '<h1>soy un nene malo</h1>';
  echo '<h1>soy un nene malo</h1>';
  echo '<h1>soy un nene malo</h1>';
  echo '<h1>soy un nene malo</h1>';
  echo '<h1>soy un nene malo</h1>';
  echo '<h1>soy un nene malo</h1>';
}










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






function latte_pagination($max){
  // This part gets the current pagination
  if(get_query_var('paged')){$paged=get_query_var('paged');}elseif(get_query_var('page')){$paged=get_query_var('page');}else{$paged=1;}

  $result.= 'Page '.$paged.' of '.$max;
  $next=$paged + 1;
  $prev=$paged - 1;

  if($prev>=1   ){$result.='<a href="'.site_url('inventory/').$prev.'">Prev</a>';}
  if($next<=$max){$result.='<a href="'.site_url('inventory/').$next.'">Next</a>';}

  return $result;
}

















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


















// FUCTION FOR USER GENERATION
// https://tommcfarlin.com/create-a-user-in-wordpress/
add_action( 'admin_post_nopriv_lt_new_user', 'lt_new_user');
add_action(        'admin_post_lt_new_user', 'lt_new_user');
function lt_new_user(){
  $email_address=$_POST['mail'];
  $url=$_POST['url'];
  $pass=$_POST['pass'];
  if( null == username_exists( $email_address ) ) {

    // Generate the password and create the user for security
    // $password = wp_generate_password( 12, false );
    // $user_id = wp_create_user( $email_address, $password, $email_address );

    // user generated pass for local testing
    $user_id = wp_create_user( $email_address, $pass, $email_address );
    // Set the nickname
    wp_update_user(
      array(
        'ID'          =>    $user_id,
        'nickname'    =>    $email_address
      )
    );

    // Set the role
    $user = new WP_User( $user_id );
    $user->set_role( 'subscriber' );

    // Email the user
    wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );

  } // end if
  wp_redirect($url);
}







// FUCTION FOR USER GENERATION
// https://tommcfarlin.com/create-a-user-in-wordpress/
add_action( 'admin_post_nopriv_lt_login', 'lt_login');
add_action(        'admin_post_lt_login', 'lt_login');
function lt_login(){
  $link=$_POST['link'];
  $name=$_POST['name'];
  $fono=$_POST['fono'];
  $mail=$_POST['mail'];
  $pass=$_POST['pass'];


  if( null == username_exists( $mail ) ) {

    // Generate the password and create the user for security
    // $password = wp_generate_password( 12, false );
    // $user_id = wp_create_user( $mail, $password, $mail );

    // user generated pass for local testing
    $user_id = wp_create_user( $mail, $pass, $mail );
    // Set the nickname and display_name
    wp_update_user(
      array(
        'ID'              =>    $user_id,
        'display_name'    =>    $name,
        'nickname'        =>    $name,
      )
    );
    update_user_meta( $user_id, 'phone', $fono );


    // Set the role
    $user = new WP_User( $user_id );
    $user->set_role( 'subscriber' );

    // Email the user
    wp_mail( $mail, 'Welcome '.$name.'!', 'Your Password: ' . $pass );
  // end if
  $action='register';
  $creds = array(
      'user_login'    => $mail,
      'user_password' => $pass,
      'remember'      => true
  );

  $status = wp_signon( $creds, false );
} else {

  $creds = array(
      'user_login'    => $mail,
      'user_password' => $pass,
      'remember'      => true
  );

  $status = wp_signon( $creds, false );

  // $status=wp_login($mail, $pass);

  $action='login';
}

  $link = add_query_arg( array(
    'action' => $action,
    // 'status' => $status,
    // 'resultado' => username_exists( $mail ),
  ), $link );
  wp_redirect($link);
}
















add_action( 'admin_post_nopriv_lt_new_pass', 'lt_new_pass');
add_action(        'admin_post_lt_new_pass', 'lt_new_pass');
function lt_new_pass(){
  $link=$_POST['link'];
  $oldp=$_POST['oldp'];
  $newp=$_POST['newp'];
  $cnfp=$_POST['cnfp'];



  // if(isset($_POST['current_password'])){
  if(isset($_POST['oldp'])){
    $_POST = array_map('stripslashes_deep', $_POST);
    $current_password = sanitize_text_field($_POST['oldp']);
    $new_password = sanitize_text_field($_POST['newp']);
    $confirm_new_password = sanitize_text_field($_POST['cnfp']);
    $user_id = get_current_user_id();
    $errors = array();
    $current_user = get_user_by('id', $user_id);
  }

  $link = add_query_arg( array(
    'action' => $action,
  ), $link );
  // Check for errors
  if($current_user && wp_check_password($current_password, $current_user->data->user_pass, $current_user->ID)){
  //match
  } else {
    $errors[] = 'Password is incorrect';

    $link = add_query_arg( array(
      'pass'  => 'incorrect',
    ), $link );
  }
  if($new_password != $confirm_new_password){
    $errors[] = 'Password does not match';

    $link = add_query_arg( array(
      'match'  => 'no',
    ), $link );
  }
  if(empty($errors)){
      wp_set_password( $new_password, $current_user->ID );
      // echo '<h4>Password successfully changed!</h4>';

      $link = add_query_arg( array(
        'success'  => true,
      ), $link );
  } else {
    // Echo Errors
    // echo '<h3>Errors:</h3>';
    // foreach($errors as $error){
    //     echo '<p>';
    //     echo "<strong>$error</strong>";
    //     echo '</p>';
    // }
  }


  // $link = add_query_arg( array(
  //   'action' => $action,
  //   'error'  => $error,
  //   // 'status' => $status,
  //   // 'resultado' => username_exists( $mail ),
  // ), $link );
  wp_redirect($link);
}























// ADD PHONE FIELD TO USER INTERFACE IN BACKOFFICE
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
function extra_user_profile_fields( $user ) { ?>
  <h3><?php _e("Extra profile information", "blank"); ?></h3>
  <table class="form-table">
    <tr>
      <th><label for="phone"><?php _e("Phone"); ?></label></th>
      <td>
          <input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" /><br />
          <span class="description"><?php _e("Please enter your phone."); ?></span>
      </td>
    </tr>
  </table>
<?php }
