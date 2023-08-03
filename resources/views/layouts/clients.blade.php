<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'quynt') - quynt</title>

  <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
  @yield('css')

</head>

<body>
  @include('clients.blocks.header')

  <main>

    <aside>
      @section('sidebar')
        @include('clients.blocks.sidebar')
      @show
    </aside>

    @yield('content')

  </main>

  @include('clients.blocks.footer')

  <script src="{{ asset('assets/clients/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
  @yield('js')
  @stack('scripts')

</body>

</html>
