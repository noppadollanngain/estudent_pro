<?php
    require_once 'config_database.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body,true);
    $query_1 = "SELECT COUNT(`stdId`) FROM `students` WHERE `stdId` = '".$data['username']."'";
    $result_1 = mysqli_fetch_array(mysqli_query($con,$query_1));
    if( $result_1[0] == 0){
        exit(json_encode(['state'=>0, 'msg'=> 'miss']));
    }else{
        $query_2 = "SELECT COUNT(`stdId`) FROM `students` WHERE `stdId` = '".$data['username']."' AND `peopleId` = '".$data['password']."'";
        $result_2 =  mysqli_fetch_array(mysqli_query($con,$query_2));
        if( $result_2[0]==0){
            exit(json_encode(['state'=>0, 'msg'=>'erro']));
        }else{
            exit(json_encode(['state'=>1, 'data'=>['uid'=>1,'username'=>'name']]));
        }
    }