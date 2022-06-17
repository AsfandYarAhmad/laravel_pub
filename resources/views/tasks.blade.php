@extends('app')
 
@section('content')
<div class="panel panel-default border rounded">
            <div class="panel-heading bg-light p-3 pt-2 pb-2 border-bottom">
                New Task
            </div>
            <div class="container">
    <div class="panel-body mb-5">
        <!-- Display Validation Errors -->
       
        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
           @csrf
 
            <!-- Task Name -->
            <div class="form-group mt-3">
                <label for="task" class="col-sm-3 control-label bold">Task</label>
 
                <div class="col-12">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-12 mt-2">
                    <button type="submit" class="btn btn-light">
                        <i class="fa fa-plus"></i>  Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
     <!-- Create Task Form... -->
 
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
    <div class="panel panel-default border mt-4 rounded">
            <div class="panel-heading bg-light p-3 pt-2 pb-2 border-bottom">
                Current Tasks
            </div>
        <div class="container">
            <div class="panel-body">
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th colspan="2">Task</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td>
                                    <div>{{ $task->name }}</div>
                                </td>
                                
                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
      <!-- TODO: Current Tasks -->
@endsection