<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .form-card {
    max-width: 1000px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 20px;
}

.form-card h2 {
    text-align: center;
    color: #6f60ff;
}

.form-card label {
    font-weight: bold;
    color: #6f60ff;
    display: block;
    margin-bottom: 5px;
}

.form-card input {
    width: calc(100% - 20px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.form-card input[type="date"] {
    width: 100%;
}

.form-card input[type="submit"] {
    background-color: #F9FF5B;
    color: #6f60ff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
}

.form-card input[type="submit"]:hover {
    background-color: #6f60ff;
    color: #fff;
}
    </style>
</head>
<body>
    <header>
        <button id="toggle-mode">Dark Mode</button>
        <h1>Bevanda Contemporanea</h1>
        <nav>
            <ul>
                <li><a href="index.php"><b>Home</b></a></li>
                <li><a href="form.php"><b>Form</b></a></li>
            </ul>
        </nav>
    </header>
    
    <div class="form-card">
        <h2>Data Minuman yang Diinput:</h2>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = $_POST["nama"];
                $deskripsi = $_POST["deskripsi"];
                $bahan = $_POST["bahan"];
                $langkah = $_POST["langkah"];
                $porsi = $_POST["porsi"];
                $tanggal_upload = $_POST["tanggal_upload"];

                echo "<p>Nama Minuman: $nama</p>";
                echo "<p>Deskripsi: $deskripsi</p>";
                echo "<p>Bahan: $bahan</p>";
                echo "<p>Lagkah-langkah: $langkah</p>";
                echo "<p>Porsi: $porsi</p>";
                echo "<p>Tanggal Upload: $tanggal_upload</p>";
            }
        ?>
    </div>

    <footer>
        <p>&copy; 2023 Resep Minuman Kekinian</p>
    </footer>
    <script>
        const toggleButton = document.getElementById('toggle-mode');
        const body = document.body;
    
        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('nav a');

            navItems.forEach(item => {
                item.addEventListener('mouseover', function() {
                    this.style.color = '#F9FF5B';
                });

                item.addEventListener('mouseout', function() {
                    this.style.color = '#6f60ff';
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const aboutLink = document.querySelector('a[href="#about"]');

            aboutLink.addEventListener('click', function(event) {
                event.preventDefault();
                alert('Menuju Informasi data diri developer');
                window.location.href = '#about';
            });
        });
    </script>
</body>
</html>
