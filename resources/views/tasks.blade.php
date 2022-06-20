@extends('app')

@section('content')
@if(session()->has('taskCreated'))
<div class="alert alert-success">
    {{ session()->get('taskCreated') }}
</div>
@endif
<div class="panel panel-default border rounded">
    <div class="panel-heading bg-light p-3 pt-2 pb-2 border-bottom">
        New Task
    </div>
    <div class="container">
        <div class="panel-body mb-5">
            <!-- Display Validation Errors -->

            <!-- New Task Form -->
            <form action="{{route('tasks.store')}}" method="POST" id="add_task">
                @csrf
                <!-- Task Name -->
                <div class="row">
                    <div class="col-4">
                        <label for="task" class="form-label">Task</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label for="task" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control">
                        @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label for="task" class="form-label">Time</label>
                        <input type="time" name="time" id="time" class="form-control">
                        @if ($errors->has('time'))
                        <span class="text-danger">{{ $errors->first('time') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-12 mt-2">
                        <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure you want to add task?');">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Create Task Form... -->

<!-- Current Tasks -->
@if(session()->has('taskDelete'))
<div class="alert alert-danger">
    {{ session()->get('taskDelete') }}
</div>
@endif
@include('common.errors')
@if(session()->has('taskUpdated'))
<div class="alert alert-success mt-3">
    {{ session()->get('taskUpdated') }}
</div>
@endif
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
                    <th></th>
                    <th>Task Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <a href="#edit_{{ $task->id }}" data-bs-toggle="modal"><i class="fas fa-edit" style="color: black"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="edit_{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Task no. {{$task->id}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                                @method('PATCH')
                                                @csrf
                                                <div>
                                                    <label for="task" class="form-label">Task Name</label>
                                                    <input type="text" name="updateName" id="name" class="form-control" value="{{ $task->name }}">
                                                    @if ($errors->has('updateName'))
                                                    <span class="text-danger">{{ $errors->first('updateName') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label for="task" class="form-label">Task</label>
                                                    <input type="date" name="updateDate" id="date" class="form-control" value="{{ $task->date }}">
                                                    @if ($errors->has('updateDate'))
                                                    <span class="text-danger">{{ $errors->first('updateDate') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label for="task" class="form-label">Task</label>
                                                    <input type="time" name="updateTime" id="time" class="form-control" value="{{ $task->time }}">
                                                    @if ($errors->has('updateTime'))
                                                    <span class="text-danger">{{ $errors->first('updateTime') }}</span>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <!-- Task Name -->
                        <td class="col-3">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td class="col-3">
                            <div>{{ $task->date }}</div>
                        </td>
                        <td class="col-3">
                            <div>{{ date('h:i A', strtotime($task->time )); }}</div>

                        </td>
                        <td class="col-3">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="Post" onclick="return confirm('Are you sure you want to delete task {{ $task->name }}?');">
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
@endsection