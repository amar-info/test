
<?php get_header(); ?>
<script>
    jQuery(document).ready(function(){
        jQuery('.menu-item-192 a').css("color","#066AB5");
        jQuery('.details_in').css("padding","75px 18px");
        
        
    });


</script>
<div class="section">
    <div class="wp-wrapper-on-div">
        <div style="margin-right:0px;" class="row">
            <div style="padding-right:0px;" class="col-md-12">
                <div class="arrow">
                    <ul>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_1.jpg" onclick="slideSwitch()" alt="" /></a></li>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_2.jpg" onclick="slideSwitch()" alt="" /></a></li>
                    </ul>
                </div>
                <div class="property-details">
                     <div class="new_menu" >
                        <input type="hidden" id="developer_list" name="developer_list">
                        <?php
                       $page_id = $_GET['p'];
                       //fetch developer_id of current page
                        $query_fetch_developer_id="select meta_value from wp_postmeta where post_id='$page_id' and meta_key='developer_name'";
                        $result_fetch_developer_id=mysql_query($query_fetch_developer_id);
                         $fetch_developer_id = mysql_fetch_array($result_fetch_developer_id);   
                        $current_developer_id=$fetch_developer_id['meta_value'];
                        
                        $query_fetch_cat_id="select meta_value from wp_postmeta where post_id='$current_developer_id' and meta_key='city_cat_name'";
                        $result_fetch_cat_id=mysql_query($query_fetch_cat_id);
                         $fetch_cat_id = mysql_fetch_array($result_fetch_cat_id);   
                      $current_cat_id=$fetch_cat_id['meta_value'];
                        // fetch category id of current page
                        
                        ?>
                        <?php /* 
$args = array(
    'type' => 'post',
    //'child_of'                 => 7,
    'parent' => 9,
    'orderby' => 'name',
    'order' => 'DESC',
    'hide_empty' => 0,
    //'hierarchical'             => 1,
    'exclude' => '',
    'include' => '',
    'number' => '',
    'taxonomy' => 'category',
    'pad_counts' => false
);

$categories = get_categories($args);

*/
?>
                                <!--<li><a  class="new_menu_active" href="<?php //echo get_category_link($category->term_id); ?>" onmouseover="call_sub_menu(<?php// echo $category->term_id; ?>)" onmouseout="remove_padding()"><?php echo $category->name; ?></a>

                                    <ul class="Developer_menu">  
                                        
                                    </ul>


                                </li>-->
                               
                            
                        
                      <!--  Future Dynamic Code STartt  -->
                             <ul>
                                 
                        <?php        $uls =  array('SHOW <br/>ALL'=>'16', 'NEW <br/>CAIRO'=>'10', 'AL AIN <br/>AL SOKHNA'=>'11','AL SHOROUK <br/>CITY'=>'12','RED <br/>SEA'=>'13','6TH OF <br/>OCTOBER'=>'14','NORTH <br/>COAST'=>'15');?>
                                   
                                
                                   
                                   
                                 
                                 
                                 
                                 <?php foreach ($uls as $category=>$id) {
  // echo '<pre>'; print_r($category); echo '</pre>';
    $cat_id=$id;
   
    
    ?> 
                                   <!--  Foreach -1 For CAtegory   -->
                                   <li><a href="#<?php //echo get_category_link($id); ?>" <?php //if($cat_id == $current_cat_id){echo 'class="new_menu_active"';} ?> ><?php echo $category; ?></a>
                                   <?php
                                   
                                         
                                        $query_fetch_post_id = "select count(*) as total_page from wp_postmeta where meta_value='$cat_id' and meta_key='city_cat_name'";
                                        
                                        
                                        $result = mysql_query($query_fetch_post_id);
                                        $row = mysql_fetch_array($result);                                        
                                        
                                        if($row['total_page'] > 0){
                                           ?> 
                                                 <ul class="Developer_menu" <?php if($cat_id == $current_cat_id){echo 'style="display:block"';} ?> >
                                            <!-- List each Page in that Category  -->
                                        <?php   
                                        
                                        $query_fetch_post_detail = "select P.post_title,P.ID,P.guid from wp_postmeta PM ,wp_posts P where PM.meta_value = '$cat_id' and PM.meta_key='city_cat_name' and PM.post_id = P.ID";                                                                                
                                       
                                        $result_post_detail = mysql_query($query_fetch_post_detail);
                                        
                                        while ($row_post_detail = mysql_fetch_array($result_post_detail)) {                                            
                                                
                                                ?>  
                                                <li><a href="#<?php// echo $row_post_detail['guid']; ?>" <?php //if($current_developer_id == $row_post_detail['ID']){echo 'class="Develop_new_menu"';} ?>  ><?php echo $row_post_detail['post_title']; ?></a>
                                                 <?php
                                                 
                                                 
                                                 $sql_check_Development_exist= "select count(*) as total_developments from wp_postmeta PM ,wp_posts P where PM.meta_value = '".$row_post_detail['ID']."' and PM.meta_key='developer_name' and PM.post_id=P.id";
                                                    $result_total_developments = mysql_query($sql_check_Development_exist);
                                                    $row_total_developments = mysql_fetch_array($result_total_developments);                                        
                                                    if($row_total_developments>0){
                                                 ?>
                                                <ul class="Development_menu" <?php if($current_developer_id == $row_post_detail['ID']){echo 'style="display:block"';} ?>>
                                                    <?php
                                                       $sql_Developments = "select P.post_title,P.ID,P.guid from wp_postmeta PM ,wp_posts P where PM.meta_value = '".$row_post_detail['ID']."' and PM.meta_key='developer_name' and PM.post_id=P.id";                                                    
                                                       $result_developments = mysql_query($sql_Developments);   
                                                        while ($row_post_development_detail = mysql_fetch_array($result_developments)) {                                                                                                   
                                                    ?>
                                                   <li><a  href="#<?php //echo $row_post_development_detail['guid']; ?>"  <?php// if($page_id == $row_post_development_detail['ID']){echo 'class="Development_new_menu"';} ?>><?php echo $row_post_development_detail['post_title']; ?></a></li>
                                                   <?php
                                                        }
                                                   ?>
                                                   
                                               </ul>
                                                    
                                                 <?php       
                                                    }                                     
                                                 ?>
                                                    
                                               
                                                        
                                                    
                                                
                                                    <!-- Using Page_id Check Metadata In post-meta for getting All post related to that page = Developer  if($count > 0){ -->
                                                    
                      
                                                    
                                                    <!--  }  -->
                                                    
                                                
                                                </li>
                                        <?php  } ?>                                                
                                           
                                       </ul>
                                               
                                               <?php  
                                        }
                                       
                                            ?>                                  
                                   
                                   </li>                                   
                                   
                                   <?php } ?>
                               </ul>
                        <!--  Future Dynamic Code End  -->
                        
                        
                    </div>

                  <div class="details_in">
                              <div class="DataSheet_head">
                                  <?php   ?>
                                   <h1><?php $postport = get_post($page_id);
                            //print_r($postport);
                            echo $postport->post_title; ?></h1>
                                   
                              </div>
                              <div style="height:208px;" class="details_in_Scrollbar Res_det_in_con content_3 content">
                                   <ul class="Data_details">
                                       <li>
                                           <div class="DataSheet_details">
                                                
                                                <div class="Development_Master_Image">
                                                    <?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail('full');
} 
?>
                                                     <div class="develop_logo_fc">
                                                         <?php
                                                         $src= get_post_meta( $page_id, 'development_details_development_logo_fc', true );   ?>
                                                           <?php if ( get_post_meta( $page_id, 'development_details_development_logo_fc', true ) ) : ?>
    <a href="<?php the_permalink() ?>" rel="bookmark">
        <img class="thumb" src="<?php echo $src[1][1]; ?>" alt="<?php the_title(); ?>" />
    </a>
