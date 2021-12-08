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
                            ->whereYear('created_at', date('Y'))->get()->count();

        $oldCliente = Cliente::whereMonth('created_at',(date('m')-1))
            ->whereYear('created_at', date('Y'))->get()->count();

        $clientesAnt = $oldCliente == 0 ? 1 : $oldCliente;
        $clientesYa =  $this->newClientes[0] == 0 ? 1 : $this->newClientes[0];   //100%
        // if($clientesAnt>$clientesYa){
        $this->newClientes[1] = round( ((100*$clientesYa)/$clientesAnt)-100, 2);

    }
    public function newUsuario(){
        $this->newUsuario[0] = Usuario::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))->get()->count();

        $oldUsuario = Usuario::whereMonth('created_at',(date('m')-1))
            ->whereYear('created_at', date('Y'))->get()->count();

        $usuarioAnt = $oldUsuario == 0 ? 1 : $oldUsuario;
        $usuarioYa =  $this->newUsuario[0] == 0 ? 1 : $this->newUsuario[0];   //100%
        $this->newUsuario[1] = round( ((100*$usuarioYa)/$usuarioAnt)-100, 2);

    }
    public function newNovedad(){
        $this->newNovedad[0] = ModelsNovedad::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))->get()->count();

        $oldNovedad = ModelsNovedad::whereMonth('created_at',(date('m')-1))
            ->whereYear('created_at', date('Y'))->get()->count();

        $novedadsAnt = $oldNovedad == 0 ? 1 : $oldNovedad;
        $novedadsYa =  $this->newNovedad[0] == 0 ? 1 : $this->newNovedad[0];   //100%
        // if($novedadsAnt>$novedadsYa){
        $this->newNovedad[1] = round( ((100*$novedadsYa)/$novedadsAnt)-100, 2);
    }



    public function newObras(){
        $this->newObras[0] = Obra::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))->get()->count();

        $oldObras = Obra::whereMonth('created_at',(date('m')-1))   //arregalr enero PROBLEMA FUTURO
                    ->whereYear('created_at', date('Y'))->get()->count();

        $totalObras = Obra::get()->count();

        $obrasAnt = $oldObras == 0 ? 1 : $oldObras;
        $obrasYa =  $this->newObras[0] == 0 ? 1 : $this->newObras[0];   //100%
        // if($obrasAnt>$obrasYa){
        $this->newObras[1] = round( ((100*$obrasYa)/$obrasAnt)-100, 2);

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
        $this->novedadesUlt =  ModelsNovedad::take(6)->where('isActive','=','Active')->orderBy('created_at','desc')->get();
        $this->empleadosUlt = Obra::take(6)->select(['obras.id','obras.NombreObra','obras.EstadoObra'])->where('obras.isActive','=','Active')->orderBy('obras.created_at','desc')
                            ->Join('obra_usuario','obras.id','=','obra_id')
                            ->groupBy(['obras.id','obras.NombreObra','obras.EstadoObra','obras.created_at'])
                            // ->having('obra_usuario.empleado_id', '<>', null)
                            ->get();
    }

    public function openObraModal($obra){
        // $this->dispatchBrowserEvent('name-updated', ['newName' => 2]);
        return redirect()->route('obra.index')->with('openShow',$obra);
        // return redirect()->route('obra.index')->with('openShow',[true,$obra]);
    }


}
