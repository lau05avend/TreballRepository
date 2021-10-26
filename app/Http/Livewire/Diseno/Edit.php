<?php

namespace App\Http\Livewire\Diseno;

use App\Http\Livewire\Obra;
use App\Models\Diseno;
use App\Models\Obra as ModelsObra;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Diseno $diseno;
    public $image = [];
    public $Usuarios = [];
    public $openModal = false;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function rules(){
        return [
            'diseno.ImagenPlano'=> ['required'],
            'diseno.ObservacionDiseno'=> 'required |min: 5',
            'diseno.created_at'=> 'required',
            'diseno.updated_at' => 'required',
            'diseno.obra_id ' => 'required',
        ];
    }
    public function validationAttributes (){
        return [
            'ImagenPlano' => 'Imagen del Plano',
            'ObservacionDiseno' => 'Observación de Diseno',

        ];
    }

    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }

    public function render()
    {
          // $this->Usuarios = $this->obra->Usuarios()->pluck('usuarios.id')->toArray();
          $obra = ModelsObra::all();

          return view('livewire.Diseno.edit', [
              'obra' =>$obra
          ]);

        }
        public function update(){
            $this->validate();

            $this->diseno->save();
            if(count($this->Diseno)){
                $this->diseno->material()->sync($this->obra);
            }else{
                $this->diseno->material()->detach();
            }

            if($this->image){
                if($this->diseno->Images()->get()->isEmpty()){
                    foreach ($this->image as $image) {
                        $imagen = $image->store('diseno','public');
                        $this->diseno->Images()->create(['archivo'=>$imagen]);
                    }
                }else{
                    $this->diseno->Images()->delete();
                    foreach ($this->image as $image) {
                        $imagen = $image->store('obra','public');
                        $this->diseno->Images()->create(['archivo'=>$imagen]);
                    }
                }
            }
        }
}
