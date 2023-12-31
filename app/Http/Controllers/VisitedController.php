<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Visited;
use Illuminate\Support\Facades\DB;

class VisitedController extends Controller
{
    public function visitedAjax(Request $request)
    {

        DB::beginTransaction();

        $rec = Visited::where('user_id', $request->user_id)->where('syoukaijou_id', $request->syoukaijou_id)->get();
        $fav_falg = 0;

        if ($rec->isEmpty()) {
            $visited = new Visited();
            $visited->user_id = $request->input('user_id');
            $visited->syoukaijou_id = $request->input('syoukaijou_id');
            $visited->created_at = Carbon::now();
            $visited->updated_at = Carbon::now();

            $visited->save();
            $fav_falg = 1;
        } else {
            Visited::where('user_id', $request->user_id)->where('syoukaijou_id', $request->syoukaijou_id)->delete();

            $fav_falg = 0;
        }
        DB::commit();
        return response()->json($fav_falg);
    }
}
