<?php

namespace Database\Seeders;

use App\Models\Sadasya;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SadasyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sadasya= new Sadasya();
        # code...
        $sadasya->name=Str::random(10);
        $sadasya->save();

    }
}
