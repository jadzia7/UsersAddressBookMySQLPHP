<?php
require 'app' . DIRECTORY_SEPARATOR . 'connection.php';
require 'app' . DIRECTORY_SEPARATOR . 'header.php';


$connect = dbConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $address_id = mysqli_real_escape_string($connect, $_POST['id']);
    $address_fname = mysqli_real_escape_string($connect, $_POST['fname']);
    $address_lname = mysqli_real_escape_string($connect, $_POST['lname']);
    $address_email = mysqli_real_escape_string($connect, $_POST['email']);
    $address_address = mysqli_real_escape_string($connect, $_POST['address']);
    $address_phone = mysqli_real_escape_string($connect, $_POST['phone']);
    if (isset($_FILES["image"]["tmp_name"]) && ($_FILES["image"]["tmp_name"] != "")) {
        $address_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $sql = "UPDATE users SET name = '$address_file', fname = '$address_fname', email = '$address_email', lname = '$address_lname', address = '$address_address', phone = '$address_phone'  WHERE id = '$address_id'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("Location: index.php");
        } else {
            echo mysqli_error($connect);
        }
    }
    else {
        $sql = "UPDATE users SET fname = '$address_fname', email = '$address_email', lname = '$address_lname',  address = '$address_address', phone = '$address_phone' WHERE id = '$address_id'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("Location: index.php");
        } else {
            echo mysqli_error($connect);
        }
    }
}
?>

<?php
$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$results = mysqli_query($connect, $sql);
?>
<body>
    <div class="row">
        <div class="container" style="width:900px;">  
             <h3 style="font-size:2vw">Edit User</h3>  
            <form action="" id="myform" method = "POST" enctype='multipart/form-data'>	
<?php foreach ($results as $key): ?>

                    <input type="hidden" name="id" value="<?php echo $key['id']; ?>" />

                    <div class="input-fields">
                        <label for="nameU">Firstname :</label><br>
                        <input type="text" name="fname" title= "Firstname: " required="required" class="col-6" value ="<?php echo $key['fname']; ?>" />
                    </div>

                    <div class="input-fields">
                        <label for="lname">Lastname :</label><br>
                        <input type="text" name="lname" title="Lastname: " required="required" class="col-6" value="<?php echo $key['lname']; ?>" />
                    </div>

                    <div class="input-fields">
                        <label for="Email">Email :</label><br>
                        <input type="email" name="email" title="Email: " required="required"class="col-6" value="<?php echo $key['email']; ?>" />
                    </div>

                    <div class="input-fields">
                         <label for="address">Aaddress :</label><br>
                        <input type="text" name="address" title="Address: " class="col-6" value="<?php echo $key['address']; ?>" />
                    </div>
                    <div class="input-fields">
                         <label for="phone">Number phone :</label><br>
                        <input type="tel" name="phone" title="Phone: " pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" class="col-6" value="<?php echo $key['phone']; ?>" />
                    </div>
                    <div class="input-fields">
                        <label for="image"> Image:</label><br>
                        <input type="file" name="image" id="image"  title="File: "class="col-6" value="<?php $old_image = $key['name']; ?>" />
    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($key['name']) . '" height="100" width="100" class="img-thumnail" />'; ?>
                    </div>
                    <div class="input-fields">
                        <input type="submit" value="Update" />
                    </div>
<?php endforeach ?>
            </form>
        </div>
    </div>
</body>
</html>