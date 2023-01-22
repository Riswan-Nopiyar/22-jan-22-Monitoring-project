<?php
require 'CRUD.php';

$id = $_GET['id'];
$leader = query("SELECT * FROM leader");
$monitoring = query("SELECT * FROM monitoring WHERE id = $id")[0];
$now_leader = $monitoring['leader_id'];
$now_leader_name = query("SELECT * FROM leader where id = $now_leader")[0];
if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
   <script>
   alert('Data berhasil diedit');
   document.location.href= 'index.php';
   </script>
   ";
    } else {
        echo "
    <script>
    alert('Data gagal diedit atau tidak terjadi perubahan');
    document.location.href= 'index.php';

    </script>
    
    ";
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Monitoring Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">

    <style>
    li{
        list-style-type: none;
    }
    </style>
</head>


<body>
    <div class="con w-50 d-flex flex-column justify-content-center">
        <h1 class="mt-5 mb-2 p-3 w-100 container-form shadow rounded">Edit Monitoring Projects</h1>
        <form action="" method="post" class="container-form shadow mt-0 rounded d-flex flex-column ">
            <ul>
                <input type="hidden" name="id" value="<?= $monitoring["id"]; ?>">
                <li>
                    <label for="project_name">Project Name</label>
                    <br>
                    <input class="field" type="text" name="project_name" id="project_name" required value="<?= $monitoring["project_name"]; ?>">
                </li>
                <li>
                    <label for="client_name">Client Name</label>
                    <br>
                    <input class="field" type="text" name="client_name" id="client_name" value="<?= $monitoring["client_name"]; ?>">
                </li>
                <li>
                    <label for="leader_id">Leader Name</label>
                    <select class="field" style="cursor: pointer;" id="leader_id" name="leader_id" required tabindex="1">
                        <option selected hidden value="<?= $now_leader[0] ?>"><?= $now_leader_name['leader_name'] ?></option>

                        <?php foreach ($leader as $lead) : ?>
                            <option style="cursor: pointer;" value="<?= $lead['id'] ?>"><?= $lead['leader_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <li>
                    <label for="start_date">Start Date</label>
                    <br>
                    <input class="field" type="date" name="start_date" id="start_date" required value="<?= $monitoring['start_date'] ?>">
                </li>
                <li>
                    <label for="end_date">End Date</label>
                    <br>
                    <input class="field" type="date" name="end_date" id="end_date" required value="<?= $monitoring['end_date'] ?>">
                </li>
                <li>
                    <label for="progress">Progress</label>
                    <br>
                    <div class="d-flex justify-content-center">
                        <input class="field" type="number" name="progress" id="progress" value="<?= $monitoring['progress'] * 100 ?>">
                        <div class="ms-2 tag-persen">%</div>
                    </div>
                </li>
                <li><button class="w-100 mt-3 p-1 submit rounded" type="submit" name="submit">Save Edit</button></li>
            </ul>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>