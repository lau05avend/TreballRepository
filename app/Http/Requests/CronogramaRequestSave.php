<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CronogramaRequestSave extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => 'required',
            'start' => ['required','date', 'before:end'],
            'end' => ['required', 'date', 'after:start'],
            'estado_actividad_id' => 'required',
            'fase_tarea_id' => 'required',
            // 'obra_id' => 'required'
        ];
    }

    public function attributes(){
        return [
            'title' => 'Título',
            'description' => 'Descripción de actividad',
            'start' => 'Inicio de Actividad',
            'end' => 'Fin de Actividad',
            'estado_actividad_id' => 'Estado de Actividad',
            'fase_tarea_id' => 'Fase de Actividad',
            'obra_id' => 'obra'
        ];
    }
}
