@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('content')
  <section>
    <div class="container-fluid">
      <h1>Thêm sản phẩm</h1>
      <form action="" method="POST">
        <input type="text" name="username">
        <button type="submit">Add</button>
        @csrf
        @method('PUT')
      </form>
    </div>
  </section>
@endsection
