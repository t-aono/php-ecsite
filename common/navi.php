<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <?= $login_user ?>
    </a>

    <!-- for PC -->
    <div class="d-none d-sm-block">
      <ul class="nav">
        <li class="nav-item">
          <a href="../shop/shop_list.php" class="nav-link">User Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../staff_login/staff_top.php">Admin Menu</a>
        </li>
      </ul>
    </div>

    <!-- for phone -->
    <div class="d-block d-sm-none">
      <ul class="nav fixed-bottom">
        <li class="nav-item">
          <a href="../shop/shop_list.php" class="nav-link">User Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../staff_login/staff_top.php">Admin Menu</a>
        </li>
      </ul>
    </div>

  </div>
</nav>