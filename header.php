
<?php
$site = '6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B';
$scrt = '6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-48436748-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-48436748-1');
  </script>

  <?php wp_head(); ?>
  <!-- TODO: rever que hace falta de aca -->

  <!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Raleway:400,700|Rubik:300,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:800i&display=swap" rel="stylesheet">
<style>
@font-face {
    font-family: 'highlandgothicflfregular';
    src: url('fonts/highlandgothicflf-webfont.woff') format('woff'),
         url('fonts/highlandgothicflf-webfont.woff2') format('woff2'),
         url('fonts/HighlandGothicFLF.ttf') format('ttf');
    font-weight: normal;
    font-style: normal;
    font-display: swap;

}
</style>
</head>

<body <?php body_class(); ?>>


  <?php $errores = array('newPassConfirm', 'wrongPass', 'alreadyExist', 'notExist', 'register', 'needsConfirmation', 'newPass'); ?>
  <div id="logErrors" class="logErrors <?php if (in_array($_GET['action'],$errores)) { echo 'alt'; } ?>">
    <?php if ( $_GET['action'] == 'wrongPass' ) { ?>
      <p>Wrong password, please try again</p>
    <?php } ?>
    <?php if ( $_GET['action'] == 'alreadyExist' ) { ?>
      <p>This email is already registered</p>
    <?php } ?>
    <?php if ( $_GET['action'] == 'notExist' ) { ?>
      <p>This email doesn't have an account</p>
    <?php } ?>
    <?php if ( $_GET['action'] == 'register' ) { ?>
      <p>Thank you for registering, click the link in the confirmation email to proceed</p>
    <?php } ?>
    <?php if ( $_GET['action'] == 'needsConfirmation' ) { ?>
      <p>You have to confirm your email before you can log in</p>
    <?php } ?>
    <?php if ( $_GET['action'] == 'newPass' ) { ?>
      <p>We sent you an email with a link to change your password</p>
    <?php } ?>
    <?php if ( $_GET['action'] == 'newPassConfirm' ) { ?>
      <p>Your password was successfully changed, you may now log in</p>
    <?php } ?>
    <button class="logFormClose" type="button" onclick="altClassFromSelector('alt','#logErrors')">
      <div class="logFormCloseLine"></div>
      <div class="logFormCloseLine"></div>
    </button>
  </div>

	<view id="load" class="load">
			<div class="circle"></div>
	</view>

  <header class="header loading" id="header">
    <a href="<?php echo site_url('');  ?>" class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="logoImg">
      <h1 class="copy">GRAND PRIX MOTORBIKES</h1>
    </a>
    <nav class="upperNav">

      <?php include 'socialSharing.php'; ?>
