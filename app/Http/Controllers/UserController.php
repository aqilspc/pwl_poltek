<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Excel;
use App\Exports\UserExport;
use Google\Cloud\Storage\StorageClient;
class UserController extends Controller
{

    public function getMemberUser()
    {
        $date = rand();
        Excel::store(new UserExport(), 'user_member_download_at_'.$date.'_.xlsx','real_public');
        return response()->json(
              [
                'msg' => 'Sucess',
                'url'=>url('/').'/'.'user_member_download_at_'.$date.'_.xlsx',
              ], 201);
    }

    public function upVideo(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Credentials: true ");
      header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
      header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");

        $ext = 'mp4';
        $config = [
          'projectId' => 'optical-net-251109',
          'keyFile' => json_decode(file_get_contents('https://dashboard.kulon.co.id/upload/key.json'), true),
        ];

        //request
        //$file = $request->file('video');
        $tmp = $request->video;
        // $id = rand();

        // $storage = new StorageClient($config);
        // $pho = 'video_'.$id.'.'.$ext;
        // $file = fopen($tmp, 'r');
        // $bucket = $storage->bucket('admin-panel-kulon');
        // $object = $bucket->upload($file, [
        //   'name' => 'video/'.$pho
        // ]);

        return response()->json(
              [
                'data'=>$tmp
              ]);
    }
}
