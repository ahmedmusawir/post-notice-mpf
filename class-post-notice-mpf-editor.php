<?php
/**
* Custom Metabox TextArea Class
*/
class PostNoticeMPFEditor
{
    
    public function initialize() {

        add_action( 'add_meta_boxes', array( $this, 'add_metabox_post_notice_mpf' ) );
        add_action( 'save_post', array( $this, 'save_post_notice_mpf' ) );
    }

    public function add_metabox_post_notice_mpf() {
        /**
         *
         * $id,
           $title,
           $callback,
           $screen -> post type, comment etc.,
           $context -> normal, side and advanced, 
           $priority -> default, high, low,
           $callback_args 
         *
         */
        
        add_meta_box( 
            'post-notice-mpf', 
            'MPF Post Notice', 
            array( $this, 'post_notice_display' ), 
            'post', 
            'normal', 
            'high', 
            null 
        );
    }

    public function post_notice_display( $post ) {

        $value = get_post_meta( $post->ID, '_post-notice-mpf', true );

        wp_nonce_field( basename( __FILE__ ), 'post_notice_mpf_meta_box_nonce' );

    ?>
		<div id="post-notice-mpf-preview">
		</div>
        <textarea id="post-notice-mpf-editor" class="widefat" name="post-notice-mpf" rows="10"><?php echo $value; ?></textarea>

    <?php
    }

    public function save_post_notice_mpf( $post_id )    {

        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );

        $is_valid_nonce = false;

        if ( isset( $_POST[ 'post_notice_mpf_meta_box_nonce' ] ) ) {

            if ( wp_verify_nonce( $_POST[ 'post_notice_mpf_meta_box_nonce' ], basename( __FILE__ ) ) ) {

                $is_valid_nonce = true;

            }

        }

        if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
        

        if ( array_key_exists( 'post-notice-mpf', $_POST ) ) {        
            /**
             *
             * update post meta 
                
                $post_id,
                $meta_key,
                $meta_value,
                $previous_value (optional)
             *
             */
            $textarea_content = $_POST[ 'post-notice-mpf' ];
            // $textarea_content = sanitize_text_field( $_POST[ 'post-notice-mpf' ] );

            update_post_meta( 
                $post_id,                                              // Post ID
                '_post-notice-mpf',                              // Meta key            
                $textarea_content                                    // Meta value 
            );
        }
    }    
}
