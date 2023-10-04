<?php

namespace App\Http\Controllers;

use App\category;
use App\Municipalitie;
use App\Syoukaijou;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function test()
    {
        // ユーザー情報に紐づく紹介状情報を取得
        // $post = User::find(Auth::id())->Syoukaijous()->get();

        $post = Auth::user()
            ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('users.id', '=', Auth::user()->id)
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->select(
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )
            ->limit(3)->get();

        // $category_name = Auth::user()
        //     ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
        //     ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->limit(3)->get();

        // dd($post);

        // $areaname = $post->
        // $cityId = Auth::user()->Syoukaijous()->limit(3)->municipalities_id()->get();
        // $cityName = Municipalitie::whereHas('syoukaijous', function ($name) {
        //     //市区町村テーブルのIDと数値が同じ市区町村IDの市区町村を取得
        //     $name->where('id',);
        // })->get();


        return view('home', [
            'post' => $post
        ]);
    }

    public function message()
    {
        $message = Auth::user()
            ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('users.id', '=', Auth::user()->id)
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->select(
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )
            ->get();

        return view('post_all_list', [
            'all_message' => $message
        ]);
    }

    public function interest()
    {
        $interest = Auth::user()
            ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('users.id', '=', Auth::user()->id)
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->select(
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )
            ->limit(5)
            ->get();

        return view('interest_all_list', [
            'all_message' => $interest
        ]);
    }

    public function visited()
    {
        $visited = Auth::user()
            ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('users.id', '=', Auth::user()->id)
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->select(
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )
            ->limit(7)->get();

        return view('visited_all_list', [
            'all_message' => $visited
        ]);
    }
}
