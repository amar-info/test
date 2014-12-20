<?php

/**
 * Markup needed for jQuery UI dialog, our form is actually loaded via AJAX
 */

?><div id="ajax-login-register-dialog" class="ajax-login-register-container" title="<?php _e('New Account Register', 'ajax_login_register'); ?>" data-security="<?php print wp_create_nonce( 'register_form' ); ?>" style="display: none;">
    <div class="My_Details">
                                      <span>My Details</span>
                                      <p>
                                         You need an Image&trade; account to access to Image&trade; functionalities and utilities
                                      </p>
                                 </div>
    
    <div id="ajax-login-register-target" class="ajax-login-register-dialog"><?php _e('Loading...','ajax_login_register'); ?></div>
</div>