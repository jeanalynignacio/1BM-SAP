<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 1Bataan Malasakit - Special Assistance Program </title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div class = "main">
        <div class = "page">
            <div class = "icon">
                <h2 class = "logo"> 1Bataan Malasakit - Special Assistance Program </h2>
            </div>

            <div class = "menu">
                <ul>
                    <li> <a href = "home.php"> Home </a> </li>
                    <li> <a href = "#"> Services Available </a> </li>
                  
                    <?php 
               
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Lname = $result['Lastname'];
                $res_Fname = $result['Firstname'];
                $res_Mname = $result['Middlename'];
                $res_Birthday = $result['Birthday'];
                $res_Cnumber = $result['Contactnumber'];
                $res_Province = $result['Province'];
                $res_CityMunicipality = $result['CityMunicipality'];
                $res_Barangay = $result['Barangay'];
                $res_HousenoStreet = $result['HousenoStreet'];
                $res_Email = $result['Email'];
                $res_Uname = $result['Username'];
                $res_Password = $result['Password'];
                $res_Id = $result['Id'];
            }
                  
echo "<li>";
echo "<form action='edit.php' method='POST'>";
echo "<input type='hidden' name='userId' value='$res_Id'>";
echo "<button type='submit' style='background: none; border: none; padding: 0; font: inherit; cursor: pointer;  color: #fff; font-family: Arial; font-weight: bold; transition: 0.4s ease-in-out;' >Profile</button>";

echo "</form>";
echo "</li>";

  ?> 
  <li> <a href = "index.php"> Log Out </a> </li>
                </ul>
            </div>

            <div class = "content">

                <h1> About 1Bataan Malasakit - Special Assistance Program <br> (1BM-SAP) </h1>

                <p class = "about"> Lorem ipsum dolor sit amet. Quo temporibus accusantium et dolorem <br>
                    nesciunt a dolorem enim et iusto fugiat in fugiat sunt est voluptas dolores rem assumenda <br>
                    molestiae. Sit odio omnis et sapiente asperiores est consectetur dolor a quasi quia ad <br>
                    natus debitis non galisum recusandae qui assumenda consectetur. In dignissimos libero vel <br> 
                    illum quibusdam aut quos velit ab asperiores labore ut tempore expedita ut deserunt animi ut <br> 
                    perferendis iusto. Aut odio voluptatem sed quisquam accusamus et pariatur aliquam sed beatae <br> 
                    obcaecati sed exercitationem repudiandae ut asperiores sequi. </p>
                    <br> 
                    <div class = "logo"> 
                        <img src = "images/background.png" style = "width: 250px; height: auto; box-shadow: 0 0.5rem 1rem rgba(0,0,0.2); border-radius: 30px 30px;">
                    </div>
                    <button class = "btn"> <a href = #> Apply for an Assistance </a> </button>
                <p class = "contact"> You can contact us here: <br> 
                    SAP Main Office: <a href = # > 0998-549-2847 </a> <br>
                    Facebook Page: <a href =https://www.facebook.com/pgo.sap/> https://www.facebook.com/pgo.sap/ </a>
                </p>

            </div>
        </div>
    </div>
</body>
</html>