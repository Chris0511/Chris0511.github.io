<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>

    .data-table {
        max-width: 1000px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 20px;
    }

    .data-table h2 {
        text-align: center;
        color: #6f60ff;
    }

    .data-table table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .data-table th, .data-table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    .data-table th {
        background-color: #6f60ff;
        color: #fff;
    }

    .data-table td img {
        max-width: 100px;
        max-height: 100px;
    }

    .data-table td a {
        text-decoration: none;
        color: #6f60ff;
        margin-right: 5px;
    }

    .data-table td a:hover {
        color: #F9FF5B;
    }

    .data-table td a img {
        width: 20px; 
        height: 20px; 
    }

    .tombol-tambah {
    background-color: #6f60ff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 1em;
    }

    #date-info-header {
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: right;
    }
    </style>
</head>
<body>
    <header>
    <button id="toggle-mode">Dark Mode</button>
    <div id="date-info-header">
        <span id="day-header"></span>
        <span id="date-header"></span>
        <span id="month-header"></span>
        <span id="year-header"></span>
        <span id="timezone-header"></span>
    </div>
        <h1>Bevanda Contemporanea</h1>
        <nav>
            <ul>
                <li><a href="index.php"><b>Home</b></a></li>
                <li><a href="form.php"><b>Form</b></a></li>
            </ul>
        </nav>
    </header>

    <div class="data-table">
        <h2>Data Minuman</h2>
        <table>
            <tr>
                <th>ID Minuman</th>
                <th>Nama Minuman</th>
                <th>Deskripsi</th>
                <th>Resep</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php
            include 'koneksi.php';

            $sql = "SELECT * FROM tbminuman";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["deskripsi"] . "</td>";
                    echo "<td><a href='resep/" . $row["resep"] . "' target='_blank'>Download Resep</a></td>";
                    echo "<td><img src='images/" . $row["gambar"] . "' alt='Gambar'></td>";
                    echo "<td><a href='edit.php?id=" . $row["id"] . "'><span>&#9998;</span></a> | <a href='proseshapus.php?id=" . $row["id"] . "'><span>&#128465;</span></a></td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }

            $koneksi->close();
            ?>
        </table>
        <button onclick="window.location.href='formAdd.php'" class="tombol-tambah">Tambah Data</button>
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

        document.addEventListener('DOMContentLoaded', function() {
        const dateInfoHeader = document.getElementById('date-info-header');
        const dayElementHeader = document.getElementById('day-header');
        const dateElementHeader = document.getElementById('date-header');
        const monthElementHeader = document.getElementById('month-header');
        const yearElementHeader = document.getElementById('year-header');
        const timezoneElementHeader = document.getElementById('timezone-header');

        const currentDateHeader = new Date();

        const daysOfWeekHeader = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const dayHeader = daysOfWeekHeader[currentDateHeader.getDay()];
        const dateHeader = currentDateHeader.getDate();
        const monthHeader = currentDateHeader.toLocaleString('default', { month: 'long' });
        const yearHeader = currentDateHeader.getFullYear();
        const timezoneHeader = Intl.DateTimeFormat().resolvedOptions().timeZone;

        dayElementHeader.textContent = dayHeader + ",";
        dateElementHeader.textContent = dateHeader;
        monthElementHeader.textContent = monthHeader;
        yearElementHeader.textContent = yearHeader;
        timezoneElementHeader.textContent = timezoneHeader;
});
    </script>
</body>
</html>
