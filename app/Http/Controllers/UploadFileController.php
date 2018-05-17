<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $dbfile = $request->file('dbfile');

        //Move Uploaded File
        $destinationPath = 'uploads';
        $dbfile->move($destinationPath,$dbfile->getClientOriginalName());
    }
}
