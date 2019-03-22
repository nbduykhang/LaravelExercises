<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $theme = [
        	['name'=>'Theme1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        	['name'=>'Theme2','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]
        ];
        DB::table('themes')->insert($theme);
    }
}