<?php endif; ?>
                                                      </div> 
                                                    
                                                </div>
                                               <div class="data_logo_fc">
                                                    <?php 
                                                   if ( get_the_post_thumbnail( $current_developer_id, 'thumbnail', array( 'class' => 'alignleft' ) ) ) {
	
       echo get_the_post_thumbnail( $current_developer_id, 'thumbnail', array( 'class' => 'alignleft' ) ); 
}
else {?>
	 <img src="<?php bloginfo('template_url'); ?>/images/logo_fc.png" class="img-responsive" alt="" /> 
<?php }
                                                   
                                                   ?> 
                                                    
                                                </div> 
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                                <div style="margin-top:146px; text-align:center;" class="data_logo_fc">
                                                      <span>TOTAL AREA</span>
                                                      <strong><?php  $total_area=get_post_meta( $page_id, 'master_plan_total_area', true );
                                                      echo $total_area[1][1];
                                                      
                                                      ?></strong><br>
                                                      <p class="greenery">GREENERY </p>
                                                      <label><?php  $greenery=get_post_meta( $page_id, 'master_plan_greenery', true );
                                                      echo $greenery[1][1];
                                                      
                                                      ?></label>
                                                </div> 
                                                <p>
                                       <?php  $content = $postport->post_content;
                                        echo $content;
                                        ?>
                                  </p> 
                                                <span class="head">MASTER PLAN</span>
                                                
                                                <div class="Master_plan">
                                                   <?php  $src=get_post_meta( $page_id, 'master_plan_development_master_plan', true );   ?>
                                                           <?php if ( get_post_meta( $page_id, 'development_details_development_logo_fc', true ) ) : ?>
    <a href="<?php the_permalink() ?>" rel="bookmark">
        <img class="thumb" src="<?php echo $src[1][1]; ?>" alt="<?php the_title(); ?>" />
    </a>
