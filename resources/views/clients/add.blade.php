@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('content')
  <section>
    <div class="container-fluid">
      <h1>Thêm sản phẩm</h1>
      <form action="" method="POST">
        {{-- @if ($errors->any())
          <div class="alert alert-danger text-center">
            {{ $errorMessage }}
          </div>
        @endif --}}
        @error('msg')
          <div class="alert alert-danger text-center"><i class="fa fa-times-circle"></i>{{ $message }}</div>
        @enderror
        <div class="mb-3">
          <label for="">Thêm sản phẩm</label>
          <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}"
            placeholder="thêm sản phẩm">
          @error('product_name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="">Thêm giá</label>
          <input type="text" class="form-control" name="product_price" value="{{ old('product_price') }}"
            placeholder="thêm sản giá">
          @error('product_price')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
        @csrf
      </form>
    </div>
  </section>
@endsection
