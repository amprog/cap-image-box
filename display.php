<?php
/**
 * Constructs WP image box on single post pages.
 * @return script
 * @author Seth
 */
function wpib_image_box_js() {
	if (is_singular()) {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
	    $('img.wp-photo').each(function() {
			if ($(this).data('credit') != undefined) {
				credit = '<span class="photo-credit">'+$(this).data('credit')+'</span>';
			} else {
				credit = '';
			}
			if ($(this).data('caption') != undefined) {
                if ($(this).attr("alt") == undefined || $(this).attr("alt").length == 0) {
                    $(this).attr("alt", $(this).data('caption'));
                }
				caption = '<span class="photo-caption">'+$(this).data('caption')+'</span>';
			} else {
				caption = '';
			}
			alignment = $(this).data('alignment');
			width = $(this).attr('width');
            
            var caption_class = '';
            var style = '';
            if($(this).hasClass('caption-right')) {
                caption_class = 'caption-right';
            } else if ($(this).hasClass('caption-left')) {
                caption_class = 'caption-left';
            } else {
                caption_class = 'caption-bottom';
            }

			$(this).wrap('<figure class="image-box '+alignment+'"/>');
			if ( $(this).data('credit') != undefined || $(this).data('caption') != undefined ) {
                if(caption_class != 'caption-bottom') {                    
                    $(this).css('display', 'inline-block');
                    $(this).css('float', 'none');
                } else {
                    style = 'style="max-width: ' + width + 'px;"';
                }
				$(this).after('<div class="image-meta ' + caption_class + '" ' + style + '>' + credit + caption + '</div>');
			}
	    });
	});
	</script>
	<?php }
}
add_action('wp_footer','wpib_image_box_js');
