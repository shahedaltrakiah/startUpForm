<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
