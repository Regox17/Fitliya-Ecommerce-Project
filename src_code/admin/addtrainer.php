<?php
session_start();
include "db.php";

if(isset($_POST['btn_save_trainer']))
{
    $trainer_name = $_POST['trainer_name'];
    $trainer_description = $_POST['trainer_description'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $trainer_quote = $_POST['trainer_quote'];
    $specialist = $_POST['specialist'];
    $experience = $_POST['experience'];
    $pack1 = $_POST['pack1']; // Added pack1 attribute
    $pack2 = $_POST['pack2']; // Added pack2 attribute
    $pack3 = $_POST['pack3']; // Added pack3 attribute
    $trainer_img_name = $_FILES['trainer_img']['name'];
    $trainer_img_type = $_FILES['trainer_img']['type'];
    $trainer_img_tmp_name = $_FILES['trainer_img']['tmp_name'];
    $trainer_img_size = $_FILES['trainer_img']['size'];
    $certificate_img_name = $_FILES['certificate']['name'];
    $certificate_img_type = $_FILES['certificate']['type'];
    $certificate_img_tmp_name = $_FILES['certificate']['tmp_name'];
    $certificate_img_size = $_FILES['certificate']['size'];

    $course_img_name = $_FILES['course_img']['name'];
    $course_img_type = $_FILES['course_img']['type'];
    $course_img_tmp_name = $_FILES['course_img']['tmp_name'];
    $course_img_size = $_FILES['course_img']['size'];

    if (
        ($trainer_img_type == "image/jpeg" || $trainer_img_type == "image/jpg" || $trainer_img_type == "image/png" || $trainer_img_type == "image/gif") &&
        ($certificate_img_type == "image/jpeg" || $certificate_img_type == "image/jpg" || $certificate_img_type == "image/png" || $certificate_img_type == "image/gif") &&
        ($course_img_type == "image/jpeg" || $course_img_type == "image/jpg" || $course_img_type == "image/png" || $course_img_type == "image/gif")
    ) {
        if ($trainer_img_size <= 500000000 && $certificate_img_size <= 500000000 && $course_img_size <= 500000000) {
            $trainer_img_name_new = time() . "_" . $trainer_img_name;
            $certificate_img_name_new = time() . "_" . $certificate_img_name;
            $course_img_name_new = time() . "_" . $course_img_name;
            move_uploaded_file($trainer_img_tmp_name, "../course/" . $trainer_img_name_new);
            move_uploaded_file($certificate_img_tmp_name, "../course/" . $certificate_img_name_new);
            move_uploaded_file($course_img_tmp_name, "../course/" . $course_img_name_new);

            $query = "INSERT INTO trainer (trainer_name, trainer_description, contact, email, trainer_quote, specialist, experience, pack1, pack2, pack3, trainer_img, CERTIFICATE, course_img) 
                      VALUES ('$trainer_name', '$trainer_description', '$contact', '$email', '$trainer_quote', '$specialist', '$experience', '$pack1', '$pack2', '$pack3', '$trainer_img_name_new', '$certificate_img_name_new','$course_img_name_new')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Trainer Details Added Successfully');</script>";
                header("location: index.php");
            } else {
                die("Query failed: " . mysqli_error($conn));
            }
        } else {
            echo "<script>alert('File size should be less than 500MB');</script>";
        }
    } else {
        echo "<script>alert('Invalid file type');</script>";
    }

    mysqli_close($conn);
}


include "sidenav.php";
include "topheader.php";
?>

<div class="content">
    <div class="container-fluid">
        <form action="" method="post" type="form" name="form" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Add Trainer</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Trainer Name</label>
                                        <input type="text" id="trainer_name" required name="trainer_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Trainer Description</label>
                                        <textarea rows="4" cols="80" id="trainer_description" required name="trainer_description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contact</label>
                                        <input type="text" id="contact" name="contact" minlength="10" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email" name="email" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Trainer Quote</label>
                                        <input type="text" id="trainer_quote" name="trainer_quote" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Specialist</label>
                                        <input type="text" id="specialist" name="specialist" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Experience (in years)</label>
                                        <input type="number" id="experience" name="experience" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>60-MINUTE SESSION (Pack 1)</label>
                                        <input type="text" id="pack1" name="pack1" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>45-MINUTE SESSION (Pack 2)</label>
                                        <input type="text" id="pack2" name="pack2" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>30-MINUTE SESSION (Pack 3)</label>
                                        <input type="text" id="pack3" name="pack3" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label>Trainer Image</label>
                                        <input type="file" name="trainer_img" required class="btn btn-fill btn-success" id="trainer_img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label>Certificate Image</label>
                                        <input type="file" name="certificate" required class="btn btn-fill btn-success" id="certificate_img">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="f">
                                        <label>Course Image</label>
                                        <input type="file" name="course_img" required class="btn btn-fill btn-success" id="course_img">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" id="btn_save_trainer" name="btn_save_trainer" required class="btn btn-fill btn-primary">Add Trainer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function validateForm() {
    var contact = document.getElementById('contact').value;
    var email = document.getElementById('email').value;
    var contactPattern = /^\d{10}$/;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!contactPattern.test(contact)) {
        alert("Please enter a valid 10-digit contact number.");
        return false;
    }

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true;
}
</script>

<?php
include "footer.php";
?>
