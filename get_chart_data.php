<?php
header('Content-Type: application/json');

require_once('assets/backend/connect.php');

// $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";

// $result = mysqli_query($conn,$sqlQuery);

// $data = array();
// foreach ($result as $row) {
// 	$data[] = $row;
// }

$data = array(
    array(
        "playerid" => 1,
        "score" => 10
    ),
    array(
        "playerid" => 2,
        "score" => 40
    ),
    array(
        "playerid" => 3,
        "score" => 20
    )
);

// $data = [  
//    {  
//       "playerid":"1",
//       "score":"10"
//    },
//    {  
//       "playerid":"2",
//       "score":"40"
//    },
//    {  
//       "playerid":"3",
//       "score":"20"
//    },
//    {  
//       "playerid":"4",
//       "score":"9"
//    },
//    {  
//       "playerid":"5",
//       "score":"20"
//    }
// ]

mysqli_close($con);

echo json_encode($data);
?>