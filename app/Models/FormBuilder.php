<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;

class FormBuilder extends Model
{
    use HasFactory;
    protected $casts = [
        'content' => 'array'
    ];
      public function country()
    {
        return $this->belongsTo(Countries::class);
    }
}
