<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    .wrapper {
        display: flex;
        min-height: 100vh;
    }

    #sidebar {
        height: 100vh;
        width: 220px;
        min-width: 220px;
        max-width: 300px;
        display: flex;
        flex-direction: column;
        background-color: #2c4b5f;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #logo-btn {
        background-color: #2c4b5f;
        cursor: default;
        border: 0px;
    }

    #logo-btn i {
        padding: 0.75rem 0rem 0.75rem 0.75rem;
        font-size: 2.5rem;
        font-weight: 600;
        background-image: linear-gradient(90deg, #2c4b5f, #446c7c, #fff);
        background-clip: text;
        color: transparent;
    }

    .sidebar-logo {
        padding: 0.5rem 0.2rem;
        margin-top: 0.6rem;
        margin-bottom: 0.6rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: #e4e4e4;
    }

    .sidebar-nav {
        padding: 0rem 0rem;
        flex: 1 1 auto;
        border-top: 0.1px solid #517981;
        flex-wrap: wrap;
    }

    .sidebar-link {
        padding: 1rem;
        padding-left: 1.3rem;
        color: #89A0A8;
        display: flex;
        font-weight: 500;
        white-space: nowrap;
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar-link i {
        margin-right: 0.75rem;
    }

    .sidebar-link:hover {
        background-color: #446c7c;
        color: #fff;
    }

    .logout-btn {
        padding: 0.3rem;
        color: #89A0A8;
        display: flex;
        font-weight: 500;
        white-space: nowrap;
        cursor: pointer;
    }

    .logout-btn i {
        margin-right: 0.3rem;
    }

    .logout-btn:hover {
        color: #446c7c;
    }

    .user-profile {
        display: flex;
        padding: 0.75rem;
        padding-left: 0.5rem;
        align-items: center;
        color: #e4e4e4;
        font-weight: 500;
        border-top: 0.1px solid #517981;
    }

    .user-profile:hover {
        background-color: #446c7c;
    }
</style>

<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button id="logo-btn" type="button">
                <i class="material-symbols-outlined">check</i>
            </button>
            <div class="sidebar-logo">
                <span class="system">E.A.S</span>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="<?= base_url('dashboard') ?>" class="sidebar-link">
                    <i class="material-symbols-outlined">space_dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?= base_url('employees') ?>" class="sidebar-link">
                    <i class="material-symbols-outlined">people</i>
                    <span>Employees</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?= base_url('department') ?>" class="sidebar-link">
                    <i class="material-symbols-outlined">business</i>
                    <span>Department</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?= base_url('shift') ?>" class="sidebar-link">
                    <i class="material-symbols-outlined">schedule</i>
                    <span>Shift</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?= base_url('location') ?>" class="sidebar-link">
                    <i class="material-symbols-outlined">location_on</i>
                    <span>Location</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?= base_url('attendance') ?>" class="sidebar-link">
                    <i class="material-symbols-outlined">event_note</i> <!-- Assuming "event_note" represents attendance -->
                    <span>Attendance Report</span>
                </a>
            </li>

        </ul>
        <div class="user-profile">
            <li class="btn-group dropend">
                <a class="nav-link dropdown-toggle" style="color: #e4e4e4; font-weight: 500;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <img class="img-profile rounded-circle" src="<?= base_url('public/img/admin.png') ?>" style="width:32px; height:32px; margin-right: 8px;">
                    <span>Admin</span>
                    <?= session()->get('myFirstName') ?>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="logout-btn" onclick="myFunction()">
                            <i class="material-symbols-outlined" style="align-items: center; padding-left: 0.5rem;">logout</i>
                            <span>Logout</span>
                            <script>
                                function myFunction() {
                                    var txt;
                                    var r = confirm("Are you sure you want to logout?");
                                    if (r == true) {
                                        txt = "You pressed OK!";
                                    } else {
                                        txt = "You pressed Cancel!";
                                    }
                                    document.getElementById("demo").innerHTML = txt;
                                }
                            </script>
                        </div>
                    </li>
                </ul>
            </li>
        </div>
        </li>
    </aside>
</div>