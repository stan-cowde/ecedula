<?php 
    #check
    $pageTitle = basename($_SERVER['PHP_SELF'], ".php");
    $pageTitle = ucwords(str_replace(['_', '-'], ' ', $pageTitle));
    $pageTitle;


    $stmt = $db->prepare("SELECT * FROM users where id = :user_id");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->fetch();

    if (intval($user['verified']) != intval($_SESSION['verified'])){
        $_SESSION['verified'] = $user['verified'];
    }


?>

<?php if ($_SESSION["verified"] === 0) : ?>

        <aside id="sidebar" class="sidebar mt-5">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($pageTitle == 'Dashboard') ? '' : 'collapsed' ?>" href="dashboard.php">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link <?= ($pageTitle == 'Step Form 1') ? '' : 'collapsed' ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse <?= ($pageTitle == 'Step Form 1') ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="step_form_1.php" class="<?= ($pageTitle == 'Step Form 1') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Online Cedula Application</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Forms Nav -->

                <li class="nav-item">
                    <a class="nav-link <?= ($pageTitle == 'Payment History') ? '' : 'collapsed' ?>" href="payment-history.php">
                        <i class="bi bi-clock-history"></i>
                        <span>Payment History</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-item">
                    <a class="nav-link <?= ($pageTitle == 'Profile') ? '' : 'collapsed' ?>" href="profile.php">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->
            </ul>
        </aside>

<?php elseif ($_SESSION["verified"] === 1) : ?>

            <aside id="sidebar" class="sidebar">
                <ul class="sidebar-nav" id="sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($pageTitle == 'Dashboard') ? '' : 'collapsed' ?>" href="dashboard.php">
                            <i class="bi bi-grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li><!-- End Dashboard Nav -->

                    <li class="nav-item">
                        <a class="nav-link <?= ($pageTitle == 'Payment History') ? '' : 'collapsed' ?>" href="payment-history.php">
                            <i class="bi bi-clock-history"></i>
                            <span>Payment History</span>
                        </a>
                    </li><!-- End Profile Page Nav -->

                    <li class="nav-item">
                    <a class="nav-link <?= ($pageTitle == 'Step Form 1') ? '' : 'collapsed' ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse <?= ($pageTitle == 'Step Form 1') ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="step_form_1.php" class="<?= ($pageTitle == 'Step Form 1') ? 'active' : '' ?>">
                                <i class="bi bi-circle"></i><span>Online Cedula Application</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Forms Nav -->

                    <li class="nav-item">
                        <a class="nav-link <?= ($pageTitle == 'Payment History') ? '' : 'collapsed' ?>" href="payment-history.php">
                            <i class="bi bi-clock-history"></i>
                            <span>Create Payment</span>
                        </a>
                    </li><!-- End Profile Page Nav -->

                    <li class="nav-item">
                        <a class="nav-link <?= ($pageTitle == 'Profile') ? '' : 'collapsed' ?>" href="profile.php">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                    </li><!-- End Profile Page Nav -->
                </ul>
            </aside>

<?php endif; ?>