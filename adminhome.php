<html>
<head>
<!----fonts----->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<!----css icons-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Medico clinic</title>
<link rel="stylesheet" href="navbar.css">
 <style>
div.clinic_logo{

float: left;
padding-top: 0px;
padding-right: 20px;
padding-bottom: 0px;
padding-left: 10px;

}
</style>
</head>
<body>

<div class="clinic_logo">
<img src="clinic_logo_1.png" alt="Medico Clinic" width="300" height="300" style="float:left;">
</div>
<div class="tab">
<button class="tablinks" onclick="location.href='admin.php'">Verify doctor</button>
<button class="tablinks" onclick="location.href='enter_date_cancel.php'">Cancel appointment</button>
<button class="tablinks" onclick="location.href='enter_date.php'">Analyse appointment</button>
<button class="tablinks" onclick="location.href='enter_date_graph.php'">Graph</button>
<button class="active" style="margin-left:270px;" onclick="location.href='logout.php'">Log out</button>
</div>
<br>
<!--<p id="demo"></p>

<script>
function loadDoc3() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "enter_date.php", true);
  xhttp.send();
}
</script>-->


</body>
</html>
