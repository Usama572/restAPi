<?php

header('Content-Tpye:application/json');
header('Acess-Control-Allow-Origin:*');


$data=json_decode(file_get_contents("php://input"),true);

$search_value=$data['search'];

include "config.php";
$sql="select * from student where First_Name like '%{$search_value}%'";
$result=mysqli_query($conn,$sql) or die("query fail");
if(mysqli_num_rows($result)>0){

    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=> 'no record found.','status'=>'false'));

}


?>
