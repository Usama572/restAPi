<?php

header('Content-Tpye:application/json');
header('Acess-Control-Allow-Origin:*');
header('Access-control-Allow-Methods:POST');
header('Access-control-Allow-Methods:POST:Access-control-Allow-Methods:POST,Content-Type,Access-control-Allow-Methods:POST,Authorization,X-requested-width');

$data=json_decode(file_get_contents("php://input"),true);
$sid= $data['id'];
$fname= $data['First_Name'];
$lname= $data['Last_Name'];
$phone= $data['phone'];

include "config.php";
$sql="update student set First_Name='{$fname}',Last_Name='{$lname}',phone='{$phone}' where id='{$sid}' ";
if(mysqli_query($conn,$sql)){

echo "Data updated";
}
else{
    echo json_encode(array('message'=> 'no record found.','status'=>'false'));

}


?>
