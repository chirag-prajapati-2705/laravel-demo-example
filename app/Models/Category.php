<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table ='categories';
    protected $fillable =['category_name','is_active','slug'];
    public function parent(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }


}
