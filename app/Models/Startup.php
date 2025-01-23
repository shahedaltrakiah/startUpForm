<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'companyName',
        'founded',
        'website',
        'teamSize',
        'founderInfo',
        'productDescription',
        'targetMarket',
        'fundingStage',
        'fundingNeeds',
    ];
}

