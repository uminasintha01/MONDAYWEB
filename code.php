<?php
session_start();
include('dbconfig.php');


if(isset($_POST['user_claim_btn']))
{
    $uid = $_POST['claim_user_id'];
    $roles = $_POST['role_as'];

    if( $roles == 'admin')
    {
        $auth->setCustomUserClaims($uid, ['admin' => true]);
        $msg = "User role as admin";
    }
    elseif($roles == 'super_admin')
    {
        $auth->setCustomUserClaims($uid, ['super_admin' => true]);
        $msg = "User role as super admin";
    }
    elseif($roles == 'norole')
    {
        $auth->setCustomUserClaims($uid, null);
        $msg = "User role is Removed";
    }

    if($msg)
    {
        $_SESSION['status']= "$msg"; 
        header("Location: user_edit.php?id=$uid");
        exit(); 
    }
    else
    {
        $_SESSION['status']= "User No  Update"; 
        header("Location:user_edit.php?id=$uid");
        exit();
    }
        



}






if(isset($_POST['enable_disable_user_acount']))
{
    $disable_enable = $_POST['select_enable_disable'];
    $uid = $_POST['ena_dis_user_id'];

    if($disable_enable == "disable")
    {

        $updatedUser = $auth->disableUser($uid);
        $msg = "Account Disabled";
    }
    else
    {
        $updatedUser = $auth->enableUser($uid);
        $msg = "Account Enabled";
    }
    if($updatedUser)
    {
        $_SESSION['status']=  $msg; 
        header("Location: beranda.php");
        exit(); 
    }
    else
    {
        $_SESSION['status']= "Something went wrong"; 
        header("Location: beranda.php");
        exit();
    }
}












if(isset($_POST['update_user_btn']))
{
    $userName = $_POST['userName'];

    $uid = $_POST['user_id'];
    $properties = [
    'displayName' => $userName,
    ];
    $updatedUser = $auth->updateUser($uid, $properties);

    if($updatedUser)
    {
        $_SESSION['status']= "User Updated Successfully"; 
        header("Location: beranda.php");
        exit(); 
    }
    else
    {
        $_SESSION['status']= "User No  Update"; 
        header("Location: beranda.php");
        exit();
    }
        


}










if(isset($_POST['user_delete_btn']))
{
    $uid = $_POST['user_delete_btn'];

    try{
        $auth->deleteUser($uid);
        $_SESSION['status']= "User Account Deleted Successfully";
        header("Location: beranda.php");
        exit();
        

    }catch(Exception $e){
        $_SESSION['status']= "No  ID Found"; 
        header("Location: beranda.php");
        exit();

    }
   
}














if(isset($_POST['daftar_btn']))
{
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'password' => $password,
        'displayName' => $userName,
       
    ];
    
    $createdUser = $auth->createUser($userProperties);
    
    if($createdUser)
    {
        $_SESSION['status'] = "User Created Successfully";
        header('Location: daftar.php');
        exit();

    }
    else
    {
        $_SESSION['status'] = "User not Created Successfully";
        header('Location: daftar.php');
        exit();
    }
}

if(isset($_POST['delete-btn']))
{
    $del_id = $_POST['delete-btn'];

    $ref_table = 'Users/'.$del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if($deletequery_result)
    {
        $_SESSION['status'] = "Data deleted Successfully";
        header("Location: beranda.php");
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        header("Location: beranda.php");
    }
}

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $postData = [
        'userName' =>$userName,
        'email' => $email,
        'password' => $password,
    ];

    $ref_table = "Users";
    $postRef_result = $database->getReference($ref_table)->push($postData);


    if($postRef_result)
    {
        $_SESSION['status'] = "Data inserted Successfully";
        header("Location: beranda.php");
    }
    else
    {
        $_SESSION['status'] = "Data not inserted, something wrong.!";
        header("Location: beranda.php");
    }

}

?>