<?php
require_once ('../config/config.php');

session_start();

include ('includes/header.php');
include('includes/sidebar.php');
include ('includes/navbar.php');


$records_per_page = 10;

$current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = ($current_page - 1) * $records_per_page;

$stmt = $db->prepare("SELECT * FROM users LIMIT :offset, :limit");
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_records = $db->query("SELECT COUNT(*) FROM users WHERE verified = 1")->fetchColumn();

$total_pages = ceil($total_records / $records_per_page);
?>

<div class="card-body">

        <div class="table-responsive">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#createAccountModal"><i class="fas fa-plus"></i> Create Account</a> 
            </div>
            <h4>Accounts Table</h4>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <a href="" id="user-link" data-toggle="modal" data-target=".bd-example-modal-sm"
                                data-id="<?php echo $row['id']; ?>">
                                <?php echo $row['firstname']; ?>     <?php echo $row['lastname']; ?>
                            </a>
                        </td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="#" class="delete-button" data-id="<?php echo $row['id']; ?>"><i
                                    class="fas fa-trash" style="color: #ff0000;"></i></a>
                        </td>
                    </tr>
                <?php 
                require 'modal/create-account.php';
                endforeach; 
                ?>
            </table>

            <div class="d-flex justify-content-center mt-4">
                <nav>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
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

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">User Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- User details will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

    <div class="toast-container top-0 end-0 p-3">
        <div id="welcomeToast" data-example-toggle="toast" class="toast text-bg-success" role="alert">
        <div class="toast-body">
            <div class="d-flex">
            <span><i class="fa-solid fa-circle-check fa-lg"></i></span>
            <div class="d-flex flex-grow-1 align-items-center justify-content-center">
                <span class="fw-semibold">Account Created</span>
                🎉
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        </div>
     </div>


    

<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js
"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editButtons = document.querySelectorAll('.edit-button');
        const deleteButtons = document.querySelectorAll('.delete-button');

        editButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const userId = button.getAttribute('data-id');
                // Replace with your actual edit URL and data format
                const url = `/edit-user.php?id=${userId}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Handle successful edit response
                        console.log('Edit user:', data);
                        // You can populate an edit form with data here
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const userId = button.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this user?')) {
                    const url = `config/Users/delete-user.php`;
                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ id: userId }),
                    })
                        .then(response => response.json())
                        .then(data => {

                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: data['success'],
                                }).then(function (result) {
                                    window.location.reload();
                                });
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    });
</script>


<script>
    document.querySelectorAll('#user-link').forEach(link => {
        link.addEventListener('click', async (event) => {
            event.preventDefault();
            const userId = event.target.getAttribute('data-id');

            //console.log(userId);

            try {
                const response = await fetch('config/Users/fetch_users_byID.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: userId })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                //console.log(data);

                
                const modalBody = document.getElementById('modalBody');
                modalBody.innerHTML = `
                    <p><strong>ID:</strong> ${data.id}</p>
                    <p><strong>Name:</strong> ${data.firstname} ${data.lastname}</p>
                    <p><strong>Username:</strong> ${data.username}</p>
                    <p><strong>Email:</strong> ${data.email}</p>
                `;

                
                $('.bd-example-modal-sm').modal('show');

                
            } catch (error) {
                console.error('Fetch error:', error);
            }
        });
    });
</script>
