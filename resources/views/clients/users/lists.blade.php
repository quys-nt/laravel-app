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

      <form action="" method="GET" class="mb-3">
        <div class="row">

          <div class="col-sm-3">
            <select class="form-control" name="status">
              <option value="0">Trạng thái</option>
              <option value="active" {{ request()->status == 'active' ? 'selected' : false }}>Kích hoạt</option>
              <option value="inactive" {{ request()->status == 'inactive' ? 'selected' : false }}>Chưa kích hoạt</option>
            </select>
          </div>

          <div class="col-sm-3">
            <select class="form-control" name="group_id">
              <option value="0">Tất cả nhóm</option>
              @if (!empty(getAllGroups()))
                @foreach (getAllGroups() as $item)
                  <option value="{{ $item->id }}" {{ request()->group_id == $item->id ? 'selected' : false }}>
                    {{ $item->name }}</option>
                @endforeach
              @endif
            </select>
          </div>

          <div class="col-sm-4">
            <input type="search" name="keywords" class="form-control" placeholder="Từ khoá tìm kiếm..."
              value="{{ request()->keywords }}">
          </div>

          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
          </div>
          @csrf
        </div>
      </form>



      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th width="5%">STT</th>
            <th><a href="?sort-by=name&sort-type={{ $sortType }}">Tên</a></th>
            <th><a href="?sort-by=email&sort-type={{ $sortType }}">Email</a></th>
            <th>Nhóm</th>
            <th width="10%">Trạng thái</th>
            <th width="15%"><a href="?sort-by=created_at&sort-type={{ $sortType }}">Thời Gian</a></th>
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
                <td>{{ $item->group_name }}</td>
                <td>
                  {!! $item->status == 0
                      ? '<button class="btn btn-danger w-100">Chưa kích hoạt</button>'
                      : '<button class="btn btn-success w-100">Đã kích hoạt</button>' !!}
                </td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <a href="{{ route('users.edit', ['id' => $item->id]) }}" class="btn btn-warning btn-sm w-100">Sửa</a>
                </td>
                <td>
                  <a onclick="return confirm('Bạn có chắc chắn muốn xoá')"
                    href="{{ route('users.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm w-100">Xoá</a>
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

      <div class="d-flex justify-content-center">
        {{ $userlits->links() }}
      </div>

    </div>
  </section>
@endsection
