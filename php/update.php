<?php
    include_once 'lib.php';

    if ( isset($_POST['id']) && $_POST['id'] ) {
        $con = openCon();
        $timestamp = $_POST['id'];
        $check = $_POST['check'];
        $sql = mysqli_prepare($con, "UPDATE tasklist SET checked=? WHERE timestamp=?");
        mysqli_stmt_bind_param($sql, "ss", $check, $timestamp);
        
        if( $stat = mysqli_stmt_execute($sql) ) {
            $data = [
                'success' => 'True',
                'stat' => $stat,
                'id' => $timestamp,
                'check' => $check
            ];
        } else {
            $data = [
                'success' => 'False',
                'stat' => $stat,
                'id' => $timestamp,
                'check' => $check
            ];
        }

        echo json_encode($data);
    }

?>