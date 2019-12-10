<?php
    include_once 'lib.php';


    if ( isset($_POST['task']) && $_POST['task'])  {

        $insertStat = insertIntoDb($_POST['task']);

        $data = [
            'success' => 'success',
            'task' => $_POST['task'],
            'insertStat' => $insertStat
        ];
        
        echo json_encode($data);
    } else {
        $data = [
            'success' => 'failure',
            'insertStat' => 'task is empty'
        ];
        echo  json_encode($data);
    }
?>