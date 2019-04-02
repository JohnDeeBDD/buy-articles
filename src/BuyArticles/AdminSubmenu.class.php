<?php

namespace BuyArticles;

class AdminSubmenu{
    
    public static function returnHTML(){
        $tab = AdminSubmenu::whichTabIsActive();
        $seoClassCSS = ""; $researchClassCSS = ""; $sellArticlesClassCSS = ""; $settingsClassCSS = ""; $tabHTML = "";
        switch ($tab) {
            case "seo":
                $seoClassCSS = "nav-tab-active";
                $SeoArticlesTab = new SeoArticlesTab;
                $tabHTML = $SeoArticlesTab->returnHTML();
                break;
            case "research":
                $researchClassCSS = "nav-tab-active";
                break;
            case "sell":
                $sellArticlesClassCSS = "nav-tab-active";
                break;
            case "settings":
                $settingsClassCSS = "nav-tab-active";
                $SettingsTab = new SettingsTab;
                $tabHTML = $SettingsTab->returnHTML();
                break;
        }
        //die($seoClassCSS);
        $output = <<<OUTPUT
<div class="wrap woocommerce">
	<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
		<a href="/wp-admin/admin.php?page=buy-articles&tab=seo" class="nav-tab $seoClassCSS">SEO Articles</a>
		<a href="/wp-admin/admin.php?page=buy-articles&tab=research" class="nav-tab $researchClassCSS">Research Articles</a>
		<a href="/wp-admin/admin.php?page=buy-articles&tab=sell" class="nav-tab $sellArticlesClassCSS">Sell Articles</a>
		<a href="/wp-admin/admin.php?page=buy-articles&tab=settings" class="nav-tab $settingsClassCSS">Settings</a>
	</nav>
	<!-- <ul class="subsubsub">
		<li>
			<a href="admin.php?page=wc-reports&tab=stock&amp;report=low_in_stock" class="current">Low in stock</a>
		</li>
		<li>
			<a href="admin.php?page=wc-reports&tab=stock&amp;report=out_of_stock" class="">Out of stock</a>
		</li>
		<li>
			<a href="admin.php?page=wc-reports&tab=stock&amp;report=most_stocked" class="">Most stocked</a>
		</li>
	</ul> -->
    <br class="clear" />
$tabHTML
</div>
OUTPUT;
        return $output;
    }
    
    public static function whichTabIsActive(){
        if (!(isset($_GET['tab']))){
            return "SEO";
        }
        if ($_GET['tab'] == "seo"){
            return "seo";
        }
        if ($_GET['tab'] == "research"){
            return "research";
        }
        if ($_GET['tab'] == "sell"){
            return "sell";
        }
        if ($_GET['tab'] == "settings"){
            return "settings";
        }
        return "SEO";
    }
    
}