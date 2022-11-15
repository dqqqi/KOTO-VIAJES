<?php 
session_start();
require './database.php';
// if(isset($_SESSION['user_id'])){
//     header('Location ./home.php');
// }
if(isset($_SESSION['user_id'])){
    $records=$conn->prepare('SELECT id, email, password, name FROM users WHERE id= :id');
    $records->bindParam(':id',$_SESSION['user_id']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);
    $user=null;
    if(count($results)>0){
      $user=$results;
      header('Location ./start.php');
    }
  }
  
$message='';
if ( !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) ){
$sql="INSERT INTO users (email,password,name) VALUES(:email, :password, :name)";
$stmt= $conn->prepare($sql);
$stmt->bindParam(':email',$_POST['email'] );
$stmt->bindParam(':name',$_POST['name'] );
$password= password_hash($_POST['password'],PASSWORD_BCRYPT);
$stmt->bindParam(':password',$password);
if($stmt->execute()){
    $message='Succesfully created new user';
}
else {
    $message='Cant create new user';
}
}
if (!empty($_POST['emailf']) && !empty($_POST['passwordf'])){
$records=$conn->prepare('SELECT id, email, password, name FROM users WHERE email=:emailf');
$records->bindParam(':emailf', $_POST['emailf']);
$records->execute();
$results=$records->fetch(PDO::FETCH_ASSOC);
$message='';
if(count($results)>0 && password_verify($_POST['passwordf'], $results['password'])){
    $_SESSION['user_id'] = $results['id'];
    header("Location: ./start.php");
}
else{
    $message='User or password incorrect';
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--fuentes e iconos-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
     <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@700&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Qwitcher+Grypen:wght@700&display=swap" rel="stylesheet">
     <!--Estilos-->
    <link href="../CSS/login.css" rel="stylesheet">
    <title>Log-in|KOTO</title>
</head>
<body>
    <ul class="navbar1" id="nav1">
        <li><div class="logoint"><i class='bx bxl-kickstarter'></i><i class='bx bxs-up-arrow-circle'></i><i class='bx bxs-plane'></i><i class='bx bxs-smile'></i></div></li>
        <li><div class="btn2"><div class="btn1">Descargar app</div></div></li>
        
      
      </ul>
    <!--Sign-up-->
    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a KOTO</h2>
                <p>Si posee una cuenta, inicie su sesión acá</p>
                <button class="sign-up-btn">Iniciar sesión</button>
                <?php if(!empty($message)):?>
                <br><p class="grande"><?= $message?></p>
                <?php endif; ?>
            </div>
        </div>
        <form action="index.php" method="post" class="formulario">
            <h2 class="create-account">CREACIÓN</h2>
            <p class="cuenta-gratis">Crear una cuenta gratuitamente</p>
            
            <input type="text" name="name" placeholder="Nombre">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="password" name="confirm_password" placeholder="Confirme su contraseña">
            <input type="submit" value="Registrarse">
           
        </form>
    </div>
<!--Sign-in-->
<div class="container-form sign-in">
    <form action="index.php" method="post" class="formulario">
        <h2 class="create-account">INGRESO</h2>
        <p class="cuenta-gratis">¿Posee cuenta? Ingrese desde acá</p>
       
        <input type="email" name="emailf" placeholder="E-mail">
        <input type="password" name="passwordf" placeholder="Contraseña">
        <input type="submit" value="Iniciar sesión">
       
    </form>
    <div class="welcome-back">
        <div class="message">
            <h2>Bienvenido otra vez</h2>
            <p>Si no posee una cuenta, registrese acá</p>
            <button class="sign-in-btn">Registrarse</button>
            <?php if(!empty($message)):?>
            <p class="grande"><?=$message ?></p>
            <?php endif;?>
        </div>
    </div>
   
</div>
<script>
var email = localStorage.getItem('emailf'), password = localStorage.getItem('passwordf');
$.POST('start.php', {'email':email,'password':password}, function(data){
  alert('Login Successful.  Redirect to a different page or something here.');
}
</script>
<script src="../JS/login.js"></script>
</body>
</html>
