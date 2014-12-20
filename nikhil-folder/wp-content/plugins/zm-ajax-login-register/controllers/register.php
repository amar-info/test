<?php

/**
 * This is file is responsible for custom logic needed by all templates. NO
 * admin code should be placed in this file.
 */
Class ajax_login_register_Register Extends AjaxLogin {

    /**
     * Run the following methods when this class is loaded
     */
    public function __construct() {
        add_action('init', array(&$this, 'init'));
        add_action('wp_footer', array(&$this, 'footer'));

        parent::__construct();
    }

    /**
     * During WordPress' init load various methods.
     */
    public function init() {
        add_action('wp_ajax_nopriv_register_submit', array(&$this, 'register_submit'));
        add_action('wp_ajax_register_submit', array(&$this, 'register_submit'));

        add_shortcode('ajax_register', array(&$this, 'register_shortcode'));
    }

    /**
     * Any additional code to be ran during wp_footer
     *
     * If the user is not logged in we display the hidden jQuery UI dialog containers
     */
    public function footer() {
        load_template(plugin_dir_path(dirname(__FILE__)) . 'views/register-dialog.php');
    }

    /**
     * Registers a new user, checks if the user email or name is
     * already in use.
     *
     * @uses check_ajax_referer() http://codex.wordpress.org/Function_Reference/check_ajax_referer
     * @uses get_user_by_email() http://codex.wordpress.org/Function_Reference/get_user_by_email
     * @uses get_user_by() http://codex.wordpress.org/Function_Reference/get_user_by
     * @uses wp_create_user() http://codex.wordpress.org/Function_Reference/wp_create_user
     *
     * @param $login
     * @param $password
     * @param $email
     * @param $is_ajax
     */
    public function register_submit($login=null,$lastname=null,$gender=null,$language=null,$country=null,$city=null,$phone=null, 
            $password = null, $email = null, $is_ajax = true) {

        if ($is_ajax)
            check_ajax_referer('register_submit', 'security');

        // TODO consider using wp_generate_password( $length=12, $include_standard_special_chars=false );
        // and wp_mail the users password asking to change it.
        $user = array(
            'login'    => empty( $_POST['login'] ) ? $login : sanitize_text_field( $_POST['login'] ),
             'email' => empty($_POST['email']) ? $email : sanitize_text_field($_POST['email']),
            'password' => empty($_POST['password']) ? $password :($_POST['password']),
            
            'lastname' => empty($_POST['lastname']) ? $lastname : sanitize_text_field($_POST['lastname']),
            'gender' => empty($_POST['gender']) ? $gender : sanitize_text_field($_POST['gender']),
            'language' => empty($_POST['language']) ? $language : sanitize_text_field($_POST['language']),
            'country' => empty($_POST['country']) ? $country : sanitize_text_field($_POST['country']),
            'city' => empty($_POST['city']) ? $city : sanitize_text_field($_POST['city']),
            'phone' => empty($_POST['phone']) ? $phone : sanitize_text_field($_POST['phone']),
           'fb_id' => empty($_POST['fb_id']) ? false : sanitize_text_field($_POST['fb_id'])
        );

       $valid['email'] = $this->validate_email($user['email'], false);
         $valid['username'] = $this->validate_username( $user['email'], false );
        $user_id = null;
    
        if ($valid['username']['code'] == 'error') {
            $msg = $this->status('invalid_username'); // invalid user
        } else if ($valid['email']['code'] == 'error') {
            $msg = $this->status('invalid_username'); // invalid user
        } else {

         $user_id = wp_create_user($user['email'], $user['lastname'], $user['gender'], $user['language'], $user['country'], $user['city'], $user['phone'], $user['email'], $user['password']);



 //$querystr = "UPDATE wp_users set user_pass =md5(".$user['password'].") where ID=$user_id";
    

  mysql_query($querystr);
// print_r($pageposts);
 
 
          
            do_action('zm_ajax_login_after_successfull_registration', $user_id);
//print_r($user_id);
if (!is_wp_error($user_id)) {
    
    


               update_user_meta($user_id, 'show_admin_bar_front', 'false');
              update_user_meta($user_id, 'fb_id', $user['fb_id']);
               update_user_meta($user_id, 'first_name', $user['login']);
               update_user_meta($user_id, 'last_name', $user['lastname']);
                update_user_meta($user_id, 'gender', $user['gender']);
               update_user_meta($user_id, 'username', $user['language']);
                update_user_meta($user_id, 'country', $user['country']);
                update_user_meta($user_id, 'city', $user['city']);
                 update_user_meta($user_id, 'phone', $user['phone']); 
               
                 
                

               if (is_multisite()) {
                  $this->multisite_setup($user_id);
                }
//echo $user['password'];
                    
               wp_update_user(array('ID' => $user_id, 'role' => 'individual','user_login' => $user['email'], 'user_pass' => $user['password'],'user_email'=> $user['email'],'display_name'=>$user['login'],'remember' => true), false);
               
               // $wp_signon = wp_signon(array( 'user_login' => $user['login'], 'user_password' => $user['password'], 'user_email'=> $user['email'] ,'remember' => true), false);
               
                $msg = $this->status('success_registration'); // success
                 if($msg=='success_login') {?>
 <script>
 window.location.href = 'http://192.168.1.77/imagereality/?page_id=295';
 </script>
 <?php
}
            } else {
                $msg = $this->status('invalid_firstname'); // invalid user
            }
        }

        if ($is_ajax) {
            wp_send_json($msg);
        } else {
            return $msg;
        }
    }

    /**
     * Load the login shortcode
     */
    public function register_shortcode() {
        ob_start();
        load_template(plugin_dir_path(dirname(__FILE__)) . 'views/register-form.php');
        return ob_get_clean();
    }

    public function multisite_setup($user_id = null) {
        return add_user_to_blog(get_current_blog_id(), $user_id, 'subscriber');
    }

    // Create Facebook User
    //
    public function create_facebook_user($user = array()) {

        $user['user_pass'] = wp_generate_password();
        $user['user_registered'] = date('Y-m-d H:i:s');
        $user['role'] = "subscriber";

        $user_id = wp_insert_user($user);

        if (is_wp_error($user_id)) {
            return $user_id;
        } else {
            // Store random password as user meta
            $meta_id = add_user_meta($user_id, '_random', $user['user_pass']);

            // Setup this user if this is Multisite/Networking
            if (is_multisite()) {
                $this->multisite_setup($user_id);
            }
        }

        return get_user_by('id', $user_id);
    }

}

new ajax_login_register_Register;
