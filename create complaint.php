<?php
include_once '.inc_config.php';


        $answerID = $_POST['answerID'];   
        $complaintType = $_POST['complintType'];
        $description = $_POST['description'];
    

        $sql= "INSERT INTO complaints(answerID, complaintType, dscription) 
        VALUES ('$answerID', '$complaintType', '$description')";
        $result=mysqli_query($conn, $sql);
        header("location: viewaccount_.php");  

?>






