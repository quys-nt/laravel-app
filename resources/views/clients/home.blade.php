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

      @datetime('2021-10-02 15:30:00')
      <x-alert type="info" :content="$message" data-icon="check-circle" />
      {{-- <x-input.button/>
      <x-forms.button/> --}}
      <p><img src="https://i.pinimg.com/564x/11/bd/20/11bd20f533facc49503bceecf71f545e.jpg" alt=""></p>
      <p>
        <a href="{{ route('download-img') . '?img=https://i.pinimg.com/564x/11/bd/20/11bd20f533facc49503bceecf71f545e.jpg' }}"
          class="btn btn-primary mx-2">Download Ảnh</a>
        <a href="{{ route('download-img') . '?img='.public_path('storage/img-background-01.jpg') }}"
          class="btn btn-info mx-2">Download Ảnh</a>
      </p>
    </div>
  </section>
  @include('clients.contents.slide')
  @include('clients.contents.about')
@endsection


@section('css')
  <style type="text/css">
    img {
      max-width: 100%;
      height: auto;
    }
  </style>
@endsection


@section('js')
  <script type="text/javascript"></script>
@endsection
