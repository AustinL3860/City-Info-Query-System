<!DOCTYPE html>
 <html>
 <head>
<style>
.error {color: #FF0000;}
</style>
 <title>
Lab 6
 </title>
 </head>
 <body>

<!--<div style="background-color:pink;width:60%;margin:auto;text-align:center;">-->
<div style="width:60%;margin:auto;">
<h1>City Info Query System</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<p><span class="error">* required field.</span></p>

Query by: 
<select name="query">
  <option value="City" >City</option>
  <option value="State" >State</option>
  <option value="Income"  >Income</option>
</select> <br/><br/>

Type the State, City Name or Income that you want to search: <input type="text" name="search" 
value = ""
><span class="error">*
</span><br/><br/>
<input type=submit name="submit">
</form>
<hr/>

</div>

<?php

 
if(isset($_REQUEST["submit"]))
 {
  


    $CitiInfo = array
    (
     array("New York", "NY", 8008278,103246,12345),
     array("Los Angeles", "CA", 3694820,100000,12346),
     array("Chicago", "IL", 2896016,93591,12347),
     array("Houston", "TX", 1953631,98174,12348),
     array("Philadelphia", "PA", 1517550,91083,12349),
     array("Phoenix", "AZ", 1321045,83412,29874),
     array("San Diego", "CA", 1223400,99247,29875),
     array("Dallas", "TX", 1188580,90111,29876),
     array("San Antonio", "TX", 1144646,89925,29877),
     array("Detroit", "MI",951270,80188,29878)
    );





    function validate_input($input) 
    {
	$input = trim($input);
    $input = htmlspecialchars($input); 
    return $input;    
    } 

    $query = validate_input($_POST["query"]); 
    $search = validate_input($_POST["search"]);




    echo "<table border=1>";
    echo "<tr><td>City</td><td>State</td><td>Polulation</td><td>Income($)</td><td>Zipcode</td></tr>";
    
    $counter = 0;
    foreach ($CitiInfo as $city) 
    {



        if($query == "Income")
        {
            if($city[3] >= $search)
            {
                $counter++;
                echo "<tr>";
        
                foreach ($city as $info) 
                {
                    echo "<td>".$info."</td>";
        
                }
                echo "</tr>";
            }
            
        }


        if($query == "City" ) $i = 0;
        if($query == "State" ) $i = 1;
   
       
  


        
    
        if($search == $city[$i] ) 
        {
            $counter++;
            echo "<tr>";
    
            foreach ($city as $info) 
            {
                echo "<td>".$info."</td>";
    
            }
            echo "</tr>";
        }


  
    }
    
    echo "</table>";
    echo "There are " .$counter. " Result(s) found found<br/>";



}









?>
 </body>
 </html> 