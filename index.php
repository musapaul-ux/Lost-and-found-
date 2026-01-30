<?php include 'header.php'; ?>

<h2>Community Lost & Found System</h2>
<p>
This platform helps community members report and recover lost property
such as phones, IDs, wallets, certificates, and more.
</p>

<div class="row">
  <div class="col-md-4">
    <div class="card p-3">
      <h5>Report Lost Item</h5>
      <p>Submit details of items you have lost.</p>
      <a href="report_lost.php" class="btn btn-primary">Report Lost</a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5>Report Found Item</h5>
      <p>Submit details of items you have found.</p>
      <a href="report_found.php" class="btn btn-success">Report Found</a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5>View All Items</h5>
      <p>Browse and search lost & found items.</p>
      <a href="view_items.php" class="btn btn-secondary">View Items</a>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
