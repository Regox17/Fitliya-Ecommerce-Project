
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #ffffff;
    }

    .container1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .card {
        position: relative;
        width: 300px;
        height: 200px;
        margin: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition:  0.3s ease;
      
        background-color: white;
        border: 2px solid black;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .card-name {
        font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
        font-size: 20px;;
        position: absolute;
        top: 50%;
        left: 50%;
        text-align:center;
        transform: translate(-50%, -50%);
        width: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        display: none;
        text-align: center;
    }

    .card:hover .card-name {
        display: block;
    }


    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .popup-content {
        background-color: #ffffff;
        padding: 50px;
        width: 90%;
        height: 90%;
        overflow: auto;
        border-radius: 10px;
        position: relative;
        font-family: "Gill Sans", sans-serif;
        
    }

    .popup h1 {
        font-weight: bold;
        font-size: 20px;
        
    }

    .close1 {
        position: fixed;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 20px;
        color: #00f1ff;
    }

    iframe {
        width: 100%;
        height: calc(100% - 30px);
        /* Adjust for close button */
    }
</style>
</head>

<body>


<?php
include 'header.php';
include 'db.php'; // Assuming your database connection is in db.php

$query = "SELECT * FROM workout";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query to retrieve workout data failed");
}
?>

<!-- Your HTML and CSS code -->

<div class="container1">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $workout_name = $row['workout_name'];
        $workout_video = $row['workout_video'];
        $gif = $row['gif'];
        $workout_desc = $row['workout_desc'];
    ?>
        <div class="card" onclick="showPopup('<?php echo 'videos/work/' .$workout_video; ?>', '<?php echo $workout_name; ?>', '<?php echo $workout_desc; ?>')">
            <img src="<?php echo 'videos/'.$gif; ?>" autoplay loop  muted></img>
            <div class="card-name" ><?php echo $workout_name; ?></div>
        </div>
    <?php
    }
    ?>

    
        
   
       
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close1" onclick="hidePopup()"><i class="fa fa-window-close"></i></span>
            <iframe id="video-frame" src="" frameborder="0" allowfullscreen></iframe>
            <h1 id="title"></h1>
            <p id="description"></p>
        </div>
    </div>

    </div>
    <script>
        function showPopup(videoSrc, title, description) {
            document.getElementById("video-frame").src = videoSrc;
            document.getElementById("description").innerText = description;
            document.getElementById("title").innerText = title;
            document.getElementById("popup").style.display = "flex";
        }

        function hidePopup() {
            document.getElementById("video-frame").src = "";
            document.getElementById("popup").style.display = "none";
        }
    </script>
</body>

<?php

include "footer.php";
?>