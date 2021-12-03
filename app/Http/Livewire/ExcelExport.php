<?php

namespace App\Http\Livewire;

use App\Exports\ModelExport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Livewire\Component;
use Maatwebsite\Excel\Excel;

class ExcelExport extends Component
{

    public $model;
    public $format;
    public $formatEsp;

    public function mount(){
        $this->format = explode(",", $this->format);
        $this->formatEsp = "pdf";
    }

    public function render()
    {
        return view('livewire.excel-export');
    }

    public function exportFormat($format){
        $this->formatEsp = $format;
    }

    public function export($format)
    {
        $this->formatEsp = $format;

        $validatedFormat = $this->validateExportType();

        return (new ModelExport($this->getModel()))->download($this->filename, $validatedFormat);
    }

    public function getFilenameProperty()
    {
        return Str::snake(sprintf('export%s.%s', $this->model, $this->formatEsp));
    }

    public function validateExportType()
    {
        $formats = config('excel.extension_detector');

        abort_if(in_array($this->formatEsp, $formats), Response::HTTP_NOT_FOUND);

        return $formats[$this->formatEsp];
    }

    protected function getModel(): Model
    {
        return app(sprintf('%s\\%s', 'App\Models', $this->model));
    }

}
