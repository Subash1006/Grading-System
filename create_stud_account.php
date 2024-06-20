<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<?php
require_once('myconnection.php');
session_start();
if(!isset($_SESSION["id"]) || $_SESSION["id"] == '') 
{
    header('location: ind.php');
}

// Check if the form is submitted
if(isset($_POST['save'])) {
    // ... (your existing code)

    $teacher_number = $_SESSION["id"];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $caste = $_POST['caste'];
    $batch = $_POST['batch'];
    $dir = "images/";
    $semester1 = 0;
    $semester2 = 0;
    $semester3 = 0;
    $semester4 = 0;
    $semester5 = 0;
    $semester6 = 0;
    $credit1 = 0;
    $credit2 = 0;
    $credit3 = 0;
    $credit4 = 0;
    $credit5 = 0;
    $credit6 = 0;
    $credits = 0;
    $semtotal = 0;
    $entrance = 0;
    $total = 0;
    $remarks = 0;

    if (isset($_FILES['image'])) {
        if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "<script>alert('PNG, JPG, and JPEG are allowed!')</script>";
            } else {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $image_name = addslashes($_FILES['image']['name']);
                move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $_FILES["image"]["name"]);
            }
        } else {
            echo "<script>alert('Error uploading image.');</script>";
        }
    }

    $query = "INSERT INTO records(id,teacher_number,firstname,lastname,picture,gender,religion,caste,batch,semester1,semester2,semester3,semester4,semester5,semester6,credit1,credit2,credit3,credit4,credit5,credit6,credits,semtotal,entrance,total,remarks) VALUES (null,'" . $teacher_number . "','" . $firstname . "','" . $lastname . "','" . $picture . "','" . $gender . "','" . $religion . "','" . $caste . "','" . $batch . "','" . $semester1 . "','" . $semester2 . "','" . $semester3 . "','" . $semester4 . "','" . $semester5 . "','" . $semester6 . "','" . $credit1 . "','" . $credit2 . "','" . $credit3 . "','" . $credit4 . "','" . $credit5 . "','" . $credit6 . "','" . $credits . "','" . $semtotal . "','" . $entrance . "','" . $total . "','" . $remarks . "')";

    if (mysql_query($query)) {
        echo "<script>alert('Data Successfully Saved!')</script>";
        echo '<script>window : location="VIEW_DATA.php"</script>';
    } else {
        echo "<script>alert('Data Not Saved!')</script>";
    }
}
?>

<body>  
    <center>
        <?php include('head1.html');?>
        <?php include('tech.php');?>
        </br>
        <table width="30%">
            <tr>
                <td>
                    <form action="" method="post" enctype="multipart/form-data">
                    <center>
                    <table style="border: 4px solid #0909da;border-style: inset;border-radius: 10px;background-color: #c9e8ec;">
                        <tr>
                            <th style="border-bottom: 2px solid;padding: 5px 0px;">Create Student accounts</th>
                        </tr>
                        <tr>
                            <th width="50%" style="border-bottom: 2px solid;">
                                <table width="100%">
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;" width="45%">Firstname: </th>
                                        <td><input type="text" name="firstname" value="<?php echo '';?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">Lastname: </th>
                                        <td><input type="text" name="lastname" value="<?php echo '';?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">Picture: </th>
                                        <td><input type="file" name="image" id="image" value="<?php echo '';?>" style="width: 85%;"></td>
                                    </tr>
                                  <tr>
                                        <th style="text-align: left;padding-left: 20px;">gender: </th>
                                        <td><input type="text" name="gender" value="<?php echo '';?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">religion: </th>
                                        <td><input type="text" name="religion" value="<?php echo '';?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">caste: </th>
                                        <td><input type="text" name="caste" value="<?php echo '';?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">batch: </th>
                                        <td><input type="text" name="batch" value="<?php echo '';?>" required></td>
                                    </tr>
                                </table>
                            </th>
                        <tr>
                            <th colspan="2" style="padding: 5px 0px;"><input type="submit" name="save" value="Save" style="width: 40%;padding: 5px 30px;font-size: 17px;font-weight: bold;border-radius: 3px;border: 2px solid crimson;"></th>
                        </tr>
                    </table>
                    </center>
                    </form> 
                </td>
            </tr>
        </table>    
    </center>
</body>
</html>
