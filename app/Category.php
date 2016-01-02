<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = array('name', 'luxury');

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
}