@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('sidebar')
  @parent
  <h3>Product Sidebar</h3>
@endsection

@section('content')
  <section>
    <div class="container">
      @if (session('msg'))
        <div class="alert alert-success text-center">{{ session('msg') }}</div>
      @endif
      <h1>Danh sach sản phẩm</h1>
    </div>
  </section>
@endsection

@push('scripts')
@endpush
