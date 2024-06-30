<?php 
    #check
    $pageTitle = basename($_SERVER['PHP_SELF'], ".php");
    $pageTitle = ucwords(str_replace(['_', '-'], ' ', $pageTitle));
    $pageTitle;
?>

<aside id="sidebar" class="sidebar">

<aside id="sidebar" class="sidebar">
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

        <li class="nav-item">
            <a class="nav-link <?= ($pageTitle == 'Pages Contact') ? '' : 'collapsed' ?>" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?= ($pageTitle == 'Pages Register') ? '' : 'collapsed' ?>" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->
    </ul>
</aside>

</aside>