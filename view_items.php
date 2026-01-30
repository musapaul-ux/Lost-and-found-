<?php
include 'db.php';
include 'header.php';

$search = $_GET['search'] ?? '';
$stmt = $conn->prepare(
  "SELECT * FROM items WHERE item_name LIKE ? ORDER BY created_at DESC"
);
$like = "%$search%";
$stmt->bind_param("s", $like);
$stmt->execute();
$result = $stmt->get_result();
?>

<h3>Lost & Found Items</h3>

<form class="mb-3">
  <input class="form-control" name="search" placeholder="Search item name..." value="<?= htmlspecialchars($search) ?>">
</form>

<div class="row">
<?php while($row = $result->fetch_assoc()): ?>
  <div class="col-md-4 mb-3">
    <div class="card">
      <img src="uploads/<?= $row['image'] ?>" class="card-img-top">
      <div class="card-body">
        <span class="badge bg-<?= $row['type']=='Lost'?'danger':'success' ?>">
          <?= $row['type'] ?>
        </span>
        <h5><?= htmlspecialchars($row['item_name']) ?></h5>
        <p><?= htmlspecialchars($row['description']) ?></p>
        <p><strong>Contact:</strong> <?= htmlspecialchars($row['contact']) ?></p>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>

<?php include 'footer.php'; ?>
