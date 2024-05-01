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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <!-- NAVBAR STARTS FROM HERE  -->
    <header class="section-navbar">
        <!-- BRAND NAME -->
        <div class="container">
            <div class="navbar-brand">
                <a href="index.html" class="logo" style="font-family: 'Times New Roman', Times, serif">क्षत Suraksha</a>
            </div>

        </div>
    </header>
    <!-- NAVBAR ends FROM HERE  -->

    <!-- MAIN PART STARTS FROM HERE -->
    <main>

        <div class="containerf flex-box">

            <div class="form">
                <h1>FIND THE DONOR HERE </h1>
                <table class="table">
                    <form action="find.php" method="post">


                        <td>
                            <label for="blood group"></label>


                            <label for="blood-group">BLOODGROUP</label>
                            <select name="blood">
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
                        </td>
                        </tr>




                        <tr>
                            <td>
                                <label for="textarea">ADDRESS</label>
                                <input type="text" name="area" id="n1" placeholder="Enter the area">
                            </td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="Search" />
                            </td>
                        </tr>
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
                    $address = $_POST['area'];
                    $blood = $_POST['blood']; // Assuming you are passing the address from the form
                    if ($blood == "") {
                        $sql = "SELECT * FROM blood WHERE AREA = '$address';";
                    } elseif ($address == null) {
                        $sql = "SELECT * FROM blood WHERE BLOODGROUP = '$blood';";
                    } else {
                        $sql = "SELECT * FROM blood WHERE AREA = '$address' AND BLOODGROUP = '$blood';";
                    }

                    // Construct SQL query to check if the address exists in the database
                    // $sql = "SELECT * FROM blood WHERE ((AREA = '$address' AND BLOODGROUP = '$blood') OR (AREA = '$address' AND BLOODGROUP = '') OR (BLOODGROUP = '$blood' AND AREA = ''));"; // Replace 'your_table' with your table name and 'address' with your column name
                    echo "
                    <style>
                    table{
                        margin-left: auto;
                        margin-right: auto;
                        width: 100%;
                        border-collapse: collapse;
                        
                    }
                    td, th{
                        padding: 4px;
                        text-align: center;
                        font-family: 'Poppins', sans-serif;
                        font-size: 15px;
                    }
                    </style>
                    <table border=1>
    <tr>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Address</th>
    <th>Phone Number</th>
   
    </tr>";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
            <td>" . $row["FULL_NAME"] . "</td>
            <td>" . $row["BLOODGROUP"] . "</td>
            <td>" . $row["AREA"] . "</td> 
            <td>" . $row["PHONE"] . "</td> 
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