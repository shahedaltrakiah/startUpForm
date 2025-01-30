<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['response_id', 'user_id', 'user_type', 'comment_text'];

    public function response()
    {
        return $this->belongsTo(FormResponse::class);
    }
}

