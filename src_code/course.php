<?php
    include "header.php";
?>

    <style>
        .containerc
        {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .course-card {
            width: 350px;
            height: 650%px;
            background-color: #f0f0f0;
            margin: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .course-card img {
            width: 100%px;
            height: 100%px;
            object-fit: cover;
        }

        .course-card:hover {
             box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .review-content
        {
        	background-color: var(--primary-color);
        
        }
        .h3 {
            font-size: 28px;
        }

        .h4 {
            font-weight: lighter;
            font-size: 22px;
            margin-bottom: 15px;
        }
 
        .header {
        padding: 60px;
        text-align: center;
        background: #6199c7;
        color: white;
        font-size: 30px;
        }
         .navbar-nav{
         justify-content: center;
      }
        
        
    </style>
 
<div class="header">
  <h1>Meet Top Trainers</h1>
  <p>Start Building today</p>
</div>
<br>
<div class="section main main-raised">
			<!-- container -->
		<div class="container">
				<!-- row -->
				
        
			<!-- container -->
			<div class="containerc">
				<!-- row -->
					
                                <?php
                                // Assuming you have a connection to your database already established
                                include "db.php";

                                $sql = "SELECT * FROM trainer";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {  
                                       
                                        echo '<a href="trainer.php?course_id=' . $row["trainer_id"] . '">';
                                        echo '<div class="course-card">';
                                        echo'<div class="review-content">';
                                       
                                        echo '<img src="course/' . $row["course_img"] . '" alt=" ">';
                                       
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</a>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                ?>
                                      
			</div>
			<!-- /container -->    
    </div>    
</div>

</body>

<?php

  include "footer.php";
?>

