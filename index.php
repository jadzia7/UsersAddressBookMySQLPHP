<?php
$connect = mysqli_connect("yourHost", "yourUser", "yourPassword", "yourBase");
require 'app' . DIRECTORY_SEPARATOR . 'header.php';
?>

<body id="first">
    <main>
        <br><br><br>
        <div class="container" style="width:900px;">  
            <h3 style="font-size:2vw">Users List From Mysql Database in PHP</h3>  
            <table class="table table-bordered">  
                <tr>  
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th colspan="2">Admin</th>
                </tr>  
                <?php
                $addressD = "Email : ";
                $query = "SELECT * FROM users ORDER BY id ASC";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>' .
                    "<td title='Id: '>" . $row['id'] . "</td>" .
                    "<td title='Name: '>" . $row['fname'] . "</td>" .
                    "<td title='LastName: '>" . $row['lname'] . "</td>" .
                    "<td >" . $addressD . " " . $row["email"] . "<br> Address : " . $row["address"] . "<br> Phone : " . $row["phone"] . "</td>" .
                    '<td><img src="data:image/jpeg;base64,' . base64_encode($row['name']) . '" height="200" width="200" class="img-thumnail"/></td>' .
                    '<td><a href="update.php?id=' . $row['id'] . '">Update</a></td>' .
                    '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                    '</tr>';
                }
                ?>  
            </table>  
            <br><br><br>
        </div>>
    </main>
</body>
</html>
