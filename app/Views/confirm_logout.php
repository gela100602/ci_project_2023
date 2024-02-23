<?= $this->extend('layout/main.php') ?>

<?= $this->section('content') ?>

<div class="container">
  <!DOCTYPE html>
  <html>

  <body>

    <button onclick="myFunction()">Logout</button>

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

  </body>

  </html>

</div>

<?= $this->endSection('content') ?>