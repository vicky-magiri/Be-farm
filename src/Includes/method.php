<?php
   
function pwdmatch($pass,$repeatpwd){

    if($pass !== $repeatpwd){
         return true;
    }
    else{
        return false;
    }
}
function signup($conn,$fname,$email,$pass,$phone_number,$FarmerCategory,$County){
    $query="insert into farmer (Farmer_Name,Email,Password,Phone_Number,Farmer_Category,County) values (?,?,?,?,?,?) ;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query)){
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }
    //  hashing farmer password
    // $pwdhash = password_hash($pass,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssssss",$fname,$email,$pass,$phone_number,$FarmerCategory,$County);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location: ../pages/userlogin.html");
    exit();
}
function expertreg($conn,$fname,$email,$pass,$phone_number,$County){
    $query="insert into expert (F_Name,Email,Password,Phone_Number,Location) values (?,?,?,?,?) ;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query)){
        header("location: ../pages/expert-signup.php?error=stmtfailed");
        exit();
    }
    //  hashing farmer password
    // $pwdhash = password_hash($pass,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"sssss",$fname,$email,$pass,$phone_number,$County);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location: ../pages/expert-signin.php");
    exit();

}
function signin($conn,$username,$pass){
    $query="Select * from farmer where Email='$username' and Password='$pass';";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active= $row['active'];

    $count= mysqli_num_rows($result);
     if($count==1){
         session_start();
         $_SESSION["farmer"]=$username;
          header("location: ../pages/home.php"); 
    }
     else {
         header("location: ../pages/signin.php?error=wronglogin");
         exit();
     }
     
}
function expertsignin($conn,$username,$pass){
    $query="Select * from expert where Email='$username' and Password='$pass';";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active= $row['active'];

    $count= mysqli_num_rows($result);
     if($count==1){
         session_start();
         $_SESSION["expert"]=$username;
          header("location: ../pages/expert-home.php"); 
    }
     else {
         header("location: ../pages/expert-signin.php?error=wronglogin");
         exit();
     }
}
