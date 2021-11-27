<?php

namespace App\Http\Livewire\Admin;

use App\Models\Actividad;
use App\Models\Obra;
use App\Models\Cliente;
use App\Models\Diseno;
use App\Models\Usuario;
use App\Models\Novedad as ModelsNovedad;
use Livewire\Component;


class Menu extends Component
{
    public $newObras = [];
    public $newUsuario = [];
    public $newNovedad = [];
    public $newClientes = [];
    public $graficoAct = [],$graficoTotales = [], $graficoEstadist = [];
    public $obrasUlt, $novedadesUlt, $empleadosUlt;

    public $listener = [
        'openObraModal'=>'$refresh',
    ];


    public function newClientes(){
        $this->newClientes[0] = Cliente::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))
                            ->get()
                            ->count();

    }
    public function newUsuario(){
        $this->newUsuario[0] = Usuario::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))
                            ->get()
                            ->count();

    }
    public function newNovedad(){
        $this->newNovedad[0] = ModelsNovedad::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))
                            ->get()
                            ->count();
    }



    public function newObras(){
        $this->newObras[0] = Obra::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))
                            ->get()
                            ->count();

        $oldObras = Obra::whereMonth('created_at',(date('m')-1))   //arregalr enero PROBLEMA FUTURO
                    ->whereYear('created_at', date('Y'))
                    ->get()
                    ->count();
        // $this->newObras[1] = round((100 * $oldObras)/$this->newObras[0]);

        $totalObras = Obra::get()->count();

        $obrasAnt = 20;  //100%
        $obrasYa = 10;
        // if($obrasAnt>$obrasYa){
        $this->newObras[1] = ((100*$obrasYa)/$obrasAnt)-100;
        // }
        // else{
            // $this->newObras[1] = ((100*$obrasYa)/$obrasAnt);
        // }

    }

    public function render()
    {
        $this->newObras();
        $this->newClientes();
        $this->newNovedad();
        $this->newUsuario();
        $this->GraficoData();

        return view('livewire.admin.menu');
    }

    public function GraficoData(){
        $this->graficoTotales[0] = Actividad::where('isActive', 'Active')->get()->count();
        $this->graficoTotales[1] = ModelsNovedad::where('isActive', 'Active')->get()->count();
        $this->graficoTotales[2] = Diseno::where('isActive', 'Active')->get()->count();
        $this->graficoTotales[3] = Obra::where('isActive', 'Active')->where('EstadoObra','Terminada')->get()->count();
        $this->graficoTotales[4] = Cliente::where('isActive', 'Active')->get()->count();

        $this->graficoEstadist[0] = Actividad::where('isActive', 'Active')->where('estado_actividad_id',2)->get()->count();
        $this->graficoEstadist[1] = Actividad::where('isActive', 'Active')->where('estado_actividad_id',3)->get()->count();
        $this->graficoEstadist[2] = Actividad::where('isActive', 'Active')->where('estado_actividad_id',4)->get()->count();
    }


    public function mount(){

        $this->obrasUlt =  Obra::take(5)->where('isActive','=','Active')->orderBy('created_at','desc')->get();
        $this->novedadesUlt =  ModelsNovedad::take(5)->where('isActive','=','Active')->orderBy('created_at','desc')->get();
        $this->empleadosUlt = Obra::take(6)->select('obras.*')->where('obras.isActive','=','Active')->orderBy('obras.created_at','desc')
                            ->Join('obra_usuario','obras.id','=','obra_id')
                            ->groupBy('obras.id')
                            // ->having('obra_usuario.empleado_id', '<>', null)
                            ->get();
    }

    public function openObraModal($obra){
        // $this->dispatchBrowserEvent('name-updated', ['newName' => 2]);
        return redirect()->route('obra.index')->with('openShow',[true,$obra]);
    }


}
