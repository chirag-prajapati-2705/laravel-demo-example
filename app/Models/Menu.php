<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'menu';
    protected $fillable = ['menu_name', 'slug', 'parent_id','is_active','font_size','color'];


    public function getStatus(){
        return ($this->is_active==1)?'Active':'In Active';
    }

    public function parent()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'parent_id')->orderBy('sort_order');
    }
    
    public function children()
    {
    
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('sort_order');
    }
    
    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('is_active',1)->where('parent_id', '=', '0')->orderBy('sort_order')->get();
    }

}
