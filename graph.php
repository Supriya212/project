  <?php
include'connection.php';
$ap_date = $_POST['ap_date'];
//$ap_date='2017-11-02';
$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Psychiatrist');";

$result = $conn->query($sql);
$Psychiatrist=$result->num_rows;


$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Dentist');";

$result = $conn->query($sql);
$Dentist=$result->num_rows;


$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Opthmalogist');";

$result = $conn->query($sql);
$Opthmalogist=$result->num_rows;



$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Radiologist');";

$result = $conn->query($sql);
$Radiologist=$result->num_rows;


$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Pediatrician');";

$result = $conn->query($sql);
$Pediatrician=$result->num_rows;


$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Orthopedic');";

$result = $conn->query($sql);
$Orthopedic=$result->num_rows;

$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Surgeon');";

$result = $conn->query($sql);
$Surgeon=$result->num_rows;

$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Gynaecologist');";

$result = $conn->query($sql);
$Gynaecologist=$result->num_rows;


$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Neurologist');";


$result = $conn->query($sql);
$Neurologist=$result->num_rows;


$sql = "SELECT * FROM appointment where ap_done=1 and ap_date = '$ap_date' and doctor_id=(select doctor_id from doctor where specialisation like 'Physician');";

$result = $conn->query($sql);
$Physician=$result->num_rows;


?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Daily Patient Analysis"
	},
	axisY: {
		title: "No of Patients Served"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "white",
		legendText: "Doctors Speciality",
		dataPoints: [      
			{ y: <?php echo $Dentist; ?>, label: "Dentist" },
			{ y: <?php echo $Opthmalogist; ?>,  label: "Opthmalogist" },
			{ y: <?php echo $Radiologist; ?>,  label: "Radiologist" },
			{ y: <?php echo $Pediatrician; ?>,  label: "Pediatrician" },
			{ y: <?php echo $Orthopedic; ?>,  label: "Orthopedic" },
			{ y: <?php echo $Surgeon; ?>, label: "Surgeon" },
			{ y: <?php echo $Psychiatrist; ?>,  label: "Psychiatrist" },
			{ y: <?php echo $Gynaecologist; ?>,  label: "Gynaecologist" },
			{ y: <?php echo $Neurologist; ?>,  label: "Neurologist" },
			{ y: <?php echo $Physician; ?>,  label: "Physician" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
	<br><br><br><br><br><br>
<div id="chartContainer" style="height: 700px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
