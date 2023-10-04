<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\TareasController;

class Tareas extends Model
{

    use HasFactory;
    protected $table = 'tareas';
    use SoftDeletes;
}




