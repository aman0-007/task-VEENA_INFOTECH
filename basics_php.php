<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            PHP BASICS
        </title>
    </head>

    <body>
        <h1> PHP Basics</h1>

        <?php 
        $fname = "Aman";
        $lname = " Dwivedi";
        $age = 20;
        echo "Name: $fname $lname, Age: $age";
        ?>

        <h2>Form GET/POST</h2>
        <form method="POST">
            <label for="name">Enter your name:</label>
            <input type="text" name="form_name" id="name">
            <button type="submit">Submit</button>
        </form>

        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_name'])) {
            $formName = $_POST['form_name'];
            echo "Name entered is, $formName!!";
        }
        ?>

        <h2>Condition/Loop</h2>
        <?php
        $age = 20;
        if ($age >= 18) {
            echo "Eligible to Vote<br>";
        } else {
            echo "Not Eligible to Vote.<br>";
        }

        echo "Table of 5:<br>";
        for ($i = 1; $i <= 10; $i++) {
            $product = 5*$i;
            echo "5*$i=$product<br>";
        }
        ?>

        <h2> Functions </h2>
        <?php
        function sayHello($name) {
            return "Namaste, $name!!";
        }

        echo sayHello("Aman");
        ?>

        <h2> Database </h2>
        <?php
        $server = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($server, $username, $password);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully!!!";

        ?>

        <h2> Session/cookie</h2>

        <?php
        session_start();

        $_SESSION['username'] = "Aman";
        echo "Session username set as :" . $_SESSION['username'] . "<br>";

        setcookie("username2", "AMAN", time() + (86400 * 30), "/");

        if(isset($_COOKIE['username2'])) {
            echo "Cookie Value: " . $_COOKIE['username2'] . "<br>";
        }
        ?>

        <h2>File Handling</h2>

        <?php
        $file = "demo.txt";

        $fileHandling = fopen($file, "w");
        fwrite($fileHandling, "Hello, I am Aman!!!");
        fclose($fileHandling);

        echo "File created and written successfully!!";

        $fileHandling = fopen($file, "r");
        $fileContent = fread($fileHandling, filesize($file));
        fclose($fileHandling);

        echo "file content: $fileContent<br>";
        ?>

        <h2>Ajax</h2>

        <button onclick="fetchData()">Fetch Data</button>
        <div id="result"></div>

        <script>
            function fetchData() {
                const xhr =  new XMLHttpRequest();
                xhr.open('GET', "?ajax=1", true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById("result").innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            }
        </script>

        <?php
        if(isset($_GET['ajax']) && $_GET['ajax'] == 1) {
            echo "Data Fetched!!";
            exit;
        }
        ?>
    </body>
</html>