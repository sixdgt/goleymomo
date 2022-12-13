<?php

namespace Database\Seeders;

use App\Models\Sewa\Yojana\DpChalaniModel;
use App\Models\Sewa\Yojana\DpDartaModel;
use Illuminate\Database\Seeder;

class DartaChalaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $darta = new DpDartaModel();
        $darta->dp_chalani_number = 1;
        $darta->dp_darta_number = 321;
        $darta->dp_darta_date = '2002/02/02';
        $darta->dp_darta_letter_department = 'darta';
        $darta->dp_darta_letter_from='from';
        $darta->dp_darta_letter_to = 'to';
        $darta->dp_darta_subject = 'subject';
        $darta->dp_darta_file = 'file';
        $darta->dp_darta_description = 'darta';
        $darta->dp_darta_kaifiyat = 'sign';
        $darta_query =$darta->save();



        $chalani=new DpChalaniModel();

        $chalani->dp_chalani_number = 1;
        $chalani->dp_chalani_date = '2002/02/02';
        $chalani->dp_chalani_subject = 'subject';
        $chalani->dp_chalani_letter_type = 'letters';
        $chalani->dp_chalani_letter_department ='chalani';
        $chalani->dp_chalani_letter_to ='bikram';
        $chalani->dp_chalani_letter_address = 'nepal';
        $chalani->dp_chalani_file = 'file';
        $chalani->dp_chalani_bodartha = 'fdsaf';
        $chalani->dp_chalani_kaifiyat = 'sign';

        $chalani_query=$chalani->save();

    }
}
