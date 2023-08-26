<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        // 人気商品の表示
        // ToDo: 実際に注文数が多いものを表示
        $populars = Item::query()
            ->inRandomOrder()
            ->take(4)
            ->get();
        
        // おすすめ表示 
        // ToDo: レビュー評価が高いものを表示
        $reccomends = Item::query()
            ->inRandomOrder()
            ->take(4)
            ->get();

        // 注文履歴表示 (ログイン済みの場合のみ)
        $histories = null;
        if (Auth::check()) {
            // ToDo: 実際に注文済みの商品のみ表示
            $histories = Item::query()
                ->inRandomOrder()
                ->take(4)
                ->get();
        }
        
        return view('user.home.index', compact('populars', 'reccomends', 'histories' ));
    }
}
