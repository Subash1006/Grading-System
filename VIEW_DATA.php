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
?>
<body>

	<center>
		<?php include('head1.html');?><br><br>
		<?php include('tech.php');?>

	
		</br>
		<table class="portrait-table" width="100%" cellspacing="0" style="border:3px solid #f35306;border-style: inset;">
			<tr>
				<th>
					<table width="100%" cellspacing="0">
						<tr>
							<th colspan="50" style="border-bottom: 5px solid;background-color: #f7b553;padding: 15px 5px;font-size: 45px;">STUDENT RECORDS</th>
						</tr>
						<tr>
							<th width="5%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 10px 5px;">picture</th>
							<th width="6%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">name</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 6px 0px;">gender</th>
							<th width="5%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 10px 0px;">religion</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 10px 0px;">caste</th>
							<th width="5%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">batch</th>
							<th width="5%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">semester1</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">semester2</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">semester3</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">semester4</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">semester5</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">semester6</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">credit1</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">credit2</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">credit3</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">credit4</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">credit5</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">credit6</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">credits</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">semtotal</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">entrance</th>
							<th width="4%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">total</th>
                            <th width="5%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 11px 0px;">remarks</th>
							<th colspan="5" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 10px 0px;"></th>
						</tr>
						<?php
						$query = "SELECT * FROM records where teacher_number = '".$_SESSION["id"]."' order by lastname ASC";
						$result = mysql_query($query);
						while($row = mysql_fetch_array($result)){
							$id = $row['id']; 
							$firstname = $row['firstname']; 
							$lastname = $row['lastname']; 
							$gender = $row['gender']; 
							$religion = $row['religion']; 
							$caste = $row['caste']; 
							$batch = $row['batch'];
							$semester1 = $row['semester1'];
							$semester2 = $row['semester2'];
							$semester3 = $row['semester3'];
							$semester4 = $row['semester4'];
							$semester5 = $row['semester5'];
							$semester6 = $row['semester6'];
							$credit1 = $row['credit1'];
							$credit2 = $row['credit2'];
							$credit3 = $row['credit3'];
							$credit4 = $row['credit4'];
							$credit5 = $row['credit5'];
							$credit6 = $row['credit6'];
							$entrance = $row['entrance'];
							$credits = ($credit1 + $credit2 + $credit3 + $credit4 + $credit5 + $credit6);
							$semtotal = ((($semester1 * $credit1 + $semester2 * $credit2 + $semester3 * $credit3 + $semester4 * $credit4 + $semester5 * $credit5 + $semester6 * $credit6)));
							
							$tot = @round((($semtotal / $credits) * 5));
							$total = ($tot + $entrance);
							if($total >=50){
								$remarks = "PASSED";
							}else{
								$remarks = "FAILED";
							}
							//$avg = $total / 6;
							//if($avg>=50){
								//$remarks = "PASSED";	
							//} else {
								//$remarks = "FAILED";
							//}
							$picture = $row['picture']; 
						?>
						<tr>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><img src="images/<?php echo "$picture";?>"  style="width: 40px; height: 40px;background-color: #f9f5f5;border: 2px solid black;"></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$lastname $firstname";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$gender";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$religion";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$caste";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$batch";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$semester1";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$semester2";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$semester3";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$semester4";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$semester5";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$semester6";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$credit1";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$credit2";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$credit3";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$credit4";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$credit5";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$credit6";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$credits";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$semtotal";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$entrance";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$total";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$remarks";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;" width="5%">
							<a href="edit_p_stud.php?id=<?php echo $row['id'];?>" style="text-decoration: none;padding: 0px 15px;color: black;background-color: #abb5fb;border: 1px solid black;border-style: outset;border-radius: 5px;">EDIT</a>
							</th>
							<th style="background-color: #efb295;border-bottom: 1px solid;" width="5%">
							<a href="delete_stud.php?id=<?php echo $row['id'];?>" style="text-decoration: none;padding: 0px 15px;color: black;background-color: #abb5fb;border: 1px solid black;border-style: outset;border-radius: 5px;">DELETE</a>
							</th>

							


						</tr>
						<?php }?>
					</table>
				</th>
			</tr>
		</table></br>
		<th style="background-color: #efb295;border-bottom: 1px solid;" width="7%">
		<a href="print.php?id=<?php echo $row['id'];?>" style="text-decoration: none;padding: 0px 15px;color: black;background-color: #abb5fb;border: 2px solid black;border-style: outset;border-radius: 6px;">PRINT</a>
		</th>
	</center>
	
</body>
</html>