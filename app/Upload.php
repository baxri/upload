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
}
