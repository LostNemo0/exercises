<html>
  <head>
    <title>Form with PHP and MySQL</title>
  </head>
  <body>
    <form action="" method="post">
      <input type="text" name="a" placeholder="Enter first integer">
      <input type="text" name="b" placeholder="Enter second integer">
      <input type="text" name="c" placeholder="Enter string">
      <input type="submit" name="submit" value="Submit">
    </form>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "phpxform";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // Reverse string function
      function reverseString($c) {
        return strrev($c);
      }

      if (isset($_POST["submit"])) {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];
        $sum = $a + $b;

        // Insert data into table
        $sql = "INSERT INTO form_data (a, b, c, sum)
                VALUES ($a, $b, '$c', $sum)";

        if (mysqli_query($conn, $sql)) {
          echo "Data inserted successfully";
        } else {
          echo "Error inserting data: " . mysqli_error($conn);
        }

        // Retrieve previous data
        $prev_data = mysqli_query($conn, "SELECT * FROM form_data ORDER BY id DESC LIMIT 1,1");
        while ($row = mysqli_fetch_array($prev_data)) {
          echo "<br>Previous a: " . $row["a"];
          echo "<br>Previous b: " . $row["b"];
          echo "<br>Previous sum: " . $row["sum"];
        }

        // Reverse previous string
        $prev_string = reverseString($c);
        echo "<br>Reversed previous string: " . $prev_string;
      }
    ?>
  </body>
</html>
