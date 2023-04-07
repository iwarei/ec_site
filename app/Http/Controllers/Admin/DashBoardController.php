<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashBoardController extends Controller
{
    public function index(Request $request) 
    {
        return view('admin.dashboard.index');
    }
}
