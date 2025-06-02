<?php
session_start();
include("db.php");

if(isset($_GET['trainer_id'])) {
    $trainer_id = $_GET['trainer_id'];

    // Fetch trainer details from the database based on trainer_id
    $query = "SELECT * FROM trainer WHERE trainer_id = '$trainer_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Handle form submission for updating trainer details
    if(isset($_POST['update_trainer'])) {
        // Retrieve form data
        $trainer_name = $_POST['trainer_name'];
        $trainer_description = $_POST['trainer_description'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $trainer_quote = $_POST['trainer_quote'];
        $specialist = $_POST['specialist'];
        $experience = $_POST['experience'];
        $pack1 = $_POST['pack1'];
        $pack2 = $_POST['pack2'];
        $pack3 = $_POST['pack3'];

        // Check if a new image is uploaded, if not, use the existing image
        $trainer_img = $_POST['trainer_img'] ? $_POST['trainer_img'] : $row['trainer_img'];
        $certificate_img = $_POST['certificate']? $_POST['certificate']['name'] : $row['CERTIFICATE'];
        $course_img = $_POST['course_img']['name'] ? $_POST['course_img']['name'] : $row['course_img'];

        // Update trainer details in the database
        $update_query = "UPDATE trainer SET trainer_name = '$trainer_name', trainer_description = '$trainer_description', contact = '$contact', email = '$email', trainer_quote = '$trainer_quote', specialist = '$specialist', experience = '$experience', pack1 = '$pack1', pack2 = '$pack2', pack3 = '$pack3', trainer_img = '$trainer_img', CERTIFICATE = '$certificate_img', course_img = '$course_img' WHERE trainer_id = '$trainer_id'";
        $update_result = mysqli_query($conn, $update_query);

        if($update_result) {
            // Trainer updated successfully
            echo "<script>alert('trainer Details Has Been Edited Successfully');</script>"; 
            header("Location: managetrainer.php");
            echo "<script>alert('trainer Details Has Been Edited Successfully');</script>"; // Redirect to trainer list page
            exit();
        } else {
            // Error updating trainer
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    // Redirect if trainer_id is not provided
    header("Location: managetrainer.php");
    exit();
}

include "sidenav.php";
include "topheader.php";
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Trainer</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="trainer_name">Trainer Name</label>
                                <input type="text" name="trainer_name" id="trainer_name" class="form-control" value="<?php echo $row['trainer_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="trainer_description">Trainer Description</label>
                                <textarea name="trainer_description" id="trainer_description" class="form-control"><?php echo $row['trainer_description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $row['contact']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="trainer_quote">Trainer Quote</label>
                                <input type="text" name="trainer_quote" id="trainer_quote" class="form-control" value="<?php echo $row['trainer_quote']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="specialist">Specialist</label>
                                <input type="text" name="specialist" id="specialist" class="form-control" value="<?php echo $row['specialist']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience (in years)</label>
                                <input type="number" name="experience" id="experience" class="form-control" value="<?php echo $row['experience']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pack1">60-MINUTE SESSION (Pack 1)</label>
                                <input type="text" name="pack1" id="pack1" class="form-control" value="<?php echo $row['pack1']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pack2">45-MINUTE SESSION (Pack 2)</label>
                                <input type="text" name="pack2" id="pack2" class="form-control" value="<?php echo $row['pack2']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pack3">30-MINUTE SESSION (Pack 3)</label>
                                <input type="text" name="pack3" id="pack3" class="form-control" value="<?php echo $row['pack3']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="trainer_img">Trainer Image</label>
                                <input type="file" name="trainer_img" id="trainer_img" class="form-control">
                                <p>Current Image: <img src="course/<?php echo $row['trainer_img']; ?>" alt="<?php echo $row['trainer_img']; ?>" width="100"></p>
                            </div>
                            <div class="form-group">
                                <label for="certificate">Certificate Image</label>
                                <input type="file" name="certificate" id="certificate" class="form-control">
                                <p>Current Certificate: <img src="course/<?php echo $row['CERTIFICATE']; ?>" alt="<?php echo $row['CERTIFICATE']; ?>" width="100"></p>
                            </div>
                            <div class="form-group">
                                <label for="course_img">Course Image</label>
                                <input type="file" name="course_img" id="course_img" class="form-control">
                                <p>Current Course Image: <img src="course/<?php echo $row['course_img']; ?>" alt="<?php echo $row['course_img']; ?>" width="100"></p>
                            </div>
                            <button type="submit" name="update_trainer" class="btn btn-primary">Update Trainer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
