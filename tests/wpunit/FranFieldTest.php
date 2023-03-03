<?php
class FranFieldTest extends \Tests\WPGraphQL\TestCase\WPGraphQLTestCase {

    /**
    * @return void
    */
   public function setUp(): void {

       parent::setUp();
   }

   public function tearDown(): void {
     parent::tearDown();
   }

   public function testFranFields(){
    $title='Fran test post';
    $Post_ID = $this->factory()->post->create([
      'post_title'=>$title
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
      'query'=>$query
    ]);
    self::assertQuerySuccessful($actual, [
      $this->expectedNode('recentPosts.nodes',[
        '__typename'=>'Post',
        'databaseId'=>$Post_ID,
        'title'=>$title,
      ])
    ]);
   }
}