<?php
get_template_part('qaWalker');
function rest_detail_comments_list($page, $post_id) {
    $per_page = 4;
    $rest_total_menus = count(get_comments("post_id=$post_id&orderby=id&order=DESC&status=approve"));
    $args = array(
        'walker' => new Walker_Comment_list(),
        'max_depth' => '',
        'style' => 'li',
        'callback' => null,
        'end-callback' => null,
        'type' => 'all',
        'reply_text' => 'Reply',
        'page' => $page,
        'per_page' => $per_page,
        'avatar_size' => 70,
        'reverse_top_level' => null,
        'reverse_children' => '',
        'format' => 'html5', //or xhtml if no HTML5 theme support
        'short_ping' => false // @since 3.6
    );

    $c = get_comments("post_id=$post_id&orderby=id&order=DESC&status=approve");
    ?>
    <ul class="review-list">
        <?php
        wp_list_comments($args, $c);
        ?>
    </ul>
    <div class="page_info">
        <?php
        $paged = $page;
        $perPage = $per_page;
        $ajaxFunction = 'rest_detail_review_paging';
        //ai_paging($paged, $rest_total_menus, $ajaxFunction, $perPage);
        ?>
    </div>
    <?php
}

function city_names(){
    ?>
     <div class="new_menu">
        <ul>
            <li><a href="#">SHOW <br/>ALL</a></li>
            <li><a class="new_menu_active" href="#">NEW <br/>CAIRO</a></li>
            <li><a href="#">AL AIN <br/>AL SOKHNA</a></li>
            <li><a href="#">AL SHOROUK <br/>CITY</a></li>
            <li><a href="#">RED <br/>SEA</a></li>
            <li><a href="#">6TH OF <br/>OCTOBER</a></li>
            <li><a href="#">NORTH <br/>COAST</a></li>
        </ul>
     </div>
    <?php
}
?>