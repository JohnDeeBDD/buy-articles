<?php

namespace BuyArticles;

class RegisterRemoteAuthorAction{
    
    public function doRegisterRemoteAuthor(){
        
        $userdata = array(
            'user_login'  =>  $_POST['user-login'],
            'user_pass'   =>  $_POST['user-password'],
            'user_email'  => $_POST['user-email'],
        );
        
        $user_id = wp_insert_user( $userdata ) ;
        
        //On success
        if ( ! is_wp_error( $user_id ) ) {
            echo "User created!";
        }
 
    }
    
    public function authCheck(){
        if(isset($_POST['buy-articles-password'])){
            $buyArticlesNetworkPassword = get_option("buyArticlesNetworkPassword", true);
            $buyArticlesNetworkPassword = $buyArticlesNetworkPassword['password'];
            if($_POST['buy-articles-password'] == $buyArticlesNetworkPassword){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
    
}