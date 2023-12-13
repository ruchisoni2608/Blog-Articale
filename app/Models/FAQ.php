<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FAQ extends Model
{
    use HasFactory;

   // Specify the deleted_at column as a date field
    protected $table="faqs";
    protected $fillable=[
        'category','title','answer',
    ];
}
