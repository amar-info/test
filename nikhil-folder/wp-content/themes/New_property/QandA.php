<?php
/*
  Template Name: Q & A
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
                     
                    <div class="details_in">
                        
                   
                        <div class="qa_head">
                            <h1>QUESTIONS &amp; ANSWERS:</h1>
                        </div>

                        <?php
                        $args = array(
                           // 'orderby' => 'rand',
                            'post_type' => 'q-a',
                            'post_status' => 'publish'
                           // 'posts_per_page' => 3
                        );

                        $my_query = new WP_Query($args);
                        if ($my_query->have_posts()) {
                            while ($my_query->have_posts()) : $my_query->the_post();
                                ?>
                                <script>
                                    $(window).load(function(){
    $('#commentform<?php echo get_the_ID(); ?>').validate();
});
                                </script>    
                                <div class="questions">
                                    <h3><?php the_title(); ?></h3>
                                    <p>
                                        <?php the_content(); ?>
                                    </p>
                                </div>                                
                                <?php rest_detail_comments_list($page, get_the_ID()); 
                                
                        global $withcomments;
$withcomments=1;
                                        $content = "";
                                        $editor_id = 'comment'.  get_the_ID();
                                        ob_start();
                                        // Echo the editor to the buffer
                                       /*  $set = wp_parse_args( $settings,  array(
66	                        'wpautop'           => true,
67	                        'media_buttons'     => true,
68	                        'default_editor'    => '',
69	                        'drag_drop_upload'  => false,
70	                        'textarea_name'     => $editor_id,
71	                        'textarea_rows'     => 20,
72	                        'tabindex'          => '',
73	                        'tabfocus_elements' => ':prev,:next',
74	                        'editor_css'        => '',
75	                        'editor_class'      => '',
76	                        'teeny'             => false,
77	                        'dfw'               => false,
78	                        'tinymce'           => true,
79	                        'quicktags'         => true
80	                ) ); */
                                         $wp_editor_settings = array(
                                            'media_buttons'   => false,
                                             'tinymce'           => true,
                                             'quicktags'         => false,
                                             'teeny'             => true ,
                                             'editor_class'      => 'required comment'.  get_the_ID(),
                                             'textarea_name'     => 'comment'
                                         ); 
                                        wp_editor($content, $editor_id,$wp_editor_settings);

                                        // Store the contents of the buffer in a variable
                                        $editor_contents = ob_get_clean();

                                        // Return the content you want to the calling function

                                        $args = array(
                                            'id_form' => 'commentform'.get_the_ID(), 
                                            'id_submit' => 'red_btn',
                                            'title_reply' => __(''),
                                            'title_reply_to' => __('Leave a Reply to %s'),
                                            'cancel_reply_link' => __('Cancel Reply'),
                                            'label_submit' => __('POST COMMENT'),
                                            'comment_field' => '<p class="comment-form-comment">' .
                                            $editor_contents . '</p>',
                                            'must_log_in' => '<p class="must-log-in">' .
                                            sprintf(
                                                    __('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink()))
                                            ) . '</p>',
                                            'logged_in_as' => '',
                                            'comment_notes_before' => '',
                                            'comment_notes_after' => '',
                                            'fields' => apply_filters('comment_form_default_fields', array(
                                                'author' =>
                                                '<p class="comment-form-author">' .
                                                '<label class="label_text" for="author">' . __('Name', 'domainreference') . '</label> ' .
                                                ( @$req ? '<span class="required">*</span>' : '' ) .
                                                '<input class="input_text required" id="author" name="author" type="text" value="' . esc_attr(@$commenter['comment_author']) .
                                                '" size="30"' . @$aria_req . ' /></p>',
                                                'email' =>
                                                '<p class="comment-form-email"><label class="label_text" for="email">' . __('Email', 'domainreference') . '</label> ' .
                                                ( @$req ? '<span class="required">*</span>' : '' ) .
                                                '<input class="input_text required email" id="email" name="email" type="text" value="' . esc_attr(@$commenter['comment_author_email']) .
                                                '" size="30"' . @$aria_req . ' /></p>',
                                                'url' =>
                                                ''
                                                    )
                                            ),
                                        );                                 
                                
                                ?>
                                <div class="comment">
                                    <a href="#">Comment</a>
                                    <img src="<?php bloginfo('template_url'); ?>/images/comment.png" alt=""  />
                                </div>
                                <div class="questions_text">
                                    <?php comment_form($args); ?>

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