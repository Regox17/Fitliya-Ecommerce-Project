<?php
session_start();
include("db.php");

// Handle trainer deletion
if(isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
    $trainer_id = $_GET['trainer_id'];
    mysqli_query($conn, "DELETE FROM trainer WHERE trainer_id='$trainer_id'") or die("Delete query is incorrect...");
    echo "<script>alert('Trainer Has Been Deleted Succesfullyy!!');</script>";
}

// Pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

if ($page == "" || $page == "1") {
    $page1 = 0;    
} else {
    $page1 = ($page * 10) - 10;    
}

include "sidenav.php";
include "topheader.php";
?>
<style>
    /* Button style */
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff; /* Button background color */
    color: #ffffff; /* Button text color */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-size: 16px;
    text-align:center;
    transition:  0.3s ease;
}

/* Hover effect */
.button:hover {
    background-color: #0056b3; /* Button background color on hover */
}

    /* Style for the smaller button */
.smaller-button {
    width: 100px; /* Adjust width as needed */
    height: 30px; /* Adjust height as needed */
    font-size: 10px;
    text-align:center; /* Adjust font size as needed */
    /* You can add more styles such as background color, border, etc. */
}

</style>
<div class="content">
    <div class="container-fluid">
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Trainers List</h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table tablesorter" id="page1">
                            <thead class="text-primary">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    
                                    <th>Contact</th>
                                    <th>Email</th>
                                    
                                    <th>Specialist</th>
                                    <th>Experience</th>
                                    <th>Pack1</th>
                                    <th>Pack2</th>
                                    <th>Pack3</th>
                                    
                                    
                                    <th><a href="addtrainer.php" class="button smaller-button">Add New</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $result = mysqli_query($conn, "SELECT * FROM trainer LIMIT $page1,12") or die ("Query incorrect...");
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td><img src='../course/{$row['trainer_img']}' style='width:50px; height:50px; border:groove #000'></td>";
                                    echo "<td>" . (strlen($row['trainer_name']) > 20 ? substr($row['trainer_name'], 0, 20) . "..." : $row['trainer_name']) . "</td>";
                                   
                                    echo "<td>{$row['contact']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                  
                                    echo "<td>" . (strlen($row['specialist']) > 20 ? substr($row['specialist'], 0, 10) . "..." :$row['specialist']) . "</td>";
                                  
                                    echo "<td>{$row['experience']}</td>";
                                    echo "<td>{$row['pack1']}</td>";
                                    echo "<td>{$row['pack2']}</td>";
                                    echo "<td>{$row['pack3']}</td>";
                                    
                                    echo "<td><a class='btn btn-primary' href='edittrainer.php?trainer_id={$row['trainer_id']}'>Edit</a>";
                                    echo "<a class='btn btn-danger' href='managetrainer.php?trainer_id={$row['trainer_id']}&action=delete'>Delete</a></td>";
                                     
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php 
                    // Counting paging
                    $paging = mysqli_query($conn, "SELECT * FROM trainer");
                    $count = mysqli_num_rows($paging);
                    $a = $count / 10;
                    $a = ceil($a);
                    for($b = 1; $b <= $a; $b++) {
                        echo "<li class='page-item'><a class='page-link' href='trainerslist.php?page={$b}'>{$b}</a></li>";
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
