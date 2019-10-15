<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')){
            $file = $request->file('file');
            //调用七牛云驱动
            $disk = QiniuStorage::disk('qiniu');
            //文件名
            $fileName = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            //临时文件的绝对路径 这是从硬盘的临时文件夹中找出来的，不太清楚是postman上传到那个地方还是laravel上传的。。感觉很厉害
            //dd($file->getRealPath());
            //上传七牛云
            $result = $disk->put('alvin/image_'.$fileName,file_get_contents($file->getRealPath()));
            if ($result){
                $path = $disk->downloadUrl('alvin/image_'.$fileName);
                return response()->json(['message'=>'上传成功文件路径为：'.$path]);
            }
            return response()->json(['message'=>'上传失败'],400);
        }
        return response()->json(['message'=>'未能获取到上传文件'],200);
    }


}
