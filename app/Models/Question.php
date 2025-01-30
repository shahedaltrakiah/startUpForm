<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['section_id', 'question_text', 'question_type', 'required' , 'proof'];

    public function section()
    {
        return $this->belongsTo(FormSection::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
