<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogarticles extends Model
{
    use HasFactory;
     use SoftDeletes; // Add SoftDeletes trait

    protected $dates = ['deleted_at']; // Specify the deleted_at column as a date field

     protected $table="blogarticles";
    protected $fillable=[
        'title','content','image','status','category_id',
    ];
    public function blogcategories()
    {
        return $this->belongsTo(Blogcategories::class, 'category_id');
    }
    public function category()
    {
        return $this->belongsTo(Blogcategories::class, 'category_id');
    }
    public function blogcategory()
    {
        return $this->belongsTo(Blogcategories::class, 'category_id');
    }
  
    public function getCategoryIdsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setCategoryIdsAttribute($value)
    {
        $this->attributes['category_id'] = implode(',', $value);
    }

}
 