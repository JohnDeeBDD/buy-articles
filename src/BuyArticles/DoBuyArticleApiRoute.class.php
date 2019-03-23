<?php

namespace BuyArticles;

class DoBuyArticleApiRoute{

    private $apiRouteName = 'buy-articles/remote-action/';
  
    public function registerWhitelistRoutes(){
        register_rest_route(
            $this->apiRouteName,
            "do-register-remote-author",
            array(
                'methods' => 'GET',
                'callback' => 
                array(
                    new \BuyArticles\RemoteActionReceiver,
                    'doRegisterRemoteAuthor',
                ),
                'permission_callback' => function () {
                    //todo!!
                    return true;
                    //return current_user_can( 'edit_others_posts' );
                }
            )
        );
    }
}