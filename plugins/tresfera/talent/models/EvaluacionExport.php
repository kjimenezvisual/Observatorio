<?php namespace Tresfera\Talent\Models;

use Tresfera\Talent\Models\Evaluacion;

use Backend\Models\User;

class EvaluacionExport extends \Backend\Models\ExportModel
{
    public function exportData($columns, $sessionKey = null)
    {
        $evaluaciones = Evaluacion::all();
        $evaluaciones->each(function($evaluacion) use ($columns) {
            $evaluacion->addVisible($columns);
        });
        print_r($columns);
        dd($evaluaciones->toArray());
        return $evaluaciones->toArray();
    }
}