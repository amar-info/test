<div class="footer">
    <div class="black-row">
        <div class="col-md-6">
            <ul class="social">

                <?php
                $defaults = array(
                    'theme_location' => '',
                    'menu' => 'social_footer',
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'menu',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '%3$s',
                    'depth' => 0,
                    'walker' => ''
                );

                wp_nav_menu($defaults);
                ?>




            </ul>
        </div>
        <div class="col-md-6">
            <ul class="footer_menu">
                <?php
                $defaults = array(
                    'theme_location' => '',
                    'menu' => 'footer_right',
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'menu',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '%3$s',
                    'depth' => 0,
                    'walker' => ''
                );

                wp_nav_menu($defaults);
                ?>
            </ul>
        </div>
    </div>
    <div class="blue">
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

<div id="slideshow">
   <img src="<?php bloginfo('template_url'); ?>/images/01.jpg" alt="" class="active" />
    <img src="<?php bloginfo('template_url'); ?>/images/02.jpg" alt="" />
    <img src="<?php bloginfo('template_url'); ?>/images/03.jpg" alt="" />
    <img src="<?php bloginfo('template_url'); ?>/images/04.jpg" alt="" />
    <img src="<?php bloginfo('template_url'); ?>/images/05.jpg" alt="" />
    <img src="<?php bloginfo('template_url'); ?>/images/06.jpg" alt="" />

</div> 
<?php wp_footer(); ?>
</body>

</html>
