<?php
session_start();
  if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $password ="";
    $erros = [];
    if (empty($_POST['email'])){
        $erros['email']['require'] = 'Email bắt buộc phải nhập';
    }
    else {
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $erros['email']['email']= 'Email không hợp lệ';
      }
      else{
        $email = $_POST['email'];
        $_SESSION['email']= $email;
      }
    }

    if (empty($_POST['password'])){
      $erros['password']['require'] = 'Mật khẩu bắt buộc phải nhập';
    }
    else{
      $password = $_POST['password'];
      $_SESSION['password']= $password;
    }

    if ($email !="" && $password !=""){
      header('location: index.php');
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">
<form action="login.php" method="post">
<p>
        Email<br/>
        <input type="text" name="email" placeholder="Email ..." value="<?php echo !empty($_POST['email'])?$_POST['email']:false;?>"><br/>
        <?php
            echo !empty($erros['email'])?'<span style="color:red">'.reset($erros['email']).'</span>':'';
        ?>
        
    </p>
    <p>
        Email<br/>
        <input type="password" name="password" placeholder="password..." value="<?php echo !empty($_POST['password'])?$_POST['password']:false;?>"><br/>
        <?php
            echo !empty($erros['password'])?'<span style="color:red">'.reset($erros['password']).'</span>':'';
        ?>
    </p>
    <button type="submit">Submit</button>
</form>
</div>

</body>
</html>

