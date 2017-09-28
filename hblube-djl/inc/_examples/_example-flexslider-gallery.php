<?php
// Flex Slider for ACF gallery
wp_enqueue_style('flexslider.css', get_template_directory_uri() . '/css/flexslider.css', array(), '2.2.2', 'all' );
// also available as a scss file by adding //@import "plugins/flexslider";

wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js',array( 'jquery' ),'2.2.2',true );

$images = get_field('gallery_test');  // custom field name

if( $images ): ?>
    <div id="slider" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <p><?php echo $image['caption']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="carousel" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<script>
jQuery(window).load(function() {
  jQuery('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 150,
    itemMargin: 0,
    asNavFor: '#slider'
  });
   
  jQuery('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});
</script>

		
      
        