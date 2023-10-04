<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tarea;
use Illuminate\Support\Facades\Log;


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

    }

    
    
    
    