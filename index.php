<?php
require 'CRUD.php';

$leader = query("SELECT * FROM leader");
$monitoring = query("SELECT * FROM monitoring");
if (isset($_GET["cari"])) {
    $monitoring = cari($_GET["keyword"]);
}
$dataMonitoring = mapingdata($monitoring, $leader);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riswan Nopiyar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="gambar/user.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i></a>
                <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> 
                 </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i>
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i>
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bookmark nav_icon'></i>
                    </a> 
                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> 
                    </a>                    
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                    </a> 
                </div>
            </div> 
            <a href="#" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
            </a>
        </nav>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
    // Your code to run since DOM is loaded and ready
   });
        </script>
    <!--Container Main start-->
    <div class="cont container rounded shadow">
        <div class="d-flex align-items-center justify-content-between mt-5 mb-4">
            <h1 style="color:#4723D9;"> Project Monitoring</h1>
            <div class="d-flex">
                <form action="" method="GET" class="d-flex position-relative">
                    <input class="field" type="text" name="keyword" size="27rem" placeholder="Cari project atau client..">
                    <button class="position-absolute cari" name="cari"><i class="fa fa-search" style="font-size:15px;color:grey"></i></button>
                </form>
                <div class="mt-2 ms-2" id="tambah-bt">
                    <a href=" tambah.php" class="pt-2 pb-2 ps-3 pe-3 rounded add-new">
                        <span class="me-2 ms-0 p-0 bolder">
                            <i class="fa fa-address-card" style="font-size:16px;color:white"></i>
                        </span>Tambahkan Project baru</a>
                </div>
            </div>

        </div>


        <table class="table mb-4">
            <thead class="bg-light">
                <tr>
                    <th scope="col">PROJECT NAME</th>
                    <th scope="col">CLIENT</th>
                    <th scope="col">PROJECT LEADER</th>
                    <th scope="col">START DATE</th>
                    <th scope="col">END DATE</th>
                    <th scope="col">PROGRESS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataMonitoring as $data) : ?>
                    <?php
                    $progress = $data["progress"] * 100;
                    ?>
                    <tr>
                        <td>
                            <div class="h-100 d-flex align-items-center">
                                <?= $data["project_name"] ?>
                            </div>

                        </td>
                        <td>
                            <div class="h-100 d-flex align-items-center">
                                <?= $data["client_name"] ?>
                            </div>
                        </td>
                        <td>
                            <div class="h-100 leader d-flex align-items-center">
                                <div class="image-con">
                                    <img class="rounded-circle" src="gambar/<?= $data["profile_picture"] ?>" alt="profile-leader">
                                </div>
                                <div class="w-75">
                                    <div class="bolder">
                                        <?= $data["leader_name"] ?>
                                    </div>
                                    <div>
                                        <?= $data["leader_email"] ?>
                                    </div>

                                </div>
                            </div>

                        </td>
                        <td>
                            <div class="h-100 d-flex align-items-center">
                                <?= tgl($data["start_date"]) ?>
                            </div>
                        </td>
                        <td>
                            <div class="h-100 d-flex align-items-center">
                                <?= tgl($data["end_date"]) ?>
                            </div>
                        </td>
                        <td style="width: 15rem;">
                            <?php if ($progress == 100) : ?>
                                <div class="h-100 mt-3 pt-1 mb-3">
                                    <div style="float:right; margin-top: -0.2rem;" class="ms-2">
                                        <?= $progress ?>%
                                    </div>
                                    <div class="progress h-25">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:<?= $progress ?>%; background-color:#00ff00;">
                                        </div>
                                    </div>
                                </div>

                            <?php else : ?>
                                <div class="h-100 mt-3 pt-1 mb-3">
                                    <div style="float:right; margin-top: -0.2rem;" class="ms-2">
                                        <?= $progress ?>%
                                    </div>
                                    <div class="progress h-25">
                                        <div class="progress-bar" role="progressbar" aria-valuemin="" aria-valuemax="100" style="width:<?= $progress ?>%; ">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="h-100 d-flex align-items-center">
                                <a href="hapus.php?id=<?= $data["id"]; ?>" class="bg-danger m-1 pt-1 pb-2 ps-2 pe-2 rounded" onclick="return confirm('Yakin Menghapus Data <?= $data['project_name'] ?>');"><i class="fa fa-trash" style="font-size:23px;color:white"></i></a>
                                <a href="edit.php?id=<?= $data["id"]; ?>" class=" m-1 pt-1 pb-2 ps-2 pe-2 rounded" style="background-color:#00b527; height:37px"><i class="fa fa-edit" style="font-size:20px;color:white"></i></a>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>