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

$id = $_GET['id'];
$selectquery = "SELECT * FROM records WHERE id = '".$id."'";
$result = mysql_query($selectquery);
while($row = mysql_fetch_array($result)){
    $getfirstname = $row['firstname']; 
    $getlastname = $row['lastname'];
    $getgender = $row['gender'];
    $getreligion = $row['religion'];
    $getcaste = $row['caste'];
    $getbatch = $row['batch'];
    $getsemester1 = $row['semester1'];
    $getsemester2 = $row['semester2'];
    $getsemester3 = $row['semester3'];
    $getsemester4 = $row['semester4'];
    $getsemester5 = $row['semester5'];
    $getsemester6 = $row['semester6'];
    $getcredit1 = $row['credit1'];
    $getcredit2 = $row['credit2'];
    $getcredit3 = $row['credit3'];
    $getcredit4 = $row['credit4'];
    $getcredit5 = $row['credit5'];
    $getcredit6 = $row['credit6'];
    $getentrance = $row['entrance'];
}

if(!isset($_FILES['image']['tmp_name']))
{
    echo "";
} else {

    $getfirstname = $_POST['firstname']; 
    $getlastname = $_POST['lastname'];
    $getgender = $_POST['gender'];
    $getreligion = $_POST['religion'];
    $getcaste = $_POST['caste'];
    $getbatch = $_POST['batch']; 
    $getsemester1 = $_POST['semester1'];
    $getsemester2 = $_POST['semester2'];
    $getsemester3 = $_POST['semester3'];
    $getsemester4 = $_POST['semester4'];
    $getsemester5 = $_POST['semester5'];
    $getsemester6 = $_POST['semester6'];
    $getcredit1 = $_POST['credit1'];
    $getcredit2 = $_POST['credit2'];
    $getcredit3 = $_POST['credit3'];
    $getcredit4 = $_POST['credit4'];
    $getcredit5 = $_POST['credit5'];
    $getcredit6 = $_POST['credit6'];
    $getentrance = $_POST['entrance'];
    $dir = "images/";
    $target_file = $dir.basename($_FILES["image"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $file=$_FILES['image']['tmp_name'];
    $picture=$_FILES['image']['name'];
    if($picture == "")
    {
        echo "<script>alert('Please choose a picture!')</script>";
    } else {
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<script>alert('PNG, JPG, and JPEG are allowed!')</script>";
        } else {
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name= addslashes($_FILES['image']['name']);
            move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $_FILES["image"]["name"]);

            $query = "UPDATE records SET firstname='".$getfirstname."',lastname='".$getlastname."',picture='".$picture."', gender='".$getgender."', religion='".$getreligion."', caste='".$getcaste."', batch='".$getbatch."', semester1='".$getsemester1."',semester2='".$getsemester2."', semester3='".$getsemester3."', semester4='".$getsemester4."', semester5='".$getsemester5."', semester6='".$getsemester6."', credit1='".$getcredit1."', credit2='".$getcredit2."', credit3='".$getcredit3."', credit4='".$getcredit4."', credit5='".$getcredit5."', credit6='".$getcredit6."',entrance='".$getentrance."' where id='".$id."'";
            if(mysql_query($query))
            {   
                echo "<script>alert('Data Successfully Edited!')</script>";
                echo '<script>windows: location="VIEW_DATA.php"</script>';
            }else{
                echo "<script>alert('Data Not Edited!')</script>";
                echo '<script>windows: location="edit_p_stud.php?id='.$id.'"</script>';
            }
            

        }
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
                            <th style="border-bottom: 2px solid;padding: 5px 0px;">Update Student Information</th>
                        </tr>
                        <tr>
                            <th width="50%" style="border-bottom: 2px solid;">
                                <table width="100%">
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;" width="45%">Firstname: </th>
                                        <td><input type="text" name="firstname" value="<?php echo $getfirstname;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">Lastname: </th>
                                        <td><input type="text" name="lastname" value="<?php echo $getlastname;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">Picture: </th>
                                        <td><input type="file" name="image" id="image" style="width: 85%;"></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">gender: </th>
                                        <td><input type="text" name="gender" value="<?php echo $getgender;?>" required></td>
                                    </tr>
                                     <tr>
                                        <th style="text-align: left;padding-left: 20px;">religion: </th>
                                        <td><input type="text" name="religion" value="<?php echo $getreligion;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">caste: </th>
                                        <td><input type="text" name="caste" value="<?php echo $getcaste;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">batch: </th>
                                        <td><input type="number" name="batch" value="<?php echo $getbatch;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">semester1: </th>
                                        <td><input type="number" name="semester1" value="<?php echo $getsemester1;?>" required></td>
                                        <th style="text-align: left;padding-left: 20px;">credit1: </th>
                                        <td><input type="number" name="credit1" value="<?php echo $getcredit1;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">semester2: </th>
                                        <td><input type="number" name="semester2" value="<?php echo $getsemester2;?>" required></td>
                                        <th style="text-align: left;padding-left: 20px;">credit2: </th>
                                        <td><input type="number" name="credit2" value="<?php echo $getcredit2;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">semester3: </th>
                                        <td><input type="number" name="semester3" value="<?php echo $getsemester3;?>" required></td>
                                        <th style="text-align: left;padding-left: 20px;">credit3: </th>
                                        <td><input type="number" name="credit3" value="<?php echo $getcredit3;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">semester4: </th>
                                        <td><input type="number" name="semester4" value="<?php echo $getsemester4;?>" required></td>
                                        <th style="text-align: left;padding-left: 20px;">credit4: </th>
                                        <td><input type="number" name="credit4" value="<?php echo $getcredit4;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">semester5: </th>
                                        <td><input type="number" name="semester5" value="<?php echo $getsemester5;?>" required></td>
                                        <th style="text-align: left;padding-left: 20px;">credit5: </th>
                                        <td><input type="number" name="credit5" value="<?php echo $getcredit5;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">semester6: </th>
                                        <td><input type="number" name="semester6" value="<?php echo $getsemester6;?>" required></td>
                                        <th style="text-align: left;padding-left: 20px;">credit6: </th>
                                        <td><input type="number" name="credit6" value="<?php echo $getcredit6;?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;padding-left: 20px;">entrance: </th>
                                        <td><input type="number" name="entrance" value="<?php echo $getentrance;?>" required></td>
                                    </tr>
                                    
                                </table>
                            </th>
                        <tr>
                            <th colspan="2" style="padding: 5px 0px;"><input type="submit" name="update" value="Update" style="width: 40%;padding: 5px 30px;font-size: 17px;font-weight: bold;border-radius: 3px;border: 2px solid crimson;"></th>
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