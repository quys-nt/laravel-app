<h1>Thêm chuyên mục</h1>

<form action="<?php echo route('categories.add'); ?>" method="POST">
  <div>
    <input type="text" name="category_name" placeholder="Thêm chuyên mục..." 
    value="<?php echo $cateName; ?>">
  </div>
  <?php echo csrf_field(); ?>
  <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
  <button type="submit">thêm chuyên mục</button>
</form>