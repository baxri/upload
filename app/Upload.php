<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use CrudTrait;

    protected $table = 'uploads';

    protected $fillable = [
        'device',
        'filename',
    ];
}
