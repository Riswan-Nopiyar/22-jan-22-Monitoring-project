<?php
require 'CRUD.php';
$monitoring = query("SELECT * FROM monitoring");
$leader = query("SELECT * FROM leader");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
   <script>
   alert('Data telah berhasil ditambahkan');
   document.location.href= 'index.php';
   </script>
   ";
    } else {
        echo "
    <script>
    alert('Maaf data telah gagal ditambahkan');
    </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambahkan data monitoring projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">

</head>
<style>
    h1 {
        color: #4723D9;
    }
    li {
        list-style-type: none;
    }
</style>

<body>
    <div class="con w-50 d-flex flex-column justify-content-center">
        <form action="" method="post" class="container-form shadow mt-0 rounded d-flex flex-column ">
            <ul>
            <h1 class="mt-5 mb-2 p-3 w-100 container-form shadow rounded">Tambahkan data monitoring projects<i class="fa fa-address-card" style="font-size:32px;color:#4723D9;margin-left:7px"></i></h1>
                <li>
                    <label for="project_name">Project Name</label>
                    <br>
                    <input class="field" type="text" name="project_name" id="project_name" required placeholder="Misal pengelolaan data">
                </li>
                <li>
                    <label for="client_name">Client Name</label>
                    <br>
                    <input class="field" type="text" name="client_name" id="client_name" required placeholder="Misal nopiyar">
                </li>
                <li>
                    <label for="leader_id">Leader Name</label>
                    <select class="field" style="cursor: pointer;" id="leader_id" name="leader_id" required tabindex="1" required>
                        <option selected disabled>Pilih</option>
                        <?php foreach ($leader as $lead) : ?>

                            <option value="<?= $lead['id'] ?>"><?= $lead['leader_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <li>
                    <label for="start_date">Start Date</label>
                    <br>
                    <input class="field" type="date" name="start_date" id="start_date" required>
                </li>
                <li>
                    <label for="end_date">End Date</label>
                    <br>
                    <input class="field" type="date" name="end_date" id="end_date" required>
                </li>
                <li>
                    <label for="progress">Progress</label>
                    <br>
                    <div class="d-flex justify-content-center">
                        <input class="field" type="number" name="progress" id="progress" placeholder="1-100 persen">
                        <div class="ms-2 tag-persen">%</div>
                    </div>
                </li>
                <li><button class="w-100 mt-3 p-1 submit rounded" type="submit" name="submit">Tambahkan</button></li>
                <li>
                <a href=" index.php">
                    <i class="material-icons" style="font-size:40px;color:red;rotate:180deg;font-weight:bold;margin-top:20px">exit_to_app</i>
                </a>
                </li>
            </ul>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>