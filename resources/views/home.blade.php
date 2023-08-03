<h1>{{ $welcome }}</h1>
<div class="container">
  {!! !empty($content) ? $content : false !!}
</div>
<hr>
@include('parts.notice')
