<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Names extends Model
{
    use HasFactory;
    protected $table = 'names';

    public $primarykey = 'id';

    public function names(){
        return $this->belongsTo('App\Models\Queues','id');
    }
}
