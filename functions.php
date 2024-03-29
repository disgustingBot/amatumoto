<?php

require_once 'customPosts.php';
$newness_days = 25;

$site = '6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B';
$scrt = '6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0';
function lattte_setup(){


  wp_enqueue_script('modules', get_theme_file_uri('/js/modules.js'), NULL, microtime(), true);
  wp_enqueue_script('main', get_theme_file_uri('/js/custom.js'), NULL, microtime(), true);


  wp_enqueue_script('ReCaptcha', 'https://www.google.com/recaptcha/api.js', NULL, microtime(), true);


    // TOOOODO ESTO ES PARA AJAX
  	global $wp_query;
  	// In most cases it is already included on the page and this line can be removed
  	wp_enqueue_script('jquery');
  	// register our main script but do not enqueue it yet
  	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );

  	// now the most interesting part
  	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
  	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
  	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
  		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
  		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
  		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
  		'max_page' => $wp_query->max_num_pages,
  		'first_page' => get_pagenum_link(1) // here it is
  	) );

   	wp_enqueue_script( 'my_loadmore' );
    // FIN DE PARA AJAX




  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
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


function stories_description_exerpt_length() {
  return 5;
}

add_filter('excerpt_length', 'stories_description_exerpt_length');



//Second solution : two or more files.
//If you're using a child theme you could use:
// get_stylesheet_directory_uri() instead of get_template_directory_uri()
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
  wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/css/backoffice.css', false, '1.0.0' );
  // wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/admin-style-foo.css', false, '1.0.0' );
  // wp_enqueue_style( 'admin_css_bar', get_template_directory_uri() . '/admin-style-bar.css', false, '1.0.0' );
}



//
// function wpdocs_custom_excerpt_length( $length ) {
//     return 3;
// }
// add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999, 3 );












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
   register_nav_menu('contactMenu',__( 'Contact Menu' ));
   register_nav_menu('footer',__( 'Footer Menu' ));
   add_post_type_support( 'page', 'excerpt' );
 }
 add_action( 'init', 'register_menus' );




// DISABLES AUTO SPAN ON CONTACT FORM 7
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});







function latte_pagination_old($max, $link){
  // This part gets the current pagination
  if(get_query_var('paged')){$paged=get_query_var('paged');}elseif(get_query_var('page')){$paged=get_query_var('page');}else{$paged=1;}
  // $result.='<div class="paginationCont"><h5 class="paginationTitle">';
  // $result.=  'Page '.$paged.' of '.$max;
  // $result.='</h5>';
  $result.='<div class="pagination">';
  $next=$paged + 1;
  $prev=$paged - 1;

  // $result.=var_dump($max);
  // $result.=home_url( $wp->request );
  if(basename($_SERVER['REQUEST_URI'])!='inventory'){
    // $result.=basename($_SERVER['REQUEST_URI']);

    // $urlVars = basename($_SERVER['REQUEST_URI']);

  } else {
    $urlVars = '?';

  }

  if($prev>=1){$result.='<a class="paginationLink" href="'.$link.'&page='.$prev.'">Prev</a>';}
  else{$result.='<p class="paginationLink">Prev</p>';}

  for ( $i=1; $i <= $max; $i++ ) {
    if ( $i - $paged <= 2 ) {
      if ( $i != $paged ) {
        $result.='<a class="paginationLink" href="'.$link.'&page='.$i.'">'.$i.'</a>';
      } else {
        $result.='<p class="paginationLink current">'.$i.'</p>';
      }
    }
  }

  if($next<=$max){$result.='<a class="paginationLink" href="'.$link.'&page='.$next.'">Next</a>';}
  else{$result.='<p class="paginationLink">Next</p>';}

  $result.='</div>';
  // $result.='</div>';
  return $result;
}






/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  if(is_product_category()){
    $cols = -1;
  } else {
    $cols = 18;
    // $cols = 3;
  }
  return $cols;
}










