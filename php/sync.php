<?php
    include_once 'lib.php';
    $con = openCon();
    $data = selectAll();
    echo json_encode($data);
    closeCon($con);
?>