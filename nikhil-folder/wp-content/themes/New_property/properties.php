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
     jQuery('.Master_plan').hide();
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
                
               
                <div class="property-details" style="margin-bottom:30px;">
                    <div class="new_menu">
                               <ul>
<?php   $cat_id_url=16;      $uls =  array('SHOW <br/>ALL'=>'16', 'NEW <br/>CAIRO'=>'10', 'AL AIN <br/>AL SOKHNA'=>'11','AL SHOROUK <br/>CITY'=>'12','RED <br/>SEA'=>'13','6TH OF <br/>OCTOBER'=>'14','NORTH <br/>COAST'=>'15');?>
                                 <?php 
                                
                                 
                                 foreach ($uls as $category=>$id) { 
                                  
                                     
    $cat_id=$id; 
    ?>  <li><a  onclick="call_sub_menu(<?php echo $id;?>,this);call_content_category(<?php echo $id; ?>)" href="javascript: void(0)" <?php if($cat_id == $cat_id_url){echo 'class="new_menu_active"';} ?> ><?php echo $category; ?></a>
                 <?php } ?>                  
                               </ul>
                         </div>
                         <div class="new_menu_se">
                              <ul>
                                 
                              </ul>
                         </div>
                         <div class="new_menu_th">
                              <ul>
                                 
                              </ul>
                         </div>
                    <div class="details_in" >
                      <div class="show_all_block">
                                <div class="col-md-2">
                                  
                                </div>
                                <div class="col-md-12">
<?php $img=array('fam_cairo.jpeg' => '10' , 'fam_sokhnaa.jpeg'=>'11','fam_shorouk.jpeg'=>'12','fam_red_sea.jpeg'=>'13','fam_6th.jpeg'=>'14','fam_north.jpeg'=>'15'); ?>
                                    <ul> <?php
                                    
 foreach ($img as $fam_cat=>$id) {
                                  
                                     
   
    ?>  <li><a  onclick="call_sub_menu(<?php echo $id;?>,this),call_content_category(<?php echo $id; ?>)" href="javascript: void(0)" ><img src="<?php bloginfo("template_url"); ?>/images/<?php echo $fam_cat; ?>" alt="<?php echo $fam_cat; ?>" /></a>
    <?php if($id==10){
        ?><label style="margin-left:39px !important"><?php echo 'NEW  CAIRO'; ?></label><?php
    }else if($id==11){
         ?><label style="margin-left:46px !important"><?php echo 'AL AIN </br> AL SOKHNA'; ?></label><?php
    }
    else if($id==12){
         ?><label style="margin-left:46px !important"><?php echo 'AL SHOROUK </br> CITY'; ?></label><?php
    }else if($id==13){file:///opt/lampp/htdocs/imagereality/wp-content/themes/New_property/css/style.css

         ?><label style="margin-left:51px !important"><?php echo 'RED SEA'; ?></label><?php
    }else if($id==14){
         ?><label style="margin-left:56px !important"><?php echo '6TH OF </br> OCTOBER'; ?></label><?php
    }else if($id==15){
         ?><label style="margin-left:39px !important"><?php echo 'NORTH  COAST'; ?></label><?php
    }
    ?>
    </li><?php } ?>
    
       

    </ul>
                                    <?php
                                    
?>
                                
          
                                    </div>
                                </div>

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
            
            function call_sub_menu(obj,tese){
               
              jQuery('.new_menu a').removeClass("new_menu_active");
                 jQuery(tese).addClass("new_menu_active");
              
                jQuery(".new_menu_se").css("display","block");
                  jQuery(".new_menu_th").css("display","none");
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
                     jQuery('.new_menu_se ul').html(response);
                    
                     



                       
                    }
                };
                jQuery.ajax(objParams);
         
            }
            function remove_padding(){
               // jQuery('.details_in').css({"padding":"35px 18px"});
            }
            
            function get_development(ibid , object)
            {       
                 jQuery(".new_menu_th").css("display","block");
                
                 jQuery('.new_menu_se ul li a').removeClass("Develop_new_menu");
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
                       jQuery('.new_menu_th ul').html(response);
                    }
                };
                jQuery.ajax(objParams);
            }
            
            function get_out_development()
            {map-canvas
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
             
                 
                  
              //  event.preventDefault();
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
                       if(id==10){
                       initialize(30.051571700000000000,31.479730000000017000);
                            }
                           else if(id==11){
                                         initialize(24.207500000000000000,55.744722200000070000);
                                    }else if(id==12){
                                         initialize(30.144211500000000000,31.639718399999992000); 
                                       
                                      
                                    }else if(id==13){
                                         initialize(25.5336,33.4383); 
                                        
                                    }else if(id==14){
                                         initialize(29.938126000000000000,30.913980000000038000); 
                                       
                                    }else if(id==15){
                                        initialize(-31.576409100000000000,152.638352400000030000); 
                                       
                                    } 
                    }
                };
                jQuery.ajax(objParams);
                //initialize();
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
            jQuery('.new_menu_th ul li a').removeClass("Development_new_menu");
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
            function show_master_plan(){
            
             jQuery('.Master_plan').toggle();
             jQuery('.data_logo_fc_master').toggle();
             
            // jQuery('.Master_plan').css({"opacity":"0","display":"block"}).show().animate({opacity:1});
         
           //  jQuery('.data_logo_fc_master').css({"opacity":"0","display":"block"}).show().animate({opacity:1});
            }
            
            function show_floor_plans(){
                jQuery('.UNIT_AREA').toggle();
               jQuery('.data_logo_fc_floor_plans').toggle();
             
            }
    function show_features(){}
 function show_gallery(){}
  function show_units(){}
  function show_map_location(){}
  function show_contact_details(){}
//var saveWidget;

var map;
//var saveWidget;

 </script>
     <script type="text/javascript">
            // Enable the visual refresh
          google.maps.visualRefresh = true;

            var map;
            function initialize(lat,lng) {
                var mapOptions = {
                    zoom: 10,
                    center: new google.maps.LatLng(lat, lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('Development_Master_Image123'),
                mapOptions);
                
                
                // first marker
                var latlng1 = new google.maps.LatLng(lat, lng);
                var marker1 = new google.maps.Marker({
                    map: map,
                    position: latlng1
                });
              //  var infowindow1 = new google.maps.InfoWindow();
               // infowindow1.setContent('<table border=0 cellpadding=0 cellspacing=0 ><tr><td colspan=2><b>Aline Templeton in Grantown on Spey </b></td></tr><tr><td>2nd Floor Megha Complex Near <br />Bankof Baroda Opp. SP Colony Naranpura <br />PanchavatiSociety Gulbai Tekra ,<br />ahmedabad,</br>gujarat,</br>India,</br>ZIP - 380014</td><td><img src="http://mywebsitedemo.biz/magento/TommiesGuide/media/AS_Newsevents/evil-for-evil-fin-th-100x150.jpg" style="padding: 5px 0px 0px 5px;" width="100" height="100" alt="Aline Templeton in Grantown on Spey" /></td></tr></table>');
                google.maps.event.addListener(marker1, 'click', function() {
                   // infowindow1.open(map, marker1);
                });
                
                

            }

          //  google.maps.event.addDomListener(window, 'load', initialize);
        </script>   
   
        <?php get_footer(); ?>









