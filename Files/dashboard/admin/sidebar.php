<style>
    .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    background-color: #2b303a;
    color: #fff;
    padding: 20px;
}

.content {
    margin-left: 250px; /* Adjust according to sidebar width */
    padding: 20px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #fff;
}

a:hover {
    color: #ccc;
}

</style>
<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="users.php">Users</a></li>
        <li><a href="products.php">Products</a></li>
        <!-- Add more sidebar items as needed -->
    </ul>
</div>
