<?php
 // Start the session
 include "header.php";
// Check if the user is logged in
if (isset($_SESSION['uid'])) {
    // If the user is not logged in, redirect to the login page
 

?>
<style>
        .containerc
        {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
        }
        .course-card {
            width: 100%px;
            height: 200%px;
            background-color: #2364aaff;
            margin: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
        }
        .element{
            position: absolute; 
            top: 50px; 
            right: 200px; 
        }
        .course-card img {
            width: 300px;
            height: 330px;
            object-fit: cover;
        }

        .course-card:hover {
             box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .cardp:hover {
             box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .review-content
        {
        	background-color: var(--primary-color);
        
        }
        .h3 {
            font-size: 28px;
            text-align:center;
        }
        .h2{
            color: red;
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
        
      .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .center1 {
            display: block;
            margin-left: 500px;
            margin-right: 500px;
            width: 50%;
            
    }
    .containerp {
    width: 50%;
    margin: 0 auto;
    text-align: center;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
           
    
    
}
.fon{
    font-size: 20px;
     font-family: 'sans-serif';
     font-weight: bold;
}
.cardp {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 45px;
            margin: 35px;
            width: 300px;
            display: inline-block;
            text-align:center;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            text-align:center;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            cursor: pointer;

        }
        .head{
        padding-top: 15px;
  padding-bottom: 15px;
  background: white;
}
.book-now {
    display: inline-block;
    background-color: #00B4DB;
    color: #fff;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    border-radius: 8px 8px 8px 8px 
}
        
.pad{padding:15px;
            font-size: 20px;}
.cp
{
    font-size: 20px; 
    text-align:justify;
    text-justify:inter-word;
    font-family:'Gill Sans',' Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
    </style>
<div class="header">
  <h1>Meet Top Trainers</h1>
  <p>Start Building today</p>
</div>
<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
                    <?php
                                // Assuming you have a connection to your database already established
                                include "db.php";
                                $course=$_GET['course_id'];
                                $sql = "SELECT * FROM trainer WHERE trainer_id= $course";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {  
                                       
                                    
                                       echo '<div class="element">';
                                       echo '<div class="course-card">';
                                        echo '<img src="course/' . $row["trainer_img"] . '" alt=" ">';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</a>';
                                   
									echo '
                                        <br>
                                        <div class="col-md-5">
                                            <div class="product-details">
                                                <h1>'.$row['trainer_name'].'</h1>
                                                <div>
                                                    <p>'.$row['experience'].'-years of experiencee</p>
                                                </div>
                                                <br>
                                            
                                    
                                                </div>
                                                <p>'.$row['trainer_quote'].'</p>
                                                <div>
                                                <br>
                                                <br>
                                                <div>
                                                    <h2>Specialist</h2>
                                                    <p>'.$row['specialist'].'</p>
                                                    
                                                </div>
                                            
                                                <br>
                                                <br>
                                                <div style=" display: flex; ">
                                                    <h6 style="font-size:20px;">Join Me Online:</h6>
                                                    <br>
                                                    <p class="pad"><a href="#"><i class="fa fa-facebook"> <br></i></a></p>
                                                    <p class="pad"><a href="#"><i class="fa fa-twitter"></i></a></p>
                                                    <p class="pad"><a href="#"><i class="fa fa-google-plus"></i></a></p>
                                                    <p class="pad"><a href="#"><i class="fa fa-envelope"></i></a></p>
                                                </div>
                                                <br><br>
                                                <br><br>
                                                <br>

                                                <div class="section">
                                                        <!-- container -->
                                                        <div class="container">
                                                            <!-- row -->
                                                            <div class="row">

                                                                <!-- section title -->
                                                                <div class="col-md-12">
                                                                    <div class="section-title">
                                                                        <h1 style="text-align:center;">ABOUT THE TRAINER</h1>
                                                                    </div>
                                                                <div class="col-md-12">    
                                                                <p class="cp">'.$row['trainer_description'].'</p>
                                                                </div>
                                                                </div>
                                                             </div>
                                                            
                            
                                                        </div>
                                                </div>
                                                <div class="section">
                                                        <!-- container -->
                                                        <div class="container">
                                                            <!-- row -->
                                                            <div class="row">

                                                                <!-- section title -->
                                                                <div class="col-md-12">
                                                                
                                                                    <h2 style="text-align:center;">CERTIFICATE</h2>
                                                                    <img src="course/'.$row['CERTIFICATE'].'" alt="" class="center">
                                                              
                                                                </div>
                                                                </div>
                                                             </div>
                                                            
                            
                                                        </div>
                                                </div>
                                                
                                               
                                                    
                                                <div class="container">
                                                            <!-- row -->
                                                           
                                                <div class="footer">
                                                <h2 class="header" >CHOOSE YOUR PLAN</h2>
                                                            
                                                <p style="padding: 5px;">   </p>     
                                             
                                                <div class="cardp">
                                                <h2>30-MINUTES</h2>
                                                <br>
                                                <p>STARTING AT:</p>
                                               <p class="fon">Rs.'.$row['pack1'].'</p>
                                               <p>per session</p>
                                                
                                                <label class="book-now">Join Now</label>
                                            
                                               </div>
                                              
                                               <div class="cardp">
                                               <h2>45-MINUTES</h2>
                                               <p>STARTING AT:</p>
                                               <p class="fon">Rs.'.$row['pack2'].'</p>
                                               <p>per session</p>
                                               <label class="book-now">Join Now</label>
                                              
                                              </div>
                                              <div class="cardp">
                                                <h2>60-MINUTES</h2>
                                                <p>STARTING AT:</p>
                                                <p class="fon">Rs.'.$row['pack3'].'</p>
                                                <p>per session</p>
                                               
                                               
                                                <label class="book-now">Join Now</label>
                                               </div>
                                                </div>
                                                <div class="section">
                                                        <!-- container -->
                                                        <div class="container">
                                                            <!-- row -->
                                                            <div class="row">
                                                            <div class="footer">
                                                            <h3 class="header" style="height:15px; padding-top:30px;">Lets Connect</h3>
                                                            <br>
                                                            <div class="center1">
                                                            
                                                              <ul class="footer-links" style="font-size:30px; left-margin:40px;">
                                                                
                                                                  <li><a href="#"><i class="fa fa-phone"></i>:' . $row["contact"]. '</a></li>
                                                                  <br>
                                                                  <li><a href="#"><i class="fa fa-envelope-o"></i>:' . $row["email"]. '</a></li>
                                                              </ul>
                                                            </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                </div>
                                             
                                               
                                                         
                                              
                                                
                                            </div>
                                        </div>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                ?>
                                       
                </div>   
            </div>                    
</div>  

<?php
   
}
else
{
    echo "<script>alert('Please log-in to access the trainer page.'); window.location.href = 'course.php';</script>";
    exit(); 
}
  include "footer.php";
?>
