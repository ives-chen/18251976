<?php require_once('../Connections/connSQL.php'); ?>
<?php
//mysqli_select_db($connSQL, $database_connSQL);
?>
<!DOCTYPE html>
<html>
<title>Bibilography Manager User Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Style.css">
<link rel="stylesheet" href="dashboardstyle.css">
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
</style>
<body>
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

<?php
	//do{
		//echo $totalRows_RecLibraryInfo;
	//}while($row_RecLibraryInfo = mysqli_fetch_assoc($RecLibraryInfo));
?>

	<p>
	<table style="table-layout: fixed;">
		<tr>
			<td style="width:500px">
				<table id="share_table">
					<thead>
						<tr>
							<th><h4>Library</h4></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="checkbox" value="">
								<span style="color:mediumblue" onclick="myFunction('library1')">library1</span>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" value="">
								<span style="color:mediumblue" onclick="myFunction('library2')">library2</span>
							</td>
						</tr>
						<tr>
							<td>
								<form action="OpenLibrary.php"><input  type="submit" value="Update" style="float:left;"></input></form>
								<form action="CreateLibrary.html"><input  type="submit" value="Create" style="float:left;"></input></form>
								<form action="CreateLibrary.html"><input  type="submit" value="Delete" style="float:left;"></input></form>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
			
			<td style="width:500px">
				<form id="form" name="thisform" enctype="multipart/form-data" method="post" action="command/command.php?table=sharelibrarytable&page=OpenLibrary">
					<table id="share_table">
						<thead>
							<tr>
								<th><h4>Shared Library</h4></th>
							</tr>
						</thead>
						<tbody>
							<!--
							<tr>
								<td>
									<input type="checkbox" value="">
									<span style="color:mediumblue" onclick="myFunction('sharelibrary1')">Shared_library1</span>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" value="">
									<span style="color:mediumblue" onclick="myFunction('sharelibrary2')">Shared_library2</span>
								</td>
							</tr>
							-->
							<?php 	$query_RecWebInfo = "SELECT * FROM sharelibrarytable";
									$RecShareLibraryInfo = mysqli_query($connSQL, $query_RecWebInfo) or die(mysql_error());
									//$row_RecShareLibraryInfo = mysqli_fetch_assoc($RecShareLibraryInfo);
									$totalRows_RecShareLibraryInfo = mysqli_num_rows($RecShareLibraryInfo);

									//$query_RecWebInfo = "SELECT * FROM librarytable";
									//$RecLibraryInfo = mysqli_query($connSQL, $query_RecWebInfo) or die(mysql_error());
									//$row_RecLibraryInfo = mysqli_fetch_assoc($RecLibraryInfo);
									//$totalRows_RecLibraryInfo = mysqli_num_rows($RecLibraryInfo);
									$index =1;
									//$libraryName;
									while ($row_RecShareLibraryInfo = mysqli_fetch_assoc($RecShareLibraryInfo))
									{
										/*
										$query_RecWebInfo = "SELECT * FROM librarytable";
										$RecLibraryInfo = mysqli_query($connSQL, $query_RecWebInfo) or die(mysql_error());
										while ($row_RecLibraryInfo = mysqli_fetch_assoc($RecLibraryInfo))
										{
											if($row_RecShareLibraryInfo['libraryID']==$row_RecLibraryInfo['libraryID'])
											{
												$libraryName = $row_RecLibraryInfo['libraryName'];
											}
										}
										*/
									?>
										<tr>
											<td>
												<input type="checkbox" name="check_ShareLibraryList[]" value="<?php echo $row_RecShareLibraryInfo['libraryID'];?>">
												<!--	<span style="color:mediumblue" onclick="myFunction('sharelibrary1')">Shared_library1</span>	-->
												<span style="color:mediumblue" onclick="myFunction('sharelibrary<?php echo $index;?>')"><?php echo $row_RecShareLibraryInfo['libraryName'];?></span>
											</td>
										</tr>
							<?php 	$index++;
									} ?>
							<tr>
								<td>
									<input  type="submit" name="Update" value="Update" style="float:left;"></input>
									<input  type="submit" name="Create" value="Create" style="float:left;"></input>
									<input  type="submit" name="Delete" value="Delete" style="float:left;"></input>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</td>
		</tr>
	</table>
	<p>

	<!--table-->
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
			<tbody id ="library1_hidden" style="display:none;">					<!--<tbody class="library1_hidden">-->
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
			</tbody>
			
			<tbody id ="library2_hidden" style="display:none;">					<!--<tbody class="library1_hidden">-->
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
            </tbody>
			<tbody id ="sharelibrary1_hidden" style="display:none;">					<!--<tbody class="library1_hidden">-->
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Psychology of reading</td>
					<td>Jill</td>
					<td>1950</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
			</tbody>
			
			<tbody id ="sharelibrary2_hidden" style="display:none;">					<!--<tbody class="library1_hidden">-->
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
					<td><input type="checkbox" value=""></td>
					<td>Theory of computation</td>
					<td>Eve</td>
					<td>2001</td>
					<td>A</td>
					<td>A</td>
					<td>A</td>	
				</tr>
				
				<tr>
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
		<input  type="submit" value="UpdateReference" style="text-align:center;">
		<input  type="submit" value="AddToLibrary" style="text-align:center;">
		<input  type="submit" value="AddToShareLibrary" style="text-align:center;">
</div>

	<script>
		function myFunction(parameter1) {
			if(parameter1 == "library1"){
				document.getElementById("library2_hidden").style.display = "none";
				document.getElementById("sharelibrary2_hidden").style.display = "none";
				document.getElementById("sharelibrary1_hidden").style.display = "none";
				document.getElementById("library1_hidden").style.display = "table-row-group";
			}else if(parameter1 == "library2"){
				document.getElementById("library1_hidden").style.display = "none";
				document.getElementById("sharelibrary2_hidden").style.display = "none";
				document.getElementById("sharelibrary1_hidden").style.display = "none";
				document.getElementById("library2_hidden").style.display = "table-row-group";
			}else if(parameter1 == "sharelibrary1"){
				document.getElementById("sharelibrary2_hidden").style.display = "none";
				document.getElementById("library1_hidden").style.display = "none";
				document.getElementById("library2_hidden").style.display = "none";
				document.getElementById("sharelibrary1_hidden").style.display = "table-row-group";
			}else if(parameter1 == "sharelibrary2"){
				document.getElementById("sharelibrary1_hidden").style.display = "none";
				document.getElementById("library1_hidden").style.display = "none";
				document.getElementById("library2_hidden").style.display = "none";
				document.getElementById("sharelibrary2_hidden").style.display = "table-row-group";
			}
		}
	</script>
</body>
</html>
