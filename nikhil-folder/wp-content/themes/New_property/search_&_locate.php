<?php
/*
  Template Name: search&locate
 */
?>
<?php get_header(); ?>

<?php $page_id=32; 
$normal_page_view=false; //for content  page
$data="select count(*) as total from wp_postmeta where meta_key='city_cat_name' and post_id='$page_id'"; 
$post_id=mysql_query($data);

while($post_id_fetch=mysql_fetch_array($post_id)){
   
   // print_r($post_id_fetch['total']);
    $total=$post_id_fetch['total'];
      if($total>0){
     
     get_template_part('developer');
      }
      else{
        $normal_page_view=true;  
      }
    
}
if($normal_page_view){
?>

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
                    <div class="property-details" style="margin-bottom:30px;">                        
                         <div class="details_in">
                             
                             <h1><?php echo get_post_meta( get_the_ID(), 'heading', true ); ?></h1>
                              <p>
<?php echo get_post_meta( get_the_ID(), 'sub_content', true ); ?>                              </p>
                              <p>
                                    <?php  
                                        $page_id=$_GET['page_id']; 
                                        $postport = get_post( $page_id );
                                        $content = implode(' ', explode(' ', ($postport->post_content)));
                                        echo $content;
                                    ?>
                                  </p>
                              <div class="details_in_Scrollbar Res_det_in_con content_3 content">
                                
                              </div>
                         </div>
                       
                    </div>
                     <div class="login_right">
                         <div class="login_live">
                              <ul>
                                  <?php
                                  if(is_user_logged_in()){
                                      $current_user = wp_get_current_user();
                                      ?>
                                      <li>
                                            <a href="<?php echo get_permalink(162); ?>" style="background:url(..images/top_1_new.png);" ><?php echo $current_user->display_name; ?></a>
                                      </li>
                                  
                                      <?php
                                  }
                                  else{
                                      ?>
                                      <li>
                                            <a class="login" href="#"><img src="<?php bloginfo('template_url'); ?>/images/top_1.png" alt="" /></a>
                                      </li>
                                  
                                      <?php
                                  }
?>
                                  
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/bottom_12.png" alt="" /></a>
                                  </li>
                              </ul>
                         </div>
                    </div>
<div class="add_right_ser_search">
                         <div class="search_tog">
                              <ul onclick="move_left_part()">
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/search.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/search_1.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/find.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a style="margin-left:-19px;" href="#"><img src="<?php bloginfo('template_url'); ?>/images/tog.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/google.png" alt="" /></a>
                                  </li>
                              </ul>
                         </div>
                         <div class="add_right_ser">
                              <div class="add_ri_1">
                                   <?php dynamic_sidebar( 'right-sidebar1' ); ?>
                              </div>
                              <div class="add_ri_2">
                                   <?php dynamic_sidebar( 'right-sidebar2' ); ?>
                              </div>
                              <div class="add_ri_3">
                                   <?php dynamic_sidebar( 'right-sidebar3' ); ?>
                              </div>
                         </div>
                    </div> 
                    
                      
               </div>
          </div> 
     </div>
</div>

<?php } ?>
<?php get_footer(); 
//$i=0;
//$array='yha main array aaega';
//foreach($array as $array1){
   // echo $array[$i][title];
    
   // $i++;
//}


   

?>
<script>
function move_left_part(){
   //jQuery('.property-details').toggle().css('width','545px');
   
   
      jQuery('.property-details').toggle(function() {
            jQuery('.property-details').animate({
                width: "995px"
            });
        }, function() {
            jQuery('.property-details').animate({
                width: "545px"
            });
        });
        
         $('#toggle').html("I'm working now!").toggle(function() {
            $('#toggle').animate({
                width: "300px"
            });
        }, function() {
            $('#toggle').animate({
                width: "200px"
            });
        });
}
</script>

