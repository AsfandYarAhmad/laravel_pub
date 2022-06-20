@include('head')
<div class="container col-6">
  <nav class="navbar navbar-expand-lg navbar-light bg-light border mt-5 mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Task List</a>
    </div>
  </nav>
</div>

<div class="container col-6">
  @yield('content')
</div>
@include('foot')