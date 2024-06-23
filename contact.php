<?php include "menu.php";?>

<section class="my-5">
    <div class="py-5">
        <h2 class="text-center">Contact Us</h2>
    </div>
    <div class="w-50 m-auto">
        <form action="userinfo.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="user" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Mobile No.</label>
                <input type="number" class="form-control" name="mobile" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Comment</label>
                <textarea name="comment" id="" cols="30" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</section>
<?php include "footer.php";?>