<?php
/* Plugin Name: floor plan
 
 * 
 */
 

add_action( "admin_menu", "register_my_floor_plan_details" );


function register_my_floor_plan_details(){
    
    //add_menu_page("$page_title","$menu_title","$capability","menu_slug","$function");
    
     
     add_meta_box(
			"myplugin_sectionid",
			__( "Floor Plan Details", "myplugin_textdomain" ),
			"floor_plan_form",
			"Development"
		);
}
function floor_plan_form(){
    
    ?>
<script>
 /*    var site_url = "<?php //echo site_url(); ?>";  
     var current_post_id = "<?php //echo get_the_ID(); ?>";  
     
function add_floor_plans()
{
    var total_floor_area = jQuery("#total_floor_area").val();
    var total_land_area = jQuery("#total_land_area").val();
    var garden = jQuery("#garden").val();
    var master_bedroom = jQuery("#master_bedroom").val();
    var bedrooms = jQuery("#bedrooms").val();
    var bathrooms = jQuery("#bathrooms").val();
    var image = jQuery("#file").val();
    
    
    
   
        
            var objParams = {
                                    url: "<?php //echo site_url(); ?>/wp-admin/admin-ajax.php?action=add_floor_plans",
                                method: "post",
                                data: {
                                    developer_page: developer_page,
                                    current_post_id:current_post_id
                                },
                                success: function(response) {
                                   // jQuery(".rest_news_check").html(response);
                                  
                                }
                            };
                            jQuery.ajax(objParams);
        
    
}
*/
</script>
<script>
    var rowNum = 0;
function add(){
    
   jQuery( ".floor_plan_div" ).append('<table  id="table1'+rowNum+'" class="table1"><tr><td>Total floor Area: </td><td><input type="text" name="total_floor_area[]" id="total_floor_area'+rowNum+'" ></td></tr><tr><td>Total land Area:</td><td> <input type="text" name="total_land_area[]" id="total_land_area'+rowNum+'" ></td></tr><tr><td>Garden: </td><td><input type="text" name="garden[]" id="garden'+rowNum+'" ></td></tr> <tr><td>Master bedroom: </td><td><input type="text" name="master_bedroom[]" id="master_bedroom'+rowNum+'" ></td></tr><tr><td>Bedrooms: </td><td><input type="text" name="bedrooms[]" id="bedrooms'+rowNum+'" ></td></tr><tr><td>Bathrooms: </td><td><input type="text" name="bathrooms[]" id="bathrooms'+rowNum+'"  ></td></tr><tr><td>floor plan image : </td><td><input type="file" name="file[]" id="file'+rowNum+'"></td></tr><tr><td><input type="button"  onclick="removeRow('+rowNum+')" value="Remove" class="button button-primary button-large"></td></tr><input type="hidden" id="image'+rowNum+'" name="image[]"  ></table><br>'); 
  rowNum ++;
  
}
function removeRow(rnum) {
jQuery('#table1'+rnum).remove();
}



</script>
<div class="floor_plan_div">
   
    <?php 
   $post_id =$_GET['post'];
 $total_floor_area = get_post_meta($post_id, 'total_floor_area', true); 
 $total_land_area = get_post_meta($post_id, 'total_land_area', true); 
 $garden = get_post_meta($post_id, 'garden', true);
 $master_bedroom = get_post_meta($post_id, 'master_bedroom', true); 
 $bedrooms = get_post_meta($post_id, 'bedrooms', true); 
 $bathrooms = get_post_meta($post_id, 'bathrooms', true); 
 $file = get_post_meta($post_id, 'file', true); 
 
 // echo $total_floor_area[$i];
 
  //print_r($rest_ename);
 $arrlength=count($total_floor_area);
  for($i=0;$i<$arrlength;$i++){
  ?>
    
   <table class="table<?php echo $i; ?>">
       <tr><td>Total floor Area: </td><td><input type="text" name="total_floor_area[]" id="total_floor_area" value="<?php echo $total_floor_area[$i]; ?>"></td></tr>
       <tr><td>Total land Area:</td><td> <input type="text" name="total_land_area[]" id="total_land_area" value="<?php echo $total_land_area[$i]; ?>"></td></tr>
       <tr><td>Garden: </td><td><input type="text" name="garden[]" id="garden" value="<?php echo $garden[$i]; ?>"></td></tr>
       <tr><td>Master bedroom: </td><td><input type="text" name="master_bedroom[]" id="master_bedroom" value="<?php echo $master_bedroom[$i]; ?>"></td></tr>
       <tr><td>Bedrooms: </td><td><input type="text" name="bedrooms[]" id="bedrooms" value="<?php echo $bedrooms[$i]; ?>"></td></tr>
       <tr><td>Bathrooms: </td><td><input type="text" name="bathrooms[]" id="bathrooms"  value="<?php echo $bathrooms[$i]; ?>"></td></tr>
       <tr><td>floor plan image : </td><td><input type="file" name="file[]" id="file" ></td></tr>
       
       <tr> <?php if(!$file[$i]==''){ ?><td> <img src="<?php echo site_url(); ?>/wp-content/uploads/imagereality_images/floor_plans/<?php echo $file[$i]; ?>" id="image_div<?php echo $i; ?>" width="250" height="70"/></td><td><input type="button" onclick="delete_image(<?php echo $i; ?>,<?php echo $post_id; ?>)" value="Delete Image" style="float:left;" class="button button-primary button-large">
               <img id="image<?php echo $i; ?>" src="images/spinner.gif" style="padding-top: 4px; display:none; float: left;"></td>
       <?php  } ?>
       </tr>
        
       <tr><td> <input type="button"  onclick="delet(<?php echo $i; ?>,<?php echo $post_id; ?>)" value="Delete Floor Plan" style="float:left;" class="button button-primary button-large"><img id="img<?php echo $i; ?>" src="images/spinner.gif" style="padding-top: 4px; display:none; float: left;"></td></tr>
       
       <input type="hidden" id="image" name="image[]" value="<?php echo $file[$i]; ?>" >
       </table><br>
   <?php } ?>
       
    </div>
<div class="floor_add_remove">

    
    <input type="button"  onclick="add()" value="Add" class="button button-primary button-large">
    
   
    

    </div>
<?php
//--------------------------------------------------for delete floor plan---------------------------------------------------------------------------------------
  //  echo $_POST['floor_plan_form'];
?>
    <script>function delet(i,id){
    // alert(i);
    jQuery("#img"+i).css("display","block");
    jQuery(".table"+i).css("display","none");
   var total_f_a= <?php echo json_encode($total_floor_area); ?>;
  var total_l_a= <?php echo json_encode($total_land_area); ?>;
   var garden =<?php echo json_encode($garden); ?>;
    var master_bedroom =<?php echo json_encode($master_bedroom); ?>;
     var bedrooms =<?php echo json_encode($bedrooms); ?>;
    var bathrooms= <?php echo json_encode($bathrooms); ?>;
    var file = <?php echo json_encode($file); ?>;
    //alert(file);
    var objParams = {
                                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=delete_floor_plan_data",
                                method: "post",
                                data: {
                                    id:id,
                                    i:i,
                                    total_f_a: total_f_a,
                                    total_l_a:total_l_a,
                                     garden:garden,
                                      master_bedroom:master_bedroom,
                                       bedrooms:bedrooms,
                                        bathrooms:bathrooms,
                                         file:file
                                },
                                success: function() {
                                   // jQuery('.rest_news_check').html(response);
                                  jQuery('#img'+i).css("display","none");
                                }
                            };
                            jQuery.ajax(objParams);
     
     
     
}


function delete_image(i,id) {
 var file = <?php echo json_encode($file); ?>;
 jQuery("#image_div"+i).css("display","none");
   jQuery("#image"+i).css("display","block");
 var objParams = {
                                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=delete_image_only",
                                method: "post",
                                data: {i:i,id:id,file:file},
                                success: function() {
                                   // jQuery('.rest_news_check').html(response);
                                //  jQuery('#img'+i).css("display","none");
                                   jQuery("#image"+i).css("display","none");
                                }
                            };
                            jQuery.ajax(objParams);
     
}


</script>

    <?php


}


