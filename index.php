<!DOCTYPE html>
<html lang="en">

<?php include "includes/header.php" ?>
<!-- Including the connection so we can use the $connection for the navigation.php  -->
<?php include "includes/db.php" ?>
<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                $query = "SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  // limit the post_content to just the 1st 100 characters
                  $post_content = substr($row['post_content'], 0, 100);
                  $post_status = $row['post_status'];
                  // if post_status equals published it'll continual to print the post
                  // if post_status doesn't equal publish, you won't see the post
                  if ($post_status !== 'published') {
                    echo '<h1 class="text-center">post is not published yet.</h1>';
                  } else {

                  // ending our PHP right here
                  ?>
                  <h1 class="page-header">
                      Page Heading
                      <small>Secondary Text</small>
                  </h1>

                  <!-- Blog Posts -->
                  <h2>
                      <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="index.php"><?php echo $post_author; ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                  <hr>
                  <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                  <hr>
                  <p><?php echo $post_content; ?></p>
                  <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <hr>
                  <!-- Closing the loop in php -->
                  <?php  } } ?>
            </div><!-- col -->
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>
        </div>
        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