add_action(        'admin_post_lt_form_handler', 'lt_form_handler');
add_action( 'admin_post_nopriv_lt_form_handler', 'lt_form_handler');
function lt_form_handler() {
  $link=$_POST['link'];

  // $link = add_query_arg( array( 'cheat' => var_dump($_POST) , ), $link );

	if($_POST['a00'] != ""){

		$link = add_query_arg( array(
			'status' => 'nope',
			// 'mensaje' => $message,
			// 'status' => $status,
			// 'resultado' => username_exists( $mail ),
		), $link );
	  // header( "Location: https://www.idemomotors.com/?mail=nope" . $_POST['a9'] );
	  // exit;
	} else {
		// $mail=$_POST['mail'];
    $email='info@gpmotorbikes.com';
    // $email='molinerozadkiel@gmail.com';
    // $email='tomas.moralparra@gmil.com';

		$subject='Form from '. $link;
		$message='';

    foreach ($_POST as $key => $value) {
      if ( $key != 'a00' && $key != 'action' && $key != 'link' && $key != 'status' && $key != 'submit' && $key != 'g-recaptcha-response' ) {
        $message=$message.'<strong>'.$key.':</strong> '.$value.' - <br>';
      }
    }

    $headers = array('Content-Type: text/html; charset=UTF-8');

    // $attachments = array( WP_CONTENT_DIR . '/uploads/file_to_attach.zip' );
	 // $cosa = var_dump(wp_mail( $mail , $subject , $message ));
   // if (wp_mail( $mail , $subject , $message , $headers , $attachments )) {


     $site = '6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B';
     $scrt = '6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0';

     // if (isset($_POST['submit'])) {
       $response = $_POST['g-recaptcha-response'];
       $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scrt.'&response='.$response);
       // echo $payload;
       $result = json_decode($payload,true);
       if ($result['success']!=1) {
         // code...
         // header( "Location: https://multiviahr.info/?mail=BOT" );
         $link = add_query_arg( array( 'status' => 'bot' , ), $link );
         // echo 'you are evil or a bott';
         // exit;
         // return false;
       } else {


        if (wp_mail( $email , $subject , $message , $headers )) {
        	$link = add_query_arg( array( 'status' => 'sent' , ), $link );
        } else {
          $link = add_query_arg( array( 'status' => 'error', ), $link );
        }
      }
    // }
	}
	wp_redirect($link);
  exit;
}





// FUCTION FOR USER GENERATION
// https://tommcfarlin.com/create-a-user-in-wordpress/
add_action( 'admin_post_nopriv_lt_new_user', 'lt_new_user');
add_action(        'admin_post_lt_new_user', 'lt_new_user');
function lt_new_user(){
  $email_address=$_POST['mail'];
  $url=$_POST['url'];
  $pass=$_POST['pass'];
  if( null == username_exists( $email_address ) || email_exists( $email ) == false ) {

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
    wp_new_user_notification($user, $pass);

    // Email the user
    wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );

  } // end if
  wp_redirect($url);
}




// // TODO: 1 – Confirmación de registro de cuenta
// // TODO: 1_a No aparece ningún mensaje avisando que has de activar la cuenta desde email
// // TODO: 1_b  Cuando vas al correo y activas la cuenta, va todo bien pero aparece un fallo en la pantalla – adjunto captura de pantalla

// TODO: 2 – Como hacen los clientes para recuperar la contraseña si la han perdido?
// -          Hace faltan algún botón de recuperar contraseña por email

