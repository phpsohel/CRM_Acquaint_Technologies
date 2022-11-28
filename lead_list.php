<style>
    table.dataTable.display tbody td {
   
    font-size: 12px !important;
}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<table class="display" style="width:100%" id="example">
<thead>
    <th>Date</th>
    <th>Name</th>
    <th>Company</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Lead Status</th>
<th>Lead Category</th>
<th>Employee</th>
<th>Next Reminder Date</th>
<th>Stage</th>
<th>Action</th>

</thead>
<tbody>
<?php
$servername = "localhost";
$username = "acquqkkb_atechcrm";
$password = "atechcrm99%";
$dbname = "acquqkkb_atechcrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM leads";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
      echo " <tr>";
    echo "<td>" . $row["date"]. "</td>";
    echo "<td>" . $row["name"]."</td>";
    echo "<td>" . $row["company"]. "</td>";
    echo "<td>" . $row["email"]. "</td>";
    echo "<td>" . $row["phone_number"]. "</td>";
    echo "<td>" . $row["address"]. "</td>";
    echo "<td>" . $row["lead_status_id"]. "</td>";
    echo "<td>" . $row["lead_category_id"]. "</td>";
    echo "<td>" . $row["employee_id"]. "</td>";
    echo "<td>" . $row["date"]. "</td>";
    echo "<td>" . $row["stage"]. "</td>";
    echo "<td><div class='dropdown'>
  <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Actions
  <span class='caret'></span></button>
  <ul class='dropdown-menu'>
    <li><a href='https://acquaintbd.xyz/atechcrm/lead/details/".$row["id"]."' target='_blank'>Details</a></li>
    <li><a href='https://acquaintbd.xyz/atechcrm/lead/destroy/".$row["id"]."'>Delete</a></li>
  </ul>
</div></td>";
    echo " </tr>";
  }
  
} else {
  echo "0 results";
}
$conn->close();
?>
</tbody>
<tfoot>
    <tr>
         <th>Date</th>
    <th>Name</th>
    <th>Company</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Lead Status</th>
<th>Lead Category</th>
<th>Employee</th>
<th>Next Reminder Date</th>
<th>Stage</th>
<th>Action</th>
    </tr>
</tfoot>
</table>


<script src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>