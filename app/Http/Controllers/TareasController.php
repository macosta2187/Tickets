<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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
        try {
            $tareas = Tareas::all();
            return response()->json($tareas);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error al listar tareas: ' . $e->getMessage()], 500);
        }
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

    public function ListarPorTitulo(Request $request, $titulo)
    {
        try {
            $tareas = Tareas::where('Titulo', $titulo)->get();

            if ($tareas->isEmpty()) {
                return response()->json(['error' => 'Tarea no encontrada'], 404);
            }

            return response()->json($tareas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar tareas por título: ' . $e->getMessage()], 500);
        }
    }

    public function ListarPorAutor(Request $request, $autor)
    {
        try {
            $tareas = Tareas::where('Autor', $autor)->get();

            if ($tareas->isEmpty()) {
                return response()->json(['error' => 'Autor no encontrado'], 404);
            }

            return response()->json($tareas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar tareas por autor: ' . $e->getMessage()], 500);
        }
    }

    public function ListarPorEstado(Request $request, $estado)
    {
        try {
            $tareas = Tareas::where('Estado', $estado)->get();

            if ($tareas->isEmpty()) {
                return response()->json(['error' => 'Estado no encontrado'], 404);
            }

            return response()->json($tareas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar tareas por estado: ' . $e->getMessage()], 500);
        }
    }

}
