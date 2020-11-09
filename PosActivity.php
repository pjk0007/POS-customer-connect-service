<?php
    $con= mysqli_connect("localhost", "postest", "EjrqhRdl*!97", "postest") or die("DB접속 실패");
    mysqli_query($con, 'SET NAMES utf8');
    
    $status1 = "";
    $status2 = "";
    $status3 = "";
    $status4 = "";
    
    $Store = $_POST["store_name"];
    $t = "SELECT * FROM TBL Where SName = '$Store' AND TName = '테이블1'";
    $ret = mysqli_query($con, $t);
    $row=mysqli_fetch_assoc($ret);
    if($row['Status'] == 0){
        $status1 = "예약가능";
    }
    elseif($row['Status'] == 1){
        $status1 = "예약석";
    }
    elseif($row['Status'] == 2){
        $statement = mysqli_prepare($con, "SELECT distinct * FROM Booked Where SName = ? AND TName = '테이블1'");
        mysqli_stmt_bind_param($statement, "s", $Store);
        mysqli_stmt_execute($statement);
        
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement, $Store, $Table, $Menu);
        
        while(mysqli_stmt_fetch($statement)){
            $status1 = $status1.$Menu."\n";
        }
        
    }
    
    $t = "SELECT * FROM TBL Where SName = '$Store' AND TName = '테이블2'";
    $ret = mysqli_query($con, $t);
    $row=mysqli_fetch_assoc($ret);
    if($row['Status'] == 0){
        $status2 = "예약가능";
    }
    elseif($row['Status'] == 1){
        $status2 = "예약석";
    }
    elseif($row['Status'] == 2){
        $statement = mysqli_prepare($con, "SELECT distinct * FROM Booked Where SName = ? AND TName = '테이블2'");
        mysqli_stmt_bind_param($statement, "s", $Store);
        mysqli_stmt_execute($statement);
        
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement, $Store, $Table, $Menu);
        
        while(mysqli_stmt_fetch($statement)){
            $status2 = $status2.$Menu."\n";
        }
    }
    
    $t = "SELECT * FROM TBL Where SName = '$Store' AND TName = '테이블3'";
    $ret = mysqli_query($con, $t);
    $row=mysqli_fetch_assoc($ret);
    if($row['Status'] == 0){
        $status3 = "예약가능";
    }
    elseif($row['Status'] == 1){
        $status3 = "예약석";
    }
    elseif($row['Status'] == 2){
        $statement = mysqli_prepare($con, "SELECT distinct * FROM Booked Where SName = ? AND TName = '테이블3'");
        mysqli_stmt_bind_param($statement, "s", $Store);
        mysqli_stmt_execute($statement);
        
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement, $Store, $Table, $Menu);
        
        while(mysqli_stmt_fetch($statement)){
            $status3 = $status3.$Menu."\n";
        }
    }
    
    $t = "SELECT * FROM TBL Where SName = '$Store' AND TName = '테이블4'";
    $ret = mysqli_query($con, $t);
    $row=mysqli_fetch_assoc($ret);
    if($row['Status'] == 0){
        $status4 = "예약가능";
    }
    elseif($row['Status'] == 1){
        $status4 = "예약석";
    }
    elseif($row['Status'] == 2){
        $statement = mysqli_prepare($con, "SELECT distinct * FROM Booked Where SName = ? AND TName = '테이블4'");
        mysqli_stmt_bind_param($statement, "s", $Store);
        mysqli_stmt_execute($statement);
        
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement, $Store, $Table, $Menu);
        
        while(mysqli_stmt_fetch($statement)){
            $status4 = $status4.$Menu."\n";
        }
    }
    
    $sql = "SELECT * FROM Menu WHERE SName = '$Store' AND count = (SELECT max(count) FROM Menu Where SName = '$Store')";
    $ret = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($ret);
    $best = $row['MName'];
    $cnt = $row['count'];
    
    $response = array();
    $response["status1"] = $status1;
    $response["status2"] = $status2;
    $response["status3"] = $status3;
    $response["status4"] = $status4;
    $response["best"] = $best." (총 ".$cnt."회)";
    
    echo json_encode($response);
?>