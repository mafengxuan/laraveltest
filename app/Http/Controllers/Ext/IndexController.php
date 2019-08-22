<?php
namespace App\Http\Controllers\Ext;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Result;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller {

    public function uploadImage(Request $request){

        /*
         * array:1 [
  0 => UploadedFile {#240
    -test: false
    -originalName: "60.png"
    -mimeType: "image/png"
    -size: 105674
    -error: 0
    #hashName: null
    path: "E:\ZkeysSoft\Php\tmp"
    filename: "phpB10D.tmp"
    basename: "phpB10D.tmp"
    pathname: "E:\ZkeysSoft\Php\tmp\phpB10D.tmp"
    extension: "tmp"
    realPath: "E:\ZkeysSoft\Php\tmp\phpB10D.tmp"
    aTime: 2019-06-03 12:51:13
    mTime: 2019-06-03 12:51:13
    cTime: 2019-06-03 12:51:13
    inode: 0
    size: 105674
    perms: 0100666
    owner: 0
    group: 0
    type: "file"
    writable: true
    readable: true
    executable: false
    file: true
    dir: false
    link: false
    linkTarget: "E:\ZkeysSoft\Php\tmp\phpB10D.tmp"
  }
]
         */
        $path = Storage::disk('public')->putFile(date('Y-m-d') , $request->file('files')[0]);
        $result = '/'.$path;
        return response()->json(Result::ok($result));
//        $imageFile = $request->file('files');
//        if($imageFile){
//
//            //获取文件的原文件名 包括扩展名
//            $oldName= $imageFile->getClientOriginalName();
//
//            //获取文件的扩展名
//            $ext=$imageFile->getClientOriginalExtension();
//
//            //获取文件的类型
//            $type=$imageFile->getClientMimeType();
//            //获取文件的绝对路径，但是获取到的在本地不能打开
//            $filePath=$imageFile->getRealPath();
//
//            $localPath=$imageFile->getRealPath();
//            $fileName = date('Y-m-d') . '/' . uniqid() .'.'.$ext;
//
//            $result = Storage::disk('public')->put($fileName,,file_get_contents($filePath));
//        }

    }

    public function jssdk()
    {
        $app = app('wechat.official_account');
        $sdk = $app->jssdk->buildConfig(array(), $debug = false, $beta = false, $json = true);
        return response()->json(Result::ok($sdk));
    }

    public function test()
    {
        $app = app('wechat.official_account');
        $a = $app->jssdk->getTicket();
        dump($a);
        die;
    }

}