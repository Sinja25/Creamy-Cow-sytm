<?php 
include_once("include/navbar.php");
Products();
require('db.php');
$select="SELECT * FROM tbl_category";

$result = $con->query($select);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { ?> 
<div class ="picture">
  <img src ="mt.jpg">
    <div class ="desc"><a href="ice-coffee.php">Iced Coffee</a></div>
</div>
<div class ="picture">
  <img src ="mt.jpg">
    <div class ="desc"><a href="milktea.php">Milktea</a></div>
</div>
<div class ="picture">
  <img src ="mt.jpg">
    <div class ="desc"><a href="frappe.php">Frappe</a></div>
</div>
<?php } }?>
</body>
</html>
