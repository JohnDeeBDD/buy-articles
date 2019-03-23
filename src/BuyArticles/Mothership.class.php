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
}