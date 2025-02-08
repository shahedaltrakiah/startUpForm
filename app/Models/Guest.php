<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['guest_id', 'response_id', 'comment_text'];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}
