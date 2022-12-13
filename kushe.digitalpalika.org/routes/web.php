<?php

use App\Http\Controllers\File\FileUploadController;


use App\Http\Controllers\Sifaris\GarJagga\CharKillasifarisController;
use App\Http\Controllers\Sifaris\GarJagga\ChauhaddhiSifarisController;
use App\Http\Controllers\Sifaris\GarJagga\GarBatoPramanitController;
use App\Http\Controllers\Sifaris\GarJagga\GarJaggaNamsariKitaniController;
use App\Http\Controllers\Sifaris\GarJagga\GarJaggaNamsariSifarisController;
use App\Http\Controllers\Sifaris\GarJagga\GarJanauneSifarisController;
use App\Http\Controllers\Sifaris\Garjagga\GarKayamSifarisController;
use App\Http\Controllers\Sifaris\GarJagga\GarPatalVayekoSifarisController;
use App\Http\Controllers\Sifaris\GarJagga\JotBhokChalanSifarisController;
use App\Http\Controllers\Sifaris\GarJagga\LalpurjaPratilipiSifarisController;
use App\Http\Controllers\Sifaris\GarJagga\KittakatSifarisController;
use App\Http\Controllers\Sifaris\GarJagga\PurjaMaGarKayamSifarisController;
use App\Http\Controllers\Sifaris\Nagarikta\NagariktaPramanPatraController;
use App\Http\Controllers\Sifaris\Nagarikta\NagariktaPramanPatraFromPatiController;
use App\Http\Controllers\Sifaris\Nagarikta\NagariktaPratilipiSifarisController;
use App\Http\Controllers\Sifaris\Nagarikta\NepaliAngikritNagariktaController;
use App\Http\Controllers\Sifaris\Nagarikta\NepaliNagariktaPramanPatraPratilipiController;
use App\Http\Controllers\Sifaris\Nagarikta\NepaliNagariktaSifarisController;
use App\Http\Controllers\Sifaris\Nibedan\AadibasiPramanitNibedanController;
use App\Http\Controllers\Sifaris\Nibedan\BipannaNagarikNibedanController;
use App\Http\Controllers\Sifaris\Nibedan\BriddhaBhattaNibedanController;
use App\Http\Controllers\Sifaris\Nibedan\ByabasayaDarkhastaNibedanController;
use App\Http\Controllers\Sifaris\Nibedan\FormKharejiController;
use App\Http\Controllers\Sifaris\Nibedan\JaggaSaghSimangkanController;
use App\Http\Controllers\Sifaris\Nibedan\NibedanController;

use App\Http\Controllers\Sifaris\SifarisController;


use App\Models\Form\Field\Ftext;

use App\Models\Sewa\Yojana\DpChalaniModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
// wadapatra
use App\Http\Controllers\WadaPatra\WadaPatraController;
use App\Http\Controllers\WadaPatra\GharJaggaController;
use App\Http\Controllers\WadaPatra\PanjiKaranController;
use App\Http\Controllers\WadaPatra\SewaSubidhaController;
use App\Http\Controllers\WadaPatra\ByaparByawasayaController;
use App\Http\Controllers\WadaPatra\KarKanunController;
use App\Http\Controllers\WadaPatra\KrishiSikshaSwasthaController;
use App\Http\Controllers\WadaPatra\BasaiSaraiController;
// sewa
use App\Http\Controllers\Sewa\SewaController;
use App\Http\Controllers\Sewa\YojanaController;
use App\Http\Controllers\Sewa\JinsiController;
use App\Http\Controllers\Sewa\SuchanaPrabidhiController;
use App\Http\Controllers\Sewa\SikshaController;
use App\Http\Controllers\Sewa\SwasthyaController;
use App\Http\Controllers\Sewa\KrishiController;
use App\Http\Controllers\Sewa\DartaController;
use App\Http\Controllers\Sewa\ChalaniController;

// sewa/sifaris

use App\Http\Controllers\Sifaris\PassportSifarisController;
use App\Http\Controllers\Sifaris\TheganaPramanikaranSifarisController;
use App\Http\Controllers\Sifaris\NikasiSifarisController;
use App\Http\Controllers\Sifaris\NagariktaSifarisController;
use App\Http\Controllers\Sifaris\BasaiSaraiSifarisController;
use App\Http\Controllers\Sifaris\KrishiSifarisController;

