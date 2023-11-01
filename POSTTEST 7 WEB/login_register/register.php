<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: auto;
            background-color: #6f60ff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h2 {
            color: #333333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #F9FF5B;
            color: #333333;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .success-message {
            color: green;
            font-size: 14px;
        }

        button {
            background-color: #28a745;
            color: #ffffff;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function validateForm() {
            var nama = document.forms["registrationForm"]["nama"].value;
            var username = document.forms["registrationForm"]["username"].value;
            var email = document.forms["registrationForm"]["email"].value;
            var password = document.forms["registrationForm"]["password"].value;

            if (nama == "" || username == "" || email == "" || password == "") {
                alert("Semua kolom harus diisi!");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Form Registrasi</h2>
        <form name="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            onsubmit="return validateForm()">
            Nama Lengkap: <input type="text" name="nama"><br>
            Username: <input type="text" name="username"><br>
            Email: <input type="email" name="email"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Daftar">
        </form>

        <button onclick="window.location.href='login.php'">Login</button>
    </div>

    <?php
    include "../koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO tbakun (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password')";

        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }

        $koneksi->close();
    }
    ?>
</body>

</html>