<?php
/**
 * Plugin Name: WPGraphQL Test Case
 * 
 * 
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