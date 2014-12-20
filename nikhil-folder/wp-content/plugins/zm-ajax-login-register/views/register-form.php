 <?php

/**
 * This is the template for our register form. It should contain as less logic as possible
 */

?>

<script>
$(document).ready(function(){
    $( ".ui-dialog" ).addClass( "added_register" );
    
    
});
</script>
<!-- Register Modal -->
<?php if ( get_option('users_can_register') ) : ?>
    <div class="ajax-login-register-register-container">
        <?php if ( is_user_logged_in() ) : ?>
            <p><?php printf('%s <a href="%s" title="%s">%s</a>', __('You are already registered','ajax_login_register'), wp_logout_url( site_url() ), __('Logout', 'ajax_login_register'), __('Logout', 'ajax_login_register') ); ?></p>
        <?php else : ?>
            <form action="javascript://" name="registerform" class="ajax-login-default-form-container register_form <?php print get_option('ajax_login_register_default_style'); ?>">

                <?php if ( get_option('ajax_login_register_facebook') ) : ?>
                    <div class="fb-login-container">
                        <a href="#" class="fb-login"><img src="<?php print plugin_dir_url( dirname( __FILE__ ) ); ?>assets/images/fb-login-button.png" /></a>
                    </div>
                <?php endif; ?>

                <div class="form-wrapper register form">
                    <ul><li><?php
                    wp_nonce_field( 'facebook-nonce', 'facebook_security' );
                    wp_nonce_field( 'register_submit', 'security' );
                    ?>
                    <div class="ajax-login-register-status-container">
                        <div class="ajax-login-register-msg-target"></div>
                    </div>
                    
                    <div class="noon first"><input type="text" required name="login" class="user_login login_txtbox" placeholder="First Name*"/></div>
                    <div class="noon first"><input type="text" required name="lastname" placeholder="Lastname*" class="user_lastname login_txtbox" /></div>
                    <div class="noon gender"><input type="text" placeholder="Gender*" required name="gender" class="user_gender login_txtbox" /></div>
</li><li>
                    <div class="noon email"><input type="text" required name="email" placeholder="Email*" class="user_email ajax-login-register-validate-email login_txtbox" /></div>
                    <div class="noon language_ip"><input type="password" required name="password" placeholder="Password*" class="user_password login_txtbox" /></div>
</li><li>
                    <div class="noon email"><input type="text" required name="language" placeholder="Username*" class="user_gender login_txtbox" /></div>
                    <div class="noon language_ip"><input type="password" placeholder="Retype Password*" required name="confirm_password" class="user_confirm_password login_txtbox" /></div>
</li><li> 
                    <div class="noon email"><input type="text" required name="country" placeholder="Country" class="user_gender login_txtbox" /></div>

                        <?php do_action( 'zm_ajax_login_register_below_email_field' ); ?>

                   <div class="noon noon1 password language_ip"><input type="text" required name="city" placeholder="City/Province" class="user_gender login_txtbox" /></div></li>
                  <li>   <div class="noon noon1 email"><input type="text" required name="phone" placeholder="Phone" class="user_gender login_txtbox" /></div>
</li>
<li>  <div class="noon noon1 "><!--<a href="#" class="already-registered-handle"><?php// echo apply_filters( 'ajax_login_register_already_registered_text', __('Already registered?','ajax_login_register') ); ?></a>-->
    <div class="remember_me">
                                          <input type="checkbox"><label>I have read and I accept the <a href="#" style="color:#F58B23;">Privacy Policy.</a></label>
                                     </div>
    </div>
                    <div class="button-container noon1">
                        <input class="register_button green" type="submit" value="<?php _e('Register >>','ajax_login_register'); ?>" accesskey="p" name="register"  />
                    </div> </li>
                </div>
            </form>
        <?php endif; ?>
    </div>
<?php else : ?>
    <p><?php _e('Registration is currently closed.','ajax_login_register'); ?></p>
<?php endif; ?>
<!-- End 'modal' -->