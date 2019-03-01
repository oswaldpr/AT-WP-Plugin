<?php
/**
 *Plugin Name: Auto Trader Plugin
 *Description: The plugin adds a fixed sentence to the bottom of each post
 *Version: 0.1
 *Author: Oswald Prince
 *Author URI: http://www.linkedin.com/in/oswaldpr
 *License:
 **/


define('ATP_DIRECTORY', dirname(__FILE__));

$pluginExplodedName = explode('/', ATP_DIRECTORY);
$pluginName = end($pluginExplodedName);
define('ATP_NAME', 'Auto Trader Plugin');
define('ATP_PATH', plugins_url() . '/'.$pluginName);
define('ATP_CSS_PATH',  ATP_PATH . '/assets/css' );
define('ATP_JS_PATH', ATP_PATH . '/assets/js' );


class ATP
{
    public function addSentenceToEachPost()
    {
        $staticSentence = __('Congrats, you read the whole post!');

        $strHTML = get_the_content();
        $strHTML .= '<hr>';
        $strHTML .= '<div class="additionalPostText box">';
        $strHTML .= $staticSentence;
        $strHTML .= '</div>';

        return $strHTML ;
    }

    public function __construct()
    {
        add_filter('the_content', array($this, 'addSentenceToEachPost')) ;
    }

}

function loadATP() {
    new ATP();
}

function loadLibrariesStylesheets() {
    // enqueue the CSS
    wp_enqueue_style( "bootstrap_css", 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css',false, null);
    wp_enqueue_style( "atp_css", ATP_CSS_PATH . '/style.css',false, null);
}

function loadLibrariesScripts() {
    //enqueue js libraries
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('atp_js', ATP_JS_PATH .'/general.js', array('jquery'), null, true );
}

add_action( 'plugins_loaded', 'loadATP' );
add_action( 'wp_enqueue_scripts', 'loadLibrariesStylesheets' );
add_action( 'wp_enqueue_scripts', 'loadLibrariesScripts' );


