<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="title" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_category">Post Category</label>
    <input type="text" name="post_category_id" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" name="author" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" name="post_status" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" rows="10" cols="30"></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>
</form>
