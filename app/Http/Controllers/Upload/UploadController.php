<?php
namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Result;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller {

    public function uploadImage(Request $request){

        $path = Storage::putFile(date('Y-m-d') . '/', $request->file('files'));
        return response()->json(Result::ok($path));
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
}