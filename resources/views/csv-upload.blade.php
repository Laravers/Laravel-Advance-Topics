<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Queue</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container">
      <div class="nav navbar-nav">
        <a class="nav-item nav-link" href="{{ route('home') }}">Home</a>
        <a class="nav-item nav-link" href="{{ route('send.mail') }}">Send Mail</a>
        <a class="nav-item nav-link" href="{{ route('csv.upload') }}">Upload CSV</a>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session()->get('success') }}
      </div>
    @endif

    <form action="{{ route('csv.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="csv" id="csv">
      <button type="submit" class="btn btn-primary">upload</button>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>
