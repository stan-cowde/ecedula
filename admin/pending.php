<?php
require_once('../config/config.php');

session_start();

include('includes/header.php');
include('includes/navbar.php');

if (isset($_POST['edit_btn'])) {
  $id = $_POST['edit_id'];
  $stmt = $db->prepare("UPDATE users u
                        JOIN application_request ar ON u.id = ar.user_id
                        SET u.verified = 1,
                            ar.status = 'Approved'
                        WHERE ar.status = 'Pending' AND ar.id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
}

if (isset($_POST['delete_btn'])) {
  $id = $_POST['delete_id'];
  $stmt = $db->prepare("UPDATE users u
                        JOIN application_request ar ON u.id = ar.user_id
                        SET u.verified = 0,
                            ar.status = 'Denied',
                            ar.reviewed_by = " . $_SESSION['user_id'] . "
                        WHERE ar.status = 'Pending' AND ar.id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
}

$records_per_page = 10;

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($current_page - 1) * $records_per_page;

$stmt = $db->prepare("SELECT 
                        ar.id AS id,
                            ar.status,
                            ar.reviewed_by,
                            ar.created_at AS application_created_at,
                            ar.updated_at AS application_updated_at,
                            u.firstname,
                            u.lastname,
                            u.email,
                            u.username
                        FROM 
                            application_request ar
                        JOIN 
                            users u ON ar.user_id = u.id WHERE status = 'Pending' AND u.verified = 0 LIMIT :offset, :limit");
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_records = $db->query("SELECT COUNT(*) FROM users WHERE verified IS NULL")->fetchColumn();

$total_pages = ceil($total_records / $records_per_page);
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <h4>Unverified Users</h4>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>name</th>
            <th>username</th>
            <th>Email</th>
            <th colspan="2">Status</th>
          </tr>
        </thead>
        <?php foreach ($rows as $row) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td>
              <a href="user-details.php?id=<?php echo $row['id']; ?>">
                <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>
              </a>
            </td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="edit_btn" class="btn btn-success">Approved</button>
              </form>
            </td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="delete_btn" class="btn btn-danger">Disapproved</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

      <div class="d-flex justify-content-center mt-4">
        <nav>
          <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
              <li class="page-item <?php echo $current_page === $i ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
            <?php endfor; ?>
          </ul>
        </nav>
      </div>

    </div>
  </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>