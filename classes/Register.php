<?php
include_once 'lib/Database.php';
 class Register{

public $db;
public function __construct(){
    $this->db =new Database();

}
public function addRegister($data,$file){
$name = $data['name'];
$email =$data['email'];
$phone = $data['phone'];
$address = $data['address'];
$permited =array('jpg', 'jpeg', 'png','jif');
$file_name=$file['photo']['name'];
$file_siza=$file['photo']['size'];
$file_temp=$file['photo']['tmp_name'];
$div = explode('.',$file_name);
$file_ext = strtolower(end($div));
 $unique_image =substr(md5(time()),0,10).'.'.$file_ext;
 $upload_image ="upload/".$unique_image;
if(empty($name) || empty ($email) || empty($phone) || empty($address)|| empty($file_name)){
    $msg = "Filds Must Not Be empty";
    return $msg;
}elseif($file_siza >1048567){
    $msg = "File size must be less than 1mb";
    return $msg;
}elseif(in_array($file_ext,$permited)==false){
    $msg ="you can upload it".implode(',',$permited);
    return $msg;
}else{
    move_uploaded_file($file_temp, $upload_image);
    $query = "INSERT INTO `table_reg`(`name`, `email`, `phone`, `photo`, `address`) VALUES ('$name' , '$email', '$phone' , '$upload_image', '$address')";
$result = $this->db->insert($query);
if ($result){
    $msg = "success";
    return $msg;
}else{
    $msg = "failed";
    return $msg;
}
}
}

public function allStudent(){
    $query ="SELECT * FROM table_reg ORDER BY id DESC";
    $result=$this->db->select($query);
    return $result;
}
public function getStdById($id){
    $query ="SELECT * FROM table_reg WHERE id ='$id' ";
    $result=$this->db->select($query);
    return $result;
}
public function ubdateStudent ($data, $file,$id){
    $name = $data['name'];
$email =$data['email'];
$phone = $data['phone'];
$address = $data['address'];
$permited =array('jpg', 'jpeg', 'png','jif');
$file_name=$file['photo']['name'];
$file_siza=$file['photo']['size'];
$file_temp=$file['photo']['tmp_name'];
$div = explode('.',$file_name);
$file_ext = strtolower(end($div));
 $unique_image =substr(md5(time()),0,10).'.'.$file_ext;
 $upload_image ="upload/".$unique_image;
if(empty($name) || empty ($email) || empty($phone) || empty($address)|| empty($file_name)){
    $msg = "Filds Must Not Be empty";
    return $msg;
}elseif($file_siza >1048567){
    $msg = "File size must be less than 1mb";
    return $msg;
}elseif(in_array($file_ext,$permited)==false){
    $msg ="you can upload it".implode(',',$permited);
    return $msg;
}else{
    move_uploaded_file($file_temp, $upload_image);
    $query = "INSERT INTO `table_reg`(`name`, `email`, `phone`, `photo`, `address`) VALUES ('$name' , '$email', '$phone' , '$upload_image', '$address')";
$result = $this->db->insert($query);
if ($result){
    $msg = "success";
    return $msg;
}else{
    $msg = "failed";
    return $msg;
}
}
}
public function delStudent($id){
    $img_query = "SELECT * FROM table_reg WHERE id = '$id' ";
    $img_res = $this->db->select($img_query);
    if($img_res){
        while($row = mysqli_fetch_assoc($img_res)){
            $photo = $row['photo'];
            unlink($photo);
        }
    }
    $del_query = "DELETE FROM table_reg WHERE id = '$id' ";
    $del=$this->db->delete($del_query);
    if($del){
        
    }
}
 }
?>