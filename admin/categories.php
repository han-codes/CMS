<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6 s">
                          <?php
                          if (isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];

                          if ($cat_title == "" || empty($cat_title)) {
                            echo "This field should not be empty.";
                          } else {
                            $query = "INSERT INTO categories(cat_title) ";
                            $query .= "VALUES ('{$cat_title}') ";
                            $create_category_query = mysqli_query($connection, $query); // send the query
                            if (!$create_category_query) {
                              die('query failed!' . mysqli_error($connection));
                            }
                          }
                          }
                           ?>
                          <form class="" action="" method="post">
                            <div class="form-group">
                              <label for="cat-title">Add Category</label>
                              <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                          </form>

                          <form class="" action="" method="post">
                            <div class="form-group">
                              <label for="cat-title">Edit Category</label>

                              <?php

                              if(isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                $select_categories_id = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_categories_id)) {
                                  $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];
                                  ?>
                                  <!-- This will echo the category title inside of input text box -->
                                  <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)) echo $cat_title; ?>">
                              <?php
                                  }
                              }
                              ?>

                              
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Update">
                            </div>
                          </form>

                        </div>
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php // Find All Categories Query
                              $query = "SELECT * FROM categories";
                              $select_categories = mysqli_query($connection, $query);

                              while($row = mysqli_fetch_assoc($select_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                echo "</tr>";
                              }

                               ?>

                               <?php // DELETE QUERY
                               if(isset($_GET['delete'])) {
                                 $the_cat_id = $_GET['delete'];
                                 $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                 $delete_query = mysqli_query($connection, $query);
                                 header("Location: categories.php"); // will refresh the page
                               }
                                ?>
                              <!-- <tr>
                                <td>Baseball</td>
                                <td>Category</td>
                              </tr> -->
                            </tbody>
                          </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>
