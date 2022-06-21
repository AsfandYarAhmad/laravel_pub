@extends('app')

@section('content')
<div class="panel panel-default border rounded">
    <div class="panel-heading bg-light p-3 pt-2 pb-2 border-bottom">
        Edit Task
    </div>
    <div class="container">
        <div class="panel-body mb-5">
            <!-- Display Validation Errors -->

            <!-- New Task Form -->
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" id="add_task" class="g-3 needs-validation" novalidate>
                @method('PATCH')
                @csrf
                <!-- Task Name -->
                <div class="row">
                    <div class="col-4">
                        <label for="task" class="form-label">Task</label>
                        <input type="text" name="name" id="task" class="form-control {{ $errors->first('date') ? 'is-invalid' : '' }}" value="{{ $task->name }}">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" placeholder="dd-mm-yyyy" name="date" id="date" class="form-control {{ $errors->first('date') ? 'is-invalid' : '' }}" value="{{ $task->date }}">
                        @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label for="time" class="form-label">Time</label>
                        <select class="form-select {{ $errors->first('date') ? 'is-invalid' : '' }}" name="time" value="{{ $task->time }}">
                            <option>Please Select</option>
                            <option name="time" value="AM" {{ $task->time == 'AM' ? "selected":"" }}>AM</option>
                            <option name="time" value="PM" {{ $task->time == 'PM' ? "selected":"" }}>PM</option>
                        </select>
                        @if ($errors->has('time'))
                        <span class="text-danger">{{ $errors->first('time') }}</span>
                        @endif
                    </div>
                </div>
                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-12 mt-2">
                        <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure you want to Edit task?');">
                            <i class="fa fa-plus"></i> Edit Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection