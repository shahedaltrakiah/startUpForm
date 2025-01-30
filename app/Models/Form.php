<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['form_name', 'description'];

    public function sections()
    {
        return $this->hasMany(FormSection::class);
    }

    public function responses()
    {
        return $this->hasMany(FormResponse::class);
    }
}

