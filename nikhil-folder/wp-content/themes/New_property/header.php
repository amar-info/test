<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Property-home</title>
<link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/css/menu.css" rel="stylesheet" type="text/css" />

<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery.mCustomScrollbar.css" rel="stylesheet" />

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.2.6.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scroll.js" type="text/javascript"> </script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.mCustomScrollbar.js" type="text/javascript"></script>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js?ver=3.9.2" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/customProperty.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/map.js" type="text/javascript"></script>
 
 <link href="<?php bloginfo('template_url'); ?>/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />  
<!-- <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>-->
   <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> 
   
   


<script type="text/javascript">
function slideSwitch() {
    var $active = jQuery('#slideshow IMG.active');
    //alert($active);
   // jQuery(' #slideshow img .active').show();
    //jQuery(' #slideshow img').show();
    if ( $active.length == 0 ) $active = jQuery('#slideshow IMG:last');
    
	var $next =  $active.next().length ? $active.next()
        : jQuery('#slideshow IMG:first');
	$active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

jQuery(function() {
    setInterval( "slideSwitch()", 10000 );
});

</script>


<?php wp_head(); ?>
</head>

<body>
 
<div class="header">
    <div class="wp-wrapper-on-div">
         <div style="margin-right:0px;" class="row">
              <div class="col-md-12">
                   <div class="language">
                        <ul>
                            <li>
                                <a href="#"><span>ENGLISH</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/Arabic_Language.png" alt="" /></a>
                            </li>
                        </ul>
                   </div>
              </div>
              <div style="padding-right:0px;" class="col-md-12">
                   <div class="logo">
                        <a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/Logo Vector with sloganPath.png" class="img-responsive" alt="logo" /></a>
                   </div>
                   <div class="property_add">
                         <?php dynamic_sidebar( 'top-sidebar' ); ?>
                   </div>
                   <div class="menu">
                        <ul>
                            <?php //width: 545px;
                                        
$defaults = array(
	'theme_location'  => '',
	'menu'            => 'menu',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '%3$s',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );

?>
                        </ul>
                   </div>
              </div>
         </div>
    </div>
</div>