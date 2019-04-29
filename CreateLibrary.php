<?php require_once('Connections/connSQL.php'); ?>
<?php
mysqli_select_db($connSQL, $database_connSQL);
$query_RecWebInfo = "SELECT * FROM librarytable";
$RecLibraryInfo = mysqli_query($connSQL, $query_RecWebInfo) or die(mysql_error());
$row_RecLibraryInfo = mysqli_fetch_assoc($RecLibraryInfo);
$totalRows_RecLibraryInfo = mysqli_num_rows($RecLibraryInfo);
?>
<!DOCTYPE html>
<html>
<title>Bibilography Manager User Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
body {font-family: "Roboto", sans-serif}
.w3-bar-block .w3-bar-item {
  padding: 16px;
  font-weight: bold;
}

.library2_hidden { display:none; }
.library1_hidden { display:none; } <!-- table-row--> <!-- table-row-group-->
</style>
<body>

<nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="mySidebar">
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fa fa-home' style='font-size:25px; color:black'></i> Home</a>
  <div>
    <a class="w3-bar-item w3-button w3-xlarge" onclick="myAccordion('demo')" href="javascript:void(0)"><i class='fas fa-trash' style='font-size:25px;'> Trash</i></a>
    <div id="demo" class="w3-hide">
      <a class="w3-bar-item w3-button w3-large" href="#"><i class="fas fa-trash "> Restore</i></a>
      <a class="w3-bar-item w3-button w3-large" href="#"><i class='fas fa-trash-alt'> Delete Trash</i></a>
    </div>
  </div>
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fas fa-folder' style='font-size:25px; color:black'> Unfiled </i></a>
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fas fa-folder-plus' style='font-size:25px; color:black'> Create Library</i></a>
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fas fa-folder-minus' style='font-size:25px; color:black'> Delete Library</i></a>
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fas fa-folder-open' style='font-size:25px; color:black'> Open Library</i></a>
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fas fa-share-alt' style='font-size:25px; color:black'> Share</i></a>
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fas fa-pencil-alt' style='font-size:25px; color:black'> Update details</i></a>
  <a class="w3-bar-item w3-button w3-xlarge" href="#"><i class='fas fa-file-pdf' style='font-size:25px; color:black'></i> Upload file</a>
</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

<div id="myTop" class="w3-container w3-top w3-theme w3-large">
  <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
  <span id="myIntro" class="w3-hide">Bibliography Manager</span></p>
</div>

<header class="w3-container w3-theme" style="padding:64px 32px">
  <h1 class="w3-xxxlarge">BIBILOGRAPHY MANAGER</h1>
</header>

<div class="w3-container" style="padding:32px">
<!--Home of user dashboard--->

<h4 style="text-align:left">Welcome User!</h4>
<h4 style="text-align:right">Logout<h4>
<!--table nav bar-->
<ul>
  <li><a class="active" href="#add">Add</a></li>
  <li><a href="#sort">Sort</a></li>
  <li><a href="#share">Share</a></li>
  <li><a href="#delete">Delete</a></li>
</ul>
<!--search bar-->
<form>
  <input type="text" name="search" placeholder="Search..">
</form>

			<div class="w3-example">
				<h4>Library</h4>
				<div class="w3-code">
					<span style="color:black">
						<span style="color:mediumblue" onclick="myFunction_hiden('library1')">library1</span>
					</span>
				</div>
				<div class="w3-code-ccc">
					<span style="color:black">
						<span style="color:mediumblue" onclick="myFunction_hiden('library2')">library2</span>
					</span>
				</div>
			<p>
			</p>
			</div>

			
<?php
	do{
		echo $row_RecLibraryInfo['libraryID'];
	}while($row_RecLibraryInfo = mysqli_fetch_assoc($RecLibraryInfo));
?>

<!--table-->
	<div>

          <table id="customers">
			<thead>
				<tr>
					<th><input type="checkbox" value="">All</th>
					<th>Title</th>
					<th>Author</th>
					<th>Year</th>
					<th>Abstract</th>
					<th>PDF</th>
					<th>ShareWith</th>
				</tr>
			</thead>
			<tbody>	<!--<tbody class="library1_hidden">-->
				<tr class="library1_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library1_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library1_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library1_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library2_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library2_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library2_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library2_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library2_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr class="library2_hidden">
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
            </tbody> 
          </table>
          <br>
          <input  type="submit" value="Submit" style="text-align:center;"></input>

    </div>
	
<footer class="w3-container w3-theme" style="padding:32px">
  <p>Developed by Yash, Hung & Sam</p>
</footer>

</div>

<script>
// Open and close the sidebar on medium and small screens
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
    document.getElementById("myIntro").classList.add("w3-show-inline-block");
  } else {
    document.getElementById("myIntro").classList.remove("w3-show-inline-block");
    document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
  }
}

// Accordions
function myAccordion(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme";
  } else {
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className =
    x.previousElementSibling.className.replace(" w3-theme", "");
  }
}

		function myFunction_hiden(parameter1) {
			if(parameter1 == "library1"){
				var x = document.getElementsByClassName("library2_hidden");
				x[0].style.display = "none";
				var x = document.getElementsByClassName("library1_hidden");
				x[0].style.display = "table-row";
			}else if(parameter1 == "library2"){
				var x = document.getElementsByClassName("library1_hidden");
				x[0].style.display = "none";
				var x = document.getElementsByClassName("library2_hidden");
				x[0].style.display = "table-row";
			}
		}
</script>

</body>
</html>
<?php
mysqli_free_result($RecLibraryInfo);
?>