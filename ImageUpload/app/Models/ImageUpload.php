<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageUpload extends Model
{
    use HasFactory; 
    protected $fillable = ['user_id', 'filename', 'mime_type', 'image_data'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
