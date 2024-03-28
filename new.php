<?php 
// print_r($_POST);

// include('database_connection.php');
include ('function.php');
if ($_POST['rtype']=='user'){
     $a = $_POST['type'];
     $c = get_user_id($connect,$a);  
     if ($_POST['type1'] != '' and  $_POST['type2'] != ''){
          $a = $_POST['type1'];
          $b = $_POST['type2'];
          $query = 'SELECT * FROM guest_table where user_id ='.$c.' and doc between "'.$a.'" and "'.$b.'" order by doc';
     }
     elseif($_POST['type1'] != '' and  $_POST['type2'] == ''){
          $a = $_POST['type1'];
          $query = 'SELECT * FROM guest_table where user_id ='.$c.' and doc = "'.$a.'"';

     }
     elseif($_POST['type1'] == '' and  $_POST['type2'] != ''){
          $b = $_POST['type2'];
          $query = 'SELECT * FROM guest_table where user_id ='.$c.' and doc = "'.$b.'"';

     }
     else{
          $query = 'SELECT * FROM guest_table where user_id ='.$c.'';
     }
//echo $query; 
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Report</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1400px;">  
                <h2 align="center"></h2>  
                <h3 align="center">USER REPORT</h3>                 
                <br />  
                <!-- <form method="post" action="export.php" align="center">  
                     <input type="submit" name="export" value="Export CSV" class="btn btn-success" />  
                </form>   -->
                <button class="btn btn-success" id="download-button">Download CSV</button>
                <br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Agent Name</th>  
                               <th width="5%">Hotel Name</th>
                               <th width="5%">Guest Name</th>  
                               <th width="5%">Check In</th>  
                               <th width="5%">Check Out</th>  
                               <th width="5%">Rooms</th>
                               <th width="5%">Bed</th>  
                               <th width="5%">Meal</th> 
                               <th width="5%">Purchase rate</th>  
                               <th width="5%">Sale Rate</th>  
                               <th width="5%">Profit</th> 
                               <th width="5%">Date of creation</th>  
                          </tr> 
                          
                          
                          <script type="text/javascript">

	function downloadCSVFile(csv, filename) {
	    var csv_file, download_link;

	    csv_file = new Blob([csv], {type: "text/csv"});

	    download_link = document.createElement("a");

	    download_link.download = filename;

	    download_link.href = window.URL.createObjectURL(csv_file);

	    download_link.style.display = "none";

	    document.body.appendChild(download_link);

	    download_link.click();
	}

		document.getElementById("download-button").addEventListener("click", function () {
		    var html = document.querySelector("table").outerHTML;
			htmlToCSV(html, "data.csv");
		});


		function htmlToCSV(html, filename) {
			var data = [];
			var rows = document.querySelectorAll("table tr");
					
			for (var i = 0; i < rows.length; i++) {
				var row = [], cols = rows[i].querySelectorAll("td, th");
						
				 for (var j = 0; j < cols.length; j++) {
				        row.push(cols[j].innerText);
		                 }
				        
				data.push(row.join(","));		
			}

			//to remove table heading
			//data.shift()

			downloadCSVFile(data.join("\n"), filename);
		}

	</script>
                     <?php  
                     foreach($result as $row)  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["agent"]; ?></td>  
                               <td><?php echo $row["hotel_name"]; ?></td>
                               <td><?php echo $row["guest_name"]; ?></td>  
                               <td><?php echo '"'.$row["chk_in"].'"'; ?></td>  
                               <td><?php echo '"'.$row["chk_out"].'"'; ?></td>  
                               <td><?php echo $row["rooms"]; ?></td>  
                               <td><?php echo $row["bed"]; ?></td> 
                               <td><?php echo $row["meal"]; ?></td> 
                               <td><?php echo $row["prate"]; ?></td> 
                               <td><?php echo $row["srate"]; ?></td> 
                               <td><?php echo $row["profit"]; ?></td>
                               <td><?php echo '"'.$row["doc"].'"'; ?></td>    
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <?php
}
?>
<?php
if ($_POST['rtype']=='hotel_name'){
    $c = $_POST['type'];
    if ($_POST['type1'] != '' and  $_POST['type2'] != ''){
     $a = $_POST['type1'];
     $b = $_POST['type2'];
     $query = 'SELECT * FROM guest_table where hotel_name = "'.$c.'" and doc between "'.$a.'" and "'.$b.'" order by doc';
}
elseif($_POST['type1'] != '' and  $_POST['type2'] == ''){
     $a = $_POST['type1'];
     $query = 'SELECT * FROM guest_table where hotel_name = "'.$c.'" and doc = "'.$a.'"';

}
elseif($_POST['type1'] == '' and  $_POST['type2'] != ''){
     $b = $_POST['type2'];
     $query = 'SELECT * FROM guest_table where hotel_name = "'.$c.'" and doc = "'.$b.'"';

}
else{
     $query = 'SELECT * FROM guest_table where hotel_name = "'.$c.'"';
}
//$query = 'SELECT * FROM guest_table where hotel_name ="'.$a.'"';
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Report</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1400px;">  
                <h2 align="center"></h2>  
                <h3 align="center">Hotel REPORT</h3>                 
                <br /> 
                
                <button class="btn btn-success" id="download-button">Download CSV</button>  
                <br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Agent Name</th>  
                               <th width="5%">Guest Name</th>  
                               <th width="5%">Check In</th>  
                               <th width="5%">Check Out</th>  
                               <th width="5%">Rooms</th>
                               <th width="5%">Bed</th>  
                               <th width="5%">Meal</th> 
                               <th width="5%">Purchase rate</th>  
                               <th width="5%">Date of creation</th>  
                          </tr>  


                          <script type="text/javascript">

function downloadCSVFile(csv, filename) {
    var csv_file, download_link;

    csv_file = new Blob([csv], {type: "text/csv"});

    download_link = document.createElement("a");

    download_link.download = filename;

    download_link.href = window.URL.createObjectURL(csv_file);

    download_link.style.display = "none";

    document.body.appendChild(download_link);

    download_link.click();
}

     document.getElementById("download-button").addEventListener("click", function () {
         var html = document.querySelector("table").outerHTML;
          htmlToCSV(html, "data.csv");
     });


     function htmlToCSV(html, filename) {
          var data = [];
          var rows = document.querySelectorAll("table tr");
                    
          for (var i = 0; i < rows.length; i++) {
               var row = [], cols = rows[i].querySelectorAll("td, th");
                         
                for (var j = 0; j < cols.length; j++) {
                       row.push(cols[j].innerText);
                      }
                       
               data.push(row.join(","));		
          }

          //to remove table heading
          //data.shift()

          downloadCSVFile(data.join("\n"), filename);
     }

</script>      
                     <?php  
                     foreach($result as $row)  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["agent"]; ?></td>  
                               <td><?php echo $row["guest_name"]; ?></td>  
                               <td><?php echo $row["chk_in"]; ?></td>  
                               <td><?php echo $row["chk_out"]; ?></td>  
                               <td><?php echo $row["rooms"]; ?></td>  
                               <td><?php echo $row["bed"]; ?></td> 
                               <td><?php echo $row["meal"]; ?></td> 
                               <td><?php echo $row["prate"]; ?></td> 
                               <td><?php echo $row["doc"]; ?></td>    
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div> 
              
      </body>  
 </html>  
 <?php
}
?>
<?php
if ($_POST['rtype']=='agent'){
    $c = $_POST['type'];

if ($_POST['type1'] != '' and  $_POST['type2'] != ''){
      $a = $_POST['type1'];
      $b = $_POST['type2'];
      $query = 'SELECT * FROM guest_table where agent ="'.$c.'" and doc between "'.$a.'" and "'.$b.'" order by doc';
 }
 elseif($_POST['type1'] != '' and  $_POST['type2'] == ''){
      $a = $_POST['type1'];
      $query = 'SELECT * FROM guest_table where agent ="'.$c.'" and doc = "'.$a.'"';
 
 }
 elseif($_POST['type1'] == '' and  $_POST['type2'] != ''){
      $b = $_POST['type2'];
      $query = 'SELECT * FROM guest_table where agent ="'.$c.'" and doc = "'.$b.'"';
 
 }
 else{
      $query = 'SELECT * FROM guest_table where agent ="'.$c.'"';
 }
    //$query = 'SELECT * FROM guest_table where agent ="'.$a.'"';
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Report</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1400px;">  
                <h2 align="center"></h2>  
                <h3 align="center">Agent REPORT</h3>                 
                <br />  
                <button class="btn btn-success" id="download-button">Download CSV</button>  
                <br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Hotel Name</th>  
                               <th width="5%">Guest Name</th>  
                               <th width="5%">Check In</th>  
                               <th width="5%">Check Out</th>  
                               <th width="5%">Rooms</th>
                               <th width="5%">Bed</th>  
                               <th width="5%">Meal</th> 
                               <th width="5%">Purchase rate</th>
                               <th width="5%">Sale rate</th>  
                               <th width="5%">Date of creation</th>  
                          </tr>  



                          <script type="text/javascript">

function downloadCSVFile(csv, filename) {
    var csv_file, download_link;

    csv_file = new Blob([csv], {type: "text/csv"});

    download_link = document.createElement("a");

    download_link.download = filename;

    download_link.href = window.URL.createObjectURL(csv_file);

    download_link.style.display = "none";

    document.body.appendChild(download_link);

    download_link.click();
}

     document.getElementById("download-button").addEventListener("click", function () {
         var html = document.querySelector("table").outerHTML;
          htmlToCSV(html, "data.csv");
     });


     function htmlToCSV(html, filename) {
          var data = [];
          var rows = document.querySelectorAll("table tr");
                    
          for (var i = 0; i < rows.length; i++) {
               var row = [], cols = rows[i].querySelectorAll("td, th");
                         
                for (var j = 0; j < cols.length; j++) {
                       row.push(cols[j].innerText);
                      }
                       
               data.push(row.join(","));		
          }

          //to remove table heading
          //data.shift()

          downloadCSVFile(data.join("\n"), filename);
     }

</script>      
                     <?php  
                     foreach($result as $row)  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["hotel_name"]; ?></td>  
                               <td><?php echo $row["guest_name"]; ?></td>  
                               <td><?php echo $row["chk_in"]; ?></td>  
                               <td><?php echo $row["chk_out"]; ?></td>  
                               <td><?php echo $row["rooms"]; ?></td>  
                               <td><?php echo $row["bed"]; ?></td> 
                               <td><?php echo $row["meal"]; ?></td> 
                               <td><?php echo $row["prate"]; ?></td>
                               <td><?php echo $row["srate"]; ?></td> 
                               <td><?php echo $row["doc"]; ?></td>    
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <?php
}
?>
<?php
if ($_POST['rtype']=='month'){
    $a = $_POST['type1'];
    $b = $_POST['type2'];
$query = 'SELECT * FROM guest_table where doc between "'.$a.'" and "'.$b.'" order by doc';
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Report</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1400px;">  
                <h2 align="center"></h2>  
                <h3 align="center">MONTH REPORT</h3>                 
                <br /> 
                
                <button class="btn btn-success" id="download-button">Download CSV</button>  
                <br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Agent Name</th> 
                               <th width="5%">Hotel Name</th> 
                               <th width="5%">Guest Name</th>  
                               <th width="5%">Check In</th>  
                               <th width="5%">Check Out</th>  
                               <th width="5%">Rooms</th>
                               <th width="5%">Bed</th>  
                               <th width="5%">Meal</th> 
                               <th width="5%">Purchase rate</th> 
                               <th width="5%">Sale rate</th>  
                               <th width="5%">Date of creation</th>  
                          </tr>
                     
                          <script type="text/javascript">

function downloadCSVFile(csv, filename) {
    var csv_file, download_link;

    csv_file = new Blob([csv], {type: "text/csv"});

    download_link = document.createElement("a");

    download_link.download = filename;

    download_link.href = window.URL.createObjectURL(csv_file);

    download_link.style.display = "none";

    document.body.appendChild(download_link);

    download_link.click();
}

     document.getElementById("download-button").addEventListener("click", function () {
         var html = document.querySelector("table").outerHTML;
          htmlToCSV(html, "data.csv");
     });


     function htmlToCSV(html, filename) {
          var data = [];
          var rows = document.querySelectorAll("table tr");
                    
          for (var i = 0; i < rows.length; i++) {
               var row = [], cols = rows[i].querySelectorAll("td, th");
                         
                for (var j = 0; j < cols.length; j++) {
                       row.push(cols[j].innerText);
                      }
                       
               data.push(row.join(","));		
          }

          //to remove table heading
          //data.shift()

          downloadCSVFile(data.join("\n"), filename);
     }

</script>      
                     <?php  
                     foreach($result as $row)  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["agent"]; ?></td>  
                               <td><?php echo $row["hotel_name"]; ?></td>
                               <td><?php echo $row["guest_name"]; ?></td>  
                               <td><?php echo $row["chk_in"]; ?></td>  
                               <td><?php echo $row["chk_out"]; ?></td>  
                               <td><?php echo $row["rooms"]; ?></td>  
                               <td><?php echo $row["bed"]; ?></td> 
                               <td><?php echo $row["meal"]; ?></td> 
                               <td><?php echo $row["prate"]; ?></td> 
                               <td><?php echo $row["srate"]; ?></td>
                               <td><?php echo $row["doc"]; ?></td>    
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div> 
              
      </body>  
 </html>  
 <?php
}
?>



<form action="report.php" align="center">  
                     <input type=button name="back" onClick="parent.location='report.php'" value="back" class="btn btn-success" />
                       
                </form>


               