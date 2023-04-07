<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'parent_id',
        'delete_flag',
    ];

    public function parentCategory() 
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function countItems()
    {
        if ($this->parent_id != 0) {
            return $this->hasMany(Item::class)->count();
        }
        else {
            $count = 0;
            foreach ($this->childCategories() as $child) {
                $count += $child->items()->count();
            }
            return $count;
        }
    }
}
