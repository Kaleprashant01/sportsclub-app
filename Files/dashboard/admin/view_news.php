<?php
// Database connection parameters
include '../../../db_conn.php';

// Fetch all news articles from the database
$sql = "SELECT * FROM news";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View News</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style for table */
.table {
    width: 110%;
    margin-bottom: 1rem;
    color: #212529;
    border-collapse: collapse;
}

/* Style for table headings */
.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
   
    border-top: 2px solid #dee2e6;
}

/* Style for table header cells */
.table thead th {
    vertical-align: bottom;
    padding:35px;
    width:55px;
    border-bottom: 2px solid #dee2e6;
}

/* Style for table body cells */
.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}

/* Style for alternating rows */
.table tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

/* Style for image in table */
.table img {
    max-width: 100px;
    max-height: 100px;
}
.a1{
            padding: 10px 20px;
            background-color: #007bff; /* Blue background color */
            color: white; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }
		  .a1:hover {
            background-color: #0056b3; 
            color:white;
            text-decoration:none;/* Darker blue background color on hover */
        }
		.a2{
            padding: 10px 20px;
            background-color: red; /* Blue background color */
            color: white; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }
		  .a2:hover {
            background-color: darkred;
            color:white;
            text-decoration:none; /* Darker blue background color on hover */
        }
	
    </style>

</head>
<body>

<div class="container mt-5">
    <h2>View News</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Published Date</th>
                <th>Content</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['published_date'] . '</td>';
                    echo '<td>' . $row['content'] . '</td>';
                    echo '<td><img src="uploads/' . $row['image'] . '" style="max-width: 100px; max-height: 100px;" alt="News Image"></td>';
                    echo '<td>';

                    echo '<a class="a1" href="edit_news.php?id=' . $row['id'] . '">Edit</a> | ';
                    echo '<a class="a2" href="delete_news.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this news?\')">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3">No news articles found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Close database c
