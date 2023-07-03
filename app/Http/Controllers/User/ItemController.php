<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function show(Request $request, Item $item) 
    {
        $categories = Category::query()
            ->where('parent_id', 0)
            ->get();

        return view('user.search.index', compact('item', 'categories'));
    }
}
