<?php

namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\ToModel;

class MaterialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Material([
            'id'     => $row[0],
            'DescripcionMat'    => $row[1],
            'isActive'    => $row[2],
            'color_id'    => $row[3],
            'tipo_material_id' => $row[4],
            'created_at' => $row[5],
            'updated_at' => $row[6]
        ]);
    }
}
