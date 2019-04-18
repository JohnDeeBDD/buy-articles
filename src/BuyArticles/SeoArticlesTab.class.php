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

<table class="form-table">
<tr>
<th scope="row"><label for="blogname">$SeoArticleTitle</label></th>
<td><input type = "text" name = "seo-article-title" class="regular-text" />
<p class="description" id="seo-title">The title of the SEO post.</p></td>
</tr>

<tr id = "size-row">
    <th scope="row">Size</th>
    <td><div class="size-options">
    <p class="description">
        The size of an SEO article is the most important factor after basic quality.
    </p>
	<p>
       &nbsp;&nbsp;<input type="radio" name="seo-article-size" id="seo-article-size-300" value="300" checked />
	       300 words, $30
	</p>
	<p>
       &nbsp;&nbsp;<input type="radio" name="seo-article-size" id="seo-article-size-500" value="500"  />
	       500 words, $45
	</p>
	<p>
       &nbsp;&nbsp;<input type="radio" name="seo-article-size" id="seo-article-size-1000" value="1000" />
	       1000, $65
	</p>

		</div>
		</td>
</tr><!-- end: #size-row -->


<tr id = "instructions-row">
    <th scope="row">Special Instructions</th>
    <td><div class="instructions-options">
<textarea id="instructions" name="story" class="regular-text" placeholder = "Optional" rows = "5">
</textarea>



<tr id = "tags-row">
    <th scope="row">
        Tags
    </th>
    <td>
        <div class="tags-options">  
            <input class="regular-text" type="text" name="seo-tags" id="seo-tags-input" placeholder = "Comma seperated list" />
            <p class="description">
                Optional. Tags are used to organize your SEO post.
            </p>           
        </div>
	</td>
</tr><!-- end: tags-row -->

<tr id = "category-row">
    <th scope="row">
        Category
    </th>
    <td>
        <div class="category-options">  
            <input class="regular-text" type="text" name="seo-category" id="seo-category-input" />
            <p class="description">
                Optional. What category should this SEO post go in.
            </p>           
        </div>
	</td>
</tr><!-- end: category-row -->
<input type = "hidden" name = "buy-articles-incoming-order" value = "TRUE" />
<tr>
    <th scope="row">

    </th>
    <td>
<input type = "submit" />
	</td>
</tr>
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