// // TODO: 3 - mensaje de error " esta cuenta no existe" cuando se loguean de forma incorrecta


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
  $actn=$_POST['actn'];


  if( $actn == 'register' ) {

    // ERROR HANDLING
    if ($fono=='') {
      $action='phoneRequired';
    } else {
      if( null != username_exists( $mail ) || email_exists( $mail ) != false  ) {
        $action='alreadyExist';
      } else {

        // recaptcha


        $site = '6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B';
        $scrt = '6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0';

        $response = $_POST['g-recaptcha-response'];
        $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scrt.'&response='.$response);
        // echo $payload;
        $result = json_decode($payload,true);
        if ($result['success']!=1) {
           // code...
           // header( "Location: https://multiviahr.info/?mail=BOT" );
           // $link = add_query_arg( array( 'status' => 'bot' , ), $link );
           // echo 'you are evil or a bott';
           // exit;
            $action='bot';
           // return false;
        } else {



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
          $hash = hash ( 'sha256' , time() . $mail );
          update_user_meta( $user_id, 'confirmation', $hash );


          // Set the role
          $user = new WP_User( $user_id );
          $user->set_role( 'subscriber' );

          // Email the user
          $message='';
          $message=$message.'Your Password: ' . $pass;
          $message=$message.'<br>';
          $message=$message.'activation Code: ';
          $message=$message.'<br>';
          $enlace=get_site_url().'/confirmation/?confirmation='.$hash;
          $message=$message.'<a href="'.$enlace.'">'.$enlace.'</a>';
          $message=$message.'<br>';
          $headers = array('Content-Type: text/html; charset=UTF-8');

          // wp_mail( 'molinerozadkiel@gmail.com', 'Welcome '.$name.'!', $message, $headers );
          wp_mail( $mail, 'Welcome '.$name.'!', $message, $headers );



          // delete users eventually?
          // wp_delete_user( $id, $reassign );




          // wp_new_user_notification($user, $pass);
          // end if
          // $creds = array(
          //   'user_login'    => $mail,
          //   'user_password' => $pass,
          //   'remember'      => true
          // );

          // $status = wp_signon( $creds, false );
          $action='register';
        }

      }

    }

  }


  if( $actn == 'newPass' ) {
    $action='newPass';



    $site = '6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B';
    $scrt = '6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0';

    $response = $_POST['g-recaptcha-response'];
    $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scrt.'&response='.$response);
    // echo $payload;
    $result = json_decode($payload,true);
    if ($result['success']!=1) {
       // code...
       // header( "Location: https://multiviahr.info/?mail=BOT" );
       // $link = add_query_arg( array( 'status' => 'bot' , ), $link );
       // echo 'you are evil or a bott';
       // exit;
        $action='bot';
       // return false;
    } else {



      $hash = hash ( 'sha256' , time() . $mail );
      $user = get_user_by( 'email', $mail );
      update_user_meta( $user->id, 'newPass', $hash );




      // Email the user
      $message='';
      $message=$message.'Someone has requested to change your password for Amatumoto.';
      $message=$message.'<br>';
      $message=$message.'If that was not you, you can ignore this email.';
      $message=$message.'<br>';
      $message=$message.'Click here to change you password: ';
      $message=$message.'<br>';
      $enlace=get_site_url().'/confirmation/?newPass='.$hash;
      $message=$message.'<a href="'.$enlace.'">'.$enlace.'</a>';
      $message=$message.'<br>';
      $headers = array('Content-Type: text/html; charset=UTF-8');

      // wp_mail( 'molinerozadkiel@gmail.com', 'Welcome '.$name.'!', $message, $headers );
      wp_mail( $mail, 'Password Reset', $message, $headers );


    }

  }


  if( $actn == 'login' ) {
    if( null == username_exists( $mail ) && email_exists( $mail ) == false  ) {

      $action='notExist';
    } else {
      // aqui debo chequear que no tenga confirmation el usuario
      $user = get_user_by( 'email', $mail );
      // echo 'User is ' . $user->first_name . ' ' . $user->last_name;
      if(get_user_meta($user->id, 'confirmation')){
        // echo 'SIII!';
        $action='needsConfirmation';
      } else {

        $creds = array(
          'user_login'    => $mail,
          'user_password' => $pass,
          'remember'      => true
        );



        $status = wp_signon( $creds, false );
        if ( is_wp_error($status) ){
          $action='wrongPass';
        } else {
          // wp_set_current_user( $user->id, $user->user_login );
          wp_set_auth_cookie( $user->id );
          // do_action( 'wp_login', $user->user_login, $user );
          $action='login';
        }
      }
    }
  }

  $link = add_query_arg( array(
    // 'status' => $status,
    'action' => $action,
    // 'mail'   => $mail,
    // 'resultado' => username_exists( $mail ),
  ), $link );
  wp_redirect($link);
}





// ONCE A DAY DELETE OLD USERS
add_action( 'wp', 'lt_setup_schedule' );
/**
 * On an early action hook, check if the hook is scheduled - if not, schedule it.
 */
function lt_setup_schedule() {
    if ( ! wp_next_scheduled( 'lt_daily_event' ) ) {
        wp_schedule_event( time(), 'daily', 'lt_daily_event');
    }
}
add_action( 'lt_daily_event', 'lt_do_this_daily' );
/**
 * On the scheduled action hook, run a function.
 */
function lt_do_this_daily() {
  // check every user and see if their account is expiring, if yes, deletes te user.
  $users = get_users();
  foreach ($users as $key => $value) {
    // code...
    if (get_user_meta( $value->id, 'confirmation' )[0] != ''){
      $now = new DateTime();
      $registrationDate = new DateTime( $value->user_registered );
      $daysAgo = intval($now->diff($registrationDate)->format("%d"));

      if ($daysAgo > 1){
        require_once(ABSPATH.'wp-admin/includes/user.php' );
        wp_delete_user( $value->id );
      }
    }
  }
}













