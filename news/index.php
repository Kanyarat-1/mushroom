<?php
// Include configuration file
 require("../help/connect.php");

// Connect to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve data from the database
$sql = "SELECT * FROM ckeditor";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}
</style>
</head>
<body class="w3-light-grey">

 <!-- Header -->
 <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b>Mushroom Website</b></h1>
  </header>

  <!-- Image header -->
  <header class="w3-display-container w3-wide" id="home">
    <img class="w3-image" src="https://c.files.bbci.co.uk/25EC/production/_124180790_gettyimages-186590009.jpg" alt="Fashion Blog" width="1600" height="1060">
    <div class="w3-display-left w3-padding-large">
      <h1 class="w3-text-white">Welcome to the mushroom world</h1>
    </div>
  </header>

<?php
// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>

    <!-- Blog entries -->
    <div class="w3-col l8 s12">

            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large w3-center">

                <div class="w3-justify">
                    <p><strong><?= $row["content"] ?></strong></p>
                </div>
            </div>
            <hr>

    <!-- END BLOG ENTRIES -->
    </div>


     <!-- END About/Intro Menu -->
     </div>


  <!-- END GRID -->
  </div>
<?php
    }
} else {
    echo "0 results";
}
?>
<!-- Footer -->
<footer class="w3-container w3-dark-grey" style="padding:32px">
  <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
</footer>
</div>
<?php
// Close the connection
mysqli_close($conn);
?>

</body>
</html>