<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas;

class TareasController extends Controller
{
    


    public function Insertar(Request $request)
    {

        $tareas = new Tarea;
        $tareas->Titulo = $request->input('nombre');
        $tareas->Contenido = $request->input('calle');
        $tareas->Estado = $request->input('numero');
        $tareas->Autor = $request->input('localidad');        
        $tareas->save();
        return response()->json(['message' => 'Tarea creada exitosamente'], 200);

    }






}
