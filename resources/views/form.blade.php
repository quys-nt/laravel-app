<form action="/unicode" method="post">
  <div>
    <input type="text" name="username" placeholder="Nhập username...">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  </div>
  <button type="submit">Submit</button>
</form>