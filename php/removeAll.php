<?php
    include_once 'lib.php';

    $con = openCon();
    $sql = "DELETE FROM tasklist;";
    if ($stat = mysqli_query($con, $sql)) {
        $data = [
            'success' => 'True',
            'status' => $stat
        ];
    } else {
        $data = [
            'success' => 'False',
            'status' => $stat
        ];
    }
    echo json_encode($data);

?>