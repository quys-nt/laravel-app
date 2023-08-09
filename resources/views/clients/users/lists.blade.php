@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('content')
  <section>
    <div class="container-fluid">

      @if (session('msg'))
        <x-alert type="success" content="{{ session('msg') }}" />
      @endif

      <h1>{{ $title }}</h1>
      <a href="{{ route('users.add') }}" class="btn btn-primary">Thêm người dùng</a>
      <hr>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th width="15%">Thời Gian</th>
          </tr>
        </thead>
        <tbody>

          @if (!empty($userlits))
            @foreach ($userlits as $key => $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="4"></td>
            </tr>
          @endif

        </tbody>
      </table>

    </div>
  </section>
@endsection
