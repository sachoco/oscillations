<?php
    // let's create the function for the custom type
    function cp_change_post_object() {
            $get_post_type = get_post_type_object('post');
            $labels = $get_post_type->labels;
                $labels->name = 'Media';
                $labels->singular_name = 'Media';
                $labels->add_new = 'Add Media';
                $labels->add_new_item = 'Add Media';
                $labels->edit_item = 'Edit Media';
                $labels->new_item = 'Media';
                $labels->view_item = 'View Media';
                $labels->search_items = 'Search Media';
                $labels->not_found = 'No Media found';
                $labels->not_found_in_trash = 'No Media found in Trash';
                $labels->all_items = 'All Media';
                $labels->menu_name = 'Media';
                $labels->name_admin_bar = 'Media';
            // $rewrite = $get_post_type->rewrite;
            //     $rewrite->slug = 'media';
            //     $rewrite->with_front = false;
            // $has_archive = $get_post_type->has_archive;
            //     $has_archive = 'media';
    }

    // adding the function to the Wordpress init
    add_action( 'init', 'cp_change_post_object');

