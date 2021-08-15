<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
class UserExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function view(): View
    {
        $data = DB::table('member as mb')
                ->join('user as us','us.id_member','=','mb.id_member')
                ->leftjoin('premium_member as pmb','pmb.id_user','=','us.id_user')
                ->leftjoin('fakultas_user as fu','fu.id_user','=','us.id_user')
                ->join('fakultas as fs','fs.id_fakultas','=','fu.id_fakultas')
                ->select(
                    'mb.nama'
                    ,'mb.notelp as no_telepon'
                    ,'mb.email'
                    ,'us.id_user'
                    ,'mb.password as alias'
                    ,'fs.nama_fakultas'
                    ,'pmb.expiration')
                ->get();
        $arr = json_decode(json_encode($data),true);
        for ($i=0; $i < count($arr); $i++)
        { 
            if($arr[$i]['expiration']==NULL || $arr[$i]['expiration']==null)
            {
               $arr[$i]['alias'] = 'Free Member';
            }else
            {
                $arr[$i]['alias'] = 'Premium Member';
            }
        }
        return view('user', [
            'users' => $arr
        ]);
    }
}
