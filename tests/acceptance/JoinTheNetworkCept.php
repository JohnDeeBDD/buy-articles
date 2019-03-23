<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Join the Buy Networks network via the settings tab');
$I->loginAsAdmin();
$I->amOnPage('/wp-admin/index.php');
$I->see('Dashboard');
$I->amOnPage("/wp-admin/admin.php?page=buy-articles&tab=settings");
$I->click("Join Network [free]");