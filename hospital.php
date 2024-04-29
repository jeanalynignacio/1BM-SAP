

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Main Dashboard </title>
    <link rel = "stylesheet" href = "hospitals.css"/>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class = "sidebar">
        <div class = "logo">
        </div>
        <ul class = "menu">

            <li >
                <a href = "#" onclick="dashboard()">
                    <i class = "fas fa-tachometer-alt"> </i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href = "#" onclick="records()">
                    <i class = "fas fa-chart-bar"> </i>
                    <span> Patient's Records </span>
                </a>
            </li>

            <li>
                <a href = "#" onclick="assistance()">
                    <i class = "fas fa-handshake-angle"> </i>
                    <span> Financial Assistance </span>
                </a>
            </li>


            <li class = "active">
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
                <span></span>
                <h2> Accredited Hospitals </h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                <i class = "fa-solid fa-search"> </i>
                <input type = "text" id="Search" oninput="search()" placeholder="Search " autocomplete="off"/>
            </div>
            <img src = "images/background.png" alt = "" />
            </div>
        </div>
        <div class="card--container">
          
        <button class="cards" onclick="loadHospitalData('')">
                <img src = "images/background.png">
                    <div class="card-content">
                    
                        <h3>All Hospitals</h3>
                        
                    </div>
                </button>
                </div>
        <div class="card--container">
            <h3 class="main--title"> Partnered Hospital Inside Bataan </h3>
            <div class="card-wrapper">
                
        
                
                <button class="cards" onclick="loadHospitalData('Bataan Doctors Hospital &amp; Medical Center')">
                    <img src = "images/bdhmc.jpg">
                    <div class="card-content">
                        <h3>Bataan Doctors Hospital & Medical Center</h3>
                    </div>
                </button>
               
                <button class="cards" onclick="loadHospitalData('Balanga Medical Center Corporation')">
                <img src = "images/bmcc.png">
                <div class="card-content">
                    <h3>Balanga Medical Center Corporation </h3>
                </div>
                </button>

                <button class="cards" onclick="loadHospitalData('Bataan Peninsula Medical Center')">
                <img src = "images/bpmc.png">
                <div class="card-content">
                    <h3>Bataan Peninsula Medical Center</h3>
  </div>
                </button>
              
                <button class="cards" onclick="loadHospitalData('Bataan St. Joseph Hospital &amp; Medical Center')">
                <img src = "images/bsjmc.jpg">
                <div class="card-content">
                    <h3>Bataan St. Joseph Hospital & Medical Center</h3>
                  </div>
                </button>

                <button class="cards" onclick="loadHospitalData('Isaac &amp; Catalina Medical Center')">
                <img src = "images/icmc.jpg">
                <div class="card-content">
                    <h3>Isaac & Catalina Medical Center</h3>
                 </div>
                </button>
               

                <button class="cards" onclick="loadHospitalData('Mt. Samat Medical Center')">
                <img src = "images/mtsamat.png">
                <div class="card-content">
                    <h3>Mt. Samat Medical Center</h3>
                 </div>
                </button>
               
                <button class="cards" onclick="loadHospitalData('Orion St. Michael Hospital')">
                <img src = "images/background.png">
                <div class="card-content">
                    <h3>Orion St. Michael Hospital</h3>
                 </div>
                </button>
            
        </div>
        </div>
        
        <div class="card--container">
        <h3 class="main--title"> Partnered Hospital Inside Bataan </h3>
            <div class="card-wrapper">
                
              
                <button class="cards" onclick="loadHospitalData('Jose B. Lingad Memorial General Hospital')">
                <img src = "images/jbl.jpg">
                    <div class="card-content">
                    
                        <h3> Jose B. Lingad Memorial General Hospital</h3>
                        </div>
                </button>
                <button class="cards" onclick="loadHospitalData('Lung Center of the Philippines')">
                <img src = "images/lcotp.png">
                    <div class="card-content">
                         <h3>Lung Center of the Philippines</h3>
                        </div>
                </button>
                <button class="cards" onclick="loadHospitalData('National Children's Hospital')">
                <img src = "images/nch.jpg">
                    <div class="card-content">
                         <h3>National Children's Hospital</h3>
                        </div>
                </button>
                <button class="cards" onclick="loadHospitalData('National Kidney & Transplant Institute')">
                <img src = "images/nkti.png">
                    <div class="card-content">
                         <h3>National Kidney & Transplant Institute</h3>
                        </div>
                </button>
                <button class="cards" onclick="loadHospitalData('Philippine General Hospital')">
                <img src = "images/pgh.png">
                    <div class="card-content">
                         <h3>Philippine General Hospital</h3>
                        </div>
                </button>
                <button class="cards" onclick="loadHospitalData('Philippine Heart Center')">
                <img src = "images/phc.jfif">
                    <div class="card-content">
                         <h3>Philippine Heart Center</h3>
                        </div>
                </button>
                <button class="cards" onclick="loadHospitalData('The Philippines Children Medical Center')">
                <img src = "images/pcmc.jpg">
                    <div class="card-content">
                         <h3>The Philippines Children Medical Center</h3>
                        </div>
                </button>

            </div>
        </div>
        <div id="tablesection" class="tabular--wrapper">
            <h3 class="main--title"> Overall Data </h3>
            <div class="table--container" id="table--container">
            <form id="hospitalForm" action="http://localhost/1BM-SAP/hospital.php" method="POST">
                    <input type="hidden" name="hospital" id="hospitalInput">
                    <input type="hidden" name="beneficiary_id" id="beneficiaryIdInput">
         
                </form>
                <table id="tablesc">
                    <thead>
                        <tr>
                            <th> Date: </th>
                            <th> Beneficiary Id: </th>
                            <th> Beneficiary Name: </th>
                            <th> Transaction Type: </th>
                            <th> Hospital Name: </th>
                            <th> Total Hospital Bill: </th>
                            <th> Status: </th>
                            <th> Given Schedule: </th>
                            <th> Action: </th>
                        </tr>
                        <tbody >
                        <?php
