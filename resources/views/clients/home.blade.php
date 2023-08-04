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

      @datetime("2021-10-02 15:30:00")
      <x-alert type="info" :content="$message" data-icon="check-circle"/>
      {{-- <x-input.button/>
      <x-forms.button/> --}}
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
