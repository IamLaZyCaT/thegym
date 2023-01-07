<?php
session_start();
include '../conn.php';

if(isset($_POST['submit']) && isset($_FILES['image'])){
    
    echo "<pre>";
    print_r($_FILES['image']);
    echo "</pre>";

    $img_name =$_FILES['image']['name'];
    $img_type =$_FILES['image']['type'];
    $error =$_FILES['image']['error'];
    $img_size =$_FILES['image']['size'];
    $tmp_name =$_FILES['image']['tmp_name'];

    // if(file_exists($_FILES["image"]["name"])){

        if($error===0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg","jpeg","png");
            if(in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path ='upload/' .$new_img_name;
                move_uploaded_file($tmp_name, 'upload/'.$img_name);

                $sql="INSERT INTO gallary(image) VALUES('$img_name')";
                $result=$mysqli->query($sql);
                header('location:../../gallery.php');
            }
            else{
                $em ="extension error occure";
                header("location:../../index.php?error=$em");
            }
        }
        else{
            $em ="unknown error occure";
            header("location:../../index.php?error=$em");

        }
    // }
    // else{
    //     $em ="image already exit";
    //     header("location:../../index.php?error=$em");
    // }
}
else{
    header('location:../../index.php');
}



// session_start();

// include '../conn.php';

// if(isset($_POST['submit'])&& isset($_FILES['image'])){
    
//     $img_name =$_FILES['image']['name'];
//     $img_type =$_FILES['image']['type'];
//     $error =$_FILES['image']['error'];
//     $img_size =$_FILES['image']['size'];

//     if(file_exists($_FILES["image"]["name"])){
//         $filename=$_FILES["image"]["name"];
//         $_SESSION['status'] ="Image already exist".$filename;
//         header('location:../../gallery.php');
//     }
//     else{
//         $query ="INSERT INTO gallary(image) VALUES('$img_name')";
//         $query_run =mysqli_query($mysqli,$query);

//     if($query_run){
//         move_uploaded_file($_FILES["image"]["name"],"upload/".$_FILES["image"]["name"]);
//         $_SESSION['status']="Image succesfully stored";
//         header('location:../../gallery.php');
//     }

//     else{
//         $_SESSION['status']="Image not stored";
//         header('location:../../gallery.php');
//     }
//     }
    
// }


?>