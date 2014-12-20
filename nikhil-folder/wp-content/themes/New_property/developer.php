

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
                       $page_id = $_GET['page_id'];
                        $query_fetch_pageid="select meta_value from wp_postmeta where post_id='$page_id' and meta_key='city_cat_name'";
                        $result_fetch_pageid=mysql_query($query_fetch_pageid);
                         $fetch_pageid = mysql_fetch_array($result_fetch_pageid);   
                        $meta_id=$fetch_pageid['meta_value'];
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
                                   <li><a href="<?php echo get_category_link($id); ?>" <?php if($cat_id == $meta_id){echo 'class="new_menu_active"';} ?> ><?php echo $category; ?></a>
                                   <?php
                                  
                                         
                                        $query_fetch_post_id = "select count(*) as total_page from wp_postmeta where meta_value='$cat_id' and meta_key='city_cat_name'";
                                        
                                        
                                        $result = mysql_query($query_fetch_post_id);
                                        $row = mysql_fetch_array($result);                                        
                                        
                                        if($row['total_page'] > 0){
                                           ?> 
                                                 <ul class="Developer_menu" <?php if($cat_id == $meta_id){echo 'style="display:block"';} ?> >
                                            <!-- List each Page in that Category  -->
                                        <?php   
                                        
                                        $query_fetch_post_detail = "select P.post_title,P.ID,P.guid from wp_postmeta PM ,wp_posts P where PM.meta_value = '$cat_id' and PM.meta_key='city_cat_name' and PM.post_id = P.ID";                                                                                
                                       
                                        $result_post_detail = mysql_query($query_fetch_post_detail);
                                        
                                        while ($row_post_detail = mysql_fetch_array($result_post_detail)) {                                            
                                                
                                                ?>  
                                                <li><a href="<?php echo $row_post_detail['guid']; ?>" <?php if($page_id == $row_post_detail['ID']){echo 'class="Develop_new_menu"';} ?>  ><?php echo $row_post_detail['post_title']; ?></a>
                                                 <?php
                                                 
                                                 
                                                 $sql_check_Development_exist= "select count(*) as total_developments from wp_postmeta PM ,wp_posts P where PM.meta_value = '".$row_post_detail['ID']."' and PM.meta_key='developer_name' and PM.post_id=P.id";
                                                    $result_total_developments = mysql_query($sql_check_Development_exist);
                                                    $row_total_developments = mysql_fetch_array($result_total_developments);                                        
                                                    if($row_total_developments>0){
                                                 ?>
                                                <ul class="Development_menu" <?php if($page_id == $row_post_detail['ID']){echo 'style="display:block"';} ?>>
                                                    <?php
                                                       $sql_Developments = "select P.post_title,P.ID,P.guid from wp_postmeta PM ,wp_posts P where PM.meta_value = '".$row_post_detail['ID']."' and PM.meta_key='developer_name' and PM.post_id=P.id";                                                    
                                                       $result_developments = mysql_query($sql_Developments);   
                                                        while ($row_post_development_detail = mysql_fetch_array($result_developments)) {                                                                                                   
                                                    ?>
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
                                       
                                            ?>                                  
                                   
                                   </li>                                   
                                   
                                   <?php } ?>
                               </ul>
                        <!--  Future Dynamic Code End  -->
                        
                        
                    </div>

                    <div class="details_in">
                        <h1><?php
                            
                            $postport = get_post($page_id);
                            //print_r($postport);
                            echo $postport->post_title;
                            ?>
                        </h1>
                        <div style="height:208px;" class="details_in_Scrollbar Res_det_in_con content_3 content">
                            <ul class="Data_details">
                                <li>
                                    <div class="DataSheet_details">

                                        <div class="Development_Master_Image">
<?php
$corporate_image=get_post_meta( $page_id, 'developerlogo_developer_corporate_image', true ); ?>
        <img src="<?php echo $corporate_image[1][1]; ?>" alt="<?php the_title(); ?>" width="750px" height="200px"/>

                                        </div>

                                    </div>
                                </li>

                            </ul>
                            <div class="developer_logo_content">
                                
                                    <div class="col-md-3"> 
                                        <div class="developer_logo">
                                            <p><?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail();
} 
?></p>
                                        </div>
                                    </div>
                                <div class="col-md-9">
                                    <div class="developer_content">
                                          <p> <?php  $content = $postport->post_content;
                                        echo $content;
                                        ?></p>
                                        </div>
                                </div>
                                
                                


                            </div>

                            <div class="development_block">
                                <div class="col-md-3">
                                    <h2>DEVELOPMENTS:</h2>
                                </div>
                                <div class="col-md-9">
                                    <ul>

                                        <?php
                                        
                                         $query_developer="select * from wp_postmeta where meta_value='$page_id'";
    $result_developer=mysql_query($query_developer);
    while( $row_developer=mysql_fetch_array($result_developer)){
        $development_id=$row_developer['post_id'];
          $query_development = "select post_title,ID from wp_posts where ID='$development_id'"; 
          $result_development=mysql_query($query_development);
            while($fetch_development_title = mysql_fetch_array($result_development)){ 
                //print_r($fetch_development_title);
                 $value= $fetch_development_title['post_title'];
               $id=$fetch_development_title['ID'];
                
            }

            ?>   <li><a  href="<?php echo site_url(); ?>/?page_id=<?php echo $id; ?>" ><?php echo get_the_post_thumbnail( $id , array(100,130));  ?></a></li><?php
          
                

      
    }
    
                                        
                                        ?>

                                    </ul>
                                </div>
                            </div>

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









