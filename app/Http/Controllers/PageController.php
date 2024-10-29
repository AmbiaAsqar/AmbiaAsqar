<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiUrl;
use App\Helpers\ResponseData;
use Http;

class PageController extends Controller
{
    const theme = 0;
    const themename = ["adorable"];
    const themestatus = 1;

    public function index() {
        $url = new ResponseData();
        $data['getnews'] = $url->getData(ApiUrl::$getnews, null);
        $data['gettodaynews'] = $url->getData(ApiUrl::$gettodaynews, null);
        $data['getcategory'] = $url->getData(ApiUrl::$getcategory, null);
        $data['gethotnews'] = $url->getData(ApiUrl::$gethotnews, null);
        if(self::themestatus) {
            return view('content.'.self::themename[self::theme].'_homepage', $data);
        }
        return view('content.homepages', $data);
    }

    public function category($id) {
        $url = new ResponseData();
        $data['getcategory'] = $url->getData(ApiUrl::$getcategory, null);
        $data['gettodaynews'] = $url->getDetailData(ApiUrl::$gettodaycatnews, null, $id);
        $data['getnews'] = $url->getDetailData(ApiUrl::$getnewscategory, null, $id);
        $data['gethotnews'] = $url->getData(ApiUrl::$gethotnews, null);
        if(self::themestatus) {
            return view('category.'.self::themename[self::theme].'_category', $data);
        }
        return view('category', $data);
    }

    public function getSimilarTopic($id) {
        $url = new ResponseData();
        $decode = base64_decode($id);
        $split = substr($decode, 10);
        $data['getsimilartopic'] = $url->getDetailData(ApiUrl::$getsimilartopic, null, $id);
        return $data['getsimilartopic'][0]['content_id'];
    }

    public function detailPost($id) {
        $url = new ResponseData();
        $decode = base64_decode($id);
        $split = substr($decode, 10);
        $encode = base64_encode($split);
        $data['gettodaynews'] = $url->getData(ApiUrl::$gettodaynews, null);
        // $data['gettodaynews'] = $url->getPageDetail(ApiUrl::$gettodaynews, null, $encode);
        $data['getnews'] = $url->getPageDetail(ApiUrl::$getnews, null, $split);
        $data['getregularnews'] = $url->getData(ApiUrl::$getnews, null);
        $data['getmynews'] = $url->getData(ApiUrl::$getnews, null);
        $data['getcategory'] = $url->getData(ApiUrl::$getcategory, null);
        $data['gethotnews'] = $url->getData(ApiUrl::$gethotnews, null);
        $data['getsimilartopic'] = $url->getDetailData(ApiUrl::$getsimilartopic, null, $split);
        $data['getrandomnews'] = $url->getData(ApiUrl::$getrandomnews, null);
        return view('post.adorable_detailPost', $data);
    }

    public function userView(Request $request) {
        $url = new ResponseData();
        $req = $request->input('newsid');
        // $postData = $url->postData(ApiUrl::$postuserview, $req);
        if(!$postData) {
            return json_encode([
                'status' => 401,
                'message' => "Failed to post data",
                'request' => $req.' '.ApiUrl::$postuserview,
            ]);
        }
        return json_encode([
            'status' => 200,
            'message' => "Success",
            'request' => $req.' '.ApiUrl::$postuserview,
        ]);
    }

    public function getBrowsePage() {
        $url = new ResponseData();
        $data['getnews'] = $url->getData(ApiUrl::$getnews, null);
        $data['gettodaynews'] = $url->getData(ApiUrl::$gettodaynews, null);
        $data['getcategory'] = $url->getData(ApiUrl::$getcategory, null);
        $data['gethotnews'] = $url->getData(ApiUrl::$gethotnews, null);
        if(self::themestatus) {
            return view('browse/'.self::themename[self::theme].'_browse', $data);
        }
        return view('browse/browse', $data);
    }
}
