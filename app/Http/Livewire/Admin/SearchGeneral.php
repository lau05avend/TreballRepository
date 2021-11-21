<?php

namespace App\Http\Livewire\Admin;

use App\Models\Obra;
use Livewire\Component;

class SearchGeneral extends Component
{
    public $query;
    public $obras;
    public $highlightIndex;

    public function mount()
    {
        $this->resetData();
    }

    public function resetData()
    {
        $this->query = '';
        $this->obras = [];
        $this->highlightIndex = 0;
    }

    public function updatedQuery() // se ejecuta cada vez que se convierte escribe en el input
    {
        // sleep(2);
        // if(strlen($this->query) > 2){
            $this->obras = Obra::where('NombreObra', 'LIKE', '%'.$this->query.'%')
                    ->where('isActive','=','Active')
                    ->get()
                    ->toArray();
        // }
    }

    public function render()
    {
        return view('livewire.admin.search-general');
    }

    //funcionalidad del dropdown

    public function incrementHighlightIndex(){
        if($this->highlightIndex === count($this->obras)-1 ){
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlightIndex(){
        if($this->highlightIndex === 0 ){
            $this->highlightIndex = count($this->obras)-1 ;
            return;
        }

        $this->highlightIndex--;
    }

    public function SelectItem(){
        $Obra = $this->obras[$this->highlightIndex] ?? null;
        if($Obra){
            $this->redirect(route('obra.edit', $Obra['id']));
        }
    }

}
