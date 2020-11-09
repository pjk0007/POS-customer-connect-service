<?php
    $con= mysqli_connect("localhost", "postest", "EjrqhRdl*!97", "postest") or die("DB접속 실패");
    mysqli_query($con, 'SET NAMES utf8');

    $Store = $_POST["store_name"]; // "동아치킨", "청도반점", "하루식당"
    $Table = $_POST["table_number"]; // "테이블1", "테이블2", "테이블3", "테이블4"
    $Menu = $_POST["menu"];
 
    $t = "SELECT * FROM TBL Where SName = '$Store' AND TName = '$Table'";
    $ret = mysqli_query($con, $t);
    $row=mysqli_fetch_assoc($ret);
    
    if($Menu == "clear"){
        $sql = "DELETE FROM Booked Where SName = '$Store' AND TName = '$Table'";
        mysqli_query($con, $sql);
        $sql = "UPDATE TBL SET Status = 0 Where SName = '$Store' AND TName = '$Table'";
        mysqli_query($con, $sql);
    }
    elseif($Menu == "book"){
        if($row['Status'] == 0){
            $sql = "UPDATE TBL SET Status = 1 Where SName = '$Store' AND TName = '$Table'";
            mysqli_query($con, $sql);
        }
        else{
        }
    }
    elseif($Menu != null){
        if($row['Status'] == 0 || $row['Status'] == 1){
            $sql = "UPDATE TBL SET Status = 2 Where SName = '$Store' AND TName = '$Table'";
            mysqli_query($con, $sql);
            $sql = "INSERT INTO Booked(SName, TName, MName) VALUES ('$Store','$Table','$Menu')";
            mysqli_query($con, $sql);
            
            $sql = "UPDATE Menu SET count=count +1 WHERE SName='$Store' AND MName='$Menu'";
            mysqli_query($con, $sql);
        }
        elseif($row['Status'] == 2){
            $sql = "INSERT INTO Booked(SName, TName, MName) VALUES ('$Store','$Table','$Menu')";
            mysqli_query($con, $sql);
            
            $sql = "UPDATE Menu SET count=count +1 WHERE SName='$Store' AND MName='$Menu'";
            mysqli_query($con, $sql);
        }
    }
    
    echo json_encode($response);
?>