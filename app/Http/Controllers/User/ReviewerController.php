<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reviewer;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.reviewer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviewer $reviewer)
    {
        //
    }
}
