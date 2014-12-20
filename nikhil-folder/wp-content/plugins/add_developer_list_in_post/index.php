<?php
/* Plugin Name: developer list 
 
 * 
 */
 

add_action( 'admin_menu', 'register_my_custom_meta' );


function register_my_custom_meta(){
    
    //add_menu_page('$page_title','$menu_title','$capability','menu_slug','$function');
    
     
     add_meta_box(
			'myplugin_id',
			__( 'Select developer', 'myplugin_text' ),
			'developer_listing',
			'Development'
		);
}

function developer_listing()
{?>

<script>
     var site_url = '<?php echo site_url(); ?>';  
     var current_post_id = '<?php echo get_the_ID(); ?>';  
     
function save_developer()
{
    var developer_page = jQuery('#developer_page_id').val();
    
    if(developer_page != 'select')
        {
            var objParams = {
                                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=fetch_developer_ajax",
                                method: "post",
                                data: {
                                    developer_page: developer_page,
                                    current_post_id:current_post_id
                                },
                                success: function(response) {
                                   // jQuery('.rest_news_check').html(response);
                                  
                                }
                            };
                            jQuery.ajax(objParams);
        }
    
}

</script>
<?php $get_developer_name = get_post_meta(get_the_ID() , 'developer_name' , true );
//echo $get_developer_name;
?>
<form method="post">
    
    <select name="developer" id="developer_page_id" onChange="save_developer()">
        <option value="select_developer">---Select Developer---</option>
         <?php   
         
             $query = "select * from wp_postmeta where meta_key='city_cat_name'";
             $sql=  mysql_query($query);
    
    while ($row = mysql_fetch_array($sql)) {
        $cat_page_id=array();
        $cat_page_id[] = $row['post_id'];
       foreach ($cat_page_id as $id)
       {
            $query2 = "select * from wp_posts where ID ='$id'";
            $sql2 = mysql_query($query2);
            while($row = mysql_fetch_array($sql2))
            { 
                if($get_developer_name != "")
                {?>
                    <option <?php if($get_developer_name == $row['ID'] ) { echo 'selected = "selected"'; } ?> value=" <?php echo $row['ID']; ?>"> <?php echo $row['post_title']; ?></option>;
               <?php }  else {?>
                     <option value="<?php echo $row['ID']; ?>" >    <?php echo $row['post_title'];?> </option>
                <?php }
              //echo $row['post_title']; ?>
              
          <?php }
         }
      }
    
    
    ?>
        </select>
</form>
     
<?php }

 function fetch_developer_ajax()
 {
  $developer_page_id = $_POST['developer_page'];
  $current_post_id=$_POST['current_post_id'];
  update_post_meta($current_post_id,'developer_name',$developer_page_id);
  die(0);
     
 }
 add_action("wp_ajax_nopriv_fetch_developer_ajax", "fetch_developer_ajax");
add_action("wp_ajax_fetch_developer_ajax", "fetch_developer_ajax");
   
?>