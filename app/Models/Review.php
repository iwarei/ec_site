<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reting',
        'title',
        'detail',
    ];

    public function item() {
        $this->belongsTo(Item::class);
    }
}
