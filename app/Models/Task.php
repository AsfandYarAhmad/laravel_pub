<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Task extends Model
{
    use HasFactory;
    public static function storeTask($array){
        $task = new Task;
        $task->name = $array['name'];
        $task->date = $array['date'];
        $task->time = $array['time'];
        $task->save();
    }

    public static function showTask() {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }

    public static function editTask($id) {
        $task = Task::find($id);
        return $task;
    }

    public static function updateTask($id) {
        $task = Task::find($id);
        return $task;
    }

   
}
