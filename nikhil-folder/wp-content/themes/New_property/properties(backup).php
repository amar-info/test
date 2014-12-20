<?php
/*
  Template Name: Properties
 */
?>
<?php get_header(); ?>
<script>
    jQuery(document).ready(function(){
        jQuery('.menu-item-192 a').css("color","#066AB5");
         jQuery('.details_in').css("padding","63px 13px");
      
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
                         <div class="new_menu_se">
                              <ul>
                                  <li><a href="#">Developer1</a></li>
                                  <li><a href="#">Developer2</a></li>
                                  <li><a class="Develop_new_menu" href="#">Developer3</a></li>
                                  <li><a href="#">Developer4</a></li>
                                  <li><a href="#">Developer5</a></li>
                                  <li><a href="#">Developer6</a></li>
                              </ul>
                         </div>
                         <div class="new_menu_th">
                              <ul>
                                  <li><a class="Development_new_menu" href="#">Development1</a></li>
                                  <li><a href="#">Development2</a></li>
                                  <li><a href="#">Development3</a></li>
                              </ul>
                         </div>
                    </div>
                <div class="property-details" style="margin-bottom:30px;">
                    <div class="new_menu" >
                        <input type="hidden" id="developer_list" name="developer_list">
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
$cat_id_url=10;
*/
?>
                                <!--<li><a  class="new_menu_active" href="<?php //echo get_category_link($category->term_id); ?>" onmouseover="call_sub_menu(<?php// echo $category->term_id; ?>)" onmouseout="remove_padding()"><?php echo $category->name; ?></a>

                                    <ul class="Developer_menu">  
                                        
                                    </ul>


                                </li>-->
                               
                            
                        
                      <!--  Future Dynamic Code STartt  -->
                             <ul>
                                 
                        <?php   $cat_id_url=16;      $uls =  array('SHOW <br/>ALL'=>'16', 'NEW <br/>CAIRO'=>'10', 'AL AIN <br/>AL SOKHNA'=>'11','AL SHOROUK <br/>CITY'=>'12','RED <br/>SEA'=>'13','6TH OF <br/>OCTOBER'=>'14','NORTH <br/>COAST'=>'15');?>
                                   
                                
                                   
                                   
                                 
                                 
                                 
                                 <?php foreach ($uls as $category=>$id) {
  // echo '<pre>'; print_r($category); echo '</pre>';
    $cat_id=$id;
   
    
    ?> 
                                   <!--  Foreach -1 For CAtegory   -->
                                   <li><a href="#"  onclick="call_sub_menu(<?php echo $id// echo $category->term_id; ?>,this),call_content_category(<?php echo $id; ?>)" <?php if($cat_id == $cat_id_url){echo 'class="new_menu_active"';} ?> ><?php echo $category; ?></a>
                                   <?php
                                       /*
                                        $query_fetch_post_id = "select count(*) as total_page from wp_postmeta where meta_value='$cat_id' and meta_key='city_cat_name'";
                                        
                                        
                                        $result = mysql_query($query_fetch_post_id);
                                        $row = mysql_fetch_array($result);                                        
                                        
                                        if($row['total_page'] > 0){
                                         */  ?> 
                                                 <ul class="Developer_menu"  >
                                                     
                                                     
                                                     
                                                     
                                                 </ul>
                                                     
                                            <!-- List each Page in that Category  -->
                                        <?php   
                                        /*
                                        $query_fetch_post_detail = "select P.post_title,P.ID,P.guid from wp_postmeta PM ,wp_posts P where PM.meta_value = '$cat_id' and PM.meta_key='city_cat_name' and PM.post_id = P.ID";                                                                                
                                       
                                        $result_post_detail = mysql_query($query_fetch_post_detail);
                                        
                                        while ($row_post_detail = mysql_fetch_array($result_post_detail)) {                                            
                                                
                                                ?>  
                                                <li><a href="#<?php //echo $row_post_detail['guid']; ?>"     ><?php echo $row_post_detail['post_title']; ?></a>
                                                 <?php
                                                 
                                                 
                                                 $sql_check_Development_exist= "select count(*) as total_developments from wp_postmeta PM ,wp_posts P where PM.meta_value = '".$row_post_detail['ID']."' and PM.meta_key='developer_name' and PM.post_id=P.id";
                                                    $result_total_developments = mysql_query($sql_check_Development_exist);
                                                    $row_total_developments = mysql_fetch_array($result_total_developments);                                        
                                                    if($row_total_developments>0){
                                                 ?>
                                               
                                                    <?php
                                                    //   $sql_Developments = "select P.post_title,P.ID,P.guid from wp_postmeta PM ,wp_posts P where PM.meta_value = '".$row_post_detail['ID']."' and PM.meta_key='developer_name' and PM.post_id=P.id";                                                    
                                                    //   $result_developments = mysql_query($sql_Developments);   
                                                     //   while ($row_post_development_detail = mysql_fetch_array($result_developments)) {                                                                                                   
                                                 /*   ?>
                                                   <li><a  href="<?php echo $row_post_development_detail['guid']; ?>"><?php echo $row_post_development_detail['post_title']; ?></a></li>
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
                                       
                                         */   ?>                                  
                                   
                                   </li>                                   
                                   
                                   <?php } ?>
                               </ul>
                        <!--  Future Dynamic Code End  -->
                        
                        
                    </div>

                    <div class="details_in">
                        
                        </div>

                    </div>
                    <?php get_template_part('right_part'); ?>


                </div>
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
            function call_sub_menu(obj,e){
                jQuery('.new_menu a').removeClass("new_menu_active");
                 jQuery(e).addClass("new_menu_active");
              
                jQuery(".Developer_menu").css("display","block");
                jQuery("#cat_id").val(obj);
                var idvalue = jQuery("#cat_id").val();
                //alert(idvalue);
                document.cookie="name=" +idvalue;    
                         
                var id=obj;
               // jQuery('.details_in').animate({paddingTop: '+=80px'}, 0);
                var objParams = {
                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=call_sub_menu_ajax",
                    method: "post",
                    data: {
                        id: id
                    },
                    success: function(response) {
                       
                        //jQuery(e).parent("li").append("<ul id='Developer_menu' class='Developer_menu' >"+response+"</ul>");
                     jQuery('.Developer_menu').html(response);
                       
                    }
                };
                jQuery.ajax(objParams);
         
            }
            function remove_padding(){
               // jQuery('.details_in').css({"padding":"35px 18px"});
            }
            
            function get_development(ibid , object)
            {       
                 jQuery(".Development_menu").css("display","block");
                 jQuery(object).addClass("Develop_new_menu");
                 
                     
               // jQuery('.details_in').animate({paddingTop: '+=80px'}, 0);
                var developer_id=ibid;
                var objParams = {
                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=call_development_ajax",
                    method: "post",
                    data: {
                        developer_id: developer_id
                    },
                    success: function(response) {
                       
                      //  jQuery(object).parent(".Developer_menu li").append("<ul id='Development_menu' class='Development_menu' >"+response+"</ul>");
                       jQuery('.Development_menu').html(response);
                    }
                };
                jQuery.ajax(objParams);
            }
            
            function get_out_development()
            {
               // jQuery('.details_in').animate({paddingTop: '-=60px'}, 0);
            }
            function padding_development(){
                //jQuery('.details_in').css({"padding":"100px 18px"});
               // jQuery('.details_in').animate({paddingTop: '+=80px'}, 0);
            }
            function get_out_padding_development(){
              //  jQuery('.details_in').css({"padding":"45px 18px"});
                // alert('fuzwerh');
            }
            function call_content_category(id){
                
                  jQuery(".Development_menu").css("display","none");
                var objParams = {
                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=call_content_ajax",
                    method: "post",
                    data: {
                        cat_id: id
                    },
                    success: function(response) {
                  //     alert(response);
                       
                       jQuery('.details_in').html(response);
                    }
                };
                jQuery.ajax(objParams);
                
            } 
            function call_content_developer(id){
         
            
            var objParams = {
                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=call_content_developer_ajax",
                    method: "post",
                    data: {
                        developer_id: id
                    },
                    success: function(response) {
                  //     alert(response);
                       
                       jQuery('.details_in').html(response);
                    }
                };
                jQuery.ajax(objParams);
            }
            function call_content_development(id,developer_id,e){
            
            jQuery(e).addClass("Development_new_menu");
             var objParams = {
                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=call_content_development_ajax",
                    method: "post",
                    data: {
                        development_id: id,
                        developer_id:developer_id
                    },
                    success: function(response) {
                  //     alert(response);
                       
                       jQuery('.details_in').html(response);
                    }
                };
                jQuery.ajax(objParams);
            }
            
        </script>

        <?php get_footer(); ?>









<?php
/* 
 * 
 * 
 * 
 * <!--  Future Dynamic Code STartt  -->
                             <ul>
                                   <!--  Foreach -1 For CAtegory   -->
                                   <li><a href="#">SHOW <br/>ALL</a></li>
                                   
                                   <li>
                                       <!-- Find All Subpages in that Category By using cat_id   -->
                                   	   <a class="new_menu_active" href="#">NEW <br/>CAIRO</a>
                                           
                                           <!-- if($data > 0){  -->
                                           
                                       <ul class="Developer_menu">
                                            <!-- List each Page in that Category  -->
                                           <li><a href="#">Developer1</a></li>
                                           <li><a href="#">Developer2</a></li>
                                           <li>
                                               <a class="Develop_new_menu" href="#">Developer3</a>
                                               <!-- Using Page_id Check Metadata In post-meta for getting All post related to that page = Developer  if($count > 0){ -->
                                               <ul class="Development_menu">
                                                   <li><a class="Development_new_menu" href="#">Development1</a></li>
                                                   <li><a href="#">Development2</a></li>
                                                   <li><a href="#">Development3</a></li>
                                               </ul>
                                               <!--  }  -->
                                           </li>
                                           <li><a href="#">Developer4</a></li>
                                           <li><a href="#">Developer5</a></li>
                                           <li><a href="#">Developer6</a></li>
                                       </ul>
                                           <!--  }   -->
                                   </li>
                                   
                               </ul>
                        <!--  Future Dynamic Code End  -->
 * <ul>
                                   <li><a href="#">SHOW <br/>ALL</a></li>
                                   
                                   <li>
                                   	   <a class="new_menu_active" href="#">NEW <br/>CAIRO</a>
                                       <ul class="Developer_menu">
                                           <li><a href="#">Developer1</a></li>
                                           <li><a href="#">Developer2</a></li>
                                           <li>
                                           	   <a class="Develop_new_menu" href="#">Developer3</a>
                                               <ul class="Development_menu">
                                                   <li><a class="Development_new_menu" href="#">Development1</a></li>
                                                   <li><a href="#">Development2</a></li>
                                                   <li><a href="#">Development3</a></li>
                                               </ul>
                                           </li>
                                           <li><a href="#">Developer4</a></li>
                                           <li><a href="#">Developer5</a></li>
                                           <li><a href="#">Developer6</a></li>
                                       </ul>
                                   </li>
                                   
                                   <li><a href="#">AL AIN <br/>AL SOKHNA</a></li>
                                   <li><a href="#">AL SHOROUK <br/>CITY</a></li>
                                   <li><a href="#">RED <br/>SEA</a></li>
                                   <li><a href="#">6TH OF <br/>OCTOBER</a></li>
                                   <li><a href="#">NORTH <br/>COAST</a></li>
                                   
                                   
                               </ul>
                        
 * 
 */

?>