<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['id','categoryName','categoryDescription','publicationStatus'];
}
