 <?php
/**
 * Plugin Name: City_category
 
 */

add_action( 'admin_menu', 'register_my_custom_menu_page' );


function register_my_custom_menu_page(){
    
    //add_menu_page('$page_title','$menu_title','$capability','menu_slug','$function');
    
     
     add_meta_box(
'myplugin_sectionid',
__( 'Select City for Developer', 'myplugin_textdomain') ,
'City_listing',
'page'
);
}

function City_listing()
{
  //  $page_id=get_the_ID();
    ?>

<script>
     var site_url = '<?php echo site_url(); ?>';  
     var id = '<?php echo get_the_ID(); ?>';  
   function save_city()
   {
      // alert('obj'); 
   	var cty_cat = jQuery('#city_cat').val();
       // alert(cty_cat);
   	if(cty_cat != 'select')
                {
                var objParams = {
                                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=fetch_city_ajax",
                                method: "post",
                                data: {
                                    city: cty_cat,
                                    id:id
                                },
                                success: function(response) {
                                   // jQuery('.rest_news_check').html(response);
                                  
                                }
                            };
                            jQuery.ajax(objParams);
                 }
              
 	}
    
    
    </script>

<form method="post">
City : <select name="city_category" id="city_cat" onChange="save_city()">  
    <option value="select">---Select City---</option>
<?php   $args = array(
'type'                     => 'post',
//'child_of'                 => 7,
'parent'                   => 9,
'orderby'                  => 'name',
'order'                    => 'ASC',
'hide_empty'               => 0,
//'hierarchical'             => 1,
'exclude'                  => '',
'include'                  => '',
'number'                   => '',
'taxonomy'                 => 'category',
'pad_counts'               => false 

); 
  
$categories = get_categories( $args) ;
//print_r($categories);exit;
foreach ( $categories as $category ) {
    ?> <option value="<?php echo  $category->term_id; ?>" >    <?php echo $category->name;?> </option>
        <?php
}
?></select>

</form>
    

  <?php 
   

    
}
    
function fetch_city_ajax()
{
   // echo 'city';
    $city=$_POST['city'];
   // echo $city;
    

 $page_id=$_POST['id'];;
     
     update_post_meta($page_id,'city_cat_name',$city);
     die(0);
}
add_action("wp_ajax_nopriv_fetch_city_ajax", "fetch_city_ajax");
add_action("wp_ajax_fetch_city_ajax", "fetch_city_ajax");
         ?>
