<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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
  
</body>
</html>