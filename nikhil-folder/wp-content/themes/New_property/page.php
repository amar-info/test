
<?php get_header(); ?>

<?php $page_id=$_GET['page_id']; 
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
                    <?php  get_template_part('right_part');?>
                    
                      
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

