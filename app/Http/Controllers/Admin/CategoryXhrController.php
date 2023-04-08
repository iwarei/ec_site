<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoryXhrController extends Controller
{
    public function index(Request $request) 
    {
        // $request->validate([
        //     'parent_id' => ['required', 'integer', 'exists:App\Models\Category,id']
        // ]);
        $categories = Category::query()
            ->where('parent_id', $request->input('parent_id'))
            ->get();

        return response($categories, 200);
    }
}
