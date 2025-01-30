<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;
    protected $fillable = ['response_id', 'question_id', 'proof_description', 'proof_submission'];

    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}

