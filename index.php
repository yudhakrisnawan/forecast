<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Forecast</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-info">
    <div class="limiter">
    <br><br><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <!-- <img class="col-lg-6 d-none d-lg-block bg-login-image" src="img/login.png"> -->
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Selamat datang!</h1>
                                        </div>
                                        <form action="" method="post" class="user validate-form">
                                            <div class="form-group validate-input" data-validate = "Email is required">
                                                <input type="text" name="username" class="form-control form-control-user" placeholder="Masukkan Email">
                                            </div>
                                            <div class="form-group validate-input" data-validate = "Password is required">
                                                <input type="password" name="password" class="form-control form-control-user" placeholder="Masukkan Password">
                                            </div>
                                            <button type="submit" name="login" class="btn btn-info btn-user btn-block">
                                                Login
                                            </button>
                                        </form>

                                        <?php
                                            if(isset ($_REQUEST['login'])){
                                                include("connection/koneksi.php");
                                                session_start();

                                                $username = $_POST["username"];
                                                $password = $_POST["password"];

                                                $select = mysqli_query($conn, "SELECT * FROM admin WHERE USERNAME='$username' && PASSWORD='$password'");
                                                $num = mysqli_num_rows($select);

                                                if ($num == 0) {
                                                ?>
                                                    <script>
                                                        alert("Username atau Password Salah !");
                                                        document.location = "index.php";
                                                    </script>
                                                <?php
                                                } else {
                                                    while ($data = mysqli_fetch_array($select)) {
                                                        $_SESSION["username"] = $data["username"];
                                                        $_SESSION["nama"] = $data["nama"];
                                                        $_SESSION['id_admin'] = $data['id_admin'];
                                                    }
                                                    header("location:beranda.php");
                                                }
                                            }
                                            ?> 
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
