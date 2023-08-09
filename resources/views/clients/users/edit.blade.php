@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('content')
  <section>
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-lg-6">

          @if (session('msg'))
            <x-alert type="success" content="{{ session('msg') }}" />
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">Dữ liệu không hợp lệ. Vui lòng kiểm tra lại</div>
          @endif

          <h1>{{ $title }}</h1>


          <form action="{{route('users.post-edit')}}" method="POST">

            <div class="mb-3">
              <label for="">Họ và tên</label>
              <input type="text" name="fullname" class="form-control" placeholder="Nhập họ và tên..."
                value="{{ old('fullname') ?? $userDetail->name }}">
              @error('fullname')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="">Email</label>
              <input type="text" name="email" class="form-control" placeholder="Nhập email..."
                value="{{ old('email') ?? $userDetail->email }}">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
              <a href="{{ route('users.index') }}" class="btn btn-warning w-100">Quay lại</a>
            </div>

            @csrf

          </form>

        </div>
      </div>
    </div>
  </section>
@endsection
