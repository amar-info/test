<?php
/*
  Template Name: messages
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Messages').addClass("selected");
jQuery('.selected').click();



});
</script>

  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>




    <div class="section">
    <div class="wp-wrapper-on-div">
        <div style="margin-right:0px;" class="row">
            <div style="padding-right:0px;" class="col-md-12">
                <div class="arrow">
                    <ul>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/<?php bloginfo('template_url') ?>/images/arrow_1.jpg" alt="" /></a></li>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/<?php bloginfo('template_url') ?>/images/arrow_2.jpg" alt="" /></a></li>
                    </ul>
                </div>
	<div id="sidebar-wrapper">
		<div id="sidebar-in-bg">
			<?php get_template_part('dashboard_sidebar'); ?>
            <div class="sidebar-right">
                 <div class="side-head">
                      <h1>MY MESSAGES</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                         
                          <div class="table_content" style="background: none;">
                             <img src="<?php bloginfo('template_url');?>/images/search-on.png" alt="" /> 
                          <table id="example" class="display"  cellpadding="0" cellspacing="0">
                                <colgroup>
                                   <col width="50%" />
                                   <col width="50%" />
                                   <col width="20%" />
                                   <col width="20%" />
                                   <col width="20%" />
                                   
                                </colgroup>
                                <thead>
                                <tr class="alerts">
                                    <th>From<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Date<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                   
                                    
                                </tr>
                                </thead>
                                <tbody>
                                
       
                                    <tr><td style="text-align:center !important; color:#b1d0e7 !important;"><span><a href="<?php ?>" style="color:#06428A !important;"><?php  ?></a></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php  ?></span></td>
                                


                     </tr>       

                        
   
                         </tbody> </table>
                        </div>
                          
                      </div>
                 </div>
            </div>
		</div>
	</div>
 <?php get_template_part('right_part');  ?>
            </div>
        </div> 
    </div>
</div>
<?php get_footer(); ?>

