<?= $this->extend('Layout/main') ?>

<?= $this->section('content') ?>

<title>Employee Management System</title>

<head>
    <style>
        body {
            background-color: var(--background);
            font-family: 'Segoe UI', sans-serif;
            overflow-y: hidden;
        }

        .content-area {
            padding-left: 1.7rem;
            padding-right: 1.7rem;
            overflow-y: auto;
        }

        .container {
            padding: 0;
        }

        .employees {
            display: flex;
        }

        .employees h2 {
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
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: var(--primary);
            color: #fff;
            border-radius: 5px 5px 0 0;
            padding: 1rem;
            font-size: 1.1rem;
            letter-spacing: normal;
        }

        .card-body {
            background-color: white;
            border-radius: 0 0 5px 5px;
            color: #446c7c;
        }

        #tables-container {
            gap: 1.7rem;
            width: max-content;
            max-height: 500px;
        }

        #tables {
            color: #446c7c;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
            padding: 1rem;
            max-height: 500px;
        }

        #tables .card-header {
            background-color: white;
            color: #446c7c;
            padding-top: 0.3rem;
            padding-left: 1rem;
            font-size: 1.1rem;
            letter-spacing: normal;
        }

        #tables .card-body {
            background-color: white;
            color: #446c7c;
            padding-top: 2rem;
        }

        #tables table {
            width: 100%;
            padding: auto;
            overflow: hidden;
        }

        #tables th,
        #tables td {
            color: #446c7c;
            background-color: var(--primary);
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        #tables tbody tr:hover {
            background-color: #f5f5f5;
        }

        #tables th {
            color: #446c7c;
        }

        #tables td .btn {
            background-color: #446c7c;
            color: #fff;
            border-color: #446c7c;
        }

        .btn-outline-secondary:hover {
            background-color: #446c7c;
            color: #fff;
            border-color: #446c7c;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }
    </style>

</head>

<body>
    <div class="employees">
        <aside class="sidebar">
            <?= $this->include('Includes/sidebar') ?>
        </aside>
        <div class="content-area w-100">
            <h2>Working Shifts</h2>
            <hr style="color: white;">
            <div class="container">
                <div>
                    <div id="tables-container" style="width: 60%;">
                        <?php if (session()->get('success-update-user')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo session()->get('success-update-user') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->get('success-delete-user')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo session()->get('success-delete-user') ?>
                            </div>
                        <?php endif; ?>
                        <div id="tables" class="card mb-3" style="min-width: 100%;">
                            <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                                <span>Shift List</span>
                                <div class="input-group" style="width: 280px;">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search shift">
                                    <button class="btn btn-outline-primary" onclick="performSearch()">Search</button>
                                </div>
                            </div>

                            <div class="card-body" style="overflow-y: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Shift Start</th>
                                            <th scope="col">Shift End</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table table-bordered">
                                        <?php foreach ($shift as $sft) : ?>
                                            <tr>
                                                <td><?= $sft->id ?></td>
                                                <td><?= $sft->start ?></td>
                                                <td><?= $sft->end ?></td>
                                                <td>
                                                    <div class="btn-custom" role="group" aria-label="Basic example" style="width: 5rem; display: flex;">
                                                        <a href="<?= base_url() ?>shift/view/<?= $sft->id ?>" class="btn" style="margin-right: 3px;">View</a>
                                                        <a href="<?= base_url() ?>shift/edit/<?= $sft->id ?>" class="btn" style="margin-right: 3px;">Edit</a>
                                                        <form action="<?= base_url() ?>shift/<?= $sft->id ?>" method="post" onsubmit="return confirm('Are you sure you want to delete shift?')">
                                                            <button type="submit" class="btn">Delete</button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-btn" style="bottom: 20px; left: 2rem;">
                        <a href="<?= base_url() ?>shift/add/" class="btn btn-success" style="margin-bottom: 0; display: flex; align-items: center; margin-right: 66rem; width: 8rem;">
                            <i class="material-symbols-outlined" style="margin-right: 0.5rem;">add</i> Add Shift
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function performSearch() {
        var input, filter, table, tr, tdId, tdName, i, txtValueId, txtValueName;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tables");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            tdId = tr[i].getElementsByTagName("td")[0]; // Index for ID column
            tdName = tr[i].getElementsByTagName("td")[1]; // Index for Name column

            if (tdId && tdName) {
                txtValueId = tdId.textContent || tdId.innerText;
                txtValueName = tdName.textContent || tdName.innerText;

                if (txtValueId.toUpperCase().indexOf(filter) > -1 || txtValueName.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<?= $this->endSection('content') ?>

