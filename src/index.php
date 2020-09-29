<!DOCTYPE html>
<html>
    <head>
        <title>Php App</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
      <?php 
        //including the database connection file
        // include_once("config.php");
        // $result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY task_id");
        // echo "Hello world";
        $conn = new mysqli('db', 'root', 'example', 'mysql');
        $result = mysqli_query($conn, "SELECT * FROM tasks");
        // echo $result;
        
      ?>
        <div class="container"><br><br>
          <center><h2>My PHP App<h2></center><br><br>
          <form action="postTask.php" method="POST">
              <div class="form-group">
                <label for="task">Your Todo Task</label>
                <input type="text" class="form-control" name="task">
              </div>
              <?php
                if ($update == true):
              ?>
              <button type="submit" name="update" class="btn btn-success">Update</button>
                <?php else: ?>
              <button type="submit" name="save" class="btn btn-success">Add</button>
                <?php endif; ?>
          </form><br><br>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">TASK</th>
                  <th scope="col">UPDATE</th>
                  <th scope="col">DELETE</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  while($res = mysqli_fetch_array($result)) { 		
                    echo "<tr>";
                    echo "<td>".$res['task_id']."</td>";
                    echo "<td>".$res['task_name']."</td>";	
                    echo "<td><a href=\"edit.php?id=$res[task_id]\">Edit</a></td>";
                    echo "<td><a href=\"delete.php?id=$res[task_id]\">Delete</a></td>";		
                  }
                ?>
              </tbody>
          </table>
        </div>
        
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>