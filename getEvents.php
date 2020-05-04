<?php
    include "db.php";

    $return_arr = array();

    $query = "SELECT * FROM events";
    $select_all_events_query = mysqli_query($connection, $query);
    while($row= mysqli_fetch_assoc($select_all_events_query)){
        $event_status = $row['event_status'];
        $event_id = $row['event_id'];
        $event_name = $row['event_name'];
        $event_image = $row['event_image'];
        $event_description = $row['event_description'];

        $return_arr[] = array("event_id" => $event_id,
                    "event_status" => $event_status,
                    "event_name" => $event_name,
                    "event_image" => $event_image,
                    "event_description" => $event_description,
                    "event_status" => $event_status);
    }
    echo json_encode($return_arr);
?>
