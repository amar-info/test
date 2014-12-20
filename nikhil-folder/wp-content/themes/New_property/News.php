<?php
/*
Template Name: news
*/

?>

<?php get_header(); ?>
<div class="section">
    <div class="wp-wrapper-on-div">
        <div style="margin-right:0px;" class="row">
            <div style="padding-right:0px;" class="col-md-12">
                <div class="arrow">
                    <ul>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_1.jpg" alt="" /></a></li>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_2.jpg" alt="" /></a></li>
                    </ul>
                </div>
                <div class="property-details">
                    <div id="sidebar-wrapper">
                        <div class="qa_head">
                            <h1>News</h1>
                        </div>

                        <?php
                        $args = array(
                            'orderby' => 'rand',
                            'post_type' => 'news',
                            'post_status' => 'publish',
                            'posts_per_page' => 3
                        );

                        $my_query = new WP_Query($args);
                        if ($my_query->have_posts()) {
                            while ($my_query->have_posts()) : $my_query->the_post();
                                ?>                              
                                <div class="questions">
                                    <h3><?php the_title(); ?></h3>
                                    <p>
                                        <?php the_content(); ?>
                                    </p>
                                </div>       
                                <?php
                            endwhile;
                        }
                        wp_reset_query();
                        ?>
                    </div>
                </div>
                <?php get_template_part('right_part'); ?>
            </div>
        </div> 
    </div>
</div>
<?php get_footer(); ?>