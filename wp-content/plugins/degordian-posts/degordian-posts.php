<?php
/**
 * Plugin Name: Degordian posts
 * Plugin URI: 
 * Description: Returns json for posts
 * Version: 1.0
 * Author: Ivan Sucic
 * Author URI: 
 */

function posts_api(WP_REST_Request $request) {
    $per_page = $request->get_param('per_page');
    $page = $request->get_param('page');
    $orderby = !strcmp($request->get_param('order_by'), 'date') ? 'post_date' : '';
    $orderby = !strcmp($request->get_param('order_by'), 'title') ? 'post_title' : '';
    $order = $request->get_param('order');

    if (empty($per_page))
    {
        $per_page = 10;
    }
    $numberposts = $per_page;

    if (!strcmp($request->get_param('include'), 'categories'))
    {
        $include_categories = true;
    }
    else
    {
        $include_categories = false;
    }

    $category_ID = 0;
    if (!empty($request->get_param('category')))
    {
        $category_ID = get_cat_ID($request->get_param('category'));
        if(empty($category_ID))
        {
            $result['next_page_exists'] = false;
            $result['total_number_pages'] = 0;
            $result['posts'] = [];
            return $result;
        }
    }

    $all_posts_ID = get_posts([
        'fields' => 'ids',
        'numberposts' => -1,
        'category' => $category_ID,
    ]);

    $posts = get_posts([
        "numberposts" => $numberposts,
        "page" => $per_page,
        "paged" => $page,
        'category' => $category_ID,
        'orderby' => $orderby,
        'order' => $order
    ]);

    if ((sizeof($all_posts_ID) / $per_page) > $page)
    {
        $result['next_page_exists'] = true;
    }
    else
    {
        $result['next_page_exists'] = false;
    }

    if (sizeof($all_posts_ID) % $per_page == 0)
    {
        $result['total_number_pages'] = sizeof($all_posts_ID) / $per_page;
    }
    else 
    {
        $result['total_number_pages'] = (int) (sizeof($all_posts_ID) / $per_page) + 1;
    }

    $final_posts = [];
    foreach ($posts as $post)
    {
        $final_post['ID'] = $post->ID;
        $final_post['title'] = $post->post_title;
        $final_post['excerpt'] = $post->post_excerpt;
        $final_post['content'] = $post->post_content;
        $final_post['created_at'] = $post->post_date;

        if ($include_categories)
        {
            $cat_ids = $post->__get('post_category');
            $final_post['categories'] = [];
            if (!empty ($cat_ids))
            {
                foreach ($cat_ids as $cat_id)
                {
                    $final_post['categories'][] = get_category($cat_id)->name;
                }
            }
        }

        $final_posts[] = $final_post;
    }

    $result['posts'] = $final_posts;
    return $result;
};

add_filter('rest_url_prefix', 'rest_url_change_prefix');
 
function rest_url_change_prefix($slug) {
 
    return 'api';
}

add_action('rest_api_init', function ($server) {
    $server->register_route('degordian-posts', '/v1/posts', [
        'methods' => 'GET',
        'callback' => 'posts_api'
    ]);
});