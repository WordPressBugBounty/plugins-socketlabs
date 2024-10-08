<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://socketlabs.com
 * @since      1.0.0
 *
 * @package    Socketlabs
 * @subpackage Socketlabs/admin/partials
 */
?>
<div id="sl-plugin-container">
    <div class="sl-masthead">
        <div class="sl-masthead__inside-container">
            <div class="sl-masthead__logo-container">
                <img class="sl-masthead__logo" src="https://www.socketlabs.com/assets/socketlabs-logo1.png" alt="SocketLabs">
            </div>
        </div>
    </div>
    <div class="sl-lower">
    <?php echo_status(); ?>
    <?php echo_signup(); ?>
    <?php echo_api_key(); ?>
</div>



<?php function echo_status(){ 
    $api_status = Socketlabs::get_api_status();
    if($api_status == Socketlabs_Api_Status::$SUCCESS){
?>
        <div class="sl-alert sl-active">
            <h3 class="sl-key-status failed">Connection Successful</h3>
            <p class="sl-description">Wordpress is now configured to send any generated email through your SocketLabs server. </p>
        </div>
<?php    }
    else{
?>
        <div class="sl-alert sl-critical">
            <h3 class="sl-key-status failed">Attention Required</h3>
            <p class="sl-description"><?php echo $api_status ?> </p>
        </div>
<?php    }
    } 
 ?>

<?php function echo_signup(){ ?>
    <div class="sl-box">
        <h2>Configure The SocketLabs WordPress Plugin For Optimized Email Delivery </h2>
        <p>The SocketLabs WordPress Plugin allows you to easily route email generated by WordPress through SocketLabs, rather than the default email delivery that WordPress provides. Follow the steps below to setup your plugin. </p>
    </div>
<?php } ?>

<?php function echo_api_key(){
    $options = get_option( SOCKETLABS_OPTION_GROUP );
?>
    <div class="sl-boxes">
        <div class="sl-box">
            <h3>Step 1: Find Your Server ID and API Key</h3>
            <div class="sl-right">
                <a class="sl-button sl-is-primary" target="_blank" href="https://www.socketlabs.com/blog/configure-wordpress-plugin/?utm_medium=wordpress&utm_campaign=wp-plugin&utm_source=wp-plugin#getkey">Get Your API Key</a>
            </div>
            <p>To start sending email using this Plugin, you'll need to enter your SocketLabs Server ID and API Key. Click on the button to the right to see how to get your Server ID & API Key.</p>
        </div>
        <div class="sl-box">
        <h3>Step 2: Enter Your SocketLabs Server ID and API Key</h3>
        <p>Not sure where to find your Server ID and API Key? Find It Here: <a href="https://www.socketlabs.com/blog/configure-wordpress-plugin/?utm_medium=wordpress&utm_campaign=wp-plugin&utm_source=wp-plugin#getkey" target="_blank">(What is an API key?)</a></p>
        <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
				settings_fields( SOCKETLABS_OPTION_GROUP );
			?>
			
            <p style="width: 100%; display: flex; flex-wrap: nowrap; box-sizing: border-box;">

            <input type='text' id='<?php echo SOCKETLABS_SERVER_ID; ?>' 
                name='<?php echo SOCKETLABS_OPTION_GROUP; ?>[<?php echo SOCKETLABS_SERVER_ID; ?>]' 
                value='<?php echo Socketlabs::get_server_id(); ?>' 
                style="flex-grow: 2; margin-right: 1rem;"
                placeholder="Server Id"
                title="Server Id"/>
                
            <input type='text' id='<?php echo SOCKETLABS_API_KEY; ?>' 
                name='<?php echo SOCKETLABS_OPTION_GROUP; ?>[<?php echo SOCKETLABS_API_KEY; ?>]' 
                value='<?php echo Socketlabs::get_api_key(); ?>' 
                style="flex-grow: 3; margin-right: 1rem;"
                placeholder = "SocketLabs Api Key"
                title="SocketLabs Api Key"/>
            
            <button 
                type="submit" 
                name="submit" 
                id="submit" 
                class="sl-button sl-is-primary" 
                style="flex-grow: 1;">Ok</button>
                
            </p>
        </form>
        </div>
<?php } ?>
