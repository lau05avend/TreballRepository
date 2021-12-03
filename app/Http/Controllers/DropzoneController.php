<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class DropzoneController extends Controller
{

    public function store_dropzone(Request $request){

        $image = $request->file('fileUpload');
        $hola = $request->input('val');

        // $image = $image->storeAs('disenos',('siii.'.$image->extension()),'public');
        $url = Storage::url($image);

        $idk = $request->file('collection_name');

        return response()->json($hola, Response::HTTP_CREATED);
    }

}
