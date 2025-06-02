<?php
session_start();
include("db.php");
include "sidenav.php";
include "topheader.php";
?>
<style>
    .col-md-15 {
    /* Increasing font size */
    font-size: 20px; /* Adjust the value as per your requirement */

    /* or increasing width */
    width: 130%; /* Adjust the value as per your requirement */
}
.col-md-16 {
    /* Increasing font size */
    font-size: 20px; /* Adjust the value as per your requirement */

    /* or increasing width */
    width: 110%; /* Adjust the value as per your requirement */
}
.row-style {
    /* Example styling for a row */
   /* Background color */
    padding: 20px; /* Padding around the row */
    margin-bottom: 20px; /* Margin at the bottom of the row */
     /* Border around the row */
    border-radius: 5px; /* Border radius to round the corners */
    /* Add any other styles you need */
}
.space
{
    padding: 80px; 

}
</style>
<!-- Include Chart.js library -->

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row row-style">
<div class="content">
        
            <!-- Users Statistics -->
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Users Statistics</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="usersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
   

<!-- Include Chart.js library -->




<!-- HTML structure for the graph -->
<div class="space">
  
    
    <div class="col-md-15">    
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Order Summary</h4>
        </div>
        <div class="card-body">
            <canvas id="orderSummaryChart"></canvas>
        </div>
    </div>
    </div>
</div>

</div>






<script>
    <?php
    // Fetch total number of users
    $totalUsersQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM user_info");
    $totalUsersData = mysqli_fetch_assoc($totalUsersQuery);
    $totalUsers = $totalUsersData['total_users'];

    // Fetch active users (users who have placed at least one order)
    $activeUsersQuery = mysqli_query($conn, "SELECT COUNT(DISTINCT user_id) AS active_users FROM orders");
    $activeUsersData = mysqli_fetch_assoc($activeUsersQuery);
    $activeUsers = $activeUsersData['active_users'];

    // Calculate inactive users
    $inactiveUsers = $totalUsers - $activeUsers;
    ?>

    // Render pie chart for users statistics
    var usersChart = new Chart(document.getElementById('usersChart'), {
        type: 'pie',
        data: {
            labels: ['Active Users', 'Inactive Users'],
            datasets: [{
                label: 'Users',
                data: [<?php echo $activeUsers; ?>, <?php echo $inactiveUsers; ?>],
                backgroundColor: ['#36A2EB', '#FF6384']
            }]
        }
    });
</script>

<script>
    // Assuming you have fetched order summary data from the database
    // Example data
    const orderSummaryData = {
        labels: ['Total Orders', 'Pending Orders', 'Completed Orders'],
        datasets: [{
            label: 'Order Summary',
            data: [100, 50, 50], // Example values, replace with your actual data
            backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384']
        }]
    };

    // Render graph using Chart.js
    var orderSummaryChart = new Chart(document.getElementById('orderSummaryChart'), {
        type: 'bar',
        data: orderSummaryData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