// sewa - Yojana
use App\Http\Controllers\Sewa\Yojana\DepartmentController;
use App\Http\Controllers\Sewa\Yojana\LevelController;
use App\Http\Controllers\Sewa\Yojana\ProcessLevelController;
use App\Http\Controllers\Sewa\Yojana\SourceController;
use App\Http\Controllers\Sewa\Yojana\SubjectiveAreaController;
use App\Http\Controllers\Sewa\Yojana\SubjectiveSubAreaController;
use App\Http\Controllers\Sewa\Yojana\SubjectiveSubAreaTypeController;

// sewa/parichayapatra
use App\Http\Controllers\Sewa\ParichayaPatraController;
use App\Http\Controllers\Sewa\ParichayaPatra\MahilaParichayaPatraController;
use App\Http\Controllers\Sewa\ParichayaPatra\BaalBaalikaParichayaPatraController;
use App\Http\Controllers\Sewa\ParichayaPatra\ApaangaParichayaPatraController;

// sewa/ghatana-darta
use App\Http\Controllers\Sewa\GhatanaDartaController;
use App\Http\Controllers\Sewa\GhatanaDarta\JanmaDartaController;
use App\Http\Controllers\Sewa\GhatanaDarta\MrityuDartaController;
use App\Http\Controllers\Sewa\GhatanaDarta\BibahaDartaController;
use App\Http\Controllers\GaupalikaNagarpalika\GaupalikaNagarpalikaController;

use App\Http\Controllers\Notification\NotificationController;
// setting/setting
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Setting\KarmachariController;
use App\Http\Controllers\Setting\PratinidhiController;
use App\Http\Controllers\Setting\ParichayaController;
use App\Http\Controllers\Setting\WardController;
use App\Http\Controllers\Setting\PatraController;
use App\Http\Controllers\Setting\SadasyaController;
use App\Http\Controllers\Setting\SakhaController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan\BhootaniMadyamController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\EkaikoPrakarController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\KaryakramController;


use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan\BhutaniBidhiController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan\BudgetShrotController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan\BudgetUpseparkController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan\LekhaShirsakBeywasthapanController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan\PrasiKoShrotController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan\SahayakLedgerController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\ArthikBharsaController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\BisayagatKaryaChetraController;

use Illuminate\Support\Facades\Auth;



// yojana/yojana
use App\Http\Controllers\Yojana\YojanaController as Yc;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\KharchakoFaatwariBhiwaranController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\KharidPrakarController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\LachitSamahaController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\PrathmikataPrakarController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\RanauticSanketController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\ThekedarPrakarController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\YojanaAwasthaController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\YojanaChanautAdharController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\YojanaKissimController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\YojanaKriyakalapController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\YojanaPrakritiController;
use App\Http\Controllers\Yojana\AdharbhootiBhiwarna\YojanaSambandhi\YojanaSanchalanPrakriyaController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\YojanaStaraController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\YojanaUdesyaController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\KharyalayaController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\MudhaNamController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\NirmanSamagriBhiwaranController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\PatraPatrikaBhiwaranController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\Sadak\DhalNikasKissimController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\Sadak\SadakPrakarController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\Sadak\SadakSethiController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\SadharanEkaiKoPrakarController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\SahayakModuleController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\SuchikritBhiwaran\SuchikritBhiwaranController;
use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\SuchikritBhiwaran\SuchikritPrakarController;
//use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\EkaikoPrakarController;
//use App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi\KaryakramController;
use App\Models\Yojana\AdharBhooti\Sadharan\NirmanSamagriBhiwaran;
use App\Models\Yojana\AdharBhooti\Sadharan\Sadak\DhalNikasKissim;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/check',function (){
//    return view('sewa.parichayapatra.mahila.parichayapatra_doc');
//});



