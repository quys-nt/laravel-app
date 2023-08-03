@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('sidebar')
  @parent
  <h3>Home Sidebar</h3>
@endsection

@section('content')
  <h1>
    Trang chủ
  </h1>
@endsection


@section('css')
  <style type="text/css">
    body {
      background-color: bisque;
    }
  </style>
@endsection


@section('js')
  <script type="text/javascript">
    console.log('helo');
  </script>
@endsection
