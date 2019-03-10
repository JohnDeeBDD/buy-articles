<?php

namespace BuyArticles;

class AdminScreen{
    
    public function echoAdminScreen(){
        
        

        //Strings:
        $BuyArticles = __("Buy Articles");

        $submenu = AdminSubmenu::returnHTML();
        
        $output = <<<output
<div class="wrap">
    <h2>$BuyArticles</h2>
    $submenu
</div> <!--#wrap -->
output;
        echo $output;
    }
    



}