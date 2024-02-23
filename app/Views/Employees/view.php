<?= $this->extend('Layout/main') ?>

<?= $this->section('content') ?>

<head>
    <title>Employee Management System</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
            color: #446c7c;
            overflow-y: hidden;
        }

        .content-area {
            padding-left: 1.7rem;
            padding-right: 1.7rem;
            overflow-y: auto;
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

        .form-group row {
            padding-bottom: 0.5rem;
        }
    </style>

</head>

<body>

    <div class="employees">
        <aside class="sidebar">
            <?= $this->include('Includes/sidebar') ?>
        </aside>
        <div class="content-area" style="width: 100%; max-height: 700px;">
            <h2>Employees</h2>
            <hr style="color: white;">
            <div class="container-fluid" style="margin-left: -0.7rem;">
                <form action="<?= base_url() ?>employees/view" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="<?= base_url('employees'); ?>" class="btn btn-secondary btn-icon-split mb-4">
                                <span class="icon text-white">
                                    <i class="material-symbols-outlined" style="margin-right: 0.5rem; vertical-align: middle;">arrow_back</i>Back
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 p-0">
                        <div class="card">
                            <h5 class="card-header" style="margin: 1rem; background-color: white; padding-bottom: 1.3rem;">Employee Data</h5>
                            <div class="card-body" style="margin-left: 1rem; margin-top: -0.3rem; margin-bottom: 0.7rem;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="full_name" class="col-form-label col-lg-4">Employee Name</label>
                                            <div class="col p-0">
                                                <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $employees->full_name ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="email" class="col-form-label col-lg-4">Email</label>
                                            <div class="col p-0">
                                                <input type="text" class="form-control" id="email" name="email" value="<?= $employees->email ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="contact_number" class="col-form-label col-lg-4">Contact Number</label>
                                            <div class="col p-0">
                                                <input type="int" class="form-control" id="contact_number" name="contact_number" value="<?= $employees->contact_number ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="age" class="col-form-label col-lg-4">Age</label>
                                            <div class="col p-0">
                                                <input type="int" class="form-control" id="age" name="age" value="<?= $employees->age ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="gender" class="col-form-label col-lg-4">Gender</label>
                                            <div class="col p-0">
                                                <select class="form-select" name="gender" id="gender" disabled>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="birth_date" class="col-form-label col-lg-4">Date of Birth</label>
                                            <div class="col-lg p-0">
                                                <input type="date" class="form-control col-lg" name="birth_date" id="birth_date" min="1990-01-01" value="<?= $employees->birth_date ?>" disabled>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6" style="padding-left: 1.75rem; padding-right: 2.5rem;">

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="department_id" class="col-form-label col-lg-4">Department</label>
                                            <div class="col p-0">
                                                <select class="form-select" name="department_id" id="department_id" disabled>
                                                    <?php
                                                    if (is_array($department) || is_object($department)) {
                                                        foreach ($department as $dp) :
                                                    ?>
                                                            <option value="<?= is_object($dp) ? $dp->id : $dp['id'] ?>">
                                                                <?= is_object($dp) ? $dp->name : $dp['name'] ?>
                                                            </option>
                                                    <?php
                                                        endforeach;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="shift_id" class="col-form-label col-lg-4">Shift</label>
                                            <div class="col p-0">
                                                <select class="form-select" name="shift_id" id="shift_id" disabled>
                                                    <?php
                                                    if (is_array($shift) || is_object($shift)) {
                                                        foreach ($shift as $sft) : ?>
                                                            <option value="<?= is_object($sft) ? $sft->id : $sft['id'] ?>">
                                                                <?= (is_object($sft) ? $sft->start : $sft['start']) . ' - ' . (is_object($sft) ? $sft->end : $sft['end']); ?>
                                                            </option>
                                                    <?php
                                                        endforeach;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="padding-bottom: 0.5rem;">
                                            <label for="hire_date" class="col-form-label col-lg-4">Hired Date</label>
                                            <div class="col-lg p-0">
                                                <input type="date" class="form-control col-lg" name="hire_date" id="hire_date" min="2004-04-16" max="<?= date('Y-m-d', time()); ?>" value="<?= $employees->hire_date ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection('content') ?>