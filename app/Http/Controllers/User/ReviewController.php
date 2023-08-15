<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create(Item $item)
    {
        $categories = Category::query()
        ->where('parent_id', 0)
        ->get();
        
        return view('user.review.create', compact('item', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Item $item)
    {
        $request->validate([
            'rating' => ['required', 'numeric', 'integer'],
            'title' => ['required', 'string', 'max:64'],
            'detail' => ['required', 'min: 5'],
        ]);

        $review = new Review();
        $review->fill($request->all());
        $review->user_id = Auth::id();
        $review->item_id = $item->id;

        $review->save();

        $categories = Category::query()
        ->where('parent_id', 0)
        ->get();

        return redirect(route('item.show', compact('item', 'categories')))->with('success', 'レビューを投稿しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}