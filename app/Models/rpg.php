<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rpg extends Model
{
    use HasFactory;

    protected $fillable = ["title","description","src_img","note"];
}
