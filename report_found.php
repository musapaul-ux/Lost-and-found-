<?php
include 'db.php';
include 'header.php';

if ($_POST) {
  $img = time().'_'.$_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$img");

  $stmt = $conn->prepare(
    "INSERT INTO items (type,name,contact,item_name,description,image)
     VALUES ('Found',?,?,?,?,?)"
  );
  $stmt->bind_param("sssss",
    $_POST['name'], $_POST['contact'],
    $_POST['item'], $_POST['description'], $img
  );
  $stmt->execute();

  echo "<div class='alert alert-success'>Found item reported successfully.</div>";
}
?>

<h3>Report Found Item</h3>
<form method="POST" enctype="multipart/form-data">
  <input class="form-control mb-2" name="name" placeholder="Your Name" required>
  <input class="form-control mb-2" name="contact" placeholder="Phone Number" required>
  <input class="form-control mb-2" name="item" placeholder="Item Name" required>
  <textarea class="form-control mb-2" name="description" placeholder="Description" required></textarea>
  <input type="file" class="form-control mb-2" name="image" required>
  <button class="btn btn-success">Submit</button>
</form>

<?php include 'footer.php'; ?>
