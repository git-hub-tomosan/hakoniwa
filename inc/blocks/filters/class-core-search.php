<?php
namespace hakoniwa\theme\blocks\core\search;

use hakoniwa\theme\init\Define;

/**
 * ブロックフィルター
 */
class Filter {

    /**
     * constructor.
     */
    public function __construct() {
        add_filter( 'render_block_core/search', array( $this, 'render_block' ), 10, 2 );
    }

    public function render_block( $block_content, $block ) {
        if( is_search() ){
            if( ! have_posts() ){
                $text = '<p>' . esc_html( __( 'We could not find any results for your search. You can give it another try through the search form below.', Define::value( 'theme_name' ) ) ) . '</p>';
                $block_content = $text . $block_content;	
            }
        }

        return $block_content;
    }
}

use hakoniwa\theme\blocks\core\search\Filter;
new Filter();
