<?php
 include("php/config.php");

$query="select * from beneficiary";
$result = mysqli_query($con,$query);

// Get the current date in the format YYYY-MM-DD
$currentDate = date("Y-m-d");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Patient's Records </title>
    <link rel = "stylesheet" href = "patients-records.css"/>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class = "sidebar">
        <div class = "logo">
        </div>
        <ul class = "menu">

            <li>
                <a href = "#" onclick="dashboard()">
                    <i class = "fas fa-tachometer-alt"> </i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class = "active">
                <a href = "#" onclick="records()">
                    <i class = "fas fa-chart-bar"> </i>
                    <span> Beneficiary's Records </span>
                </a>
            </li>

            <li>
                <a href = "#"onclick="assistance()">
                    <i class = "fas fa-handshake-angle"> </i>
                    <span> Financial Assistance </span>
                </a>
            </li>


            <li>
                <a href = "#" onclick="hospital()">
                    <i class = "fas fa-hospital"> </i>
                    <span> Hospitals </span>
                </a>
            </li>

            <li>
                <a href = "#">
                    <i class="fa-regular fa-calendar-days"></i> </i>
                    <span> Scheduling </span>
                </a>
            </li>

            <li class = "logout">
                <a href = "#">
                    <i class = "fas fa-sign-out-alt"> </i>
                    <span> Logout </span>
                </a>
            </li>

            <li class = "user">
                <a href = "#">
                    <i class = "fas fa-user"> </i>
                    <span> Profile </span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span> 1Bataan Malasakit - Special Assistance Program </span>
                <h2> Beneficiary's Records </h2>
            </div>
            <div id="currentDate"></div> 
            <div class="user--info">
                <div class="search--box">
                <i class = "fa-solid fa-search"> </i>
                <input type="text" id="Search" oninput="search()" placeholder="Search " autocomplete="off"/>
            </div>
            <img src = "images/background.png" alt = "" />
            </div>
        </div>
        
        <div class="tabular--wrapper">
            <h3 class="main--title"> Overall Data </h3>
            <div class="table--container">
                <table>
                    <thead>
                        <tr>
                            <th> Date: </th>
                            <th> Beneficiary ID: </th>
                            <th> Name: </th>
                            <th> Municipality: </th>
                            <th> Schedule: <br> (if online) </th>
                            <th> Transaction Type: </th>
                            <th> Assistance Given: </th>
                            <th> Status: </th>
                            <th> Action: </th>
                        </tr>
                        <tbody>
                        <?php
include("php/config.php");

$sql = "SELECT t.Date, b.Beneficiary_Id, b.Lastname, b.Firstname, b.CityMunicipality, t.Given_Sched, t.TransactionType, t.AssistanceType, t.Status 
        FROM beneficiary b 
        INNER JOIN transaction t ON b.Beneficiary_Id = t.Beneficiary_Id
        ORDER BY t.Date DESC"; 
$result = $con->query($sql);

if (!$result) {
    die("Invalid query: " . $con->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["Date"] . " </td>
            <td>" . $row["Beneficiary_Id"] . " </td>
            <td>" . $row["Lastname"] . ", " . $row["Firstname"] . " </td>
            <td>" . $row["CityMunicipality"] . " </td>
            <td>" . $row["Given_Sched"] . " </td>
            <td>" . $row["TransactionType"] . " </td>
            <td>" . $row["AssistanceType"] . " </td>
            <td>" . $row["Status"] . " </td>
            <td><a href='update.php?id=" . $row["Beneficiary_Id"] . "'>Edit</a></td>
          </tr>";
}

?>

                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<script type = "text/javascript">
function dashboard(){
    window.location = "http://localhost/1BM-SAP/dashboard.php"
}

function records(){
    window.location = "http://localhost/1BM-SAP/patients-records.php"
}

function assistance(){
    window.location = "http://localhost/1BM-SAP/assistance.php"
}

function hospital(){
    window.location = "http://localhost/1BM-SAP/hospital.php"
}


      
 
        // Function to get the current date in the format: Month Day, Year (e.g., April 14, 2024)
        function getCurrentDate() {
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var currentDate = new Date();
            var month = months[currentDate.getMonth()];
            var day = currentDate.getDate();
            var year = currentDate.getFullYear();
            return month + " " + day + ", " + year;
        }

        // Update the current date element with the current date
        document.getElementById("currentDate").innerText = getCurrentDate();

    
        function search() {
    // Get the search input value
    var input = document.getElementById("Search").value.toUpperCase();
    // Get the table rows
    var rows = document.querySelectorAll(".table--container table tbody tr");

    // Loop through all table rows
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        // Get the cells containing the Date, Beneficiary ID, Name, City, Assistance Type, Status, Schedule, and Transaction Type
        var dateCell = row.cells[0];
        var beneficiaryIdCell = row.cells[1];
        var nameCell = row.cells[2];
        var cityCell = row.cells[3];
        var assistanceTypeCell = row.cells[4];
        var statusCell = row.cells[5];
        var schedCell = row.cells[6];
        var transactionTypeCell = row.cells[7];
        
        if (dateCell && beneficiaryIdCell && nameCell && cityCell && assistanceTypeCell && statusCell && schedCell && transactionTypeCell) {
            // Get the text content of the cells and convert them to uppercase
            var dateText = dateCell.textContent.toUpperCase();
            var beneficiaryIdText = beneficiaryIdCell.textContent.toUpperCase();
            var nameText = nameCell.textContent.toUpperCase();
            var cityText = cityCell.textContent.toUpperCase();
            var assistanceTypeText = assistanceTypeCell.textContent.toUpperCase();
            var statusText = statusCell.textContent.toUpperCase();
            var schedText = schedCell.textContent.toUpperCase();
            var transactionTypeText = transactionTypeCell.textContent.toUpperCase();

            // Check if the search input value matches any of the columns
            if (dateText.indexOf(input) > -1 || beneficiaryIdText.indexOf(input) > -1 || nameText.indexOf(input) > -1 || cityText.indexOf(input) > -1 || assistanceTypeText.indexOf(input) > -1 || statusText.indexOf(input) > -1 || schedText.indexOf(input) > -1 || transactionTypeText.indexOf(input) > -1) {
                // If there's a match, display the table row
                row.style.display = "";
            } else {
                // If there's no match, hide the table row
                row.style.display = "none";
            }
        }
    }
}




</script>
</body>
</html>