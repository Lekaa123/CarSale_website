
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	
	<style>
        body {
            background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
		
		body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Style the header */
h1 {
    text-align: center;
    color: #333;
}

/* Style the form container */
form {
    max-width: 400px;
    margin: 70px auto;
    background-color: #fff;
    padding: 18px;
    border-radius: 18px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style form labels */
label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 10px;
}

button {
    background-color: #3498DB ;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #3498DB ;
}

@media screen and (max-width: 600px) {
    form {
        width: 80%;
    }
}

    </style>
</head>
<body>

<center><img src="logo.png" width="350px" height="90px"></center>
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
