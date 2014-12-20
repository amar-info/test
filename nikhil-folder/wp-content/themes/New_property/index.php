<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Property-Landing Page</title>
<link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url'); ?>/css/flexslider.css" rel="stylesheet" type="text/css" />

<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
	
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider();
		});
	</script>

</head>

<body>


<div id="landing-container">
    
    <div class="landing_page_logo_in">
        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/Logo Vector with sloganPath.png" class="img-responsive" alt="landing-logo"/></a>
    </div>
        
	<div class="flexslider">
        <ul class="slides">
            <li>
                <a href="<?php echo get_permalink( 36 ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/inacup_donut.jpg" /></a>
                <p class="flex-caption"><img src="<?php bloginfo('template_url'); ?>/images/demo-logo-1.jpg" alt="" /></p>
            </li>
            <li>
                <a href="<?php echo get_permalink( 36 ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/inacup_pumpkin.jpg" /></a>
                <p class="flex-caption"><img src="<?php bloginfo('template_url'); ?>/images/demo-logo-2.jpg" alt="" /></p>
            </li>
            <li>
                <a href="<?php echo get_permalink( 36 ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/inacup_samoa.jpg" /></a>
                <p class="flex-caption"><img src="<?php bloginfo('template_url'); ?>/images/demo-logo-1.jpg" alt="" /></p>
            </li>
            <li>
                <a href="<?php echo get_permalink( 36 ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/banner-4.jpg" /></a>
                <p class="flex-caption"><img src="<?php bloginfo('template_url'); ?>/images/demo-logo-2.jpg" alt="" /></p>
            </li>
            <li>
                <a href="<?php echo get_permalink( 36 ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/02.jpg" /></a>
                <p class="flex-caption"><img src="<?php bloginfo('template_url'); ?>/images/demo-logo-1.jpg" alt="" /></p>
            </li>
        </ul>
    </div>
    
    <div class="footer landing-footer">
         <div style="height:47px;" class="black-row"></div>
         <div class="copyright">
             <div class="row">
                    <div class="col-lg-6">
                         <div class="Reserved">
                               <p>IMAGE<sup>™</sup> Real Estate Consultancy  2014 © All Rights Reserved </p>
                         </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="add">
                             <ul>
                                 <li>
                                     <p>Design &amp; Development</p>
                                 </li>
                                 <li>
                                     <a href="#">www.aermdesignstudios.com</a>
                                 </li>
                             </ul>
                        </div>
                    </div>
             </div>
         </div>
    </div>
    
</div>

</body>
</html>
