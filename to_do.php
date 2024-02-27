<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/todo.css">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" style="font-size: 30px;" id="a1" href="#">TO DO LIST</a>
    <a class="navbar-brand ml-auto" id="a2" href="logOut.php">Log Out</a>
    </div>
  </nav>
  <div class="container-fluid">
    <form class="mx-auto" method="post">
      <div class="row">
        <div class="col-md-6">
          <input type="text" class="form-control" name="add" id="addTask" placeholder="Add Task..." required>
        </div>
        <div class="col-md-3">
          <input type="date" class="form-control" name="date" id="TaskForm" required>
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
        </div>
      </div>
    </form>

    <table class="table">
      <thead class="thead">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">WORK</th>
          <th scope="col">DATE</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody id="tbody">

      </tbody>

    </table>

    <form id="updateForm" style="display: none;">
      <label for="updateTaskName">Task Name:</label>
      <input type="text" id="updateTaskName" name="updateTaskName" class="form-control">

      <label for="updateTime">Time:</label>
      <input type="date" id="updateTime" name="updateTime" class="form-control">

      <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="script.js"></script>
</body>

</html>