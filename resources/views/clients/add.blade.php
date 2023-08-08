@extends('layouts.clients')

@section('title')
  {{ $title }}
@endsection

@section('content')
  <section>
    <div class="container-fluid">
      <h1>Thêm sản phẩm</h1>
      <div class="alert alert-danger text-center msg" style="display: none"><i class="fa fa-times-circle"></i></div>
      <form action="{{ route('post-add') }}" method="POST" id="product-form">
        {{-- @if ($errors->any())
          <div class="alert alert-danger text-center">
            {{ $errorMessage }}
          </div>
        @endif --}}
        {{-- @error('msg')
          <div class="alert alert-danger text-center"><i class="fa fa-times-circle"></i>{{ $message }}</div>
        @enderror --}}


        <div class="mb-3">
          <label for="">Thêm sản phẩm</label>
          <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}"
            placeholder="thêm sản phẩm">
          <span class="text-danger error product_name_error"></span>
        </div>

        <div class="mb-3">
          <label for="">Thêm giá</label>
          <input type="text" class="form-control" name="product_price" value="{{ old('product_price') }}"
            placeholder="thêm sản giá">
          <span class="text-danger error product_price_error"></span>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
        @csrf
      </form>
    </div>
  </section>
@endsection

@section('js')
  <script>
    $(document).ready(function() {
      $('#product-form').on('submit', function(e) {
        e.preventDefault();
        let productName = $('input[name="product_name"]').val().trim();

        let productPrice = $('input[name="product_price"]').val().trim();

        let actionUrl = $(this).attr("action");

        let csrfTokem = $(this).find('input[name="_token"]').val();

        console.log(csrfTokem);

        $('.error').text('');

        $.ajax({
          url: actionUrl,
          type: "POST",
          data: {
            product_name: productName,
            product_price: productPrice,
            _token: csrfTokem
          },
          dataType: "json",
          success: function(response) {
            console.log(response);
          },
          error: function(error) {
            $('.msg').show();

            let responseJSON = error.responseJSON.errors;
            if (Object.keys(responseJSON).length > 0) {
              $('.msg').text(responseJSON.msg);
              for (let key in responseJSON) {
                $('.' + key + '_error').text(responseJSON[key][0]);
                console.log(key);
              }

            }
          },
        });

      })
    })
  </script>
@endsection
