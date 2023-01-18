<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'sports_id'
    ];

    public function sports(){
        return $this->belongsTo(Sport::class);
    }
}
