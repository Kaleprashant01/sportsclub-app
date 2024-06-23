<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Club Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="js/sweetalert.js"></script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
    { 
        ?>
            <script>
                swal({
  title: "<?php echo $_SESSION['status'];?>",
 // text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "OK",
});
            </script>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <!--<script>
        swal("Good job!", "You clicked the button!", "success");
    </script>-->
  <body>
  <footer class="footer bg-dark text-white fixed-bottom">
        <div class="container text-center">
            <span>&copy; <?php echo date("Y"); ?> Sports Club Booking Portal</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>  
</head>
</html>
