<!DOCTYPE html>
<html>

<head>
    <title>View Records</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }

        h2 {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            margin: 0;
        }

        .records-container {
            max-width: 800px;
            margin: 15px auto;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .record {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: black;
        }

        .record-content {
            flex: 1;
        }

        .edit-delete-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        button.edit,
        button.save,
        button.delete {
            background-color: #3498DB ;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.edit:hover,
        button.save:hover,
        button.delete:hover {
            background-color: #3498DB ;
        }

        textarea {
            width: 100%;
            height: 80px;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
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
    <h2>Sale Records</h2>

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

    <div class="records-container">
        <?php
        // Read the content of the sales_record.txt file
        $records = file("sales_record.txt", FILE_IGNORE_NEW_LINES);

        // Display each record with an edit and delete button
        foreach ($records as $record) {
            echo "<div class='record'>
                    <div class='record-content'>$record</div>
                    <div class='edit-delete-buttons'>
                        <button class='edit' onclick='editRecord(this)'>Edit</button>
                        <button class='delete' onclick='deleteRecord(this)'>Delete</button>
                    </div>
                  </div>";
        }
        ?>

        <script>
            function editRecord(button) {
                // Get the text content of the record
                var recordText = button.parentNode.parentNode.querySelector('.record-content').textContent.trim();

                // Replace the current content with an editable textarea
                button.parentNode.parentNode.innerHTML = "<textarea rows='3'>" + recordText + "</textarea>" +
                    "<div class='edit-delete-buttons'>" +
                    "<button class='save' onclick='saveRecord(this)'>Save</button>" +
                    "&nbsp;&nbsp;" + // Add space between buttons
                    "<button class='delete' onclick='deleteRecord(this)'>Delete</button>" +
                    "</div>";
            }

            function saveRecord(button) {
                // Get the edited content from the textarea
                var editedContent = button.parentNode.previousElementSibling.value;

                // Replace the textarea and save button with the updated content
                button.parentNode.parentNode.innerHTML = "<div class='record-content'>" + editedContent + "</div>" +
                    "<div class='edit-delete-buttons'>" +
                    "<button class='edit' onclick='editRecord(this)'>Edit</button>" +
                    "&nbsp;&nbsp;" + // Add space between buttons
                    "<button class='delete' onclick='deleteRecord(this)'>Delete</button>" +
                    "</div>";
            }

            function deleteRecord(button) {
                // Remove the entire record div when delete button is clicked
                button.parentNode.parentNode.remove();
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
    </div>
</body>

</html>
