<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;

    protected $fillable = ['answer_id', 'proof_value'];

    protected $table = 'proof';

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
