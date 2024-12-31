<?php

// Get the base URL of your application
$baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

// Construct the image path relative to the web root
$imgPath = $baseURL . '/ecedula/pages/' . $row['valid_id'];

?>


<div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="userProfileModalLabel">User
                    Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="userProfileContent">
                    <?php
                    // Assuming you have fetched the user data into $row
                    if ($row) {
                        ?>
                        <p><strong>Name:</strong> <?= $row['first_name'] ?> <?= $row['middle_name'] ?> <?= $row['last_name'] ?></p>
                        <p><strong>Email:</strong> <?= $row['email'] ?></p>
                        <p><strong>Address:</strong> <?= $row['address'] ?>, <?= $row['barangay'] ?>, <?= $row['municipality'] ?></p>
                        <p><strong>Nationality:</strong> <?= $row['nationality'] ?></p>
                        <p><strong>Citizenship:</strong> <?= $row['citizenship'] ?></p>
                        <p><strong>Date of Birth:</strong> <?= $row['date_of_birth'] ?></p>
                        <p><strong>Gender:</strong> <?= $row['gender'] ?></p>
                        <p><strong>Civil Status:</strong> <?= $row['civil_status'] ?></p>
                        <p><strong>Occupation:</strong> <?= $row['occupation'] ?></p>
                        <p><strong>Monthly Income:</strong> <?= $row['monthly_income'] ?></p>
                        <hr>
                        <p><strong>Identification Card Image:</strong></p>
                        <img src="<?= $imgPath ?>" alt="" style="width: 300px; height: auto;">
                        <p><strong>ID Number:</strong> <?= $row['id_number'] ?></p>
                        <hr>
                        <p><strong>Place of Birth:</strong> <?= $row['place_of_birth'] ?></p>
                        <p><strong>TIN:</strong> <?= $row['tin'] ?></p>
                        <p><strong>ICR:</strong> <?= $row['icr'] ?></p>
                        <p><strong>Father's Name:</strong> <?= $row['father_name'] ?></p>
                        <p><strong>Mother's Name:</strong> <?= $row['mother_name'] ?></p>
                        <p><strong>Guardian's Name:</strong> <?= $row['guardian_name'] ?></p>
                        <p><strong>Spouse's Name:</strong> <?= $row['spouse_name'] ?></p>
                        <p><strong>Height:</strong> <?= $row['height'] ?></p>
                        <p><strong>Weight:</strong> <?= $row['weight'] ?></p>
                        <?php
                    } else {
                        echo '<p>Error loading user profile or no user found.</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>