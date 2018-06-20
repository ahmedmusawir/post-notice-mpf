jQuery(document).ready(function($) {

	var $preview, $editor;

	$preview = $( '#post-notice-mpf-preview' );
	$editor = $( '#post-notice-mpf-editor');

	$preview.html( $editor.text() );

	$editor.on( 'keyup', function(evt){

		$preview.html( $(this).val() );
	});
	
});



