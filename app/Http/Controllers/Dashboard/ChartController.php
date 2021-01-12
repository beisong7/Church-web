<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\MediaItem;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chart(){
        $sevenDays = date('Y-m-d', strtotime('-7 days'));
        $data = Download::orderBy('updated_at', 'asc')
//            ->where('created_at', '>=', $sevenDays)
            ->take(7)
            ->select([
                'count',
                'updated_at'
            ])
            ->get();

//        return $data;
        $days = [];
        $values = [];
        foreach ($data as $download){
            array_push($days, date('j M', strtotime($download->updated_at)));
            array_push($values, $download->count);
        }

//        return [$days, $values];

        return response()->json([
            'days'=>$days,
            'values'=>$values
        ], 200);

    }
}
