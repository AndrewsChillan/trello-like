<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:app/Models/Projects.php
class Projects extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
=======
class List extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function projet() 
    {
        return $this->belongsTo(List::class);
    }
>>>>>>> 9286ed3c2272e35c6e60458382c857fb0d439e4d:app/Models/List.php
}
