<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('See that the admin screen is activated');
$I->loginAsAdmin();
$I->amOnPage('/wp-admin/index.php');
$I->see('Dashboard');
$I->see("Buy Articles Mothership");
$I->click("Buy Articles Mothership");
$I->see("Activate Client");