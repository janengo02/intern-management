<?php include 'style.css'; ?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="UTF-8">
        <title>Intern Management System - Login</title>
    </head>
</head>

<body>
    <div class="pageTitle"><b>LOG IN</b></div>
    <div class="login">
        <form action="../login/login_db.php" method="POST" autocomplete="off">
            <label>Email</label><br>
            <input type="text" name="email" id="email" placeholder="xyz@jg-corppration.com" />
            <br><br>
            <label>Password</label><br>
            <input type="password" name="password" id="email" placeholder="********" /><br />
            <br>
            <button type="submit" name="loginbtn" id="loginbtn" class="btn btn-outline-dark">Log In</button>
        </form>
    </div>
</body>
<!-- =========================================================================== -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</html>