Route::post('/check',function (\Illuminate\Http\Request $request){


//    file_put_contents(, );
    $filename=uniqid().'-'.now()->timestamp.'.pdf';
    file_put_contents (storage_path('app/'.$filename), base64_decode($request->newpdf), $flags = 0, $context = null);

    return $filename;
//    file_put_contents('/home/user/Documents/invoices/'.$year.'/' . $pdfname . '.pdf', base64_decode($request->newpdf));

//    dd(\Illuminate\Support\Facades\Request::session()->get('nibedan_document_file'));
//    $value='01 1234567';
//    $main_phone_no_count=10;
//    if (strpos($value,'-'))
//    {
//        $phone_no=explode('-',$value)[1];
//        $main_phone_no_count=sizeof(mb_str_split($phone_no));
//    }
//    if (strpos($value,' '))
//    {
//        $phone_no=explode(' ',$value)[1];
//        $main_phone_no_count=sizeof(mb_str_split($phone_no));
//    }
//            explode()
    //regular expression for nepali phone number formate
//    echo preg_match("/(?:\+977[- ])?\d{2}[- ]?\d{7,8}$/", $value)&&(7<$main_phone_no_count&&$main_phone_no_count<=10);
//    $splited_string=mb_str_split('१२३४५६७८९०');
//    $number_of_char=sizeof($splited_string);
//    return preg_match("/^[१२३४५६७८९०]+$/",'१२३४५६७८९०') && ($number_of_char==10);
})->name('check');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('');
})->name('logout');

