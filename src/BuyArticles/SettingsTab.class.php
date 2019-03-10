<?php

namespace BuyArticles;

class SettingsTab extends AbstractTab{
    
    public function returnHTML(){
        $networkPassword = get_option("buyArticlesNetworkPassword", true);
        $networkPassword = var_dump($networkPassword);
        
        if ($this->listenForPasswordRequestInitiation()){
            $this->doProcessPasswordRequestInitiation();
        }

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
    
    public function doProcessPasswordRequestInitiation(){
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $url = "http://localhost/wp-json/true-http-networks/new-password-request";
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
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