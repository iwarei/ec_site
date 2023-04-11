<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        $categories = Category::query()
            ->where('parent_id', 0)
            ->get();
            
        return view('user.home.index', compact('categories'));
    }
}
