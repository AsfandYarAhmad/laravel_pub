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
            <form action="{{route('tasks.store')}}" method="POST" id="add_task" class="g-3 needs-validation" novalidate>
                @csrf
                <!-- Task Name -->
                <div class="row">
                    <div class="col-4">
                        <label for="name" class="form-label">Task</label>
                        <input type="text" name="name" id="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" value=" {{ old('name') }}">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control {{ $errors->first('date') ? 'is-invalid' : '' }}" data-date-format="yyyy/mm/dd" value="{{ old('date') }}">
                        @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label">Time</label>
                        <select class="form-select {{ $errors->first('time') ? 'is-invalid' : '' }}" name="time">
                            <option value="" selected>Please Select</option>
                            <option value="AM" {{ old('time') == 'AM' ? 'SELECTED' : '' }}>AM</option>
                            <option value="PM" {{ old('time') == 'AM' ? 'SELECTED' : '' }}>PM</option>
                        </select>
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
                            <a href="{{ route('tasks.edit', $task->id) }}"><i class="fas fa-edit" style="color: black"></i></a>
                        </td>
                        <!-- Task Name -->
                        <td class="col-3">
                            <div>{{ $task->name }}</div>
                        </td>
                        <td class="col-3">
                            <div>{{ $task->date }}</div>
                        </td>
                        <td class="col-3">
                            <div>{{ $task->time }}</div>

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