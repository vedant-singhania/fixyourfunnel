<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        #\DB::table('comments')->delete();
        factory(Comment::class, 600)->create();



    }
}
