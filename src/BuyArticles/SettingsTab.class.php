<?php

namespace BuyArticles;

private $mothershipUrl = "https://generalchicken.net/wp-json/true-http-networks/new-password-request";

class SettingsTab extends AbstractTab{

    public function returnHTML(){
        //Checks that the user isn't trying to reset the password
        if (isset($_GET['buy-passwords-reset-password'])){
            delete_option("buyArticlesNetworkPassword");
        }        
        
        if ($this->listenForPasswordRequestInitiation()){
            $this->doProcessPasswordRequestInitiation();
        }
        
        if(get_option("buyArticlesNetworkPassword")){
            return ($this->returnRegisteredOutput());
         }else{
            return ($this->returnUnRegisteredOutput());
        }
    }
    
    public function returnUnRegisteredOutput(){

    
        //$networkPassword = var_export($networkPassword);
        //here is the HTML for the "tab"
        $output = <<<OUTPUT
<form method = "post">
<p>By joining our network, you agree to our terms of service and our privacy policy.</p>
<p>We NEVER share any information about our customers with anyone, ever, period. Customers remain 100% anonymous on our network.</p>
    <input type = "submit" value = "Join Network [free]" name = "password-request-initiation-submit-button" id = "password-request-initiation-submit-button" />
</form>
OUTPUT;
        
        return $output;
    }
    

    public function returnRegisteredOutput(){
        $output = <<<OUTPUT
<a href = "/wp-admin/admin.php?page=buy-articles&tab=settings&buy-passwords-reset-password=TRUE">RESET PASSWORD</a></br />
Thank you for joining!
OUTPUT;
        
        return $output;
    }
    
    public function cUrlTheMothership($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            ['network-name' => 'localhost', 'network-url' => 'http://localhost']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return $server_output;
    }
    
    public function doProcessPasswordRequestInitiation(){
        $url = $this->mothershipUrl;
        $result = $this->cUrlTheMothership($url);
        $siteUrl = urlencode(site_url());
        $networkPassword = (json_decode($result, true));
        update_option("buyArticlesNetworkPassword", $networkPassword);
    }
    
    public function listenForPasswordRequestInitiation(){
        if(isset($_POST['password-request-initiation-submit-button'])){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}