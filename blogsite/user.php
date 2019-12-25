<?php include "include/header.php"; ?>
<?php
if (!isset($_COOKIE['currentUser'])) {
  header('location: login.php');
}
 ?>

  <section class="container mb-3">
    <div class="row my-3">
      <div class="col">
        <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="#">User Dashboard</a>
          <a href="index.php"><i class="fa fa-home fa-3x"></i></a>
          <a href="logout.php" name="submit" class="float-right btn btn-warning">LogOut</a>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#Dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#Post" role="tab" aria-controls="v-pills-messages" aria-selected="true">Post</a>
          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#Comments" role="tab" aria-controls="v-pills-settings" aria-selected="true">Comments</a>
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="Dashboard" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="card-deck mb-5">
              <div class="card p-1">
                <h1 class="display-4 text-center mt-5">Total Post by Me</h1>
                <h1 class="display-3 text-center">10</h1>
              </div>
              <div class="card p-1">
                <h1 class="display-4 text-center mt-5">Total Comments by Me</h1>
                <h1 class="display-3 text-center">60</h1>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="Post" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <nav class="navbar navbar-light bg-light">
              <form class="form-inline">
                <a class="btn btn-success mr-4" href="new_post.php"><i class="fas fa-plus"></i> Add New Post</a>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </nav>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Title</th>
                  <th scope="col">Date</th>
                  <th scope="col">Discription</th>
                  <th scope="col">Tag/Catagories</th>
                  <th scope="col">Published</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>AAOtto</td>
                  <td>AAOtto</td>
                  <td>Yes</td>
                  <td>
                    <button type="button" class="btn btn-success">View</button>
                    <button type="button" class="btn btn-warning">Edit</button>
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
        </div>
      </div>
    </div>
  </section>
<?php include "include/footer1.php"; ?>
