<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('See that the admin screen is activated');
$I->loginAsAdmin();
$I->amOnPage('/wp-admin/index.php');
$I->see('Dashboard');
$I->see("Buy Articles");
$I->click("Buy Articles");
$I->see("SEO Articles");
$I->click("Settings");
$I->see("By joining our network");
$I->see("Mothership Options");