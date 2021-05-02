<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recreation;

class RecreationController extends Controller
{
    public function index()
    {
        $recreations = Recreation::orderBy('id', 'desc')->paginate(10);

        
        return view('welcome', [
            'recreations' => $recreations,
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'max_number' => 'required',
            'min_number' => 'required',
            'time' => 'required',
            'budget' => 'required',
            'service' => 'required',
            'content' => 'required',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->recreations()->create([
            'name' => $request->name,
            'typet' => $request->type,
            'max_number' => $request->max_number,
            'min_number' => $request->min_number,
            'time' => $request->time,
            'budget' => $request->budget,
            'service' => $request->service,
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id) 
    {
        // idの値で投稿を検索して取得
        $recreation = \App\Recreation::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $recreation->user_id) {
            $recreation->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