include("php/config.php");

// Retrieve the selected hospital from the URL parameter
if(isset($_POST['hospital'])) {
    $selectedHospital = $_POST['hospital'];
} else {
    // Default to NULL if hospital parameter is not provided
    $selectedHospital = NULL;
}


// Modify the SQL query to fetch records for all hospitals when $selectedHospital is NULL
$sql = "SELECT t.Date, b.Beneficiary_Id, b.Lastname, b.Firstname, t.TransactionType, h.PartneredHospital, h.billamount, t.Status, t.AssistanceType,t.Given_Sched 
        FROM hospitalbill h
        INNER JOIN beneficiary b ON b.Beneficiary_Id = h.Beneficiary_ID
        INNER JOIN transaction t ON t.Beneficiary_Id = h.Beneficiary_ID";

// Add a WHERE clause only if a specific hospital is selected
if ($selectedHospital !== NULL && $selectedHospital !== '') {
    $sql .= " WHERE h.PartneredHospital = '$selectedHospital' AND t.AssistanceType = 'Hospital Bills'";
}

// Add a WHERE clause only if a specific hospital is selected
if ($selectedHospital == NULL ) {
    $sql .= " WHERE t.AssistanceType = 'Hospital Bills'";
}

// Add ORDER BY clause to sort by date in descending order
$sql .= " ORDER BY t.Date DESC";

// Execute the query
$result = $con->query($sql);

// Check if the query was successful
if (!$result) {
    die("Invalid query: " . $con->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["Date"] . " </td>
            <td>" . $row["Beneficiary_Id"] . " </td>
            <td>" . $row["Lastname"] . ", " . $row["Firstname"] . " </td>
            <td>" . $row["TransactionType"] . " </td>
            <td>" . $row["PartneredHospital"] . " </td>
            <td>" . $row["billamount"] . " </td>
            <td>" . $row["Status"] . " </td>
            <td>" . $row["Given_Sched"] . " </td>
             <td>".
            "<form method='post' action='editformhospitals.php'>" .
            "<input type='hidden' name='Beneficiary_Id' value='" . $row['Beneficiary_Id'] . "'>" .
            "<button type='submit'>Edit</button>" .
            "</form>" .
            "</td>
            
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
function loadHospitalData(hospital) {
    console.log("Hospital data loaded:", hospital);
    document.getElementById('hospitalInput').value = hospital;
    document.getElementById('hospitalForm').submit();
    // Get the Y coordinate of the table container
    var tableContainer = document.getElementById('table--container');
    var yCoordinate = tableContainer.getBoundingClientRect().top + window.pageYOffset;
    // Scroll to the Y coordinate
    window.scrollTo({
        top: yCoordinate,
        behavior: 'smooth'
    });
}


         function editRecord(beneficiaryId) {
            document.getElementById('beneficiaryIdInput').value = beneficiaryId;
     
    // Create a hidden form field
    var form = document.createElement('form');
    form.method = 'post';
    form.action = 'editformhospitals.php'; // Corrected action to 'edit-form.php'
    
    // Create an input field to store the Beneficiary_Id
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'Beneficiary_Id';
    input.value = beneficiaryId;
    
    // Append the input field to the form
    form.appendChild(input);
    
    // Append the form to the document body and submit it
    document.body.appendChild(form);
    form.submit();
}
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
        var hospitalCell = row.cells[4];
        var schedCell = row.cells[7];
        var transactionTypeCell = row.cells[3];
         var statusCell = row.cells[6];
        
        if (dateCell && beneficiaryIdCell && nameCell && hospitalCell  && statusCell && schedCell && transactionTypeCell) {
            // Get the text content of the cells and convert them to uppercase
            var dateText = dateCell.textContent.toUpperCase();
            var beneficiaryIdText = beneficiaryIdCell.textContent.toUpperCase();
            var nameText = nameCell.textContent.toUpperCase();
            var hospitalText = hospitalCell.textContent.toUpperCase();
             var statusText = statusCell.textContent.toUpperCase();
            var schedText = schedCell.textContent.toUpperCase();
            var transactionTypeText = transactionTypeCell.textContent.toUpperCase();

            // Check if the search input value matches any of the columns
            if (dateText.indexOf(input) > -1 || beneficiaryIdText.indexOf(input) > -1 || nameText.indexOf(input) > -1 || hospitalText.indexOf(input) > -1 || statusText.indexOf(input) > -1 || schedText.indexOf(input) > -1 || transactionTypeText.indexOf(input) > -1) {
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