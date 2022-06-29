<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:app/Models/Lists.php
class Lists extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
=======
class Card extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Cards()
    {
        return $this->hasMany(Card::class);
    }
>>>>>>> 9286ed3c2272e35c6e60458382c857fb0d439e4d:app/Models/Card.php
}
