<?php

namespace App\Http\Controllers;

use App\Models\Sewa\Yojana\DpChalaniModel;
use App\Models\Sewa\Yojana\DpDartaModel;
use Illuminate\Http\Request;
use App\Models\Sewa\ParichayaPatra\ApaangaParichayapatra;
use App\Models\Sewa\ParichayaPatra\BaalBaalikaParichayapatra;
use App\Models\Sewa\ParichayaPatra\MahilaParichayapatra;
use App\Models\Sifaris\Nagarikta\NagariktaPramanPatraFromPati;
use App\Models\Sifaris\Nagarikta\NagariktaPramanPatra;
use App\Models\Sifaris\Nagarikta\NagariktaPratilipiSifaris;
use App\Models\Sifaris\Nagarikta\NepaliAngikritNagarikta;
use App\Models\Sifaris\Nagarikta\NepaliNagariktaSifaris;
use App\Models\Sifaris\Nibedan\AadhibasiPramanitNibedan;
use App\Models\Sifaris\Nibedan\BipannaNibedan  ;
use App\Models\Sifaris\Nibedan\BriddhaBhattaNibedan  ;
use App\Models\Sifaris\Nibedan\ByabasayaDarkhastaNibedan;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $darta['total']=DpDartaModel::all()->count();
        $chalani['total']=DpChalaniModel::all()->count();

        $sifaris_modals_count = [
            "NagariktaPramanPatraFromPati" => NagariktaPramanPatraFromPati::count(),
            "NagariktaPramanPatra" => NagariktaPramanPatra::count(),
            "NagariktaPratilipiSifaris" => NagariktaPratilipiSifaris::count(),
            "NepaliAngikritNagarikta" => NepaliAngikritNagarikta::count(),
            "NepaliNagariktaSifaris" => NepaliNagariktaSifaris::count(),
            "AadhibasiPramanitNibedan" => AadhibasiPramanitNibedan::count(),
            "BipannaNibedan" => BipannaNibedan::count(), 
            "BriddhaBhattaNibedan" => BriddhaBhattaNibedan::count(), 
            "ByabasayaDarkhastaNibedan" => ByabasayaDarkhastaNibedan::count(),
        ];

        $sifaris_total = array_sum($sifaris_modals_count);

        $darta_total = DpDartaModel::count();
        $chalani_total = DpChalaniModel::count();
        $apaanga_arichayapatra_total =   ApaangaParichayapatra::count();
        $baal_baalika_parichayapatra_total =   BaalBaalikaParichayapatra::count();
        $mahila_parichayapatra_total =   MahilaParichayapatra::count();
        $parichaya_patra_total =  ($apaanga_arichayapatra_total + $baal_baalika_parichayapatra_total + $mahila_parichayapatra_total);

        $dashboard_counts = [
            'darta' => [
                'total' => $this->convertNumberToDevnagari($darta_total),
            ],
            'chalani' => [
                'total' => $this->convertNumberToDevnagari($chalani_total)
            ],
            'parichaya_patra' =>[
                'total' => $this->convertNumberToDevnagari($parichaya_patra_total)
            ],
            'sifaris' => [
                'total' => $this->convertNumberToDevnagari($sifaris_total)
            ],
            'yojana' => [
                'total' => "०",
            ],
            'suchana' => [
                'total' => "०"
            ]
        ];

        return view('home',compact('darta','chalani','dashboard_counts'));
    }
    public function convertNumberToDevnagari($number)
    {
        $mapped_numbers= [
            0	=>"०",
            1	=>"१",
            2	=>"२",
            3	=>"३",
            4	=>"४",
            5	=>"५",
            6	=>"६",
            7	=>"७",
            8	=>"८",
            9	=>"९",
        ];

        $devnagari_number = "";
        $number_arr = array_map('intval', str_split($number));

        foreach ($number_arr as $num){
            $devnagari_number = $devnagari_number.$mapped_numbers[$num];
        }

        return $devnagari_number;
    }
}
