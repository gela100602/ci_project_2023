<?= $this->extend('Layout/main') ?>

<?= $this->section('content') ?>

<head>
    <title>Employee Management System</title>
    <style>
        body {
            background-color: var(--background);
            font-family: 'Segoe UI', sans-serif;
        }

        .content-area {
            padding-left: 1.7rem;
            padding-right: 1.7rem;
        }

        .container {
            display: flex;
            padding: 0;
        }

        .dashboard {
            display: flex;
        }

        .dashboard h2 {
            font-weight: 600;
            color: #446c7c;
            font-size: 1.7rem;
            padding-bottom: 1.2rem;
            padding-top: 1.2rem;
            border-bottom: 1px solid #ddd;
        }

        .cards {
            display: flex;
            color: #fff;
            flex-wrap: wrap;
        }


        .card-header {
            display: flex;
            min-width: 15rem;
            border-radius: 5px;
            padding: 0.75rem;
            padding-left: 1rem;
            color: #fff;
            font-size: 0.8rem;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .card-header i {
            margin-right: 0.75rem;
        }

        .card-body {
            background-color: white;
            border-radius: 0 0 5px 5px;
            color: #446c7c;
        }

        #employees .card-header {
            background-color: teal;
        }

        #departments .card-header {
            background-color: #07489c;
        }

        #shifts .card-header {
            background-color: #0096c7;
        }

        #users .card-header {
            background-color: #66539f;
        }

        #employees,
        #departments,
        #shifts {
            margin-right: 1.7rem;
        }

        #employees,
        #departments,
        #shifts,
        #users {
            min-width: 17rem;
            background-color: var(--primary);
        }

        #employees,
        #departments,
        #shifts #users .card-body h5 {
            text-align: left;
        }

        #tables-container {
            display: flex;
            gap: 1.7rem;
        }

        #tables {
            margin-top: 0.9rem;
            color: #446c7c;
            background-color: var(--primary);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
        }

        #tables .card-header {
            display: flex;
            background-color: white;
            color: #446c7c;
            padding-left: 1.2rem;
            font-size: 1.1rem;
            letter-spacing: normal;
        }

        #tables .card-body {
            background-color: white;
            border-radius: 0 0 5px 5px;
            color: #446c7c;
        }

        #tables table {
            width: 100%;
            border-collapse: collapse;
            padding: 8px;
            background-color: white;
        }

        #tables th,
        #tables td {
            border-top: 1px solid #ddd;
            text-align: left;
        }

        #tables th {
            background-color: #446c7c;
            color: white;
            border-top: 1px solid #ddd;
        }

        .card {
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-header i {
            font-size: 1.2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }
    </style>

</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <?= $this->include('Includes/sidebar') ?>
        </aside>
        <div class="content-area w-100">
            <h2>Dashboard</h2>
            <hr style="color: white;">
            <div class="container">
                <div>
                    <div id="cards" class="cards">
                        <div id="employees" class="card mb-3" style="max-width: 18rem;">
                            <a href="<?= base_url('employees') ?>">
                                <div class="card-header">
                                    <i class="material-symbols-outlined">
                                        people
                                    </i>
                                    <span>EMPLOYEES</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">15 Employees</h5>
                                </div>
                            </a>
                        </div>
                        <div id="departments" class="card mb-3" style="max-width: 18rem;">
                            <a href="<?= base_url('departments') ?>">
                                <div class="card-header">
                                    <i class="material-symbols-outlined">
                                        business
                                    </i>
                                    <span>DEPARTMENTS</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">8 Departments</h5>
                                </div>
                            </a>
                        </div>
                        <div id="shifts" class="card mb-3" style="max-width: 18rem;">
                            <a href="<?= base_url('shifts') ?>">
                                <div class="card-header">
                                    <i class="material-symbols-outlined">
                                        schedule
                                    </i>
                                    <span>WORKING SHIFTS</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">6 Shifts</h5>
                                </div>
                            </a>
                        </div>
                        <div id="users" class="card mb-3" style="max-width: 15rem;">
                            <div class="card-header">
                                <i class="material-symbols-outlined">
                                    people
                                </i>
                                <span>ACTIVE USERS</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">9 Active Users</h5>
                            </div>
                        </div>
                    </div>
                    <div id="tables-container">
                        <div id="tables" class="card mb-3" style="min-width: 35.7rem;">
                            <div class="card-header">
                                <span>Departments' Employees</span>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dept Code</th>
                                            <th>Employees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ABC</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>XYZ</td>
                                            <td>2</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tables" class="card mb-3" style="min-width: 35.7rem;">
                            <div class="card-header">
                                <span>Employees per Shift</span>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection('content') ?>