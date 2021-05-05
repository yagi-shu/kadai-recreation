<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recreation;

use Illuminate\Support\Facades\Auth;


class RecreationController extends Controller
{
    public function index()
    {
        //*$data = [];*//
        //*if (\Auth::check()) {*//
        $user = \Auth::user();
            
        $recreations = Recreation::orderBy('id', 'desc')->paginate(10);
    
                 
       
        return view('welcome',[
                    'user' => $user,
                    'recreations' => $recreations
                ]);
    }
    
     public function create()
    {
        $recreation = new Recreation;

        // レクリエーション作成ビューを表示
        return view('recreations.create', [
            'recreation' => $recreation,
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
        
        
        
        $recreation = new Recreation;
        $recreation->user_id = Auth::id();
        $recreation->name = $request->name;
        $recreation->type = $request->type;
        $recreation->max_number = $request->max_number;
        $recreation->min_number = $request->min_number;
        $recreation->time = $request->time;
        $recreation->budget = $request->budget;
        $recreation->service = $request->service;
        $recreation->content = $request->content;
        $recreation->save();

        // 前のURLへリダイレクトさせる
        return redirect('/');
    }
    
    public function show($id)
    {
        // idの値でレクリエーションを検索して取得
        $recreation = Recreation::findOrFail($id);

        // レクリエーション詳細ビューでそれを表示
        return view('recreations.show', [
            'recreation' => $recreation,
        ]);
    }
    
    public function edit($id)
    {
        // idの値でレクリエーションを検索して取得
        $recreation = Recreation::findOrFail($id);

        // レクリエーション編集ビューでそれを表示
        return view('recreations.edit', [
            'recreation' => $recreation,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // idの値でレクリエーションを検索して取得
        $recreation = Recreation::findOrFail($id);
        // レクリエーションを更新
        $recreation->name = $request->name;
        $recreation->type = $request->type;
        $recreation->max_number = $request->max_number;
        $recreation->min_number = $request->min_number;
        $recreation->time = $request->time;
        $recreation->budget = $request->budget;
        $recreation->service = $request->service;
        $recreation->content = $request->content;
        $recreation->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    
    public function destroy($id) 
    {
        // idの値でレクリエーションを検索して取得
        $recreation = Recreation::findOrFail($id);
        // メッセージを削除
        $recreation->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}


  
   
 /*idの値で投稿を検索して取得
        $recreation = Recreation::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $recreation->user_id) {
            $recreation->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();--}}
*/