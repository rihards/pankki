<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    protected $fillable = array('name', 'description', 'value', 'category');

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}