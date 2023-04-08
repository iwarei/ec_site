<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(Request $request) 
    {
        $items = Item::query()->get();
        // dd($items);
        return view('admin.item.index', compact('items'));
    }

    public function create(Request $request) 
    {
        $parent_categories = Category::query()
            ->where('parent_id', 0)
            ->get();

        return view('admin.item.create', compact('parent_categories'));
    }


}
