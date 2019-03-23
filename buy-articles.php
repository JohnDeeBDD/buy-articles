<?php
/*
 Plugin Name: Buy Articles
 Plugin URI: http://generalchicken.net/
 Description:
 Version: 0.1
 Author: John Dee
 Author URI: http://generalchicken.net/
 */

namespace BuyArticles;

//die ('FastRegister.php');
require_once("src/BuyArticles/autoloader.php");

$Plugin = new Plugin;
$Plugin->addAdminPage();
$Plugin->enableApiActions();

//$Plugin->listenForSubmission();

//ability to buy SEO articles
//ability to allow remote article creation
//get password from generalchicken.net 6/.


/*when the client puts in a purchase order
 * then the mothership should log in to the client site and copy and paste the order
 * and then the client should be billed
 * 
 * Given the client has purchaced an article 
 * And the article is ready to be shipped
 * When the mothership initiates a transfer
 * Then the client should create a user
 * And the user's email should be sent from the mothership via an API
 * And the user's password should be sent from the mothership via and API
*/

//The "mothership" is the code that goes on the production master server
$Mothership = new Mothership;
$Mothership->addAdminPage();
