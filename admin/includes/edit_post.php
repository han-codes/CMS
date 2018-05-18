<?php
if (isset($_GET['p_id'])){
  $the_post_id =  $_GET['p_id'];
}
$query = "SELECT * FROM posts";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)) {
  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  $post_tags = $row['post_tags'];
  $post_comment_count = $row['post_comment_count'];
  $post_date = $row['post_date'];
}
 ?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $post_title; ?>">
  </div>

  <div class="form-group">
    <label for="post_category">Post Category</label>
    <input type="text" name="post_category_id" class="form-control" value="<?php echo $post_category_id; ?>">
  </div>

  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" name="author" class="form-control" value="<?php echo $post_author; ?>">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" name="post_status" class="form-control" value="<?php echo $post_status; ?>">
  </div>

  <div class="form-group">
    <img width=100 src="../images/<?php echo $post_image; ?>" alt="post image">
    <!-- <label for="post_image">Post Image</label>
    <input type="file" name="image"> -->
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags; ?>">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" rows="10" cols="30"><?php echo $post_content; ?>
    </textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>
</form>
