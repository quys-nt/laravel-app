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
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
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
                <td>
                  <a href="{{ route('users.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc chắn muốn xoá')" href="{{ route('users.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Xoá</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6"></td>
            </tr>
          @endif

        </tbody>
      </table>

    </div>
  </section>
@endsection