add_action( 'admin_post_nopriv_lt_new_pass', 'lt_new_pass');
add_action(        'admin_post_lt_new_pass', 'lt_new_pass');
function lt_new_pass(){
  $link=$_POST['link'];
  $oldp=$_POST['oldp'];
  $newp=$_POST['newp'];
  $cnfp=$_POST['cnfp'];

  $code=$_POST['code'];
  if(!isset($_POST['code'])){


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
          $link = add_query_arg( array(
            'success'  => true,
          ), $link );
      }

  } else {


      // if(isset($_POST['current_password'])){
        // if(isset($_POST['oldp'])){
          $_POST = array_map('stripslashes_deep', $_POST);
          // $current_password = sanitize_text_field($_POST['oldp']);
          $new_password = sanitize_text_field($_POST['newp']);
          $confirm_new_password = sanitize_text_field($_POST['cnfp']);


          // $user_id = get_current_user_id();

          $users = new WP_User_Query(array(
            // 'search' => $yoursearchquery,
            'meta_query' => array(
              'relation' => 'OR',
              array(
                'key'     => 'newPass',
                'value'   => $code,
                'compare' => '='
              ),
            )
          ));
          // Get the results
          $authors = $users->get_results();
          var_dump($authors);
          $user = $authors[0];
          $user_id = $user->id;


          $errors = array();
          $current_user = get_user_by('id', $user_id);
        // }

        // $link = add_query_arg( array(
        //   'action' => $action,
        // ), $link );
        // Check for errors
        // if($current_user && wp_check_password($current_password, $current_user->data->user_pass, $current_user->ID)){
        // //match
        // } else {
        //   $errors[] = 'Password is incorrect';

        //   $link = add_query_arg( array(
        //     'pass'  => 'incorrect',
        //   ), $link );
        // }
        if($new_password != $confirm_new_password){
          $errors[] = 'Password does not match';

          $link = add_query_arg( array(
            'match'  => 'no',
          ), $link );
        }
        if(empty($errors)){
            wp_set_password( $new_password, $current_user->ID );
            delete_user_meta( $author->ID, 'newPass' );

            $link = add_query_arg( array(
              'action'  => 'newPassConfirm',
            ), $link );
        }
  }
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


























// You could use this simple function call which returns either TRUE or FALSE depending on if $children is an empty array or not.

/**
 * Check if given term has child terms
 *
 * @param Integer $term_id
 * @param String $taxonomy
 *
 * @return Boolean
 */
function category_has_children( $term_id = 0, $taxonomy = 'category' ) {
    $children = get_categories( array(
        'child_of'      => $term_id,
        'taxonomy'      => $taxonomy,
        'hide_empty'    => false,
        'fields'        => 'ids',
    ) );
    return ( $children );
}























/**
 * Exclude products from a particular category on the shop page
 */
function custom_pre_get_posts_query( $q ) {
  if(!is_product_category()){
    if(!isset($_GET['auction'])){

      $tax_query = (array) $q->get( 'tax_query' );

      $tax_query['not_parts'] = array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => array( 'parts-racing-products' ), // Don't display products in the parts-racing-products category on the shop page.
        'operator' => 'NOT IN'
      );
      $q->set( 'tax_query', $tax_query );
    }
  }
}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );
































add_action('pre_get_posts','alter_query');

