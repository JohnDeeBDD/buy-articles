<?php

namespace BuyArticles;

class Plugin{
    
    public function requestPasswordFromMothership(){
        
        if(isset($_GET['buy-articles-initiate-article-submission'])){
            if($_GET['buy-articles-initiate-article-submission'] == "TRUE"){
                add_action('init', array (new ArticleSubmissionInitiationHandler, 'initiateArticleSubission'));
            }
        }
        
    }
    
    public function listenForRemoteAction(){
        if (isset($_GET['buy-articles-action'])){
            $networkPassword = get_option("buyArticlesNetworkPassword", true);
            if($networkPassword == $_GET['password']){
                $RemoteAction = new RemoteAction;
            }else{
                die("SOMETHING IS VERY WRONG");
            }
        }
    }
    public function addAdminPage(){
        //launches the admin menu page:
        add_action(
            'admin_menu',
            function(){
                add_menu_page(
                    'Buy Articles',
                    'Buy Articles',
                    'manage_options',
                    'buy-articles',
                    function (){
                        $submenu = new AdminSubmenu;
                        $AdminScreen = new AdminScreen;
                        $AdminScreen->echoAdminScreen();
                    }
                 );
            }
        );
    }
}