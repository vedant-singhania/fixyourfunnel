<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        #\DB::table('profiles')->delete();
        factory(Profile::class, 30)->create();
        
    }
}