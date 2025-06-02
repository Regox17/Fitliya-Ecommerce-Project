<?php
session_start();
include("db.php");

if(isset($_GET['workout_id'])) {
    $workout_id = $_GET['workout_id'];

    // Fetch workout details from the database based on workout_id
    $query = "SELECT * FROM workout WHERE workout_id = '$workout_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Handle form submission for updating workout details
    if(isset($_POST['update_workout'])) {
        // Retrieve form data
        $workout_name = $_POST['workout_name'];
        $workout_desc = $_POST['workout_desc'];

        // Check if a new video is uploaded, if not, use the existing video
        $workout_video = $_FILES['workout_video']['name'] ? $_FILES['workout_video']['name'] : $row['workout_video'];

        // Check if a new gif is uploaded, if not, use the existing gif
        $workout_gif = $_FILES['workout_gif']['name'] ? $_FILES['workout_gif']['name'] : $row['gif'];

        // Set upload directory for video and gif
        $video_upload_dir = "videos/";
        $gif_upload_dir = "videos/";

        // Upload video
        if($_FILES['workout_video']['tmp_name']) {
            move_uploaded_file($_FILES['workout_video']['tmp_name'], $video_upload_dir . $workout_video);
        }

        // Upload gif
        if($_FILES['workout_gif']['tmp_name']) {
            move_uploaded_file($_FILES['workout_gif']['tmp_name'], $gif_upload_dir . $workout_gif);
        }

        // Update workout details in the database
        $update_query = "UPDATE workout SET workout_name = '$workout_name', workout_desc = '$workout_desc', workout_video = '$workout_video', gif = '$workout_gif' WHERE workout_id = '$workout_id'";
        $update_result = mysqli_query($conn, $update_query);

        if($update_result) {
            // Workout updated successfully
            echo "<script>alert('Workout Details Has Been Edited Successfully');</script>";
            header("Location: manageworkout.php"); 
            echo "<script>alert('Workout Details Has Been Edited Successfully');</script>";// Redirect to workout list page
            exit();
        } else {
            // Error updating workout
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    // Redirect if workout_id is not provided
    header("Location: manageworkout.php");
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
                        <h4 class="card-title">Edit Workout</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="workout_name">Workout Name</label>
                                <input type="text" name="workout_name" id="workout_name" class="form-control" value="<?php echo $row['workout_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="workout_desc">Workout Description</label>
                                <textarea name="workout_desc" id="workout_desc" class="form-control"><?php echo $row['workout_desc']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="workout_video">Workout Video</label>
                                <input type="file" name="workout_video" id="workout_video" class="form-control">
                                <p>Current Video: <?php echo $row['workout_video']; ?></p>
                            </div>
                            <div class="form-group">
                                <label for="workout_gif">Workout GIF</label>
                                <input type="file" name="workout_gif" id="workout_gif" class="form-control">
                                <p>Current GIF: <?php echo $row['gif']; ?></p>
                            </div>
                            <button type="submit" name="update_workout" class="btn btn-primary">Update Workout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
