<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
