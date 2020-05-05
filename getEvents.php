<?php
    include "db.php";

    $return_arr = array();
    $output = "";

    $query = "SELECT * FROM events";
    $select_all_events_query = mysqli_query($connection, $query);
    while($row= mysqli_fetch_assoc($select_all_events_query)){
        $event_status = $row['event_status'];
        $event_id = $row['event_id'];
        $event_name = $row['event_name'];
        $event_image = $row['event_image'];
        $event_description = $row['event_description'];
        $output .= "<div class='col-sm'>
        <!-- Card 1 --> 
          <div class='card' style='width: 18rem;'>
              <img src='".$event_image."'";
        $output .=" class='card-img-top' alt='...' id='event_image'>
              <div class='card-body'>
                  <h5 class='card-title' id='event_name'>".$event_name."</h5>
                  <p class='card-text' id='event_description'>".$event_description."</p>";
                  if($event_status !=0){
        $output .="          <a href='events.php?id=".$event_id."' class='btn btn-primary' name = 'event_id' id='event_button' aria-disabled='false'>Go somewhere</a>
              </div>
          </div>
      </div>";
    }else{
        $output .="          <a href='events.php?id=".$event_id."' class='btn btn-primary disabled' name = 'event_id' id='event_button' aria-disabled='true'>Go somewhere</a>
        </div>
    </div>
</div>";
    }

        // $return_arr[] = array("event_id" => $event_id,
        //             "event_status" => $event_status,
        //             "event_name" => $event_name,
        //             "event_image" => $event_image,
        //             "event_description" => $event_description,
        //             "event_status" => $event_status);
    }
    echo $output;
?>
