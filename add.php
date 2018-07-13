<?php
require 'app' . DIRECTORY_SEPARATOR . 'connection.php';
require 'app' . DIRECTORY_SEPARATOR . 'header.php';
?>

<body id="edit">


    <?php
    $connect = dbConnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["insert"])) {
            $nameU = mysqli_real_escape_string($connect, $_POST["nameU"]);
            $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
            $email = mysqli_real_escape_string($connect, $_POST["email"]);
            $address = mysqli_real_escape_string($connect, $_POST["address"]);
            $phone = mysqli_real_escape_string($connect, $_POST["phone"]);
            if (isset($_FILES["image"]["tmp_name"]) && ($_FILES["image"]["tmp_name"] != "")) {
                $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $sql = <<<TAG
    INSERT INTO users (fname, lname, email, address,phone,name) VALUES ('$nameU', '$lname', '$email', '$address','$phone','$file')
TAG;

                if (dbConnection()->query($sql) === TRUE) {

                    echo "You just add successfully new user!";

                } else {
                    echo "Something went wrong!!!";
                }
            } else {
                $sql = <<<TAG
    INSERT INTO users (fname, lname, email, address,phone) VALUES ('$nameU', '$lname', '$email', '$address','$phone')
TAG;

                if (dbConnection()->query($sql) === TRUE) {

                    echo "You just add successfully new user!";
                } else {
                    echo "Something went wrong!!!";
                }
            }
        }
    }
    ?>


    <div class="row">
        <div class="container" style="width:900px;">  
            <h3 style="font-size:2vw">Add User</h3>  
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype='multipart/form-data'>
                <div class="input-fields">
                    <label for="nameU">Firstname :</label><br>
                    <input class="col-6" type="text" name="nameU" required="required" placeholder="Please enter a firstname"/>
                <span class="validity"></span>
                </div>
                <div class="input-fields">
                    <label for="lname">Lastname :</label><br>
                    <input class="col-6" type="text" name="lname" required="required" placeholder="Please enter a lastname"/>
               <span class="validity"></span>
                </div>
                <div class="input-fields">
                    <label for="Email">Email :</label><br>
                    <input class="col-6" type="email" name="email" required="required" placeholder="Please enter an email"/>
                    <span class="validity"></span>
                </div>
                <div class="input-fields">
                    <label for="address">Address :</label><br>
                    <input class="col-6" type="text" name="address" placeholder="Please enter an address"/>
                <span class="validity"></span>
                </div>
                <div class="input-fields">
                    <label for="phone">Number phone :</label><br>
                    <input class="col-6" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="Please enter an number phone, e.g: 123-456-7890"/>
                 <span class="validity"></span>
                </div>
                <div class="input-fields">
                    <label for="image"> Image:</label><br>
                    <input class="col-6" type="file" name="image" id="image"  />
                </div>
                <div class="input-fields">
                    <input class="col-3" type="submit" name="insert" id="insert" value="Insert">
                    <input class="col-3" type="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
