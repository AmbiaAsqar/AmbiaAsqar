<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCheckController extends Controller
{
    public function check($user_id = null, $zone_id = null, $game = null)
    {
        $api = \DB::table('setting_webs')->where('id',1)->first();
        $params = [
            'key' => $api->vip_apikey,
            'sign'    => md5($api->vip_apiid.$api->vip_apikey),
            'type'    => 'get-nickname',
            'code'    => $game,
            'target' => $user_id,
            'additional_target' => ($game=='genshin-impact') ? 'os_'.$zone_id : $zone_id
        ];
        
        $result = $this->connect($params);
        // dd(ENV("ELNOUVA_API"));
        //dd($result);
        if($result['result'] == true){
            return array(
                'status' => array('code' => 200),
                'data' => array('userNameGame' => $result['data'])
            );
        }else{
            return array(
                'status'     => array('code' => 1)
            );
        }
    }

    public function connect($data = null)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'https://vip-reseller.co.id/api/game-feature');
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/x-www-form-urlencoded']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        
        $chresult = curl_exec($ch);
        curl_close($ch);
        $json_result = json_decode($chresult, true);
        return $json_result;
    }
}