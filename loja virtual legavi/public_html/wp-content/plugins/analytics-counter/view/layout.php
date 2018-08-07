<?php add_thickbox(); ?>

<?php $url = plugins_url(WPADM_GA__PLUGIN_NAME . '/view/scripts'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(WPADM_GA__PLUGIN_NAME . '/view/scripts'); ?>/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/glyphicons.css" />


<div id="wpadm-ga-support_container" style="display:none;">
    <div id="wpadm-ga_support_text_container">
        <form class="form-horizontal" method="post" action="<?php echo admin_url("admin.php?page=" .WPADM_GA__MENU_PREFIX . 'settings'); ?>">
            <input type="hidden" name="form_name" value="ga-account">



            <div style="font-weight: bold; font-size: 26px; margin-top: 20px;">Please, read this BEFORE you write us:</div>
            <p style="font-size: 16px; margin-bottom: 0px; ">
                To show Google Analytics statistics on your website you need to have:
            </p>
            <ol style="margin-left: 17px; margin-top: 0px; font-size: 15px;">
                <li>Google Analytics account. The account can be created here: <a href="https://analytics.google.com/analytics/web/#management/Settings//%3Fm.page%3DNewAccount/" style="font-weight:bold">create account</a></li>
                <li>Your website must be added to Google Analytics account.</li>
                <li>This plugin must be connected to your Google Analytics account: <a href="<?php echo WPAdm_GA::URL_GA_AUTH.'?fix'; ?>"  style="font-weight:bold">connect</a></li>
                <li>You meet conditions of 1,2 and 3, but Google Analytics stats not shown:<br>
                    try to <button type="submit" style="padding: 0px; font-weight: bold" name="ga-disconnect-btn" value="disconnect" class="btn-link">disconnect</button> this plugin from Google Analytics account and <a href="<?php echo WPAdm_GA::URL_GA_AUTH.'?fix'; ?>" style="font-weight:bold">connect</a> it again.
                </li>
            </ol>

            <p style="font-size: 15px; margin: 0px; padding: 0px; ">
                If doesn't help - write us
            </p>
        </form>

        <h2>Support request or Suggestion</h2>
        <textarea style="width: 100%; height: 150px;" id="wpadm-ga_support_text"></textarea>
    </div>

    <div id="wpadm-ga_support_thank_container" style="display: none;">
        <h2>Thanks for your suggestion!</h2>
        Within next plugin updates we will try to satisfy your request.
    </div>

    <div id="wpadm-ga_support_error_container" style="display: none;">
        <br><b>At your website the mail functionality is not available.</b><br /><br />
        Your request was not sent.
    </div>


    <div style="text-align: right; margin-top: 20px;">
        <button type="button" class="btn btn-default" onclick="jQuery('.tb-close-icon').click()">close</button>
        <button type="button" class="btn btn-primary" id="wpadm-ga-support_send_button" onclick="wpadm_ga_sendSupportText()">Send suggestion</button>

    </div>
</div>


<?php
/**
 * @var $wpadm_ga_view WPAdm_GA_View
 */
$show_notice_5stars = false;

$hide_get_pro_description = get_option('wpadm-ga-hideGetProDescription');

if (!isset($_GET['modal'])) {
    if (!get_option('wpadm-ga-stopNotice5Stars')) {
        $first_time = get_option('wpadm-ga-first_time');
        $show_notice_5stars = ($first_time && $first_time < time() - 24 * 60 * 60);
    }
}
?>
                                 
<?php
if(!get_option('wpadm_ga_pro_key')):
    $calback_url = admin_url("admin.php?page=" .WPADM_GA__MENU_PREFIX . 'settings'); ?>
    <div class="wpadm-ga-notice-get-pro" <?php if ($hide_get_pro_description) { echo 'style="display: none"'; } ?> id="wpadm_ga_getpro_description">
        <div style="  float: left; padding: 30px; text-align: center">
            <img src="<?php echo plugins_url('/img/icon-128x128.png',__FILE__);?>" style="margin-bottom: 14px; cursor: pointer;" onclick="jQuery('#btn_pro_big_btn').click();"  title="Get PRO version" alt="Get PRO version">
            <br>
	        <a href="javascript:void(0)" onclick="jQuery('#btn_pro_big_btn').click();" style="font-size: 16px;text-decoration: underline;">Analytics PRO</a>
        </div>
        <div style="padding: 10px; float: left;">
            <p style="font-weight: bold; font-size: 16px;">Use Professional Analytics Counter plugin and get:</p>
            <ul class="wpadm_ga_notice_pro_features">
                <li>Unlimited Statistics</li>
                <li>Visual Counter of Google Analytics</li>
                <li>Counter Widget</li>
                <li>Customize Counter and places</li>
                <li>Shortcodes of Google Analytics</li>
                <li>One Year Free Updates & One Year Priority support</li>
            </ul>
        </div>
	    <div style="padding-top: 90px; float:left;">
		    <form action="<?php echo WPADM_GA__SSERVER; ?>api/" method="post">
			    <input type="hidden" value="<?php echo home_url();?>" name="site">
			    <input type="hidden" value="proBackupPay" name="actApi">
			    <input type="hidden" value="<?php echo get_option('admin_email');?>" name="email">
			    <input type="hidden" value="ga" name="plugin">
			    <input type="hidden" value="<?php echo $calback_url . '&pay=success'; ?>" name="success_url">
			    <input type="hidden" value="<?php echo $calback_url . '&pay=cancel'; ?>" name="cancel_url">
                <input type="submit" id="btn_pro_big_btn" class="wpadm-ga-btn-get-pro" style="margin-left: 50px" value="Get PRO">
		    </form>
	    </div>
        <div style="padding: 10px; text-align: right; vertical-align: top;">
            <button class="btn btn-link btn-sm" onclick="wpadm_ga_hideGetProDescription()">[ Hide this message ]</button>
        </div>
        <div class="clear"></div>
    </div>
    <div class="wpadm-ga-notice-get-pro" id="wpadm_ga_getpro_notice" style="font-weight: bold; font-size: 16px; height: 70px; <?php if (!$hide_get_pro_description) { echo 'display: none;'; } ?>">
        <div style="float: left">
            <form action="<?php echo WPADM_GA__SSERVER; ?>api/" method="post">
            <img src="<?php echo plugins_url('/img/pro_48x48.png',__FILE__);?>" title="Get PRO version" alt="Get PRO version">
	            Use Professional Analytics Counter plugin

                <input type="hidden" value="<?php echo home_url();?>" name="site">
                <input type="hidden" value="proBackupPay" name="actApi">
                <input type="hidden" value="<?php echo get_option('admin_email');?>" name="email">
                <input type="hidden" value="ga" name="plugin">
                <input type="hidden" value="<?php echo $calback_url . '&pay=success'; ?>" name="success_url">
                <input type="hidden" value="<?php echo $calback_url . '&pay=cancel'; ?>" name="cancel_url">
                <input type="submit" class="wpadm-ga-btn-get-pro" style="margin-left: 30px; padding: 5px; font-size: 14px;;" value="Get PRO">
            </form>

        </div>
        <div style="text-align: right;">

            <button class="btn btn-link" onclick="wpadm_ga_showGetProDescription()">[ show description ]</button>
        </div>
    </div>
<?php else:
    $url = admin_url("admin.php?page=" .WPADM_GA__MENU_PREFIX . 'settings&download_pro');
    ?>
    <div class="wpadm-ga-notice-get-pro" id="wpadm_ga_getpro_notice" style="font-weight: bold; font-size: 16px; height: 70px; ">
        <div style="float: left;">
            <img src="<?php echo plugins_url('/img/pro_48x48.png',__FILE__);?>" title="Get PRO version" alt="Get PRO version">
            The "Google Analytics Counter PRO" version can be downloaded here: <a href="<?php echo $url; ?>">DOWNLOAD<img style="padding-left: 10px; margin-top: -15px;" src="<?php echo plugins_url('/img/wpadm.com_download_ga.gif',__FILE__);?>" </a>
        </div>
    </div>

<?php endif; ?>

<div id="wpadm-ga-layout">
    <div id="wpadm-ga-header">
        <h1 style="display: inline;"><img src="<?php echo plugins_url('/img/big_icon.png',__FILE__); ?>" style="height: 48px; width: 48px;"> <?php echo WPAdm_GA_View::$title; ?> <small><?php echo WPAdm_GA_View::$subtitle;?></small></h1>
    </div>

    <?php if ($show_notice_5stars): ?>
        <div class="wpadm-ga-notice-5stars-content">
            <div class="wpadm-ga-notice-5stars-right">
                <a id="wpadm-ga-notice-5stars-remover" href="javascript:void(0)" onclick="wpadm_ga_stopNotice5Stars()">[ Hide this message ]</a>
            </div>
            <div  class="wpadm-ga-notice-5stars-left"  onclick="window.open('https://wordpress.org/support/view/plugin-reviews/analytics-counter?filter=5#postform')">
                Leave us 5 stars
                <button id="wpadm-ga-button-5stars" type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <small>It will help us to develop this plugin for you</small>
            </div>
        </div>

        <div class="clear"></div>
    <?php endif; ?>

    <?php
        foreach (WPAdm_GA_View::$errors as $error) {
            echo "<div class=\"error\"><p><b>{$error}</b></p></div>";
        }
    ?>


    <div id="wpadm-ga-content">
        <?php
            if(WPAdm_GA_View::$content_file) {
                require WPAdm_GA_View::$content_file;
            }
        ?>
    </div>
    
    <div id="wpadm-ga-footer"></div>
</div>

<script>
    var wpadm_ga_url_GA_AUTH = "<?php echo WPAdm_GA::URL_GA_AUTH; ?>";
    var wpadm_ga_url_GA_SETTINGS = "<?php echo admin_url('options-general.php?page=wpadm-ga-menu-settings') ?>";
    jQuery( document ).ready(function() {
       jQuery('#wpadm-ga_support_text').keyup(function() {
           this.style.height = "150px";
           this.style.height = (this.scrollHeight) + "px";
       });
    });
</script>