<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{

    function getDataURI($imagePath) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($imagePath);
        return 'data:' . $type . ';base64,' . base64_encode(file_get_contents($imagePath));
    }









    public function upload_file(Request $request)
    {
        if($request->hasFile('dp_chalani_file'))
        {
            $file=$request->file('dp_chalani_file');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('dp_chalani_file',$filename.'.'.$file_extension);
        }

        if($request->hasFile('dp_darta_file'))
        {
            $file=$request->file('dp_darta_file');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('dp_darta_file', $filename.'.'.$file_extension);
        }

        if($request->hasFile('dp_pratinidhi_profile_pic'))
        {
            $file=$request->file('dp_pratinidhi_profile_pic');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
//            $request->session()->put('dp_pratinidhi_profile_pic', $filename.'.'.$file_extension);
            return array(
                'input_field_name'=>'dp_pratinidhi_profile_pic',
                'file_name'=>$filename.'.'.$file_extension
            );
        }


        if($request->hasFile('dp_pratinidhi_parichayapatra_file'))
        {

            $file=$request->file('dp_pratinidhi_parichayapatra_file');

            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
//            $request->session()->put('dp_pratinidhi_parichayapatra_file', $filename.'.'.$file_extension);
            return array(
                'input_field_name'=>'dp_pratinidhi_parichayapatra_file',
                'file_name'=>$filename.'.'.$file_extension
            );
        }


        if($request->hasFile('dp_karmachari_profile_pic'))
        {
            $file=$request->file('dp_karmachari_profile_pic');

            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('dp_karmachari_profile_pic', $filename.'.'.$file_extension);
        }

        if($request->hasFile('mahila_profile_picture'))
        {
            $file=$request->file('mahila_profile_picture');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('mahila_profile_picture', $filename.'.'.$file_extension);
        }
        if($request->hasFile('mahila_citizenship'))
        {
            $file=$request->file('mahila_citizenship');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('mahila_citizenship', $filename.'.'.$file_extension);
        }


        if($request->hasFile('baalbaalika_profile_picture'))
        {
            $file=$request->file('baalbaalika_profile_picture');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('baalbaalika_profile_picture', $filename.'.'.$file_extension);
        }
        if($request->hasFile('baalbaalika_birth_certificate'))
        {
            $file=$request->file('baalbaalika_birth_certificate');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('baalbaalika_birth_certificate', $filename.'.'.$file_extension);
        }

        if($request->hasFile('apaanga_profile_picture'))
        {
            $file=$request->file('apaanga_profile_picture');
            $file_extension=$file->extension();

            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('apaanga_profile_picture', $filename.'.'.$file_extension);
        }


        if($request->hasFile('apaanga_citizenship'))
        {
            $file=$request->file('apaanga_citizenship');
            $file_extension=$file->extension();
            $filename=uniqid().'-'.now()->timestamp;
            $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
            $request->session()->put('apaanga_citizenship', $filename.'.'.$file_extension);
        }


        if($request->hasFile('nibedan_document_file'))
        {
            if($request->session()->has('nibedan_document_file'))
            {

                $image_name_array=$request->session()->get('nibedan_document_file');
                $file=$request->file('nibedan_document_file');
                $file_extension=$file->extension();
                $filename=uniqid().'-'.now()->timestamp;
                $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
                array_push($image_name_array,$filename.'.'.$file_extension);

                $request->session()->put('nibedan_document_file', $image_name_array);
//                $request->session()->forget('nibedan_document_file');
                return $filename.'.'.$file_extension;

            }
            else{

                $file=$request->file('nibedan_document_file');
                $file_extension=$file->extension();
                $filename=uniqid().'-'.now()->timestamp;
                $file->storeAs('/files/temp-files/',$filename.'.'.$file_extension);
                $request->session()->put('nibedan_document_file', [$filename.'.'.$file_extension]);
                return $filename.'.'.$file_extension;
            }
        }
    }
}