<!-- "mailto:someone@example.com?Subject=Hello%20again" -->
      <a href="mailto:info@gpmotorbikes.com" target="_blank" class="mail upperNavInfo">
        <svg class="upperNavIcon socialMediaLink" width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24.1667 0H2.5C1.11927 0 0 1.11927 0 2.5V17.5C0 18.8807 1.11927 20 2.5 20H24.1667C25.5474 20 26.6667 18.8807 26.6667 17.5V2.5C26.6667 1.11927 25.5474 0 24.1667 0ZM24.1667 2.5V4.62526C22.9989 5.57625 21.1371 7.055 17.1569 10.1716C16.2798 10.8616 14.5423 12.5191 13.3333 12.4998C12.1246 12.5193 10.3865 10.8613 9.50974 10.1716C5.53021 7.05547 3.66797 5.57641 2.5 4.62526V2.5H24.1667ZM2.5 17.5V7.83323C3.69344 8.7838 5.38589 10.1177 7.96552 12.1377C9.10391 13.0338 11.0975 15.012 13.3333 14.9999C15.5582 15.012 17.5265 13.0625 18.7007 12.1381C21.2803 10.1182 22.9732 8.78391 24.1667 7.83328V17.5H2.5Z" fill="currentColor"/>
        </svg>
        <p class="upperNavIconTxt">info@gpmotorbikes.com</p>
      </a>
      <a href="" class="langButton upperNavInfo">
        <svg fill="currentColor"class="upperNavIcon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <circle style="fill:#0052B4;" cx="256" cy="256" r="256"/>
        <g>
        	<polygon style="fill:#FFDA44;" points="256.001,100.174 264.29,125.683 291.11,125.683 269.411,141.448 277.7,166.957
        		256.001,151.191 234.301,166.957 242.59,141.448 220.891,125.683 247.712,125.683 	"/>
        	<polygon style="fill:#FFDA44;" points="145.814,145.814 169.714,157.99 188.679,139.026 184.482,165.516 208.381,177.693
        		181.89,181.889 177.694,208.381 165.517,184.482 139.027,188.679 157.992,169.714 	"/>
        	<polygon style="fill:#FFDA44;" points="100.175,256 125.684,247.711 125.684,220.89 141.448,242.59 166.958,234.301 151.191,256
        		166.958,277.699 141.448,269.411 125.684,291.11 125.684,264.289 	"/>
        	<polygon style="fill:#FFDA44;" points="145.814,366.186 157.991,342.286 139.027,323.321 165.518,327.519 177.693,303.62
        		181.89,330.111 208.38,334.307 184.484,346.484 188.679,372.974 169.714,354.009 	"/>
        	<polygon style="fill:#FFDA44;" points="256.001,411.826 247.711,386.317 220.891,386.317 242.591,370.552 234.301,345.045
        		256.001,360.809 277.7,345.045 269.411,370.552 291.11,386.317 264.289,386.317 	"/>
        	<polygon style="fill:#FFDA44;" points="366.187,366.186 342.288,354.01 323.322,372.975 327.519,346.483 303.622,334.307
        		330.112,330.111 334.308,303.62 346.484,327.519 372.974,323.321 354.009,342.288 	"/>
        	<polygon style="fill:#FFDA44;" points="411.826,256 386.317,264.289 386.317,291.11 370.552,269.41 345.045,277.699 360.81,256
        		345.045,234.301 370.553,242.59 386.317,220.89 386.317,247.712 	"/>
        	<polygon style="fill:#FFDA44;" points="366.187,145.814 354.01,169.714 372.975,188.679 346.483,184.481 334.308,208.38
        		330.112,181.889 303.622,177.692 327.519,165.516 323.322,139.027 342.289,157.991 	"/>
        </g>
        </svg>
        <p class="upperNavIconTxt">Europe | Spain</p>
      </a>
      <a href="" class="langButton upperNavInfo">
        <svg class="upperNavIcon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <circle style="fill:#F0F0F0;" cx="256" cy="256" r="256"/>
        <g>
        	<path style="fill:#D80027;" d="M244.87,256H512c0-23.106-3.08-45.49-8.819-66.783H244.87V256z"/>
        	<path style="fill:#D80027;" d="M244.87,122.435h229.556c-15.671-25.572-35.708-48.175-59.07-66.783H244.87V122.435z"/>
        	<path style="fill:#D80027;" d="M256,512c60.249,0,115.626-20.824,159.356-55.652H96.644C140.374,491.176,195.751,512,256,512z"/>
        	<path style="fill:#D80027;" d="M37.574,389.565h436.852c12.581-20.529,22.338-42.969,28.755-66.783H8.819
        		C15.236,346.596,24.993,369.036,37.574,389.565z"/>
        </g>
        <path style="fill:#0052B4;" d="M118.584,39.978h23.329l-21.7,15.765l8.289,25.509l-21.699-15.765L85.104,81.252l7.16-22.037
        	C73.158,75.13,56.412,93.776,42.612,114.552h7.475l-13.813,10.035c-2.152,3.59-4.216,7.237-6.194,10.938l6.596,20.301l-12.306-8.941
        	c-3.059,6.481-5.857,13.108-8.372,19.873l7.267,22.368h26.822l-21.7,15.765l8.289,25.509l-21.699-15.765l-12.998,9.444
        	C0.678,234.537,0,245.189,0,256h256c0-141.384,0-158.052,0-256C205.428,0,158.285,14.67,118.584,39.978z M128.502,230.4
        	l-21.699-15.765L85.104,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822l-21.7,15.765L128.502,230.4z
        	 M120.213,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
        	L120.213,130.317z M220.328,230.4l-21.699-15.765L176.93,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
        	l-21.7,15.765L220.328,230.4z M212.039,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822
        	l8.288-25.509l8.288,25.509h26.822L212.039,130.317z M212.039,55.743l8.289,25.509l-21.699-15.765L176.93,81.252l8.289-25.509
        	l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822L212.039,55.743z"/>
        </svg>
        <p class="upperNavIconTxt">USA</p>
      </a>




      <?php
      global $wp, $current_user;
      wp_get_current_user();
      // var_dump($current_user);
      ?>

      <?php if (is_user_logged_in()) { ?>
        <a class="logButton" href="<?php echo site_url('account'); ?>"><?php echo $current_user->display_name; ?></a>
        <a class="logButton" href="<?php echo wp_logout_url(home_url( $wp->request )); ?>">Logout</a>
      <?php } else { ?>
        <button class="logButton alt" onclick="altClassFromSelector('alt','#logForm')" type="button" name="button">Login</button>
      <?php } ?>







    </nav>
    <nav class="navBar"><?php wp_nav_menu( array( 'theme_location' => 'navBar', 'navBar' => 'new_menu_class' ) ); ?></nav>

    <nav class="mobileNav" id="mobileNav">
      <div class="navBarMobile">
        <?php wp_nav_menu( array( 'theme_location' => 'navBarMobile', 'navBarMobile' => 'new_menu_class' ) ); ?>
      </div>
      <div class="upperNavMobile">



        <a href="mailto:info@gpmotorbikes.com" class="mailMobile upperNavInfoMobile">
          <svg class="upperNavIconMobile" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
          <p class="upperNavIconTxtMobile">Write Us</p>
        </a>
        <a href="" class="langButtonMobile upperNavInfoMobile">
          <svg class="upperNavIconMobile" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <circle style="fill:#0052B4;" cx="256" cy="256" r="256"/>
          <g>
            <polygon style="fill:#FFDA44;" points="256.001,100.174 264.29,125.683 291.11,125.683 269.411,141.448 277.7,166.957
              256.001,151.191 234.301,166.957 242.59,141.448 220.891,125.683 247.712,125.683 	"/>
            <polygon style="fill:#FFDA44;" points="145.814,145.814 169.714,157.99 188.679,139.026 184.482,165.516 208.381,177.693
              181.89,181.889 177.694,208.381 165.517,184.482 139.027,188.679 157.992,169.714 	"/>
            <polygon style="fill:#FFDA44;" points="100.175,256 125.684,247.711 125.684,220.89 141.448,242.59 166.958,234.301 151.191,256
              166.958,277.699 141.448,269.411 125.684,291.11 125.684,264.289 	"/>
            <polygon style="fill:#FFDA44;" points="145.814,366.186 157.991,342.286 139.027,323.321 165.518,327.519 177.693,303.62
              181.89,330.111 208.38,334.307 184.484,346.484 188.679,372.974 169.714,354.009 	"/>
            <polygon style="fill:#FFDA44;" points="256.001,411.826 247.711,386.317 220.891,386.317 242.591,370.552 234.301,345.045
              256.001,360.809 277.7,345.045 269.411,370.552 291.11,386.317 264.289,386.317 	"/>
            <polygon style="fill:#FFDA44;" points="366.187,366.186 342.288,354.01 323.322,372.975 327.519,346.483 303.622,334.307
              330.112,330.111 334.308,303.62 346.484,327.519 372.974,323.321 354.009,342.288 	"/>
            <polygon style="fill:#FFDA44;" points="411.826,256 386.317,264.289 386.317,291.11 370.552,269.41 345.045,277.699 360.81,256
              345.045,234.301 370.553,242.59 386.317,220.89 386.317,247.712 	"/>
            <polygon style="fill:#FFDA44;" points="366.187,145.814 354.01,169.714 372.975,188.679 346.483,184.481 334.308,208.38
              330.112,181.889 303.622,177.692 327.519,165.516 323.322,139.027 342.289,157.991 	"/>
          </g>
          </svg>
          <p class="upperNavIconTxtMobile">Europe | Spain</p>
        </a>
        <a href="" class="langButtonMobile upperNavInfoMobile">
          <svg class="upperNavIconMobile" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <circle style="fill:#F0F0F0;" cx="256" cy="256" r="256"/>
          <g>
            <path style="fill:#D80027;" d="M244.87,256H512c0-23.106-3.08-45.49-8.819-66.783H244.87V256z"/>
            <path style="fill:#D80027;" d="M244.87,122.435h229.556c-15.671-25.572-35.708-48.175-59.07-66.783H244.87V122.435z"/>
            <path style="fill:#D80027;" d="M256,512c60.249,0,115.626-20.824,159.356-55.652H96.644C140.374,491.176,195.751,512,256,512z"/>
            <path style="fill:#D80027;" d="M37.574,389.565h436.852c12.581-20.529,22.338-42.969,28.755-66.783H8.819
              C15.236,346.596,24.993,369.036,37.574,389.565z"/>
          </g>
          <path style="fill:#0052B4;" d="M118.584,39.978h23.329l-21.7,15.765l8.289,25.509l-21.699-15.765L85.104,81.252l7.16-22.037
            C73.158,75.13,56.412,93.776,42.612,114.552h7.475l-13.813,10.035c-2.152,3.59-4.216,7.237-6.194,10.938l6.596,20.301l-12.306-8.941
            c-3.059,6.481-5.857,13.108-8.372,19.873l7.267,22.368h26.822l-21.7,15.765l8.289,25.509l-21.699-15.765l-12.998,9.444
            C0.678,234.537,0,245.189,0,256h256c0-141.384,0-158.052,0-256C205.428,0,158.285,14.67,118.584,39.978z M128.502,230.4
            l-21.699-15.765L85.104,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822l-21.7,15.765L128.502,230.4z
             M120.213,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
            L120.213,130.317z M220.328,230.4l-21.699-15.765L176.93,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
            l-21.7,15.765L220.328,230.4z M212.039,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822
            l8.288-25.509l8.288,25.509h26.822L212.039,130.317z M212.039,55.743l8.289,25.509l-21.699-15.765L176.93,81.252l8.289-25.509
            l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822L212.039,55.743z"/>
          </svg>
          <p class="upperNavIconTxtMobile">USA</p>
        </a>




        <?php if (is_user_logged_in()) { ?>
          <a class="logButton" href="<?php echo site_url('account'); ?>"><?php echo $current_user->display_name; ?></a>
          <a class="logButton" href="<?php echo wp_logout_url(home_url( $wp->request )); ?>">Logout</a>
        <?php } ?>

      </div>
      <?php include 'socialSharing.php'; ?>
    </nav>












  <?php if ( !is_user_logged_in() ) { ?>
    <svg class="mobileNavButton alt" onclick="altClassFromSelector('alt','#logForm')" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path fill="currentColor" d="M184 83.5l164.5 164c4.7 4.7 4.7 12.3 0 17L184 428.5c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l132-131.4H12c-6.6 0-12-5.4-12-12v-10c0-6.6 5.4-12 12-12h279.9L160 107.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.6-4.7 12.2-4.7 16.9 0zM512 400V112c0-26.5-21.5-48-48-48H332c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h132c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H332c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h132c26.5 0 48-21.5 48-48z"></path>
    </svg>
  <?php } ?>




    <svg class="mobileNavButton" onclick="altClassFromSelector('menuActive','#mobileNav')" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
      <path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z"></path>
    </svg>


  </header>


  <form class="logForm" id="newPass" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
    <input type="hidden" name="action" value="lt_login">
    <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
    <input type="hidden" name="actn" value="newPass">
    <button class="logFormClose" type="button" onclick="altClassFromSelector('alt','#newPass')">
      <div class="logFormCloseLine"></div>
      <div class="logFormCloseLine"></div>
    </button>
    <p>enter your email, we will send you a mail to change your password</p>
    <div class="mateput logFormMail" style="width: 250px;">
      <input class="mateputInput" type="email" name="mail" autocomplete="off" value="" required>
      <label for="mail" class="mateputLabel">
        <span class="mateputName">E-Mail</span>
      </label>
    </div>
          <div class="g-recaptcha" data-callback="captchaVerified" data-sitekey="<?php echo $site; ?>"></div>
          <input class="recaptcha" type="text" hidden value="">

    <button class="filterSearch" type="submit" name="button" style="width: 250px;">Confirm</button>
  </form>




      <form class="logForm" id="logForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <input type="hidden" name="action" value="lt_login">
        <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
        <input type="hidden" name="actn" id="logInterAction" value="login">

        <div class="logFormTitle">
          <h3>Enter</h3>
          <!-- <button class="logFormTitleRegister" onclick="altClassFromSelector('alt','#logFormFields'); addRequired()" type="button" name="button">you don't have an account?</button> -->
          <button class="logFormTitleRegister" onclick="loginHandler()" type="button" name="button">you don't have an account?</button>
          <button class="logFormTitleRegister" onclick="altClassFromSelector('alt','#newPass'), altClassFromSelector('alt','#logForm')" type="button" name="button">forgot your password?</button>
          <button class="logFormClose" type="button" onclick="altClassFromSelector('alt','#logForm')">
            <div class="logFormCloseLine"></div>
            <div class="logFormCloseLine"></div>
          </button>
        </div>

        <div class="logFormFields" id="logFormFields">

          <div class="mateput logFormName">
            <input class="mateputInput variableRequired" type="text" name="name" autocomplete="off" value="">
            <label for="name" class="mateputLabel">
              <span class="mateputName">Name</span>
            </label>
          </div>

          <div class="mateput logFormPhono">
            <input class="mateputInput variableRequired" type="number" name="fono" autocomplete="off" value="">
            <label for="fono" class="mateputLabel">
              <span class="mateputName">Phone</span>
            </label>
          </div>

          <div class="mateput logFormMail">
            <input class="mateputInput" type="email" name="mail" autocomplete="off" value="" required>
            <label for="mail" class="mateputLabel">
              <span class="mateputName">E-Mail</span>
            </label>
          </div>


          <div class="mateput logFormPass">
            <input class="mateputInput" type="password" name="pass" autocomplete="off" value="" required minlength="6">
            <label for="pass" class="mateputLabel">
              <span class="mateputName" >Password</span>
            </label>
          </div>

          <div class="formTermsAndConditions logCheckBox">
            <input class="variableRequired" type="checkbox">
            <a href="https://gpmotorbikes.com/terms-conditions/" target="_blank" class="linkTermAndConditionsForm">I accept terms and conditions</a>
          </div>

          <div class="g-recaptcha" data-callback="captchaVerified" data-sitekey="<?php echo $site; ?>"></div>
          <input class="recaptcha" type="text" hidden value="">
          <button class="filterSearch" type="submit" name="button">Confirm</button>
        </div>

      </form>

      <?php


      do_action( 'storefront_content_top' );

      // do_shortcode( "[shop_messages]" );



      ?>
