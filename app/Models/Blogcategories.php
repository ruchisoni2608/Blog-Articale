<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogcategories extends Model
{
    use HasFactory;
     use SoftDeletes; // Add SoftDeletes trait

    protected $dates = ['deleted_at']; // Specify the deleted_at column as a date field


    protected $table="blogcategories";
    protected $fillable=[
        'name','status','description',
    ];
    public function blogarticles()
    {
        return $this->hasMany(Blogarticles::class);
    }
}
