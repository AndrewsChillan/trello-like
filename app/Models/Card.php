<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    
}
