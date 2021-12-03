<?php

namespace App\Http\Controllers;

use App\Models\Planilla;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{

    public function viewPlanillaPDF($archivoplanilla){
        $file = Planilla::find($archivoplanilla);
        return response()->json(['response' => [
            'url' => $file->ArchivoPlanilla,
            'name' => substr($file->ArchivoPlanilla, 10)
        ]]);
    }

    public function pdf(){
        if(Storage::disk('public')->exists("planillas/export_material.pdf")){

            $archivoPl = Storage::get("public/planillas/export_material.pdf");
            $fileSize = Storage::size('public/planillas/export_material.pdf');
            // dd($fileSize);
            $file[1] = 'titleee';
            $file[2] = 'titledocs';

            $response = Response::make($archivoPl, 200);

            $response->header("Content-type","application/pdf");
            // $response->header("Content-Disposition","inline; filename=\"sdihsuifh\" ");
            $response->header("Content-Disposition","inline;");
            $response->header('Content-Transfer-Encoding','binary');
            $response->header("Metadata", ["title"=>'foobar'] );
            $response->header('Accept-Ranges','bytes');
            $response->header('/Title','osihfiux');
            // echo $file[0];

            // $response->Metadata({ 'title': 'foobar' });
            // dd($response);
            echo '<head><title>'.$file[1].'</title></head>';
            // return $response;

            // return response()->file(storage_path('app\public\planillas\export_material.pdf'),[
            //     'Content-Type' => 'application/pdf',
            // ]);

            // return response($archivoPl,200,[
            //     'Content-Type' => 'application/pdf',
            // ], 'inline');

            $name = 'dnvivn.pdf';

            return response()->file(storage_path('app\public\planillas\export_material.pdf'),[
                'Content-Type' => 'application/pdf',
                'Content-Disposition: inline; filename =" => '.$name.'"'
            ]);

        }
    }
}
