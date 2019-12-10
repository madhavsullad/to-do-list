<?php
    include_once 'lib.php';

    if ( isset($_POST['id']) && $_POST['id'] ) {
		$con = openCon();
		$timestamp =$_POST['id'];
        $sql = mysqli_prepare($con, "DELETE FROM tasklist WHERE timestamp = ? ;");
        mysqli_stmt_bind_param($sql, "s", $timestamp);

        if($stat = mysqli_stmt_execute($sql)){
            $data = [
				'success' => 'True',
				'status' => $stat
            ];
            echo json_encode($data);
        }
        else{
			$data = [
				'success' => 'False'
			];
            echo json_encode($data);
        }
    } else {
		$data = [
			'success' => 'POST isnt working'
		];
        echo json_encode($data);
    }
?>