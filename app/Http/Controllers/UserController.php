<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Excel;
use App\Exports\UserExport;
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
}
