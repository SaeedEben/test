<?php

use Illuminate\Database\Seeder;

class ManSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Man::class , 100)->create();
    }
}
