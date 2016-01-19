Drupal.behaviors.theme_MNI_showTeasers = function(context, settings) 
{
	$("ul.articles-list li").each(function(i) {
        	$(this) .children("p")
			.not("p.dashline")
			.not("p.byline")
                	.slice(0,4)
	                .show();

        	$(this) .children("div.views-field-teaser")
                	.children("div.field-content")
	                .children("p")
			.not("p.dashline")
			.not("p.byline")
        	        .slice(0,4)
                	.show();
	});
};
