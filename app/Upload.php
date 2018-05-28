<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use CrudTrait;

    protected $table = 'uploads';

    protected $fillable = [
        'parent_id',
        'bundle',
        'device',
        'filename',
    ];

    public function getImage(){
        return "uploads/".$this->bundle."/".$this->filename;
        return '<img src="uploads/'.$this->bundle.'/'.$this->filename.'">';
    }
}
