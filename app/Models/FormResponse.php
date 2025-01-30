<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;
    protected $fillable = ['form_id', 'submitter_name', 'submitter_email'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}


