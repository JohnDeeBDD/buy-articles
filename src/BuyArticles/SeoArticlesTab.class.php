<?php

namespace BuyArticles;

class SeoArticlesTab extends AbstractTab{
    
    public function returnHTML(){
        
        $mothershipUrl = MothershipUrl::getUrl();
        $mothershipUrl = $mothershipUrl . "/submit-seo-article-order/";
        
        //Strings:
        $SeoArticleTitle = __("SEO article title", "buy-articles");
        $Size = __("Size", "buy-articles");
        $Keywords = __("Keywords", "buy-articles");
        $Tags = __("Tags", "buy-articles");
        $Category = __("Category", "buy-articles");
        $Links = __("Links", "buy-articles");
        
        $jQuery = $this->returnJQuery();
        $CSS = $this->returnCSS();
        
        $output = <<<output
<script>
    $jQuery
</script>
<style>
    $CSS
</style>
<form method = "post" action = "$mothershipUrl">
<div class = "form-input-item">
    <div class = "form-input-item-title">
        $SeoArticleTitle
    </div><!-- end: .form-input-item-title -->
    <input type = "text" name = "seo-article-title" />
</div>
<div class = "form-input-item">
    <div class = "form-input-item-title">
        $Size
    </div><!-- end: .form-input-item-title -->
<input type = "text" name = "seo-article-size" />
</div>
<div class = "form-input-item">
    <div class = "form-input-item-title">
        $Keywords
    </div><!-- end: .form-input-item-title -->
<input type = "text" name = "seo-article-keywords" />
</div>
<div class = "form-input-item">
    <div class = "form-input-item-title">
        $Tags
    </div><!-- end: .form-input-item-title -->
<input type = "text" name = "seo-article-tags" />
<!-- https://github.com/xoxco/jQuery-Tags-Input -->
</div>
<div class = "form-input-item">
    <div class = "form-input-item-title">
        $Category
    </div><!-- end: .form-input-item-title -->
<input type = "text" name = "seo-article-category" />
</div>
<div class = "form-input-item">
    <div class = "form-input-item-title">
        $Links
    </div><!-- end: .form-input-item-title -->
<input type = "text" name = "seo-article-links" />
</div>
<input type = "hidden" name = "buy-articles-incoming-order" value = "TRUE" />
<input type = "submit" />
</form>
output;
        
        return $output;
    }
    
    private function returnCSS(){

$CSS = <<<CSS
    .form-input-item{}
    .form-input-item-title{}
CSS;
        return $CSS;
    }
    
    private function returnJQuery(){

$jQuery = <<<jQuery

jQuery(document).ready(function(){

    //alert(jQuery.fn.jquery);

});

jQuery;

    return $jQuery;
    
    }

} 