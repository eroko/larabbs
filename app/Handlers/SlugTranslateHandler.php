<?php

namespace App\Handlers;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;
use PhpParser\Node\Expr\Empty_;

class SlugTranslateHandler
{
    public function translation($text)
    {
        $http = new Client;

        $api = 'http://api.fanyi.baidu.com/api/trans/vip/translate?';
        $appid = config('services.baidu_translate.appid');
        $key = config('services.baidu_translate.key');
        $salt = time();

        if (empty($appid) || empty($key)) {
            return $this->pinyin($text);
        }

        $sign=md5($appid.$text.$salt.$key);

        $qurey=http_build_query([
            'q'=>$text,
            'from'=>'zh',
            'to'=>'en',
            'appid'=>$appid,
            'salt'=>$salt,
            'sign'=>$sign,
        ]);

        $response=$http->get($api.$qurey);

        $result=json_decode($response->getBody(),true);
        
        if (isset($result['trans_result'][0]['dst'])){
            return \Str::slug($result['trans_result'][0]['dst']);
        }else{
            return $this->pinyin($text);
        }
    }

    public function pinyin($text)
    {
        return \Str::slug(app(Pinyin::class)->permalink($text));
    }
}