function alter_query($query) {
  if (!is_admin()) {
    //gets the global query var object
    global $wp_query;
    $max_page = $query->max_num_pages;
    // var_dump($max_page);

    //gets the front page id set in options
    $front_page_id = get_option('page_on_front');

    if ( !$query->is_main_query() )
    return;

    // $args['paged'] = $page;
    // if (isset($_GET['page']) AND $_GET['page'] <= $max_page ) {
    if (isset($_GET['page'])) {
      // $query-> set('paged' , $_GET['page']);
      $query->query_vars['paged'] = $_GET['page'];
    } else {
      $query->query_vars['paged'] = 1;
      // $query-> set('paged' , 1);
    }
    $query->query_vars['orderby'] = 'date';
    $query->query_vars['order'] = 'DESC';

    if (isset($_GET['filter_search']) AND $_GET['filter_search']!=''){
      $query->query_vars['s']=$_GET['filter_search'];
    }

    if (isset($_GET['year-bikes']) AND $_GET['year-bikes']!=0) {
      $query->query_vars['tax_query']['year-bikes'] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $_GET['year-bikes'],
      );
      echo '<script>console.log('.$_GET['year-bikes'].')';
      echo '</script>';
    }
    if (isset($_GET['brand'])) {
      $brand = $_GET['brand'];
      $query->query_vars['tax_query']['brand'] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $brand,
      );
    }
    if (isset($_GET['type']) AND $_GET['type']!='') {
      $type = $_GET['type'];
      $query->query_vars['tax_query']['type'] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $type,
        );
      }
      if (isset($_GET['race-bike']) AND $_GET['race-bike']!='') {
        $raceBike = $_GET['race-bike'];
        $query->query_vars['tax_query']['race-bike'] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $raceBike,
        );
      }
      if (isset($_GET['road-bike']) AND $_GET['road-bike']!='') {
        $roadBike = $_GET['road-bike'];
        $query->query_vars['tax_query']['road-bike'] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $roadBike,
        );
      }
      // var_dump($_GET['auction'])

      if (isset($_GET['auction']) AND $_GET['auction']=='true') {
        $query->query_vars['tax_query'][] = array(
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => 'auction',
        'operator' => 'IN',
        );
        // $tax_query['not_parts'] = array();

        // $query->query_vars['tax_query'][] = array(
        //     'taxonomy' => 'product_cat',
        //     'field'    => 'slug', // Or 'name' or 'term_id'
        //     'terms'    => array('todo'),
        //     'operator' => 'IN', // Excluded
        // );
      }
      if (!isset($_GET['auction'])) {
        $query->query_vars['tax_query'][] = array(
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => 'auction',
        'operator' => 'NOT IN',
        );
        // $tax_query['not_parts'] = array();
      }


      if (isset($_GET['sold']) AND $_GET['sold']=='true') {
        $query->query_vars['tax_query'][] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'slug',
        'terms'   => array('outofstock'),
        'compare' => 'IN',
        // 'compare' => 'NOT IN',
        );
      }
      if (!isset($_GET['sold'])) {
        $query->query_vars['tax_query'][] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'slug',
        'terms'    => array('outofstock'),
        'operator' => 'NOT IN',
        );
      }


      // chequea si hay una busqueda de texto solicitada por el usuario, de haberla la pasa al query
      if (isset($_GET['filter_search']) AND $_GET['filter_search']!=''){
        $query->query_vars['s']=$_GET['filter_search'];
      }

      // $query-> set('post__in' ,$front_page_id-);
      // $query-> set('post__in' ,array( $front_page_id , [YOUR SECOND PAGE ID]  ));
      // $query-> set('orderby' ,'post__in');
      // $query-> set('p' , null);
      // $query-> set( 'page_id' ,null);

      //we remove the actions hooked on the '__after_loop' (post navigation)
      remove_all_actions ( '__after_loop');
  }
}

