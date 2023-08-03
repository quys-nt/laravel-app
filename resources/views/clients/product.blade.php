@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('sidebar')
  @parent
  <h3>Product Sidebar</h3>
@endsection

@section('content')
  Danh sách sản phẩm
@endsection
