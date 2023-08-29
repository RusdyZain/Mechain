<?php
session_start();
include "../conn_db/db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: ../login/admin.php?error=Email is required");
        exit();
    } else if (empty($pass)) {
        header("Location: ../login/admin.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE email='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $uname && $row['password'] === $pass) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: ../users/admin.php");
                exit();
            } else {
                header("Location: ../login/Admin.php?error=Incorect Email or password");
                exit();
            }
        } else {
            header("Location: ../login/Admin.php?error=Incorect Email or password");
            exit();
        }
    }

} else {
    header("Location: ../login/Admin.php");
    exit();
}