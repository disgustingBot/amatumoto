<?php get_header(); ?>


<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <p>THE</p>
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>



<main class="theGarageSection">



  <?php while(have_posts()){the_post();the_content();} ?>


</main>

<article class="banner0">

  <?php
  $args = array(
    'post_type'=>'banner',
    'posts_per_page'=> 1,
  );
  $banners=new WP_Query($args); $i=0;
  while($banners->have_posts()){$banners->the_post();?>
    <?php $background1 = get_post_meta( get_the_id(), 'background1' )[0]; ?>
    <?php if($background1){ ?>
      <img class="banner0Img banner0Img1" src="<?php echo $background1; ?>" alt="">
    <?php } ?>
    <?php $link1 = get_post_meta( get_the_id(), 'link1' )[0]; ?>
      <a href="<?php echo $link1; ?>" class="banner0Link1"></a>
    <div class="banner0FigCap1 banner0FigCap">
      <?php $bannerTxt1 = get_post_meta( get_the_id(), 'txt1' )[0]; ?>
      <?php if($bannerTxt1){ ?>
        <p class="banner0Txt banner0FigCap"><?php echo $bannerTxt1; ?></p>
      <?php } ?>
      <?php $bannerTxt2 = get_post_meta( get_the_id(), 'txt2' )[0]; ?>
      <?php if($bannerTxt2){ ?>
        <p class="banner0Txt banner0FigCap"><?php echo $bannerTxt2; ?></p>
      <?php } ?>
    </div>


    <?php $background2 = get_post_meta( get_the_id(), 'background2' )[0]; ?>
    <?php if($background2){ ?>
      <img class="banner0Img banner0Img2" src="<?php echo $background2; ?>" alt="">
    <?php } ?>
    <?php $link2 = get_post_meta( get_the_id(), 'link2' )[0]; ?>
    <?php if($link2){ ?>
      <a href="<?php echo $link2; ?>" class="banner0Link2"></a>
    <?php } ?>
    <?php $bannerTxt3 = get_post_meta( get_the_id(), 'txt3' )[0]; ?>
    <?php if($bannerTxt3){ ?>
      <p class="banner0FigCap2 banner0FigCap"><?php echo $bannerTxt3; ?></p>
    <?php } ?>

    <?php $floatingImg = get_post_meta( get_the_id(), 'floatingImg' )[0]; ?>
    <?php if($floatingImg){ ?>
      <img class="banner0FloatingImg" src="<?php echo $floatingImg; ?>" alt="">
    <?php } ?>
  <?php } ?>
</article>

<?php get_footer(); ?>
