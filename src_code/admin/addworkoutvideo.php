<?php
session_start();
include "db.php";

if(isset($_POST['btn_save_workout'])) {
    $workout_video_name = $_FILES['workout_video']['name'];
    $workout_gif_name = $_FILES['workout_gif']['name'];
    $workout_name = $_POST['workout_name'];
    $workout_desc = $_POST['workout_desc'];

    // Set upload directory for video and gif
    $video_upload_dir = "../videos/work/";
    $gif_upload_dir = "../videos/";

    // Move uploaded files to the appropriate directory
    move_uploaded_file($_FILES['workout_video']['tmp_name'], $video_upload_dir . $workout_video_name);
    move_uploaded_file($_FILES['workout_gif']['tmp_name'], $gif_upload_dir . $workout_gif_name);

    $stmt = $conn->prepare("INSERT INTO workout (workout_video, gif, workout_name, workout_desc) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $workout_video_name, $workout_gif_name, $workout_name, $workout_desc);
    
    // Execute the statement
    $stmt->execute();
    
    if ($stmt->errno) {
        echo "Error: " . $stmt->error;
    } else {
        echo "<script>alert('Workout added successfully');</script>";
    }
    
    header("location: index.php");
}

include "sidenav.php";
include "topheader.php";
?>

<div class="content">
    <div class="container-fluid">
        <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Add Workout</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Workout Video</label>
                                        <input type="file" name="workout_video" class="btn btn-fill btn-success" id="workout_video">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>GIF</label>
                                        <input type="file" name="workout_gif" class="btn btn-fill btn-success" id="workout_gif">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Workout Name</label>
                                        <input type="text" id="workout_name" required name="workout_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Workout Description</label>
                                        <textarea rows="4" cols="80" id="workout_desc" required name="workout_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btn_save_workout" name="btn_save_workout" required class="btn btn-fill btn-primary">Save Workout</button> 
                        </div>
                    </div>
                
                </div>
                
              
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>
