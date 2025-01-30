<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable = ['response_id', 'question_id', 'response'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function formResponse()
    {
        return $this->belongsTo(FormResponse::class, 'response_id');
    }
}
