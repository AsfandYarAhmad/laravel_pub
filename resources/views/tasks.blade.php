@extends('app')
 
@section('content')
<style>
    #name-error{
        color: red;
    }
</style>
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
                <div class="">
                <label for="task" class="form-label">Task</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-12 mt-2">
                    <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure you want to add task?');">
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
                                <td class="col-6">
                                    <div>{{ $task->name }}</div>
                                </td>
                                
                                <td class="col-6">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js" integrity="sha512-XJiEiB5jruAcBaVcXyaXtApKjtNie4aCBZ5nnFDIEFrhGIAvitoqQD6xd9ayp5mLODaCeaXfqQMeVs1ZfhKjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
  $("#add_task").validate({
          ignore:"",
          rules:{
            name:{
                  required:!0,
                  maxlength:30,
                  minlength:10
             },
          },
          submitHandler:function(n){n.submit()}

  });
</script>
@endsection

