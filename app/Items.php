<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    protected $primaryKey ='item_id';
    protected $fillable = ['item_name', 'is_selected'];
    

}
