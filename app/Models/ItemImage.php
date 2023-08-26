<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'filename',
        'display_order'
    ];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function getSrcAttribute() {
        return '/storage/items/' . $this->item->id . '/' . $this->filename;
    }

    public function getPathAttribute() {
        return 'public/items/' . $this->item->id . '/' . $this->filename;
    }
}
