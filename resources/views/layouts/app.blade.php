<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/pekan.png">
    <title>PeKan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    @livewireStyles
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/main.css">
    <style type="text/css">
        .turbolinks-progress-bar {
          height: 3px;
          background-color: #7fda56;
        }
    </style>
</head>
<body>
    @if(auth()->check())
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="images/pekan.png" width="45" alt="">
        </a>
        <div style="font-weight: bold;"><i class="text-danger">Pe</i><i class="text-success">Kan</i> <br><i class="text-muted" style="font-size: 8pt;">Pengeluaran - Pemasukan</i>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth()->user()->name }}</a>
              <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                <livewire:pekan.logout>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    @endif

    @yield('content')
    <script type="text/javascript">
        document.addEventListener("turbolinks:load", function(event) {
            Turbolinks.setProgressBarDelay(100);
            Turbolinks.clearCache();
        });
    </script>
    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}')
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>
    <script type="text/javascript">
        window.livewire.on('pekanStore', () => {
            $('#createModal').modal('hide');
            $('#updateModal').modal('hide');
        });
    </script>
</body>
</html>