<?php endif; ?>
                                                </div>
                                                </br>
                                                
                                               <p>
                                       <?php  $content = $postport->post_content;
                                        echo $content;
                                        ?>
                                  </p> 
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                                <div style="margin-top:33px; text-align:center;" class="data_logo_fc">
                                                      <span>UNIT AREA</span>
                                                      <strong><?php $floor_plans_unit_area=get_post_meta( $page_id, 'floor_plans_unit_area', true );
                                                      echo $floor_plans_unit_area[1][1];
                                                      ?></strong>
                                                      <p>GARDEN</p>
                                                      <label><?php $floor_plans_garden=get_post_meta( $page_id, 'floor_plans_gardern', true ); 
                                                      
                                                       echo $floor_plans_garden[1][1];
                                                      ?></label>
                                                      
                                                      <span class="land_area">T. LAND AREA</span>
                                                      <label><?php $floor_total_land_area=get_post_meta( $page_id, 'floor_plans_total_land_area', true ); 
                                                      
                                                       echo $floor_total_land_area[1][1];
                                                      ?></label>
                                                      
                                                </div> 
                                               
                                                <span class="head">FLOOR PLANS</span>
                                                <div class="UNIT_AREA">
                                                     <ul>
                                                         <?php 
                                                                           $total_floor_area=get_post_meta( $page_id, 'total_floor_area', true );
                                                                           $count=count($total_floor_area);
                                                                           for($i=0; $i<$count; $i++){?>
                                                         <li>
                                                             <div class="floor_pan">
                                                                  <div class="floor_pan_img">
                                                                       <?php $floor_plan_images=get_post_meta( $page_id, 'file', true );
                                                                              
                                                                              
                                                                              ?>
                                                                     <img  src="<?php echo site_url(); ?>/wp-content/uploads/2014/11/<?php echo $floor_plan_images[$i]; ?>" alt="floor plan image" />
                                                                  </div> 
                                                                  <div class="floor_pan_detail">
                                                                       <ul>
                                                                           
                                                                          <li>
                                                                              <p>TOTAL FLOOR AREA:</p>
                                                                              <span><?php  
                                                                             echo $total_floor_area[$i];
                                                                              
                                                                              ?></span>
                                                                          </li>
                                                                          <li>
                                                                              <p>TOTAL LAND AREA:</p>
                                                                              <span> <?php $total_land_area=get_post_meta( $page_id, 'total_land_area', true );
                                                                              echo $total_land_area[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                          <li>
                                                                              <p>MASTER BEDROOM:</p>
                                                                             <span> <?php $master_bedroom=get_post_meta( $page_id, 'master_bedroom', true );
                                                                              echo $master_bedroom[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                          <li>
                                                                              <p>BEDROOMS:</p>
                                                                             <span> <?php $bedrooms=get_post_meta( $page_id, 'bedrooms', true );
                                                                              echo $bedrooms[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                          <li>
                                                                              <p>BATHROOMS:</p>
                                                                             <span> <?php $bathrooms=get_post_meta( $page_id, 'bathrooms', true );
                                                                              echo $bathrooms[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                        
                                                                       </ul>
                                                                  </div>
                                                             </div>
                                                         </li>
                                                           <?php } ?>
                                                        
                                                         
                                                       
                                                     </ul>
                                                </div>
                                           </div>
                                       </li>
                                   </ul>
                              </div>
                         </div>

                </div>
                <?php get_template_part('right_part'); ?>


            </div>
        </div> 
    </div>
    <script type="text/javascript">
        
             
             function setCookie(cname, cvalue, exdays) {
             
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
            }
            return "";
        }
        function call_sub_menu(obj){
            jQuery("#cat_id").val(obj);
            var idvalue = jQuery("#cat_id").val();
            //alert(idvalue);
            document.cookie="name=" +idvalue;    
                         
            var id=obj;
            jQuery('.details_in').animate({paddingTop: '+=80px'}, 0);
            var objParams = {
                url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=call_sub_menu_ajax",
                method: "post",
                data: {
                    id: id
                },
                success: function(response) {
                    jQuery('.Developer_menu').html(response);
                       
                }
            };
            jQuery.ajax(objParams);
         
        }
        function remove_padding(){
            jQuery('.details_in').css({"padding":"20px 18px"});
        }
            
        function get_development(ibid , object)
        {
            jQuery('.details_in').animate({paddingTop: '+=80px'}, 0);
            var developer_id=ibid;
            var objParams = {
                url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=call_development_ajax",
                method: "post",
                data: {
                    developer_id: developer_id
                },
                success: function(response) {
                       
                    jQuery(object).parent("li").append("<ul id='Development_menu' class='Development_menu' >"+response+"</ul>");
                }
            };
            jQuery.ajax(objParams);
        }
            
        function get_out_development()
        {
            jQuery('.details_in').animate({paddingTop: '-=60px'}, 0);
        }
        function padding_development(){
            //jQuery('.details_in').css({"padding":"100px 18px"});
            jQuery('.details_in').animate({paddingTop: '+=80px'}, 0);
        }
        function get_out_padding_development(){
            jQuery('.details_in').css({"padding":"45px 18px"});
            // alert('fuzwerh');
        }
            
            
    </script>

    <?php get_footer(); ?>