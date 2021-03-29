<?php
 // Block Lab Example Repeater Field
echo '<section class="featured" id="featured"><div class="inner-box"><h2>';
block_field('title');
echo '</h2>';
if ( block_rows( 'flex-list' ) ):
    echo '<div class="flex-icon-list">';
    while ( block_rows( 'flex-list' ) ) :
        block_row( 'flex-list' );
        echo '<div class="item"><img src="';
        block_sub_field( 'image-side' );
        echo '" alt="Image"><div class="copy">';
        block_sub_field( 'subtitle' );
        echo '</div></div>';
    endwhile;
    echo '</div>';
endif;
reset_block_rows( 'flex-list' );
echo '</div></section>';
?>