Route::group(['middleware' => ['auth']], function () {


    //this route converts base 64 file into pdf file and returns
    Route::post('/pdf/base64topdf',function (\Illuminate\Http\Request $request){
        if ($request->base64pdf!="")
        {
            $filename=uniqid().'-'.now()->timestamp.'.pdf';
            file_put_contents (storage_path('app/files/temp-files'.$filename), base64_decode($request->base64pdf), $flags = 0, $context = null);
            return $filename;
        }
        else{
            return '';
        }

    })->name('base64topdf');
    //this route returns pdf file from server according to name provided by server
    Route::get('/pdf/{file_name}', function ($file_name) {
        // file path
        $path = storage_path('app/files/temp-files'.$file_name);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $file_name . '"'
        ];
        //ajax response
        return response()->file($path, $header);
    })->name('pdf');


    Route::resource('notification', NotificationController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    // Gaupalika/Nagarpalika
    Route::get('gaupalika-nagarpalika', [GaupalikaNagarpalikaController::class, 'index'])->name('gn.index');

    Route::prefix('gaupalika-nagarpalika')->group(function(){
        Route::get('palika-parichaya',[GaupalikaNagarpalikaController::class,'show'])->name('palika-parichaya.show');
        // Route::resource('palika-parchaya', GaupalikaNagarpalikaController::class);
    });







    // settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::prefix('settings')->group(function () {
        Route::resource('parichaya', ParichayaController::class);
        Route::resource('karmachari', KarmachariController::class);
        Route::prefix('karmachari')->group(function () {
        });
        Route::resource('ward', WardController::class);
        Route::resource('pratinidhi', PratinidhiController::class);
        Route::prefix('pratinidhi')->group(function () {

            Route::post('{id}/update', [PratinidhiController::class, 'update'])->name('pratinidhi.update');
        });

        Route::resource('sakha', SakhaController::class);
        Route::resource('sadasya', SadasyaController::class);
        Route::resource('patra-kisim', PatraController::class);
    });








    // wada patra
    Route::get('wada-patra', [WadaPatraController::class, 'index'])->name('wada-patra.index');
    Route::prefix('wada-patra')->group(function () {
        Route::resource('ghar-jagga', GharJaggaController::class);
        Route::resource('panji-karan', PanjiKaranController::class);
        Route::resource('sewa-subidha', SewaSubidhaController::class);
        Route::resource('byapar-byawasaya', ByaparByawasayaController::class);
        Route::resource('kar-kanun', KarKanunController::class);
        Route::resource('krishi-siksha-swastha', KrishiSikshaSwasthaController::class);
        Route::resource('basai-sarai', BasaiSaraiController::class);
    });





    // sifaris
    Route::get('sifaris', [SifarisController::class, 'index'])->name('sifaris.index');

    Route::prefix('sifaris')->group(function(){

        Route::resource('nagarikta', NagariktaSifarisController::class);
        Route::resource('thegana-pramanikaran', TheganaPramanikaranSifarisController::class);
        Route::resource('nikasi', NikasiSifarisController::class);
        Route::resource('passport', PassportSifarisController::class);
        Route::resource('basai-sarai-sifaris', BasaiSaraiSifarisController::class);
        Route::resource('krishi-sifaris', KrishiSifarisController::class);


        //nibedan
            Route::resource('nibedan',NibedanController::class);
            Route::resource('aadibasi-pramanit', AadibasiPramanitNibedanController::class);
            Route::post('aadibasi-pramanit/update/{id}', [AadibasiPramanitNibedanController::class, 'update'])->name('aadibasi-pramanit.update');
            Route::get('aadibasi-pramanit/{id}/default',[AadibasiPramanitNibedanController::class,'show_default'])->name('aadibasi-pramanit.default');
            Route::get('aadibasi-pramanit/{id}/pdf',[AadibasiPramanitNibedanController::class,'show_pdf'])->name('aadibasi-pramanit.pdf');


            Route::resource('byabasaya-darkhasta', ByabasayaDarkhastaNibedanController::class);
            Route::post('byabasaya-darkhasta/update/{id}', [ByabasayaDarkhastaNibedanController::class, 'update'])->name('byabasaya-darkhasta.update');
            Route::get('byabasaya-darkhasta/{id}/default',[ByabasayaDarkhastaNibedanController::class,'show_default'])->name('byabasaya-darkhasta.default');
            Route::get('byabasaya-darkhasta/{id}/pdf',[ByabasayaDarkhastaNibedanController::class,'show_pdf'])->name('byabasaya-darkhasta.pdf');


//            Route::get('briddha-bhatta/index',[BriddhaBhattaNibedanController::class,'index'])->name('briddha-bhatta.index_page');
            Route::resource('briddha-bhatta', BriddhaBhattaNibedanController::class);
            Route::get('briddha-bhatta/{id}/default',[BriddhaBhattaNibedanController::class,'show_default'])->name('briddha-bhatta.default');
            Route::post('briddha-bhatta/update/{id}', [BriddhaBhattaNibedanController::class, 'update'])->name('briddha-bhatta.update');
            Route::get('briddha-bhatta/{id}/pdf',[BriddhaBhattaNibedanController::class,'show_pdf'])->name('briddha-bhatta.pdf');

            Route::resource('bipanna-nagarik',BipannaNagarikNibedanController::class);
            Route::get('bipanna-nagarik/{id}/default',[BipannaNagarikNibedanController::class,'show_default'])->name('bipanna-nagarik.default');
            Route::get('bipanna-nagarik/{id}/pdf',[BipannaNagarikNibedanController::class,'show_pdf'])->name('bipanna-nagarik.pdf');
            Route::post('bipanna-nagarik/update/{id}', [BipannaNagarikNibedanController::class, 'update'])->name('bipanna-nagarik.update');


            Route::resource('form-khareji',FormKharejiController::class);
            Route::get('form-khareji/{id}/default',[FormKharejiController::class,'show_default'])->name('form-khareji.default');
            Route::get('form-khareji/{id}/pdf',[FormKharejiController::class,'show_pdf'])->name('form-khareji.pdf');
            Route::post('form-khareji/update/{id}', [FormKharejiController::class, 'update'])->name('form-khareji.update');


            Route::resource('jagga-sagh-simangkan',JaggaSaghSimangkanController::class);
            Route::get('jagga-sagh-simangkan/{id}/default',[JaggaSaghSimangkanController::class,'show_default'])->name('jagga-sagh-simangkan.default');
            Route::get('jagga-sagh-simangkan/{id}/pdf',[JaggaSaghSimangkanController::class,'show_pdf'])->name('jagga-sagh-simangkan.pdf');
            Route::post('jagga-sagh-simangkan/update/{id}', [JaggaSaghSimangkanController::class, 'update'])->name('jagga-sagh-simangkan.update');






            Route::resource('nagarikta-pratilipi',NagariktaPratilipiSifarisController::class);
            Route::get('nagarikta-pratilipi/{id}/default',[NagariktaPratilipiSifarisController::class,'show_default'])->name('nagarikta-pratilipi.default');
            Route::get('nagarikta-pratilipi/{id}/pdf',[NagariktaPratilipiSifarisController::class,'show_pdf'])->name('nagarikta-pratilipi.pdf');
            Route::post('nagarikta-pratilipi/update/{id}', [NagariktaPratilipiSifarisController::class, 'update'])->name('nagarikta-pratilipi.update');


            Route::resource('nagarikta-pramanpatra',NagariktaPramanPatraController::class);
            Route::get('nagarikta-pramanpatra/{id}/default',[NagariktaPramanPatraController::class,'show_default'])->name('nagarikta-pramanpatra.default');
            Route::get('nagarikta-pramanpatra/{id}/pdf',[NagariktaPramanPatraController::class,'show_pdf'])->name('nagarikta-pramanpatra.pdf');
            Route::post('nagarikta-pramanpatra/update/{id}', [NagariktaPramanPatraController::class, 'update'])->name('nagarikta-pramanpatra.update');

            Route::resource('nagarikta-sifaris',NepaliNagariktaSifarisController::class);
            Route::get('nagarikta-sifaris/{id}/default',[NepaliNagariktaSifarisController::class,'show_default'])->name('nagarikta-sifaris.default');
            Route::get('nagarikta-sifaris/{id}/pdf',[NepaliNagariktaSifarisController::class,'show_pdf'])->name('nagarikta-sifaris.pdf');
            Route::post('nagarikta-sifaris/update/{id}', [NepaliNagariktaSifarisController::class, 'update'])->name('nagarikta-sifaris.update');

            Route::resource('nagarikta-pramanpatra-frompati',NagariktaPramanPatraFromPatiController::class);
            Route::get('nagarikta-pramanpatra-frompati/{id}/default',[NagariktaPramanPatraFromPatiController::class,'show_default'])->name('nagarikta-pramanpatra-frompati.default');
            Route::get('nagarikta-pramanpatra-frompati/{id}/pdf',[NagariktaPramanPatraFromPatiController::class,'show_pdf'])->name('nagarikta-pramanpatra-frompati.pdf');
            Route::post('nagarikta-pramanpatra-frompati/update/{id}', [NagariktaPramanPatraFromPatiController::class, 'update'])->name('nagarikta-pramanpatra-frompati.update');


            Route::resource('nepali-angikrit-nagarikta',NepaliAngikritNagariktaController::class);
            Route::get('nepali-angikrit-nagarikta/{id}/default',[NepaliAngikritNagariktaController::class,'show_default'])->name('nepali-angikrit-nagarikta.default');
            Route::get('nepali-angikrit-nagarikta/{id}/pdf',[NepaliAngikritNagariktaController::class,'show_pdf'])->name('nepali-angikrit-nagarikta.pdf');
            Route::post('nepali-angikrit-nagarikta/update/{id}', [NepaliAngikritNagariktaController::class, 'update'])->name('nepali-angikrit-nagarikta.update');


        Route::resource('nagarikta-pramanpatra-pratilipi',NepaliNagariktaPramanPatraPratilipiController::class);
        Route::get('nagarikta-pramanpatra-pratilipi/{id}/default',[NepaliNagariktaPramanPatraPratilipiController::class,'show_default'])->name('nagarikta-pramanpatra-pratilipi.default');
        Route::get('nagarikta-pramanpatra-pratilipi/{id}/pdf',[NepaliNagariktaPramanPatraPratilipiController::class,'show_pdf'])->name('nagarikta-pramanpatra-pratilipi.pdf');
        Route::post('nagarikta-pramanpatra-pratilipi/update/{id}', [NepaliNagariktaPramanPatraPratilipiController::class, 'update'])->name('nagarikta-pramanpatra-pratilipi.update');


        Route::resource('garjagga-namsari-kitani',GarJaggaNamsariKitaniController::class);
        Route::get('garjagga-namsari-kitani/{id}/default',[GarJaggaNamsariKitaniController::class,'show_default'])->name('garjagga-namsari-kitani.default');
        Route::get('garjagga-namsari-kitani/{id}/pdf',[GarJaggaNamsariKitaniController::class,'show_pdf'])->name('garjagga-namsari-kitani.pdf');
        Route::post('garjagga-namsari-kitani/update/{id}', [GarJaggaNamsariKitaniController::class, 'update'])->name('garjagga-namsari-kitani.update');

        Route::resource('gar-kayam-sifaris',GarKayamSifarisController::class);
        Route::get('gar-kayam-sifaris/{id}/default',[GarKayamSifarisController::class,'show_default'])->name('gar-kayam-sifaris.default');
        Route::get('gar-kayam-sifaris/{id}/pdf',[GarKayamSifarisController::class,'show_pdf'])->name('gar-kayam-sifaris.pdf');
        Route::post('gar-kayam-sifaris/update/{id}', [GarKayamSifarisController::class, 'update'])->name('gar-kayam-sifaris.update');

        Route::resource('garjagga-namsari-sifaris',GarJaggaNamsariSifarisController::class);
        Route::get('garjagga-namsari-sifaris/{id}/default',[GarJaggaNamsariSifarisController::class,'show_default'])->name('garjagga-namsari-sifaris.default');
        Route::get('garjagga-namsari-sifaris/{id}/pdf',[GarJaggaNamsariSifarisController::class,'show_pdf'])->name('garjagga-namsari-sifaris.pdf');
        Route::post('garjagga-namsari-sifaris/update/{id}', [GarJaggaNamsariSifarisController::class, 'update'])->name('garjagga-namsari-sifaris.update');


        Route::resource('gar-janaune-sifaris',GarJanauneSifarisController::class);
        Route::get('gar-janaune-sifaris/{id}/default',[GarJanauneSifarisController::class,'show_default'])->name('gar-janaune-sifaris.default');
        Route::get('gar-janaune-sifaris/{id}/pdf',[GarJanauneSifarisController::class,'show_pdf'])->name('gar-janaune-sifaris.pdf');
        Route::post('gar-janaune-sifaris/update/{id}', [GarJanauneSifarisController::class, 'update'])->name('gar-janaune-sifaris.update');


        Route::resource('kittakat-sifaris',KittakatSifarisController::class);
        Route::get('kittakat-sifaris/{id}/default',[KittakatSifarisController::class,'show_default'])->name('kittakat-sifaris.default');
        Route::get('kittakat-sifaris/{id}/pdf',[KittakatSifarisController::class,'show_pdf'])->name('kittakat-sifaris.pdf');
        Route::post('kittakat-sifaris/update/{id}', [KittakatSifarisController::class, 'update'])->name('kittakat-sifaris.update');

        Route::resource('gar-bato-pramanit',GarBatoPramanitController::class);
        Route::get('gar-bato-pramanit/{id}/default',[GarBatoPramanitController::class,'show_default'])->name('gar-bato-pramanit.default');
        Route::get('gar-bato-pramanit/{id}/pdf',[GarBatoPramanitController::class,'show_pdf'])->name('gar-bato-pramanit.pdf');
        Route::post('gar-bato-pramanit/update/{id}', [GarBatoPramanitController::class, 'update'])->name('gar-bato-pramanit.update');

        Route::resource('char-killa-sifaris',CharKillasifarisController::class);
        Route::get('char-killa-sifaris/{id}/default',[CharKillasifarisController::class,'show_default'])->name('char-killa-sifaris.default');
        Route::get('char-killa-sifaris/{id}/pdf',[CharKillasifarisController::class,'show_pdf'])->name('char-killa-sifaris.pdf');
        Route::post('char-killa-sifaris/update/{id}', [CharKillasifarisController::class, 'update'])->name('char-killa-sifaris.update');

        Route::resource('lalpurja-pratilipi-sifaris',LalpurjaPratilipiSifarisController::class);
        Route::get('lalpurja-pratilipi-sifaris/{id}/default',[LalpurjaPratilipiSifarisController::class,'show_default'])->name('lalpurja-pratilipi-sifaris.default');
        Route::get('lalpurja-pratilipi-sifaris/{id}/pdf',[LalpurjaPratilipiSifarisController::class,'show_pdf'])->name('lalpurja-pratilipi-sifaris.pdf');
        Route::post('lalpurja-pratilipi-sifaris/update/{id}', [LalpurjaPratilipiSifarisController::class, 'update'])->name('lalpurja-pratilipi-sifaris.update');

        Route::resource('purjama-gar-kayam-sifaris',PurjaMaGarKayamSifarisController::class);
        Route::get('purjama-gar-kayam-sifaris/{id}/default',[PurjaMaGarKayamSifarisController::class,'show_default'])->name('purjama-gar-kayam-sifaris.default');
        Route::get('purjama-gar-kayam-sifaris/{id}/pdf',[PurjaMaGarKayamSifarisController::class,'show_pdf'])->name('purjama-gar-kayam-sifaris.pdf');
        Route::post('purjama-gar-kayam-sifaris/update/{id}', [PurjaMaGarKayamSifarisController::class, 'update'])->name('purjama-gar-kayam-sifaris.update');


        Route::resource('gar-patal-vayeko-sifaris',GarPatalVayekoSifarisController::class);
        Route::get('gar-patal-vayeko-sifaris/{id}/default',[GarPatalVayekoSifarisController::class,'show_default'])->name('gar-patal-vayeko-sifaris.default');
        Route::get('gar-patal-vayeko-sifaris/{id}/pdf',[GarPatalVayekoSifarisController::class,'show_pdf'])->name('gar-patal-vayeko-sifaris.pdf');
        Route::post('gar-patal-vayeko-sifaris/update/{id}', [GarPatalVayekoSifarisController::class, 'update'])->name('gar-patal-vayeko-sifaris.update');

        Route::resource('jot-bhok-chalan-sifaris',JotBhokChalanSifarisController::class);
        Route::get('jot-bhok-chalan-sifaris/{id}/default',[JotBhokChalanSifarisController::class,'show_default'])->name('jot-bhok-chalan-sifaris.default');
        Route::get('jot-bhok-chalan-sifaris/{id}/pdf',[JotBhokChalanSifarisController::class,'show_pdf'])->name('jot-bhok-chalan-sifaris.pdf');
        Route::post('jot-bhok-chalan-sifaris/update/{id}', [JotBhokChalanSifarisController::class, 'update'])->name('jot-bhok-chalan-sifaris.update');

        Route::resource('chauhadhi-sifaris',ChauhaddhiSifarisController::class);
        Route::get('chauhadhi-sifaris/{id}/default',[ChauhaddhiSifarisController::class,'show_default'])->name('chauhadhi-sifaris.default');
        Route::get('chauhadhi-sifaris/{id}/pdf',[ChauhaddhiSifarisController::class,'show_pdf'])->name('chauhadhi-sifaris.pdf');
        Route::post('chauhadhi-sifaris/update/{id}', [ChauhaddhiSifarisController::class, 'update'])->name('chauhadhi-sifaris.update');
    });

    // sewa
    Route::get('sewa', [SewaController::class, 'index'])->name('sewa.index');
    Route::prefix('sewa')->group(function () {
//        Route::get('yojana', [YojanaController::class, 'index'])->name('yojana.index');
//        Route::prefix('yojana')->group(function () {
//            Route::get('show', [YojanaController::class, 'show'])->name('yojana.show');
//            Route::get('create', [YojanaController::class, 'create'])->name('yojana.create');
//            Route::get('settings', [YojanaController::class, 'settings'])->name('yojana.settings');
//            Route::prefix('settings')->group(function () {
//                Route::resource('department', DepartmentController::class);
//                Route::resource('level', LevelController::class);
//                Route::resource('process-level', ProcessLevelController::class);
//                Route::resource('sources', SourceController::class);
//                Route::resource('subjective-area', SubjectiveAreaController::class);
//                Route::resource('subjective-sub-area', SubjectiveSubAreaController::class);
//                Route::resource('subjective-subarea-type', SubjectiveSubAreaTypeController::class);
//            });
//        });
        Route::resource('darta', DartaController::class);
        Route::post('darta/update/{id}', [DartaController::class, 'update'])->name('darta.update');



        Route::resource('chalani', ChalaniController::class);
        Route::post('chalani/update/{id}', [ChalaniController::class, 'update'])->name('chalani.update');
        Route::prefix('chalani')->group(function () {
        });
        Route::resource('suchana-prabidhi', SuchanaPrabidhiController::class);


        Route::get('parichaya-patra', [ParichayaPatraController::class, 'index'])->name('parichaya-patra.index');
        Route::prefix('parichaya-patra')->group(function () {
            Route::resource('mahila', MahilaParichayaPatraController::class);
            Route::prefix('mahila')->group(function () {
                Route::post('update/{id}', [MahilaParichayaPatraController::class, 'update'])->name('mahila.update');
                Route::get('{id}/pdf', [MahilaParichayaPatraController::class, 'createPdfMahilaParichayaPatra'])->name('parichaya-patra.mahila.pdf');
                Route::get('{id}/default', [MahilaParichayaPatraController::class, 'createDefaultMahilaParichayaPatra'])->name('parichaya-patra.mahila.default');
            });
            Route::resource('baalbaalika', BaalBaalikaParichayaPatraController::class);
            Route::prefix('baalbaalika')->group(function () {
                Route::post('update/{id}', [BaalBaalikaParichayaPatraController::class, 'update'])->name('baalbaalika.update');
                Route::get('{id}/pdf', [BaalBaalikaParichayaPatraController::class, 'createPdfBaalbaalikaParichayaPatra'])->name('parichaya-patra.baalbaalika.pdf');
                Route::get('{id}/default', [BaalBaalikaParichayaPatraController::class, 'createDefaultBaalbaalikaParichayaPatra'])->name('parichaya-patra.baalbaalika.default');
            });
            Route::resource('apaanga', ApaangaParichayaPatraController::class);
            Route::prefix('apaanga')->group(function () {
                Route::post('update/{id}', [ApaangaParichayaPatraController::class, 'update'])->name('apaanga.update');
                Route::get('{id}/pdf', [ApaangaParichayaPatraController::class, 'createPdfApaangaParichayaPatra'])->name('parichaya-patra.apaanga.pdf');
                Route::get('{id}/default', [ApaangaParichayaPatraController::class, 'createDefaultApaangaParichayaPatra'])->name('parichaya-patra.apaanga.default');
            });
        });


        Route::get('ghatana-darta', [GhatanaDartaController::class, 'index'])->name('ghatana-darta.index');
        Route::prefix('ghatana-darta')->group(function () {
            Route::resource('janma-darta', JanmaDartaController::class);
            Route::resource('mrityu-darta', MrityuDartaController::class);
            Route::resource('bibaha-darta', BibahaDartaController::class);
        });

        Route::resource('jinsi', JinsiController::class);
        Route::resource('siksha', SikshaController::class);
        Route::resource('swasthya', SwasthyaController::class);
        Route::resource('krishi', KrishiController::class);
    });


    Route::post('file/upload',[FileUploadController::class,'upload_file'])->name('file.upload');


    Route::post('file/upload', [FileUploadController::class, 'upload_file'])->name('file.upload');
    // for yojana
    Route::get('yojana',[Yc::class,'index'])->name('yojana.index');
    Route::prefix('yojana')->group(function(){
        Route::resource('kharcha-faatwari-bhiwaran',KharchakoFaatwariBhiwaranController::class);
        Route::resource('yojana-kissim',YojanaKissimController::class);
        Route::resource('yojana-udesya',YojanaUdesyaController::class);
        Route::resource('yojana-sanchalan-prakriya',YojanaSanchalanPrakriyaController::class);
        Route::resource('yojana-prakriti',YojanaPrakritiController::class);
        Route::resource('yojana-stara',YojanaStaraController::class);
        Route::resource('yojana-kriyakalap',YojanaKriyakalapController::class);
        Route::resource('kharid-prakar',KharidPrakarController::class);
        Route::resource('prathmikata-prakar',PrathmikataPrakarController::class);
        Route::resource('yojana-chanaut-adhar',YojanaChanautAdharController::class);
        Route::resource('ranautic-sanket',RanauticSanketController::class);
        Route::resource('karyakram',KaryakramController::class);
        Route::resource('ekaiko-prakar',EkaikoPrakarController::class);
        Route::resource('yojana-kramaagat',EkaikoPrakarController::class);
        Route::resource('yojana-awastha',YojanaAwasthaController::class);
        Route::resource('thekedar-prakar',ThekedarPrakarController::class);
        Route::resource('lachit-samaha',LachitSamahaController::class);

        // sadharan
        Route::resource('karyalaya',KharyalayaController::class);
        Route::resource('sadharan-ekaiko-prakar',SadharanEkaiKoPrakarController::class);
        Route::resource('suchikrit-prakar',SuchikritPrakarController::class);
        Route::resource('suchikrit-bhiwaran',SuchikritBhiwaranController::class);
        Route::resource('sadak-prakar',SadakPrakarController::class);
        Route::resource('sadak-sethiti',SadakSethiController::class);
        Route::resource('dhal-nikas-kissim',DhalNikasKissimController::class);
        Route::resource('arthik-barsa',ArthikBharsaController::class);
        Route::resource('mudha-nam',MudhaNamController::class);
        Route::resource('bisayagat-karya-chetras',BisayagatKaryaChetraController::class);
        Route::resource('sahayak-module',SahayakModuleController::class);
        Route::resource('patra-patrika-bhiwaran',PatraPatrikaBhiwaranController::class);
        Route::resource('nirman-samagri-bhiwaran',NirmanSamagriBhiwaranController::class);

        // budget
        Route::resource('budget-upsepark',BudgetUpseparkController::class);
        Route::resource('bhutani-bidhi',BhutaniBidhiController::class);
        Route::resource('prasi-ko-shrot', PrasiKoShrotController::class);
        Route::resource('bhootani-madyam', BhootaniMadyamController::class);
        Route::resource('sahayak-ledger',SahayakLedgerController::class);
        Route::resource('lekha-shirsak-beywasthanpan',LekhaShirsakBeywasthapanController::class);
        Route::resource('budget-shrot',BudgetShrotController::class);
    });

});
