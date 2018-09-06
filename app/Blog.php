<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['id','blogTitle','categoryId','blogDescription','blogPicture','publicationStatus'];
}
