<!-- sidebar.php -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-user" style="color: white"></i>
        </div>
        <div class="sidebar-brand-text mx-3">User</div>
    </a>

    <hr class="sidebar-divider my-0">


    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a  href="ManageAccount.php?userID=<?php echo $userID; ?>"class="nav-link collapsed">
            <i class="fa-solid fa-address-card" style="color: white"></i>
            <span>Manage Account</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="DiscussionMain.php?userID=<?php echo $userID; ?>">
            <i class="fa-solid fa-book" style="color:white"></i>
            <span>Discussion</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="Complaint.php?userID=<?php echo $userID; ?>">
            <i class="fa-solid fa-list" style="color: white"></i>
            <span>Complaint List</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
