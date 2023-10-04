<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class TareasControllerTest extends TestCase
{

    public function test_ListarTodo()
    {

        $response = $this->get('http://127.0.0.1:8000/api/tarea');
        $response->assertStatus(200);

        $logData = [
            'ruta' => 'http://127.0.0.1:8000/api/tarea',
            'Titulo' => $response->getStatusCode(),
            'Contenido' => $response->getContent(),
            'Estado' => $response->getContent(),
            'Autor' => $response->getContent(),

        ];

        Log::info('Tareas Lista', $logData);
    }

    public function test_InsertaTarea()
    {
        $check = true;

        $tarea = [

            'Titulo' => 'TEST',
            'Contenido' => 'TEST',
            'Estado' => 'Inactivo',
            'Autor' => 'TEST',

        ];

        $response = $this->post('http://127.0.0.1:8000/api/tarea', $tarea);
        $response->assertStatus(200);

        $logData = [
            'ruta' => 'http://127.0.0.1:8003/api/Almacen',
            'Titulo' => $response->getStatusCode(),
            'Contenido' => $response->getStatusCode(),
            'Estado' => $response->getContent(),
            'Autor' => $tarea,

        ];

        Log::info('Tarea insertada', $logData);
    }

}
