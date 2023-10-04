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


    public function Eliminar(Request $request, $id)
    {

        $tareas = Tarea::find($id);

        if ($tareas) {
            $tareas->delete();
            return response()->json(['error' => 'La tarea esta borrado'], 200);
        }

        return response(['error' => 'La tarea no existe'], 404);
    }

    public function Actualizar(Request $request, $idtarea)
    {

        $almacen = Almacen::findOrFail($idalmacen);
        $almacen->nombre = $request->input('nombre');
        $almacen->calle = $request->input('calle');
        $almacen->numero = $request->input('numero');
        $almacen->localidad = $request->input('localidad');
        $almacen->departamento = $request->input('departamento');        
        $almacen->telefono = $request->input('telefono');
        $almacen->save();
        return response()->json($almacen);

    }

}
