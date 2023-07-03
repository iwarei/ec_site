<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) 
    {
        $categories = Category::query()
            ->where('parent_id', 0)
            ->get();

        $items = Item::query();
        
        if ($request->filled('words')) {
            // 全角文字を半角英数に変換, スペースで区切る
            $words = explode(' ', mb_convert_kana($request->input('words'), 'aKs'));

            foreach ($words as $word) {
                $items = $items->where(DB::raw("CONCAT(name, ' ', description)"), 'LIKE', '%' . $word . '%');
            }
        }

        if ($request->filled('category')) {
            $category_id = 
                (Category::query()
                    ->where('name', $request->input('category'))
                    ->first()
                )->id;

            if ($category_id == null){
                // カテゴリが存在しない場合結果を0件にする
                $items = $items->where('id', 0);
            }
            else {
                $items = $items->where('category_id', $category_id);
            }
        }

        $items = $items->get();

        return view('user.search.index', compact('items', 'categories'));
    }
}
