<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Location</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #007bff;
    color: #fff;
    text-align: center;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

</style>
</head>
<body>
<div class="container">
    <h2>Add Location</h2>
    <form id="locationForm" method="post" action="save_location.php">
        <div class="form-group">
            <label for="locationName">Location Name:</label>
            <input type="text" id="locationName" name="locationName" required>
        </div>
        <button type="submit" class="btn">Add Location</button>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>
