<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Login Form</title>

	<style>
		body{
			margin: 0;
			padding: 0;
			font-family:montserrat;
			height: 100vh;
			overflow: hidden;
			background-image:  url(asset/images/profile-bg.jpg);
		}
		.center{
			position: absolute;
			top : 50%;
			left :50%;
			transform: translate(-50%, -50%);
			width: 400px;
			background: white;
			border-radius: 10px;
		}
		.center h1{
			text-align: center;
			padding: 0 0 20px 0;
			border-bottom: 1px solid silver; 
		}
		.center form{
			padding: 0 40px;
			box-sizing: border-box;
		}
		form .txt_field{
			position: relative;
			border-bottom: 2px solid #adadad;
			margin: 30px 0;
		}
		.txt_field input{
			width: 100%;
			padding: 0 5px;
			height: 40px;
			font-size:16px;
			 border: none;
			background: none;
			outline: none;

		}
		.txt_field label{
			position: absolute;
			top:50%;
			left:5px;
			color:#adadad;
			transform:translateY(-50%);
			font-size:16px;
			pointer-events:none;
			transition: .5s;
		}
		.txt_field span::before{
			content:'';
			position: absolute;
			top: 40px;
			left:0;
			width: 0%;
			height:2px;
			background: #2691d9;
			transition: .5s;
		}
		.txt_field input:focus ~ label,
		.txt_field input:valid ~ label{
			top: -5px;
			color :#2691d9
		}
		.txt_field input:focus ~ span::before,
		.txt_field input:valid ~ span::before{
			width: 100%;
		}
		input[type="submit"]{
			width:100%;
			height:50px;
			border: 1px solid;
			background:#2691d9;
			border-radius: 25px;
			font-size: 18px;
			color: #e9f4fb;
			font-weight: 700;
			cursor: pointer;
			outline: none;
			margin-bottom: 25px;
		}
		input[type="submit"]::hover{
			border-color: #2691d9;
			transition:.5s;
		
		}
	</style>
	<?php
		$success = "";
		$error  = "";
		$username = "";
		$password = "";
	 	$koneksi = mysqli_connect("localhost","root","","login");

		 if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST["password"];
			if ($username && $password) {
				$sql1 = mysqli_query($koneksi, "select * from masuk where username ='$username'and password = '$password'");
				if ($sql1->num_rows>0) {
					$this->load->view('Beranda');
					exit();
				}else {
					$error = "Maaf Password atau Username Anda salah";
				}
			}else{
				$error = 'Masukkan Username dan Password Anda!';
			}
		}
	?>
</head>
<body>
	<div class="center">
	<?php if ($error) {
    	?>
			<div class="alert alert-danger" role="alert">
				<?php echo $error?>
			</div>
		<?php
			header("refresh:5;url=index.php");//5=detik
		}
    ?>
    <?php if ($success) {
        ?>
            <div class="alert alert-success" role="alert">
            	<?php echo $success?>
            </div>
        <?php
    	header("refresh:5;url=index.php");//5=detik
        }
    ?>
		<h1>Login</h1>
		<form method="POST">
			<div class="txt_field">
				<input type="text" required name = "username" value="<?php echo $username ?>" required>
				<span></span>
				<label >Username</label>
			</div>
			<div class="txt_field">
				<input type="password" required name = "password" value="<?php echo $password ?>" required>
				<span></span>
				<label >Password</label>
			</div>
	
			<input type="submit" value="Login" name="submit">
		</form>
	</div>
</body>
</html>