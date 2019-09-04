<?php

use Illuminate\Database\Seeder;
use App\Gamer;

class GamersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g1 = [
        	'nick' => 'agnieszka',
        	'time' => '00:25'
        ];

        $g2 = [
        	'nick' => 'marta',
        	'time' => '00:15'
        ];

        $g3 = [
        	'nick' => 'jacek',
        	'time' => '00:24'
        ];

        $g4 = [
        	'nick' => 'janusz',
        	'time' => '00:27'
        ];

        $g5 = [
        	'nick' => 'janej',
        	'time' => '00:03'
        ];



        Gamer::create($g1);
        Gamer::create($g2);
        Gamer::create($g3);
        Gamer::create($g4);
        Gamer::create($g5);
    }
}
