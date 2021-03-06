<?php
if (!defined('ABSPATH')) die();

$regurl = get_option('__wpdm_register_url');
if($regurl > 0)
    $regurl = get_permalink($regurl);
$log_redirect =  $_SERVER['REQUEST_URI'];
if(isset($params['redirect'])) $log_redirect = esc_url($params['redirect']);
if(isset($_GET['redirect_to'])) $log_redirect = esc_url($_GET['redirect_to']);

$up = parse_url($log_redirect);
if(!isset($up['host']) || $up['host'] != $_SERVER['SERVER_NAME']) $log_redirect = $_SERVER['REQUEST_URI'];

$log_redirect = strip_tags($log_redirect);
if(!is_array($params)) $params = array();
if(!isset($params['logo'])) $params['logo'] = get_site_icon_url();

?>
<div class="w3eden">
<div id="wpdmlogin" <?php if(wpdm_query_var('action') == 'lostpassword') echo 'class="lostpass"'; ?>>
<?php if(isset($params['logo']) && $params['logo'] != ''){ ?>
    <div class="text-center wpdmlogin-logo">
        <img src="<?php echo $params['logo'];?>" />
    </div>
<?php } ?>

    <?php if(isset($_SESSION['reg_warning'])&&$_SESSION['reg_warning']!=''): ?>  <br>

        <div class="alert alert-warning" align="center" style="font-size:10pt;">
            <?php echo $_SESSION['reg_warning']; unset($_SESSION['reg_warning']); ?>
        </div>

    <?php endif; ?>

    <?php if(isset($_SESSION['sccs_msg'])&&$_SESSION['sccs_msg']!=''): ?><br>

        <div class="alert alert-success" align="center" style="font-size:10pt;">
            <?php echo $_SESSION['sccs_msg'];  unset($_SESSION['sccs_msg']); ?>
        </div>

    <?php endif; ?>
    <?php if(is_user_logged_in()){

        do_action("wpdm_user_logged_in","<div class='text-center'>".__("You are already logged in.",'download-manager')."<br style='clear:both;display:block;margin-top:10px'/> <a class='btn btn-xs btn-primary btn-dashboard-link' href='".get_permalink(get_option('__wpdm_user_dashboard'))."'>".__("Go To Dashboard",'download-manager')."</a>  <a class='btn btn-xs btn-danger' href='".wp_logout_url()."'>".__("Logout",'download-manager')."</a></div>");

    } else {


        ?>

        <form name="loginform" id="loginform" action="" method="post" class="login-form" >

            <input type="hidden" name="permalink" value="<?php the_permalink(); ?>" />

            <?php global $wp_query; if(isset($_SESSION['login_error'])&&$_SESSION['login_error']!='') {  ?>
                <div class="error alert alert-danger" data-title="<?php _e('Login Failed!','download-manager'); ?>">

                    <?php echo preg_replace("/<a.*?<\/a>\?/i","",$_SESSION['login_error']); $_SESSION['login_error']=''; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                    <input placeholder="<?php _e('Username','download-manager'); ?>" type="text" name="wpdm_login[log]" id="user_login" class="form-control input-lg required text" value="" size="20" tabindex="38" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-key"></i></span>
                    <input type="password" placeholder="<?php _e('Password','download-manager'); ?>" name="wpdm_login[pwd]" id="user_pass" class="form-control input-lg required password" value="" size="20" tabindex="39" />
                </div>
            </div>

            <?php do_action("wpdm_login_form"); ?>
            <?php do_action("login_form"); ?>

            <div class="row login-form-meta-text text-muted" style="margin-bottom: 10px">
                <div class="col-md-5"><label><input class="wpdm-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /><?php _e( "Remember Me" , "download-manager" ); ?></label></div>
                <div class="col-md-7 text-right"><label><?php _e( "Forgot Password?" , "download-manager" ); ?> <a class="color-blue" href="<?php echo wpdm_lostpassword_url(); ?>"><?php _e( "Request New" , "download-manager" ); ?></a>&nbsp;</label></div>
            </div>
            <div class="form-group"><button type="submit" name="wp-submit" id="loginform-submit" class="btn btn-block btn-primary btn-lg"><i class="fa fa-key"></i> <?php _e('Login','download-manager'); ?></button></div>
            <?php if($regurl != ''){ ?>
            <div class="text-center"><a href="<?php echo $regurl; ?>" name="wp-submit" class="btn btn-xs btn-link color-blue" id="loginform-submit"><?php _e("Don't have an account yet?", "download-manager"); ?> <?php _e('Sign Up','download-manager'); ?></a></div>
            <?php } ?>


            <input type="hidden" name="redirect_to" value="<?php echo isset($log_redirect)?$log_redirect:esc_attr($_SERVER['REQUEST_URI']); ?>" />



        </form>


        <script>
            jQuery(function ($) {
                var llbl = $('#loginform-submit').html();
                $('#loginform').submit(function () {
                    $('#loginform-submit').html("<i class='fa fa-spin fa-spinner'></i> <?php _e('Logging In...','download-manager');?>");
                    $(this).ajaxSubmit({
                        success: function (res) {
                            if (!res.match(/success/)) {
                                $('form .alert-danger').hide();
                                $('#loginform').prepend("<div class='alert alert-danger' data-title='<?php _e('ERROR!','download-manager');?>'><?php _e('Login failed! Please re-check login info.','download-manager');?></div>");
                                $('#loginform-submit').html(llbl);
                            } else {
                                location.href = "<?php echo $log_redirect; ?>";
                            }
                        }
                    });
                    return false;
                });

                $('body').on('click', 'form .alert-danger', function(){
                    $(this).slideUp();
                });

            });
        </script>

    <?php } ?></div></div>

