<?php
session_start();
if (!isset($_SESSION['admin'])) header("Location: admin_login.php");

include 'db.php';
include 'header.php';

$result = $conn->query("SELECT * FROM items ORDER BY created_at DESC");
?>

<h3>Admin Dashboard</h3>
<a href="logout.php" class="btn btn-danger mb-3">Logout</a>

<table class="table table-bordered">
<tr>
  <th>Type</th><th>Item</th><th>Image</th><th>Contact</th><th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= $row['type'] ?></td>
  <td><?= htmlspecialchars($row['item_name']) ?></td>
  <td><img src="uploads/<?= $row['image'] ?>" width="60"></td>
  <td><?= htmlspecialchars($row['contact']) ?></td>
  <td>
    <a class="btn btn-sm btn-danger"
       href="delete_item.php?id=<?= $row['id'] ?>"
       onclick="return confirm('Delete this item?')">
       Delete
    </a>
  </td>
</tr>
<?php endwhile; ?>
</table>

<?php include 'footer.php'; ?>
