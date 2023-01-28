<?php
require 'CRUD.php';
$id = $_GET['id'];
if(hapus($id)>0){
    echo "<script>
    alert('Data telah berhasil dihapus');
    document.location.href= 'index.php';
    </script>";
 } else{
     echo "<script>
     alert('Maaf data gagal dihapus');
     </script>";
}?>