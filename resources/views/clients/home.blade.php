@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('sidebar')
  @parent
  <h3>Home Sidebar</h3>
@endsection

@section('content')
  <section>
    <div class="container-fluid">
      <h1>
        Trang chủ
      </h1>
    </div>
  </section>
  @include('clients.contents.slide')
  @include('clients.contents.about')
@endsection


@section('css')
  <style type="text/css">
  </style>
@endsection


@section('js')
  <script type="text/javascript">
  </script>
@endsection
