<!DOCTYPE html>
<html>

<head>
    <title>Car Sale Record Form</title>
    <style>
        /* Reset some default styles */
        body,
        h2,
        form {
            margin: 0;
            padding: 0;
        }

        /* Style the body */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff; /* Set text color to contrast with the background */
            margin: 0;
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }

        /* Style the header */
        h2 {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5); /* Add a semi-transparent black background to the header */
        }

        /* Style the form container */
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style form labels */
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        /* Style form inputs */
        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style the submit button */
        button {
            background-color: #3498DB ;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Add hover effect to the button */
        button:hover {
            background-color: #3498DB ;
        }

        /* Style the sidebar */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            background-color: #333;
            padding-top: 20px;
            overflow-x: hidden;
            transition: 0.5s;
        }

        .sidebar a {
            padding: 16px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            text-align: center;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        /* Add a button to open/close the sidebar */
        #toggleSidebarBtn {
            font-size: 20px;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px;
            position: fixed;
            top: 20px;
            left: 20px;
        }
    </style>
</head>

<body>
    <h2>Car Sale Record Form</h2>
    <!-- Button to open/close the sidebar -->
    <button id="toggleSidebarBtn" onclick="toggleSidebar()">☰</button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
   
        <br><br>
        <a href="sale_form.php">Sales Form</a>
        <br>
        <a href="sales_record.php">View Records</a>
        <br>
        <a href="login.php">Logout</a>
    </div>

    <form action="process_sale.php" method="post" id="saleForm">
        <label for="carModel">Car Model:</label>
        <select id="carModel" name="carModel" onchange="updatePrice()">
            <option value="G-Class">G-Class</option>
            <option value="GLB">GLB</option>
            <option value="AMG GT">AMG GT</option>
            <option value="CLA">CLA</option>
            <option value="GLE Coupe">GLE Coupe</option>
        </select>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required onchange="updatePrice()">
        <br>
        <label for="price">Price per Car:</label>
        <input type="text" id="price" name="price" readonly>
        <br>
        <label for="totalPrice">Total Price:</label>
        <input type="text" id="totalPrice" name="totalPrice" readonly>
        <br>
        <button type="submit">Submit Sale</button>
    </form>

    <script>
        function updatePrice() {
            var carModel = document.getElementById('carModel').value;
            var quantity = document.getElementById('quantity').value;
            var price;

            // Set the price based on the selected car model
            switch (carModel) {
                case 'G-Class':
                    price = 200000;
                    break;
                case 'GLB':
                    price = 150000;
                    break;
                case 'AMG GT':
                    price = 400000;
                    break;
                case 'CLA':
                    price = 250000;
                    break;
                case 'GLE Coupe':
                    price = 350000;
                    break;
                default:
                    price = 0;
                    break;
            }

            document.getElementById('price').value = price;

            // Calculate total price
            var totalPrice = quantity * price;
            document.getElementById('totalPrice').value = totalPrice;
        }

        // Function to open/close the sidebar
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var toggleBtn = document.getElementById("toggleSidebarBtn");

            if (sidebar.style.width === "0px" || sidebar.style.width === "") {
                sidebar.style.width = "200px";
                toggleBtn.innerHTML = "✕";
            } else {
                sidebar.style.width = "0";
                toggleBtn.innerHTML = "☰";
            }
        }
    </script>
</body>

</html>
