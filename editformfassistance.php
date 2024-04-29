<?php 
session_start();
include("php/config.php");

// Check if Beneficiary_Id is set in the URL parameter
if(isset($_POST['Beneficiary_Id'])) {
    // Retrieve the Beneficiary_Id from the URL parameter
    $beneID = $_POST['Beneficiary_Id'];
  } else {
    echo "User ID is not set.";
}
  
    $SQL = "SELECT b.*, t.*, f.*
            FROM beneficiary b
            INNER JOIN transaction t ON b.Beneficiary_Id = t.Beneficiary_Id
            INNER JOIN financialassistance f ON b.Beneficiary_Id = f.Beneficiary_ID
            WHERE b.Beneficiary_Id = '$beneID'";

    $result = mysqli_query($con, $SQL);
    $res_data = array(); // Array to store fetched records

    while($row = mysqli_fetch_assoc($result)){
        $res_data[] = $row; // Append each fetched row to the array
    }



if(isset($_POST['submit'])) {
  // Check if the user confirmed the update
  if(isset($_POST['confirmed']) && $_POST['confirmed'] === "yes") {
      $beneId=$_POST['Beneficiary_Id'];
      $Date=$_POST['Date'];
      $Lastname=$_POST['Lastname'];
      $Firstname=$_POST['Firstname'];
      $municipality=$_POST['CityMunicipality'];
      $Given_Sched=$_POST['Given_Sched'];
      $TransactionType=$_POST['TransactionType'];
      $Amount=$_POST['Amount'];
      $Status=$_POST['Status'];
      
  
      
      // Construct the update query
      $query = "UPDATE financialassistance f
      INNER JOIN beneficiary b ON b.Beneficiary_Id = f.Beneficiary_ID
      INNER JOIN transaction t ON t.Beneficiary_Id = f.Beneficiary_ID
      SET t.Date = '$Date',
          t.Given_Sched = '$Given_Sched',
          t.TransactionType = '$TransactionType',
          t.Status = '$Status',
          f.Amount = '$Amount'
      

      WHERE b.Beneficiary_Id = '$beneId'";

$result2=mysqli_query($con,$query);
      // Execute the update query
     // Execute the update query
if ($result2) {

  header("Location: assistance.php");
  exit();
} else {
  echo "Error updating records: " . mysqli_error($con);
  header("Location: assistance.php");
  exit();
}

  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Form</title>
    <link rel="stylesheet" href="editformassistance.css" />
  </head>
  <body>
    <div class="container">
      <div class="title"> Edit form </div>
      <form id="editForm"  method="post"> <!-- Changed method to POST -->
      <input type="hidden" name="Beneficiary_Id" value="<?php echo $beneID; ?>">
      <?php foreach($res_data as $record): ?>
      <?php 
               
              
               $query = mysqli_query($con, "SELECT t.Date, b.Beneficiary_Id, b.Lastname, b.Firstname,b.CityMunicipality, t.TransactionType,t.Given_Sched, f.Amount, t.Status FROM financialassistance f INNER JOIN beneficiary b ON b.Beneficiary_Id = f.Beneficiary_ID INNER JOIN transaction t ON t.Beneficiary_Id = f.Beneficiary_ID WHERE f.Beneficiary_ID='$beneID'" );
              
               while($result = mysqli_fetch_assoc($query)){
                   $res_Date = $result['Date'];
                   $res_beneID = $result['Beneficiary_Id'];
                   $res_Lname = $result['Lastname'];
                   $res_Fname = $result['Firstname'];
                   $res_city = $result['CityMunicipality'];
                   $res_Given_Sched = $result['Given_Sched'];
                   $res_transactiontype = $result['TransactionType'];
                   $res_Status = $result['Status'];
                   $res_Amount = $result['Amount'];
               }
                    ?> 

     
      
        <div class="user-details">
          <div class="input-box">
            <span class="details"> Date </span>
            <input type="date" id="calendar" name="Date" required value="<?php echo $record['Date']; ?>"/>
        </div>
       
        
        <div class="input-box">
            <span class="details"> Beneficiary ID </span>
            <input type="text" required value="<?php echo $record['Beneficiary_ID']; ?>" name="Beneficiary_Id" disabled/>
         </div>

        <div class="user-details">
          <div class="input-box">
            <span class="details"> Last Name </span>
            <input type="text" required value="<?php echo $record['Lastname']; ?>" name="Lastname" disabled/>
        </div>

          <div class="input-box">
            <span class="details"> First Name </span>
            <input type="text" required value="<?php echo $record['Firstname']; ?>" name="Firstname" disabled/>
          </div>
          <div class="user-details">
          <div class="input-box">
            <span class="details"> City </span>
            <input type="text" required value="<?php echo $record['CityMunicipality']; ?>" name="CityMunicipality" disabled/>
          </div>

          <div class="input-box">
            <span class="details"> Transaction Type </span>
            <select name="TransactionType">
             
              <option <?php echo ($record['TransactionType'] == 'Online Appointment') ? 'selected' : ''; ?>>Online Appointment</option>
        <option <?php echo ($record['TransactionType'] == 'Walk-in') ? 'selected' : ''; ?>>Walk-in</option>
            </select>
         
</div>

          <div class="input-box">
            <span class="details"> Amount Received </span>
             <input type="text"  value="<?php echo $record['Amount']; ?>" name="Amount" />
       
          </div>

          <div class="input-box">
            <span class="details">Status </span>
            <select name="Status">
            <?php
// Array of hospitals
$status = array(
    
    'Pending for Payout',
    'Pending for Requirements',
    'For Schedule',
    'Done'
  
);

// Loop through the array to generate options
foreach ($status as $status) {
    // Check if the current hospital matches the record's hospital
    $selected = ($record['Status'] == $status) ? 'selected' : '';
    // Output the option with hospital name and selected attribute if matched
    echo "<option $selected>$status</option>";
}
?>
            </select>
    
</div>
         
          <div class="input-box">
           
        <span class="details">Given Schedule </span>
        <input type="date" id="calendar" name="Given_Sched"  value="<?php echo $record['Given_Sched']; ?>"/>
        </div>
</div>
          <br>
          <input type="hidden" name="confirmed" id="confirmed" value="no">
          <input type="hidden" name="fatype" id="fatype" >
       
          <br> 
      
          <div class="button-row">
  <!-- Submit button -->
  <input type="submit" value="Done Edit" name="submit" onclick="showConfirmation()" />
  <!-- Cancel button -->
  <input type="button" value="Cancel" name="cancel" onclick="cancelEdit()" />
</div>

        <?php endforeach; ?>
        </div>
      </form>
    </div>

    
<script type="text/javascript">
    function cancelEdit() {
        // Redirect to the previous page
        window.history.back();
      }
     function editRecord(beneficiaryId) {
        // Set the value of the hidden input field
        document.getElementById('beneficiaryIdInput').value = beneficiaryId;
        // Submit the form
    }

    function showConfirmation() {
    var confirmation = confirm("Are you sure you want to update?");
    if (confirmation) {
        // If user clicks OK, submit the form
       
            document.getElementById("confirmed").value = "yes";
    } else {
      
            document.getElementById("confirmed").value = "no";    }
}


</script>
  </body>
</html>
