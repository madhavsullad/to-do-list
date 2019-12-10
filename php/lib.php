<?php
    // To open a connection with the db
    function openCon() {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "todolist";
        
        $conn = mysqli_connect($server, $user, $pass, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    // To close an opened connection to the db
    function closeCon($conn) {
        mysqli_close($conn);
    }


    // Retreive all the data from the db : Called by SYNC
    function selectAll() {
        $conn = openCon();
        $sql = "SELECT * FROM tasklist ORDER BY timestamp ASC;";
        $result = mysqli_query($conn, $sql);

        if(!$result) {
            $status = array('selectStat' => "An error occured while retreiving all data");
        } else {
            $data =array();
            $status = array('selectstat' => "Select Success");
            array_push($data, $status);
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($data, array('timestamp' => $row['timestamp'],
                                        'tasks' => $row['tasks'],
                                        'checked' => $row['checked'] ) );
            }
        }
        closeCon($conn);
        return $data;
    }

    // Inserts new task into the db : Called by insert
    function insertIntoDb($task, $checked = 'n') {
        $conn = openCon();
        $sql = mysqli_prepare($conn, "INSERT INTO tasklist (tasks, checked)
                VALUES (?, ?);");
        mysqli_stmt_bind_param($sql, "ss", $task, $checked);

        if(mysqli_stmt_execute($sql)) 
            return "Task inserted successfully.";
        else
            return "ERROR: Could not insert into Table.";
        closeCon($conn);
    }

?>