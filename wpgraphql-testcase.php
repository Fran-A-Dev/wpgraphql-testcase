<?php
/**
 * Plugin Name: WPGraphQL Test Case
 * Description: Test Plugin for a custom field in WPGraphQL to test with TestCase lib
 * Version: 0.1.0
 * Author: Fran Agulto
 * License: GPLv2 or later
 * License URI: http://www.developers.wpengine.com
 */

 add_action('graphql_register_types', function(){
        register_graphql_connection([
            'fromType'=>'RootQuery',
            'toType'=>'Post',
            'fromFieldName'=>'recentPosts',
            'resolve'=>function($source, $args, $context, $info ){
                $resolver = new \WPGraphQL\Data\Connection\PostObjectConnectionResolver($source, $args, $context, $info);
                return $resolver->get_connection();
            },

        ]);
 });