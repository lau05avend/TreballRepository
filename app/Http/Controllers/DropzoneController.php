<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class DropzoneController extends Controller
{

    public function store_dropzone(Request $request){

        $image = $request->file('fileUpload');

        $image = $image->storeAs('disenos',($request->input('model').'_'.time().'.'.$image->extension()),'public');

        return response()->json($image, Response::HTTP_CREATED);
    }

}
