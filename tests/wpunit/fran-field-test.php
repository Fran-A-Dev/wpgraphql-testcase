<?php
class FranFieldTest extends \Tests\WPGraphQL\TestCase\WPGraphQLTestCase {

  
   public function setUp(): void {

       parent::setUp();
   }

   public function tearDown(): void {
     parent::tearDown();
   }

   public function testFranFields(){
    $title='Fran test post';
    $post_id = $this->factory()->post->create([
      'Post_title'=>$title
    ]);
    $query = '
    {
      recentPosts {
        nodes {
          __typename
          databaseId
          title
        }
      } 
    }
    ';
    $actual=graphql([
      'Query'=>$query
    ]);
    //assertQuerySuccessful is a function that comes from WPGraphQL Test Case library
    //expectedNode is a function from the library too that runs when you expect a certain node
    self::assertQuerySuccessful($actual, [
      $this->expectedField( '__typename'. 'Post' ),
      $this->expectedField( 'databaseId', $post_id ),
      $this->expectedField( 'title', $title ),
    ]);
    
   }
}