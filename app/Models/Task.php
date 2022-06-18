<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public static function storeTask($array){
        $task = new Task;
        $task->name = $array['name'];
        $task->date = $array['date'];
        $task->time = $array['time'];
        $task->save();
        return redirect()->back()->with('taskCreated', 'Task created sucessfully!');
    }

}