// REMOVES WORDPRESS URL PAGINATION
remove_action('template_redirect', 'redirect_canonical');
// PAGINATION
// bloque inspirado en el comienzo de este post:
// https://rudrastyh.com/wordpress/load-more-and-pagination.html
function misha_paginator( $first_page_url ){

	// the function works only with $wp_query that's why we must use query_posts() instead of WP_Query()
	global $wp_query;

	// remove the trailing slash if necessary
	$first_page_url = untrailingslashit( $first_page_url );


	// it is time to separate our URL from search query
	$first_page_url_exploded = array(); // set it to empty array
	$first_page_url_exploded = explode("/?", $first_page_url);
	// by default a search query is empty
	$search_query = '';
	// if the second array element exists
	if( isset( $first_page_url_exploded[1] ) ) {
		$search_query = "/?" . $first_page_url_exploded[1];
		$first_page_url = $first_page_url_exploded[0];
	}

	// get parameters from $wp_query object
	// how much posts to display per page (DO NOT SET CUSTOM VALUE HERE!!!)
	$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
	// current page
	$current_page = (int) $wp_query->query_vars['paged'];
	// the overall amount of pages
	$max_page = $wp_query->max_num_pages;

	// we don't have to display pagination or load more button in this case
	if( $max_page <= 1 ) return;

	// set the current page to 1 if not exists
	if( empty( $current_page ) || $current_page == 0) $current_page = 1;

	// you can play with this parameter - how much links to display in pagination
	$links_in_the_middle = 4;
	$links_in_the_middle_minus_1 = $links_in_the_middle-1;

	// the code below is required to display the pagination properly for large amount of pages
	// I mean 1 ... 10, 12, 13 .. 100
	// $first_link_in_the_middle is 10
	// $last_link_in_the_middle is 13
	$first_link_in_the_middle = $current_page - floor( $links_in_the_middle_minus_1/2 );
	$last_link_in_the_middle = $current_page + ceil( $links_in_the_middle_minus_1/2 );

	// some calculations with $first_link_in_the_middle and $last_link_in_the_middle
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;
	if( ( $last_link_in_the_middle - $first_link_in_the_middle ) != $links_in_the_middle_minus_1 ) { $last_link_in_the_middle = $first_link_in_the_middle + $links_in_the_middle_minus_1; }
	if( $last_link_in_the_middle > $max_page ) { $first_link_in_the_middle = $max_page - $links_in_the_middle_minus_1; $last_link_in_the_middle = (int) $max_page; }
	if( $first_link_in_the_middle <= 0 ) $first_link_in_the_middle = 1;

	// begin to generate HTML of the pagination
	$pagination = '<nav class="pagination" role="navigation">';

	// when to display "..." and the first page before it
	if ($first_link_in_the_middle >= 3 && $links_in_the_middle < $max_page) {
		$pagination.= '<a class="paginationLink" data-pagination="1">1</a>';

		if( $first_link_in_the_middle != 2 )
			$pagination .= '<span class="page-numbers extend">...</span>';
	}

	// arrow left (previous page)
	if ($current_page != 1)
		$pagination.= '<a class="paginationLink prev" data-pagination="prev">prev</a>';


	// loop page links in the middle between "..." and "..."
	for($i = $first_link_in_the_middle; $i <= $last_link_in_the_middle; $i++) {
		if($i == $current_page) {
			$pagination.= '<span class="paginationCurrent">'.$i.'</span>';
		} else {
			$pagination .= '<a class="paginationLink" data-pagination="'.$i.'">'.$i.'</a>';
		}
	}

	// arrow right (next page)
	if ($current_page != $last_link_in_the_middle )
		$pagination.= '<a class="paginationLink next" data-pagination="next">next</a>';


	// when to display "..." and the last page after it
	if ( $last_link_in_the_middle < $max_page ) {

		if( $last_link_in_the_middle != ($max_page-1) )
			$pagination .= '<span class="page-numbers extend">...</span>';

		$pagination .= '<a class="paginationLink" data-pagination="'. $max_page .'">'. $max_page .'</a>';
	}

	// end HTML
	// $pagination.= "</div></nav>\n";
	$pagination.= "</nav>\n";

	// haha, this is our load more posts link
	// if( $current_page < $max_page )
		// $pagination.= '<div id="misha_loadmore">More posts</div>';

	// replace first page before printing it
	echo str_replace(array("/page/1?", "/page/1\""), array("?", "\""), $pagination);
}


