<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'quynt') - quynt</title>
  @yield('css')
</head>

<body>
  <header>
    <h1>Header</h1>
  </header>
  <main>
    <aside>
      @section('sidebar')
        @include('clients.blocks.sidebar')
      @show
    </aside>
    <div class="container">
      @yield('content')
    </div>
  </main>
  <footer>
    <h1>Footer</h1>
  </footer>
  @yield('js')
</body>

</html>
