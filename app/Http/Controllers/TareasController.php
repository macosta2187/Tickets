<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas;


class TareasController extends Controller
{
    


    public function Insertar(Request $request)
    {
        try {
            $tareas = new Tareas;
            $tareas->Titulo = $request->input('Titulo');
            $tareas->Contenido = $request->input('Contenido');
            $tareas->Estado = $request->input('Estado');
            $tareas->Autor = $request->input('Autor');        
            $tareas->save();
    
            return response()->json(['message' => 'Tarea creada exitosamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la tarea: ' . $e->getMessage()], 500);
        }
    }
    
    public function Eliminar(Request $request, $id)
    {
        try {
            $tareas = Tareas::find($id);
    
            if (!$tareas) {
                return response()->json(['error' => 'La tarea no existe'], 404);
            }
    
            $tareas->delete();
    
            return response()->json(['message' => 'La tarea ha sido eliminada exitosamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la tarea: ' . $e->getMessage()], 500);
        }
    }
    
    public function Actualizar(Request $request, $idtarea)
    {
        try {
            $tarea = Tareas::findOrFail($idtarea);
            $tareas->Titulo = $request->input('Titulo');
            $tareas->Contenido = $request->input('Contenido');
            $tareas->Estado = $request->input('Estado');
            $tareas->Autor = $request->input('Autor');      
            $tarea->save();
    
            return response()->json(['message' => 'Tarea actualizada exitosamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la tarea: ' . $e->getMessage()], 500);
        }
    }

    public function ListarTodo(Request $request)
    {

        $tarea = Tareas::all();
        return response()->json($tarea);
    }


    
    public function ListarId(Request $request, $id)
{
    try {
        $tarea = Tareas::findOrFail($id);
        return response()->json($tarea);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Tarea no encontrada'], 404);
    }
}


}
