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
        'name',
        'device',
        'filename',
        'admin_password',
    ];

    public function images()
    {
        return $this->hasMany(Upload::class, 'parent_id');
    }

    public function getImageLink()
    {
        return '<a href="upload/' . $this->id . '/images">Images (' . count($this->images) . ')</a>';
    }

    public function getDetailsLink()
    {
        return '<a href="#">Open Backup</a>';
    }

    public function downloadLink()
    {
        return '<a href="download/' . $this->id . '">Download</a>';
    }
}
