<?php
 // Block Lab Example Repeater Field
echo '<section class="comfort" id="comfort"><div class="inner-box"><h2>';
block_field('title');
echo '</h2>';
block_field('copy');
if ( block_rows( 'item-list' ) ):
    echo '<ul class="flex-list">';
    while ( block_rows( 'item-list' ) ) :
        block_row( 'item-list' );
        echo '<li>';
        block_sub_field( 'item' );
        echo '</li>';
    endwhile;
    echo '</ul>';
endif;
reset_block_rows( 'item-list' );
echo '</div></section>';
?>
