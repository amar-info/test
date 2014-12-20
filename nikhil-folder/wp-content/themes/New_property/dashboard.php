<?php
/*
  Template Name: Dashboard
 */

get_header(); ?>

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
                
                <!-------------->
                
               <div id="sidebar-wrapper">
		<div id="sidebar-in-bg">
			<?php get_template_part('dashboard_sidebar'); ?>
            <div class="sidebar-right">
                 <div class="side-head">
                      <h1>My Properties</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                          <div class="heading">
                               <ul>
                                  <li>
                                     <span class="heading_span">Show</span>
                                     <select class="Show">
                                         <option>10</option>
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                     </select>
                                     <label>entries</label>
                                  </li>
                                  <li>
                                    <span class="Show">Search</span>
                                    <input type="text" name="txt_name name" class="heading_search_box" />
                                    <a href="#">
                                    	<img src="<?php bloginfo('template_url') ?>/images/search-on.png" alt=""  />
                                    </a>
                                  </li>
                               </ul>
                          </div>
                          <div class="table_content">
                            <table cellpadding="0" cellspacing="0">
                                <colgroup>
                                   <col width="50%" />
                                   <col width="50%" />
                                </colgroup>
                                <tr>
                                    <th>From<a href="#"><img src="<?php bloginfo('template_url') ?>/images/do-up.png" alt="" /></a></th>
                                    <th>Date<a href="#"><img src="<?php bloginfo('template_url') ?>/images/do-up.png" alt="" /></a></th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center; color:#b1d0e7;"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2" style="text-align:center; color:#b1d0e7;">No data available in table</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center; color:#b1d0e7;"></td>
                                </tr>
                            </table>
                        </div>
                          <div class="pagination">
                              <span>Showing 0 to 0 of 0 entries</span>
                              <div class="pagination_link">
                                  <ul>
                                     <li>
                                        <a href="#">
                                            Next
                                        </a>
                                     </li>
                                     <li>
                                        <a href="#">
                                            First
                                        </a>  
                                     </li>
                                     <li>
                                        <a href="#">
                                            Previous 
                                        </a>
                                     </li>
                                     <li>
                                        <a href="#">
                                            Last
                                        </a>
                                     </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                 </div>
            </div>
		</div>
	</div>
                
                <!--------->
                
                
                <?php get_template_part('right_part'); ?>
            </div>
        </div> 
    </div>
</div>
<?php get_footer(); ?>
