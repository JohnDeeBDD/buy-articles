<?php

namespace BuyArticles;

class Mothership{

    public function addAdminPage(){
        //launches the admin menu page:
        add_action(
            'admin_menu',
            function(){
                add_menu_page(
                    'Buy Articles Mothership',
                    'Buy Articles Mothership',
                    'manage_options',
                    'buy-articles-mothership',
                    function (){
                        $Screen = new MothershipAdminScreen;
                        $Screen->echoAdminScreen();
                    }
                );
            }
        );
    }
    
    public function listenForOrderSubmission(){
        if (isset($_POST['buy-articles-incoming-order'])){
            add_action('init', array($this, 'doProcessorderSubmission'));
        }
    }
    
    public function doProcessOrderSubmission(){
        $content = var_export($_POST, TRUE);
        $id = wp_insert_post( array (
            'post_title' => "INCOMING ORDER SUBMISSION",
            'post_content' => $content,
            'post_status' => 'draft',
        ));
    }
}