<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        #\DB::table('posts')->delete();
        factory(Post::class, 30)->create();

    }
}
