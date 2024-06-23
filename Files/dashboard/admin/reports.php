<!DOCTYPE html>
<html>
<head>
	<title>Generate Report</title>
	<style>
        body {
    font-family: Arial, sans-serif;
}

form {
    margin-top: 50px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="date"],
select {
    display: block;
    margin-bottom: 20px;
    padding: 8px;
}

button[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
	<h2>Generate Report</h2>
	<form action="generate_report.php" method="post">
		<label for="from_date">From Date:</label>
		<input type="date" id="from_date" name="from_date" required>
		<label for="to_date">To Date:</label>
		<input type="date" id="to_date" name="to_date" required>
		<label for="year">Year:</label>
		<select id="year" name="year">
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
		</select>
		<button type="submit" name="generate_report">Generate Report</button>
	</form>
</body>
</html>