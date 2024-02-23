<?= $this->extend('layout/main.php') ?>

<?= $this->section('content') ?>

<title>Login</title>

<div class="container position-relative">

    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-xl-6 col-lg-7 col-md-9" style="width: 550px;">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4" style="font-weight: 600; color: #446c7c;">Employee Attendance System</h1>
                                    <hr>
                                </div>
                                <form action="<?= base_url() ?>login" method="post">
                                    <div class="form-group mt-4">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                                    </div>
                                    <div class="form-group mt-4 mb-4">
                                        <div class="input-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                                            <button type="button" class="btn btn-light" id="togglePassword" style="height: 100%;">
                                                <i class="fa fa-eye-slash" aria-hidden="true" style="height: 100%;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->get('invalid')) : ?>
        <div class="alert alert-danger custom-alert position-absolute top-0 end-0 mt-3 me-3 animate__animated animate__fadeIn" role="alert">
            <?php echo session()->get('invalid') ?>
        </div>
    <?php endif; ?>
    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger custom-alert position-absolute top-0 end-0 mt-3 me-3 animate__animated animate__fadeIn" role="alert">
            <?= $validation->listErrors(); ?>
        </div>
    <?php endif; ?>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style>
    body {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 1), rgba(50, 50, 50, 0.8));
    }

    .custom-alert {
        font-size: 14px;
    }
</style>
<script>
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>

<?= $this->endSection('content') ?>