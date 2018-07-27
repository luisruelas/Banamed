<?php

use Illuminate\Database\Seeder;

class DBinfoseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dbinfo')->insert(['name' => 'version', 'value' => 00.01]);
        DB::table('dbinfo')->insert(['name' => 'nextversion', 'value' => 00.02]);
    }
}
