<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    use HasFactory;

    public function getIconSrcAttribute() {
        return $this->icon_filename ? '/storage/reviewer/' . $this->id . '/' . $this->icon_filename : asset('image/default_icon.jpg');
    }

    public function getIconPathAttribute() {
        return 'public/reviewer/' . $this->id . '/' . $this->icon_filename;
    }
}
