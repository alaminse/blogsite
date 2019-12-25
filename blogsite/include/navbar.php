

<!-- Navigation Start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">My Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="post_details.php">Post</a>
        </li>
        <li class="nav-item">
          <?php
          if (!isset($_COOKIE['currentUser'])) {
            echo '<a class="nav-link" href="login.php">LogIn</a>';
          }else {
            echo '<a class="nav-link" href="logout.php">LogOut</a>';
          }
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reg.php">Registeration</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navigation End -->
