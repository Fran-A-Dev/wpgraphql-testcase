<?php
/**
 * Plugin Name: WPGraphQL Test Case
 * 
 * 
 */

 add_action('graphql_register_types', function(){
        register_graphql_field('RootQuery', 'franField',[
            'type'=> 'String',
            'resolve'=> function(){
                return 'Hello World';
            }
        ]);
 });