<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

class UsersController extends Controller
{
    public function show($id)
    {
        
        //* idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        

        // ユーザの投稿一覧を作成日時の降順で取得
        $recreations = $user->recreations()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('welcome',[
            'user' => $user,
            'recreations' => $recreations,
        ]);
    }
    
    public function favorites($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのお気に入り一覧を取得
        $favorites = $user->favorites()->paginate(10);

        // お気に入り一覧ビューでそれらを表示
        return view('welcome', [
            'user' => $user,
            'recreations' => $favorites,
        ]);
    }
}
