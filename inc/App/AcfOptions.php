<?php

namespace Sellace\App;

class AcfOptions
{
    public function __construct()
    {
        add_filter('gutenberg_can_edit_post_type', [$this, 'disableGutenberg'], 10, 2);
        add_filter('use_block_editor_for_post_type', [$this, 'disableGutenberg'], 10, 2 );
        add_action('admin_head', [$this, 'disableClassicEditor']);
    }

    function disableEditor( $id = false ) {
        $excludedTemplates = [
            'page-templates/page-flexible-content.php',
        ];
    
        if(empty($id)) {
            return false;
        }  
    
        $id = intval($id);
        $template = get_page_template_slug($id);
    
        return in_array($template, $excludedTemplates);
    }
    
    function disableGutenberg($can_edit, $post_type) {
        if(!(is_admin() && !empty($_GET['post']))) {
            return $can_edit;
        }
    
        if($this->disableEditor($_GET['post'])) {
            $can_edit = false;
        }
        
        return $can_edit;
    }

    function disableClassicEditor() {
        $screen = get_current_screen();

        if('page' !== $screen->id || !isset( $_GET['post'])) {
            return;
        }
    
        if( $this->disableEditor($_GET['post'])) {
            remove_post_type_support( 'page', 'editor' );
        }
    }
    
    public static function flexibleContent(){
        if ( have_rows('flexible_content')) {
            while (have_rows('flexible_content')) {
                the_row();

                if(get_row_layout() == 'hero_banner') {
                    get_template_part('acf-flexible-content/heroBanner');
                }
            }
        }
    }
}
