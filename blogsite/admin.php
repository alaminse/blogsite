  <?php include "include/header.php"; ?>
  <?php
    include "config.php";
    include "Database.php";

    $db = new Database();
    $count_user = "SELECT count(id) AS total_u FROM logreg";
    $count_post = "SELECT count(p_id) AS total_p FROM post";
    $allUser = "SELECT * FROM logreg";
    $allPost = "SELECT * FROM post";
    $read = $db->count($count_user);
    $read_p = $db->count1($count_post);
    $readuser = $db->allUser($allUser);
    $readpost = $db->allPost($allPost);

    if(isset($_GET['msg'])){
     echo "<span style='color:green'>".$_GET['msg']."</span>";
    }
    if($read){
     while($row = $read->fetch_assoc()){
      $total_u= $row['total_u'];
      }
    }
    if($read_p){
     while($row = $read_p->fetch_assoc()){
      $total_p= $row['total_p'];
      }
   }

  ?>
    <section class="container">
      <div class="row my-3">
        <div class="col">
          <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#Dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#UserList" role="tab" aria-controls="v-pills-profile" aria-selected="true">User List</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#Post" role="tab" aria-controls="v-pills-messages" aria-selected="true">Post</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#Comments" role="tab" aria-controls="v-pills-settings" aria-selected="true">Comments</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#TagCatagories" role="tab" aria-controls="v-pills-settings" aria-selected="true">Tag/Catagories</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="Dashboard" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="card-deck mb-5">
                <div class="card p-1">
                  <h1 class="display-4 text-center mt-5"> Total User </h1>
                  <h1 class="display-3 text-center bg-green"><?php echo $total_u; ?></h1>
                </div>
                <div class="card p-1">
                  <h1 class="display-4 text-center mt-5">Total Post</h1>
                  <h1 class="display-3 text-center bg-green"><?php echo $total_p; ?></h1>
                </div>
                <div class="card p-1">
                  <h1 class="display-4 text-center mt-5">Total Comment</h1>
                  <h1 class="display-3 text-center">101</h1>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="UserList" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </nav>
              <table class="table table-striped">

                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($readuser){ ?>
                      <?php while($row = $readuser->fetch_assoc()){ ?>
                  <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <th scope="row"><?php echo $row['name']; ?></th>
                    <th scope="row"><?php echo $row['email']; ?></th>
                    <td>
                      <button type="button" class="btn btn-warning">Block</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                </tbody>
                <?php } ?>
                <?php } ?>
              </table>
            </div>
            <div class="tab-pane fade" id="Post" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </nav>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Published</th>
                    <th scope="col">Title</th>
                    <th scope="col">User</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                   if($readpost){ ?>
                      <?php while($row = $readpost->fetch_assoc()){ ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <th scope="row"><?php echo $row['p_date']; ?></th>
                    <th scope="row"><?php echo $row['p_title']; ?></th>
                    <th scope="row"><?php echo $row['p_author']; ?></th>
                    <th scope="row"><?php if ($row['p_status'] == 1) {
                      echo "Yes";
                    }else{echo "No";}   ?></th>
                    <td>
                      <a href="view.php?id=<?= $row['p_id'] ?>" class="btn btn-warning" value="">View</a>
                      <a href="edit.php?id=<?= $row['p_id'] ?>" class="btn btn-warning" value="">Edit</a>
                      <a href="delete.php?id=<?= $row['p_id'] ?>" class="btn btn-danger" value="">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="Comments" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                      <button type="button" class="btn btn-success">View</button>
                      <button type="button" class="btn btn-warning">Block</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <script type="text/javascript">
            function validateForm() {
              var tag = document.forms["myForm"]["fname"].value;
              if (tag == "") {
                alert("Name must be filled out");
                return false;
              }
              }
            </script>
            <div class="tab-pane fade" id="TagCatagories" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <form action="TagCatagories.php"onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="form-group mb-2 mr-4">
                  <input type="text" class="form-control" name="tag" placeholder="Tag or Catagories">
                </div>
                <input type="submit" class="btn btn-primary mb-2" name="submit" value="Add"/>
              </form>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Tag Name</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($readuser){ ?>
                      <?php while($row = $readuser->fetch_assoc()){
                        $i=0; ?>
                  <tr>
                    <th scope="row"></th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                      <button type="button" class="btn btn-warning">Edit</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php include "include/footer1.php"; ?>
