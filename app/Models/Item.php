<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'inventory',
        'publish_flag',
        'category_id',
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function topReviews() {
        return $this->reviews->take(5);
    }

    public function newReviews() {
        return $this->reviews->sortByDesc('id')->take(5);
    }

    // 認証済みユーザが投稿したレビュー
    public function authedUserReview()
    {
        if (Auth::check()){
            return $this->reviews->where('user_id', Auth::id())->first();
        }
        else {
            return null;
        }
    }

    // 指定した評価のレビューを取得する
    public function reviewRate($rate) {
        return $this->reviews->where('rating', $rate);
    }

    // レビューの平均評価取得用アクセサ
    public function getAvgRateAttribute() 
    {
        return number_format($this->reviews->avg('rating'), 1);
    }

    public function images() 
    {
        return $this->hasMany(ItemImage::class)->orderBy('display_order');
    }

    public function topImage() {
        return optional($this->hasMany(ItemImage::class)->orderBy('display_order')->first())->src ?? asset('image/noimage.jpg');
    }

    public function getTaxedPriceAttribute()
    {
        return (int) ($this->price * (100 + config('const.TAX_RATE')) / 100);
    }

}
