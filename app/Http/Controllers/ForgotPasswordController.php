<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Http;
use Auth;

class ForgotPasswordController extends Controller
{
    
    public function forgotPassword()
    {
        return view('template.forgotpassword');
    }
    
    
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric'
        ],
        [
            'phone.required' => 'Harap isi no',
            'phone.numeric' => 'No tidak valid!'
        ]);
        
        $no = $request->phone;
        
        if($no[0] == 0){
            
            $no = str_replace($no[0],'62',$no);
        }
        
        $cek = \App\Models\User::where('no_wa',$no)->first();
        
        if(!$cek){
            
            return back()->with('error','No tidak ditemukan!');
            
        }
        
        $api = \DB::table('setting_webs')->where('id',1)->first();
        
        
        $otp = rand(100000,999999);
        
        $cek->update(['otp' => $otp]);
        
        Session::put('no',$no);
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.fonnte.com/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('target' => "$no",'message' => 'Silahkan masukkan *'.$otp.'* untuk KODE OTP anda.'),
           CURLOPT_HTTPHEADER => array('Authorization: +Z7rTt_Q3B6Gcs7-qojT'),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response;
        
    
        
        
        return view('template.verifyotp');
        
        
        
        
    }
    
    
    public function verifyOtp(Request $request)
    {
        
        $no = Session::get('no');
        
        if(!$no){
            
            return redirect('/forgot-password');
            
        }
        
        $otp = '';
        
        foreach($request->otp as $kode){
            
            $otp .= $kode;
            
        }
        
        
        $cek = \App\Models\User::where('no_wa',$no)->where('otp',$otp)->first();
        
        if(!$cek){
            
            return back()->with('error','Kode OTP tidak valid!');
            
        }
        
        $cek->update(['otp' => NULL]);
        
        
        Auth::login($cek);
        
        
        return redirect('/user/edit/profile');
        
        
        
        
        
    }
    
}