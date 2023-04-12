<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user_data['username']; ?>'s Attendance</title>
</head>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: sans-serif;
        background: linear-gradient(104deg, #444, #444);
        background-size: cover;
    }

    .table-container {
        display: flex;
        justify-content: center;
        margin: 15vh auto;
        width: 80%;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .8);
        border-radius: 10px;
        padding: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .8);
    }

    tr:nth-of-type(odd) {
        background-color: rgb(6, 187, 187);
        color: #fff;
    }

    tr:nth-of-type(even) {
        background-color: #fff;
        color: #333;
    }

    th {
        background-color: #f0f;
        color: #fff;
        font-weight: 800;
        font-size: 20px;
    }

    td,
    th {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .label {
        display: inline;
        padding: 0.2em 0.6em 0.3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25em;
    }

    .label-success {
        background-color: #95ed1a;
    }

    .label-warning {
        background-color: #f8a229;
    }

    .label-danger {
        background-color: #ff332c;
    }

    .btn {
        color: #fff;
        background-color: #1bad88;
        font-size: 13px;
        padding: 5px 8px;
        border: none;
        border-radius: 2px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn:hover {
        background-color: #2e9c81;
    }


    @media only screen and (max-width:768px),
    (min-device-width:768px) and (max-device-width:992px) {
        .table-container {
            width: 95%;
            background: transparent;
        }

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            text-align: right;
        }

        td::before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-size: 16px;
            font-weight: 600;
            text-align: left;
        }

        td:nth-of-type(1)::before {
            content: "#";
        }

        td:nth-of-type(2)::before {
            content: "Full Name";
        }

        td:nth-of-type(3)::before {
            content: "Age";
        }

        td:nth-of-type(4)::before {
            content: "Status";
        }

        td:nth-of-type(5)::before {
            content: "Job Title";
        }

        td:nth-of-type(6)::before {
            content: "Action";
        }



    }
    .log:hover{
            color: #fc053b;
        }
        .log{
		color:white;
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
        background: #333;
        margin:80px;
	}
</style>

<body>
    <?php
        //$query = mysqli_query("select Course_code, Course_name, Total_classes, Classes_present from attendance where USN = '$user_data['USN']'");
        $query = mysqli_query($con,"select Course_code, Course_name, Total_classes, Classes_present from attendance where USN = '$user_data[USN]'");
        if(mysqli_num_rows($query)>0){
    ?>
    <div class="table-container">
    <table>
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Classes Conducted</th>
            <th>Classes Attended</th>
        </tr>
    <?php 
        while($row=mysqli_fetch_array($query)){
            echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
            </tr>";
        }
    }
        else{
            echo "<p>Something went wrong please try again</p>";
        }
    ?>
    </table>
    </div>
    <a href="index.php" type="button" class="log">Go back</a>
</body>
</html>