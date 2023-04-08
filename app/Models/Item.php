<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function images() 
    {
        return $this->hasMany(ItemImage::class)->orderBy('display_order');
    }

    public function getTaxedPriceAttribute()
    {
        return (int) ($this->price * (100 + config('const.TAX_RATE')) / 100);
    }

}