// Receive the Request post that came from AJAX
add_action( 'wp_ajax_latte_pagination', 'latte_pagination' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_latte_pagination', 'latte_pagination' );
function latte_pagination() {
	//gets the global query var object
	global $wp_query;

  if(isset($_POST['page'])){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		// var_dump($args['term']);
		unset($args->term);
		$args['term'] = null;
		$oldArgs = $args;

		// Sanitize the received page
		if($_POST['type']=='story'){$story=true;}else{$story=false;}
		$page = sanitize_text_field($_POST['page']);
		$args['paged'] = $page;
		$args['post_status'] = 'publish';

    if(!is_product_category()){
      $args['tax_query'][] = array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => array( 'parts-racing-products' ), // Don't display products in the parts-racing-products category on the shop page.
        'operator' => 'NOT IN'
      );
    }

    if(!isset($_POST['auction'])){
      $args['tax_query']['auction'] = array(
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => 'auction',
        'operator' => 'NOT IN',
      );
    } else {
      $args['tax_query']['auction'] = array(
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => 'auction',
        'operator' => 'IN',
      );
    }

    if(!isset($_POST['sold'])){
      $args['tax_query']['sold'] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'slug',
        'terms'    => array('outofstock'),
        'operator' => 'NOT IN',
      );
    } else {
      $args['tax_query']['sold'] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'slug',
        'terms'    => array('outofstock'),
        'operator' => 'IN',
      );
    }


		query_posts( $args );
		if( have_posts() ) :
			while( have_posts() ): the_post();




  			if(get_post_type()=='product'){
  				$_pf = new WC_Product_Factory();
  				$_product = $_pf->get_product(get_the_ID());
  			}

        if( $_product->is_type( 'auction' ) ){ $cardName = 'hotCard'; } else { $cardName = 'productCard'; }
  			?>


        <?php
        // get all the categories on the product
        $categories = get_the_terms( get_the_ID(), 'product_cat' );
        // if it finds sometthing
        if ($categories) {
          // for each category
          foreach ($categories as $cat) {
            // get the slug of parent cattegory
            $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A')['slug'];
            if ($parent=="year-bikes") {$yearBike = $cat->name;}
            if ($parent=="brand") {$brand = $cat->name;}
          }
        }
        ?>


        <figure class="<?php echo $cardName; ?>">
          <?php $created = strtotime( $_product->get_date_created() );
          if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
            <span class="newArrival"><i>New arrival</i></span>
          <?php } ?>
          <a class="<?php echo $cardName; ?>Img rowcol1" href="<?php echo get_permalink(); ?>">
            <img class="<?php echo $cardName; ?>Img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          </a>
          <figcaption class="<?php echo $cardName; ?>Caption">
            <!-- NEW TITLE -->
            <h4 class="<?php echo $cardName; ?>Title">
              <?php if($brand){ ?><span class="singleSideAnoMarca singleSideBrand"><?php echo $brand; ?></span><?php } ?>
              <?php the_title(); ?>
              <?php if($yearBike){ ?><span class="singleSideAnoMarca singleSideYearBike"><?php echo $yearBike; ?></span><?php } ?>
            </h4>

            <?php if($cardName=='hotCard'){ ?>
              <p class="auctionDetails">
                <?php if ($_product->auction_current_bid){ ?>
                  <span class="auctionDetailsTitle"><?php echo $_product->auction_bid_count; ?> Bids</span>
                  <span class="auctionDetailsValue">€ <?php echo number_format($_product->auction_current_bid,0,",","."); ?></span>
                <?php } else { ?>
                  <span class="auctionDetailsTitle">Starting price:</span>
                  <span class="auctionDetailsValue">€ <?php echo number_format($_product->auction_start_price,0,",","."); ?></span>
                <?php } ?>
              </p>
            <?php } ?>

            <?php if($cardName=='hotCard'){ ?>
              <p class="auctionDetails">
                <?php
                $start=new DateTime($_product->get_auction_start_time()); $now = new DateTime();
                if ( $start > $now ) { ?>
                  <span class="auctionDetailsTitle">Auction starts:</span>
                  <span class="auctionDetailsValue auction-time-countdown notMet" data-time="<?php echo esc_attr( $_product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
                <?php } else { ?>
                  <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Time left:', 'auctions-for-woocommerce' ), $_product_id ) ); ?></span>
                  <span class="auctionDetailsValue main-auction auction-time-countdown notMet" data-time="<?php echo esc_attr( $_product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $_product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
                <?php } ?>
              </p>
            <?php } ?>
          </figcaption>
        </figure>



	      <?php

			endwhile;
		endif;

		// var_dump(misha_paginator(5));
		// echo latte_pagination(5);
		echo misha_paginator(get_pagenum_link());
  }
  // Always exit to avoid further execution
  exit();
}


















add_action( 'storefront_content_top', 'storefront_shop_messages', 15 );

if ( ! function_exists( 'storefront_shop_messages' ) ) {
	/**
	 * Storefront shop messages
	 *
	 * @since   1.4.4
	 * @uses    storefront_do_shortcode
	 */
	function storefront_shop_messages() {
		if ( ! is_checkout() ) {
			echo wp_kses_post( storefront_do_shortcode( 'woocommerce_messages' ) );
		}
	}
}


function storefront_do_shortcode( $tag, array $atts = array(), $content = null ) {
 global $shortcode_tags;

 if ( ! isset( $shortcode_tags[ $tag ] ) ) {
   return false;
 }

 return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}
