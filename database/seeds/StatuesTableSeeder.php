<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Statues;
class StatuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Statues::class,100)->create();
    }
}
