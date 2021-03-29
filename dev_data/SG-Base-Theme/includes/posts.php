<?php 
function post_tile(){
    add_meta_box(
            'post_tile_box', // $id
            'Post Tile Image', // $title
            'show_post_tile', // $callback
            'post', // $screen
            'side', // $context
            'high' // $priority
        );
}
function show_post_tile() {
        global $post;
            $meta = get_post_meta( $post->ID, 'meta', true ); ?>

        <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
        <!-- All fields will go here -->
    <p>
        <label for="thumbnail_url" style="font-weight:bold;">Tile Image</label>
        <br>
        <div id="tile-preview"><img src="<?php echo $meta['thumbnail_url']; ?>" style="max-width: 250px;"></div>
<input type="text" style="width:100%;" name="meta[thumbnail_url]" id="tile" class="regular-text" value="<?php echo $meta['thumbnail_url']; ?>">
        <input type="button" class="button tile-upload" value="Browse" style="width:100%;">

    </p>
<script>
  jQuery(document).ready(function($) {
    $('.tile-upload').on('click', function(){
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
        url = jQuery(html).attr('href');
        jQuery('#tile').val(url);
        jQuery('#tile-preview img').attr('src',url);
        tb_remove();
    };
    return false;
    });
  })
</script>

<?php }
function post_transcript(){
    add_meta_box(
            'post_transcript_box', // $id
            'Podcast Transcript Section', // $title
            'show_post_transcript', // $callback
            'post', // $screen
            'normal', // $context
            'high' // $priority
        );
}
function show_post_transcript() {
        global $post;
            $meta = get_post_meta( $post->ID, 'meta', true ); ?>
        
        <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
<p><label for="transcript_download">Transcript Download Link</label>
<br><input name="meta[transcript_download]" id="transcript_download" class="meta-image" type="text" style="width:calc(100% - 150px);" value="<?php echo $meta['transcript_download']; ?>" />
<input type="button" class="button image-upload" value="Browse" style="width:120px;">
</p>
<script>
  jQuery(document).ready(function($) {
    $('.image-upload').on('click', function(){
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
        url = jQuery(html).attr('href');
        jQuery('#transcript_download').val(url);
        tb_remove();
    };
    return false;
    });
  })
</script>
<p>
        <label for="transcript">Full Podcast Transcript</label>
        <br>
        <textarea name="meta[transcript]" id="transcript" class="regular-text" style="width:100%;height:700px"><?php echo $meta['transcript']; ?></textarea>
    </p>
        <?php }
function post_subheader(){
    add_meta_box(
            'post_subheader_box', // $id
            'Post Subheader', // $title
            'show_post_subheader', // $callback
            'post', // $screen
            'advanced', // $context
            'high' // $priority
        );
}
function show_post_subheader() {
        global $post;
            $meta = get_post_meta( $post->ID, 'meta', true ); ?>

        <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
<p>
        <label for="subheader">Subheader Text (Red)</label>
        <br>
        <textarea type="text" name="meta[subheader]" id="subheader" class="regular-text" style="width:100%;height:150px;"><?php echo $meta['subheader']; ?></textarea>
    </p>
        <?php }

function post_terms(){
    add_meta_box(
            'post_terms_box', // $id
            'Podcast Glossary Section', // $title
            'show_post_terms', // $callback
            'post', // $screen
            'normal', // $context
            'high' // $priority
        );
}
function show_post_terms() {
        global $post;
            $meta = get_post_meta( $post->ID, 'meta', true ); ?>
        
        <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->

<p>
        <label for="meta[terms]">Full Podcast Glossary and Terms</label>
        <br>
        <textarea name="meta[terms]" id="terms" class="regular-text" style="width:100%;height:700px"><?php echo $meta['terms']; ?></textarea>
    </p>
        <?php }
    function post_abridged(){
    add_meta_box(
            'post_abridged_box', // $id
            'Abridged Article Link', // $title
            'show_post_abridged', // $callback
            'post', // $screen
            'side', // $context
            'high' // $priority
        );
}
function show_post_abridged() {
        global $post;
            $meta = get_post_meta( $post->ID, 'meta', true ); ?>
        
        <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->

<p>
        <label for="meta[abridged]">Abridged Interview URL</label>
        <br>
        <input type="text" name="meta[abridged]" id="terms" class="regular-text" value="<?php echo $meta['abridged']; ?>">
    </p>
        <?php }
    function post_audio(){
    add_meta_box(
            'post_audio_box', // $id
            'Audio Link', // $title
            'show_post_audio', // $callback
            'post', // $screen
            'side', // $context
            'high' // $priority
        );
}
function show_post_audio() {
        global $post;
            $meta = get_post_meta( $post->ID, 'meta', true ); ?>
        
        <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->

<p><label for="audio">Post Audio for Homepage</label>
<br><input name="meta[audio]" id="audio" class="meta-image" type="text" style="width:calc(100%);" value="<?php echo $meta['audio']; ?>" />
<input type="button" class="button audio-upload" value="Browse" style="width:120px;">
</p>
<script>
  jQuery(document).ready(function($) {
    $('.audio-upload').on('click', function(){
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
        url = jQuery(html).attr('href');
        jQuery('#audio').val(url);
        tb_remove();
    };
    return false;
    });
  })
</script>
        <?php }

function save_post_meta( $post_id ) {
    	// verify nonce
    	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
    		return $post_id;
    	}
    	// check autosave
    	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    		return $post_id;
    	}
    	// check permissions
    	if ( 'page' === $_POST['post_type'] ) {
    		if ( !current_user_can( 'edit_page', $post_id ) ) {
    			return $post_id;
    		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
    			return $post_id;
    		}
    	}

    	$old = get_post_meta( $post_id, 'post', true );
    	$new = $_POST['meta'];

    	if ( $new && $new !== $old ) {
    		update_post_meta( $post_id, 'meta', $new );
    	} elseif ( '' === $new && $old ) {
    		delete_post_meta( $post_id, 'meta', $old );
    	}
    }
    add_action( 'save_post', 'save_post_meta' );
    add_action( 'add_meta_boxes', 'post_subheader' );
    add_action( 'add_meta_boxes', 'post_tile' );
    add_action( 'add_meta_boxes', 'post_transcript' );
    add_action( 'add_meta_boxes', 'post_terms' );
    add_action( 'add_meta_boxes', 'post_abridged' );
    add_action( 'add_meta_boxes', 'post_audio' );
?>