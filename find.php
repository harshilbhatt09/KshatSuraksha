<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="find_css.css">
    </head>
    <body>
        <!-- NAVBAR STARTS FROM HERE  -->
        <header class="section-navbar">
            <!-- BRAND NAME -->
            <div class="container">
                <div class="navbar-brand">
        <a href="index.html" class="logo">क्षत Suraksha</a>
    </div>
        <!-- NAVBAR LIST -->
        <nav class="navbar">
            <ul class="navbar-list">
                <!-- <li><a href="#" class="navbarlink">HOME</a></li>
                <li><a href="#" class="navbarlink">MORE INFO.</a></li>
                <li><a href="#" class="navbarlink">GET HELP</a></li> -->

                <li><a href="new_login.html" class="btn navbar-btn">SIGN UP</a></li>
                <!-- <li><a href="new_login.html" class="btn navbar-btn">LOGIN</a></li> -->
            </ul>
        </nav>
        <!-- MOBILE-BUTTONS -->
        <!-- <div class="mobile-navabar-btn">
            <i class="fa-solid fa-bars" name="open"></i>
            <i class="fa-solid fa-xmark" name="close"></i>
        </div> -->
    </div>
    </header>
     <!-- NAVBAR ends FROM HERE  -->        

     <!-- MAIN PART STARTS FROM HERE -->
     <main>
        
        <div class="container flex-box">
            <div class="form">
                <h1>FIND THE DONOR HERE </h1>
                    <table class="table">
                     <form action="find.php" method="post">
                        
                            
                                <td>
                              <label for="blood group"></label>
                         
                        
                                <label for="blood-group">SELECT BLOOD-GROUP :</label>
                                <select name="blood" required>
                                    <option value="">Select blood type</option>
                                    <option value="A+">A+</option>
                                    <option value="O+">O+</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="A-">A-</option>
                                    <option value="O-">O-</option>
                                    <option value="B">B-</option>
                                    <option value="AB">AB-</option>
                                  </select>
                                </td></tr>
                              
                    
                     
                     
                                <tr><td>
                        <label for="textarea">ADDRESS</label>
                        <input type="text" name="area" id="n1" placeholder="ENTER YOUR AREA"></td>
                    </td></tr>

                    <tr><td>
                     <input type="submit" value="Search" />
                    </td></tr>
                    </form>
                    </table>
                </div>
                
                     <hr>
        <div class="result">
            <h1>STOCK AVAILABILITY</h1><br>

            <?php
            // Connect to your database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blood";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Handle form submission
                $address = $_POST['area']; // Assuming you are passing the address from the form
            
                // Construct SQL query to check if the address exists in the database
                $sql = "SELECT * FROM blood WHERE AREA = '$address'"; // Replace 'your_table' with your table name and 'address' with your column name
                echo "<table border='1' >
    <tr>
    <th>Name</th>
    <th>blood-type</th>
    <th>Address</th>
   
    </tr>";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
            <td>" . $row["FULL_NAME"] . "</td>
            <td>" . $row["BLOODGROUP"] . "</td>
            <td>" . $row["AREA"] . "</td> 
            </tr>";
                    }
                } else {
                    echo "No results found for the address: " . $address;
                }
            }
            ?>
        </div>
    </div>           
                    </main>            
     <!-- MAIN PART STARTS FROM HERE -->
        
        <script src="" async defer></script>
    </body>
</html>