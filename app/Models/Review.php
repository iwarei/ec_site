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
        return $this->belongsTo(Item::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reviewew() {
        // $this->belongsTo(Reviewer::class);
        // $this->hasOne(Reviewer::class);

        return $this->belongsTo(User::class);
    }
}
