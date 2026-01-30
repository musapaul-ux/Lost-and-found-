<?php
session_start();
include 'db.php';
include 'header.php';

if ($_POST) {
  $u = $_POST['username'];
  $p = md5($_POST['password']);

  $res = $conn->prepare("SELECT * FROM admins WHERE username=? AND password=?");
  $res->bind_param("ss",$u,$p);
  $res->execute();
  $r = $res->get_result();

  if ($r->num_rows) {
    $_SESSION['admin'] = $u;
    header("Location: admin_dashboard.php");
    exit;
  } else {
    echo "<div class='alert alert-danger'>Invalid login</div>";
  }
}
?>

<h3>Admin Login</h3>
<form method="POST" class="col-md-4">
  <input class="form-control mb-2" name="username" placeholder="Username" required>
  <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
  <button class="btn btn-warning">Login</button>
</form>

<?php include 'footer.php'; ?>
