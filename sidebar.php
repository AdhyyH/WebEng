<!-- sidebar.php -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                <path
                    d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
            </svg>&nbsp <br> FK-EduSearch <sup>User</sup></div>
    </a>

    <hr class="sidebar-divider my-0">


    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a href="ManageAccount.php?userID=<?php echo $userID; ?>" class="nav-link collapsed">
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
        <a class="nav-link collapsed" href="complaint-front.php">
            <i class="fa-solid fa-pen" style="color: white"></i>
            <span>Make Complaint</span>
        </a>

    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="complaintList-front.php">
            <i class="fa-solid fa-list" style="color: white"></i>
            <span>Complaint List</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="complaint-report-view.php">
            <i class="fa-solid fa-newspaper" style="color: white"></i>
            <span>Complaint Report</span>
        </a>



    </li>
    <!-- Divider -->

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>