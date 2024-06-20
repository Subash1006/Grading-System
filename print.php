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
    //header('location: ind.php');
}
?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
    body {
        font-family: calibiri, sans-serif;
        margin: 0;
        padding: 0;
    }

     

    table {
        width: 90%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 6px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    button {
        margin-bottom: 30px;
    }

    @media print {
         body {
                font-size: 12pt;
            }

            .portrait-table {
                /* Styles for the portrait class go here */
                /* For example, you might want to set a specific width or height */
                width: 100px;
                height: 100px;
            }

            .portrait-table th, .portrait-table td {
                page-break-inside: avoid;
            }

            .portrait-table th {
                background-color: #f2f2f2;
            }

            button {
                display: none;
            }

            /* Specify portrait layout */
            @page {
                size: portrait;
                margin: 8mm;
            }
        }
    </style>

<body>
    
        <center>

            <?php include('head1.html');?><br><br>
    
            </br>
           <table class="portrait-table" width="100%" cellspacing="0" style="border:3px solid #f35306;border-style: inset;">
            <tr>
                <th>
                    <table width="100%" cellspacing="0">
                        <tr>
                            <th colspan="50" style="border-bottom: 5px solid;background-color: #f7b553;padding: 10px 5px;font-size: 40px;">STUDENT RECORDS</th>
                        </tr>
                        <tr>
                            <th>picture</th>
                            <th>name</th>
                            <th>gender</th>
                            <th>religion</th>
                            <th>caste</th>
                            <th>batch</th>
                            <th>semester1</th>
                            <th>semester2</th>
                            <th>semester3</th>
                            <th>semester4</th>
                            <th>semester5</th>
                            <th>semester6</th>
                            <th>credit1</th>
                            <th>credit2</th>
                            <th>credit3</th>
                            <th>credit4</th>
                            <th>credit5</th>
                            <th>credit6</th>
                            <th>credits</th>
                            <th>semtotal</th>
                            <th>entrance</th>
                            <th>total</th>
                            <th>remarks</th>
                            <th colspan="5" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 8px 0px;"></th>
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
                            <th><img src="images/<?php echo "$picture";?>"  style="width: 40px; height: 40px;background-color: #f9f5f5;border: 2px solid black;"></th>
                            <th><?php echo "$lastname $firstname";?></th>
                            <th><?php echo "$gender";?></th>
                            <th><?php echo "$religion";?></th>
                            <th><?php echo "$caste";?></th>
                            <th><?php echo "$batch";?></th>
                            <th><?php echo "$semester1";?></th>
                            <th><?php echo "$semester2";?></th>
                            <th><?php echo "$semester3";?></th>
                            <th><?php echo "$semester4";?></th>
                            <th><?php echo "$semester5";?></th>
                            <th><?php echo "$semester6";?></th>
                            <th><?php echo "$credit1";?></th>
                            <th><?php echo "$credit2";?></th>
                            <th><?php echo "$credit3";?></th>
                            <th><?php echo "$credit4";?></th>
                            <th><?php echo "$credit5";?></th>
                            <th><?php echo "$credit6";?></th>
                            <th><?php echo "$credits";?></th>
                            <th><?php echo "$semtotal";?></th>
                            <th><?php echo "$entrance";?></th>
                            <th><?php echo "$total";?></th>
                            <th><?php echo "$remarks";?></th>
                        </tr>
                        <?php }?>
                    </table>
                </th>
            </tr>
        </table>
        <button onclick="printData()">PRINT</button>
        <script>
            function printData() {
                // Use the print() function to print the page
                window.print();
            }
        </script>
    </center>
</body>
</html>