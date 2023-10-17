<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    //mass assignment
    //protected $fillable = ['name','email','phone','joining_date','salary','is_active'];
    //not for mass assignment
    protected $guarded = [];
}
