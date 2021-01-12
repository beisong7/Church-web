<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MediaItem;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chart(){
        $sevenDays = date('Y-m-d', strtotime('-7 days'));
        $data = MediaItem::orderBy('created_at', 'asc')
//            ->where('created_at', '>=', $sevenDays)
            ->select([
                'download_count',
                'created_at'
            ])
            ->get();

//        return $data;
        $days = [];
        $values = [];
        $ancho_date = "";
        $anchor_download = 0;
        $data_resource = null;
        foreach ($data as $item){

            if($ancho_date===date('F d, Y', strtotime($item->created_at))){
//                dd($ancho_date);
//                $anchor_download+=$item->download_count;
                $data_resource[date('j M', strtotime($item->created_at))]+=$item->download_count;
                $ancho_date = date('F d, Y', strtotime($item->created_at));
            }else{
//                dd($ancho_date);
                $anchor_download = 0;
                $anchor_download+=$item->download_count;
                $data_resource[date('j M', strtotime($item->created_at))]=$anchor_download;
//                array_push($days, date('j M', strtotime($item->created_at)));
                $ancho_date = date('F d, Y', strtotime($item->created_at));
            }

        }
        $resource = [];
        foreach ($data_resource as $key=>$val){
            array_push($resource, $val);
        }
        return response()->json([
            'resource'=>$resource,
        ], 200);
    }
}
