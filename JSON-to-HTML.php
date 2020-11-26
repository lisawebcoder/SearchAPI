<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">   
<head>
<title>InformationSearch</title>
 <link rel="icon" href="favicon.ico">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<center><strong><h2>WELCOME TO InformationSearch</br>SEARCH FOR ANYTHING</h2></strong>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width", intial-scale=1.0"><head>
<style type="text/css">
body {
    background-color: lightblue;
}
/*Style for Table*/
table, th , td {
border: 1px solid grey;
border-collapse: collapse;
padding: 4px;
font-family: arial;
}
/*Style for Table Header*/
th {
background: darkblue;
color: white;
text-align: left;
}
/*Style for Alternate Rows*/
table tr:nth-child(odd) {
background-color: #C2EBC3;
}
table tr:nth-child(even) {
background-color: #FFFFFF;
}
</style>
</head>

<body id="body">

<?php
$url= 'https://www.gigablast.com/search?c=main&qlangcountry=en-us&q=nfl&qtuh=1680917223&format=json';

$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  

$str_data  = file_get_contents($url, false, stream_context_create($arrContextOptions));




/*Fetching JSON file content using php file_get_contents method*/
//$str_data = file_get_contents("emp_records.json");
//$str_data = file_get_contents("http://www.gigablast.com/search?c=main&qlangcountry=en-us&q=nfl&qtuh=1680917223&format=json");
$data = json_decode($str_data, true);
 
/*Initializing temp variable to design table dynamically*/
$temp = "<table>";
 
/*Defining table Column headers depending upon JSON records*/
//$temp .= "<tr><th>Employee Name</th>";
//$temp .= "<th>Designation</th>";
//$temp .= "<th>Company</th>";
//$temp .= "<th>Mobile Number</th></tr>";
$temp .= "<tr><th>site</th>";
$temp .= "<th>Title</th>";
$temp .= "<th>htmlSum</th>";
//$temp .= "<th>URL</th></tr>";
 
/*Dynamically generating rows & columns*/
//for($i = 0; $i < sizeof($data["employees"]); $i++)
for($i = 0; $i < sizeof($data["results"]); $i++)
{
$temp .= "<tr>";
//$temp .= "<td>" . $data["employees"][$i]["empName"] . "</td>";
//$temp .= "<td>" . $data["employees"][$i]["designation"] . "</td>";
//$temp .= "<td>" . $data["employees"][$i]["company"] . "</td>";
//$temp .= "<td>" . $data["employees"][$i]["mob"] . "</td>";
$temp .= "<td>" . $data["results"][$i]["site"] . "</td>";
$temp .= "<td>" . $data["results"][$i]["title"] . "</td>";
$temp .= "<td>" . $data["results"][$i]["htmlSum"] . "</td>";
//$temp .= "<td>" . $data["results"][$i]["url"] . "</td>";
$temp .= "</tr>";
}
//https://jharaphula.com/data-json-to-html-table-php/ 
/*End tag of table*/
$temp .= "</table>";
 
/*Printing temp variable which holds table*/
echo $temp;
?>


</body>
</html>