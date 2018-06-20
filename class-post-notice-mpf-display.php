<?php 

/**
 * Post Notice Display Class
 */
class PostNoticeMPFDisplay
{
	
	function __construct() {
		# code...
		add_filter( 'the_content', array( $this, 'post_notice_display' ) );
	}

	public function post_notice_display($content) {

		global $post;
		
        $notice = get_post_meta( $post->ID, '_post-notice-mpf', true );

        if ( '' != $notice ) {
		
	        echo '<div id="post-notice-mpf-preview">';
	        echo $notice;
	        echo '</div>';

    	}

		return $content;
	}
}