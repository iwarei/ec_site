<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request) 
    {
        $categories = Category::query()
            ->where('parent_id', 0)
            ->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $parent_categories = Category::query()
            ->where('parent_id', 0)
            ->get();

        return view('admin.category.create', compact('parent_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'child' => ['sometimes', 'required', 'accepted'],
            'parent_id' => ['required', 'integer'],
        ]);

        // 子要素指定の場合の追加バリデーション
        if ($request->input('child') == 'on') {
            $request->validate([
                'parent_id' => ['integer', 'exists:App\Models\Category,id'],
            ]);
        }

        $category = new category;
        $category->fill($request->all())->save();
        // $category->fill($request->only(['name', 'parent_id']))->save();

        return redirect(route('admin.category.index'))->with('success', 'カテゴリ：'.$category->name.'を登録しました');
    }
}
