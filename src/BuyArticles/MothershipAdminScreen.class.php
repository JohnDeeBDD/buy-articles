<?php

namespace BuyArticles;

class MothershipAdminScreen{

    public function echoAdminScreen(){
        
        //strings:
        $ActivateClients = __("Activate Client");
        $output = <<<output
<div class="wrap">
<h1>$ActivateClients</h1>
<form method="post" action = "https://generalchicken.net/wp-json/buy-articles/register-remote-author" >
Website:<br />
<input type = "text" name = "website" id = "website" /><br />
User Name:<br />
<input type = "text" name = "user-name" /><br />
User Login Name:<br />
<input type = "text" name = "user-login" /><br />
Email:<br />
<input type = "text" name = "user-email" /><br />
Password:<br />
<input type = "text" name = "user-password" /><br />
Site Password:<br />
<input type = "text" name = "buy-articles-password" /><br />
<input type = "submit" /><br />
<input type = "hidden" name = "buy-articles-incoming-order" value = "true" />		
</form>

<script>
	jQuery(document).ready(function(){
		//alert('jQuery is working!');
	});
</script>
</div><!-- END: .wrap -->
output;
        echo $output;
    }
}