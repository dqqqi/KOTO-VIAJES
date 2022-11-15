<?php 
session_start();
require './database.php';

if(isset($_SESSION['user_id'])){
  $records=$conn->prepare('SELECT id, email, password, name FROM users WHERE id= :id');
  $records->bindParam(':id',$_SESSION['user_id']);
  $records->execute();
  $results=$records->fetch(PDO::FETCH_ASSOC);
  $user=null;
  if(count($results)>0){
    $user=$results;
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
    <link href="../CSS/navbar.css" rel="stylesheet">
    <link href="../CSS/body.css" rel="stylesheet">
    <link href="../CSS/reclamosForm.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    

    
    

    <link href="" rel="icon">
    <title>Viaja libre|KOTO</title>
    
</head>
<body onload="openNAV('nav1');">
  
  <div class="na0b">
  <li><div class="logoKoto" id="navbar" onclick="openNAV('nav1');"><i class='bx bx-menu'></i></div></li>
   <!--NAVBAR-->
   
   <ul class="navbar1" id="nav1">
    <li><a href="start.php"><div class="logoint"><i class='bx bxl-kickstarter'></i><i class='bx bxs-up-arrow-circle'></i><i class='bx bxs-plane'></i><i class='bx bxs-smile'></i></div></a></li>
    <li><div class="btn2"><div class="btn1" onclick="openNAV('nav1'), openModal()">Nuestros destinos</div></li>
    <li><div class="btn2"><div class="btn1" onclick="openNAV('nav1'), openModal3()">Acerca de nosotros</div></div></li>
    <li><div class="btn2"><div class="btn1">Descargar app</div></div></li>
    <?php if (!empty($user)): ?>
      
      <li><div class="btn2"><div class="btn1" onclick="openNAV('nav1'), openModal2()">Gestionar Viajes</div></div></li>
    <li><a href="logout.php"><div class="btn2"><div class="btn1">Cerrar sesión</div></div></a></li>
    <br>Welcome <?=$user['name']?>
    <?php else:?>
      <li><a href="index.php"><div class="btn2"><div class="btn1">Iniciar sesión</div></div></a></li>
    <?php endif;?>
  </ul>
</div>


<div class="afueranav">
  
 <!--CAROUSEL-->
 <div class="carousels">
 <img class="mySlides w3-animate-left" src="../RESOURCES/img/plane1.jpg">
 <img class="mySlides w3-animate-left" src="../RESOURCES/img/plane2.jpg">
 <img class="mySlides w3-animate-left" src="../RESOURCES/img/plane3.jpg">
 <img class="mySlides w3-animate-left" src="../RESOURCES/img/plane4.jpg">
 <div class="mobilew">
  <img class="mobw" src="../RESOURCES/img/lll.jpg">
</div>
</div>

 <!--<a href="https://www.google.com/logos/2010/pacman10-i.html"> <div id="relojAnalogico" class="reloj"></div></a>-->

 <div class="form2">
   <h2>RESERVAR VIAJES <i class='bx bxs-plus-square'></i> </h2>
   <div class="underline"></div> 
 
  <ul class="solv">
    
    <li>Corea N. 🇰🇵</li>
    <li>Ucrania 🇺🇦</li>
    <li>Venezuela 🇻🇪</li>
    <li>Argentina 🇦🇷</li>
    <li>Mongolia 🇲🇳</li>
    <li>Somalia 🇸🇴</li>
  </ul>
  <h2>TUS DESTINOS <i class='bx bxs-plane-alt'></i> </h2>
  <div class="underline"></div> 

 <ul class="solv">
   
   <li>Corea N. 🇰🇵</li>
   <li>Ucrania 🇺🇦</li>
   <li>Venezuela 🇻🇪</li>
   <li>Argentina 🇦🇷</li>
   <li>Mongolia 🇲🇳</li>
   <li>Somalia 🇸🇴</li>
   
    
     
     
    
     
    
 </ul>
</div>


  <div class ="form" id="start">
    <nav class="CardPadre" id="card2">
     
          <a href="#sexto"><div class="card" onclick="openReal('primero'), selectReal('sele1')" id="sele1"></a>
            <div class="real" id="primero"> <div class="content"><p>Having the right people on board with us is one of our major criteria for success.</p><p> Identifying and developing talent, empowering our colleagues to do an excellent job is one of the goals that drive us - everyday. </p></div></div>
            <img class="paises" src="../RESOURCES/img/corea1.jpg" alt="Avatar"  width="400" height="250">
            <div class="container" >
              <h4><b>corea del norte</b><br><i class='bx bx-expand-vertical'></i></h4>
              <div class="content"><p>De los paises mejor organizados, Corea del Norte brinda una estadia única.</p></div>
              <br>
            </div>
            
            
          </div>
       
          <div class="card" onclick="openReal('segundo'), selectReal('sele2')" id="sele2">
            <div class="real" id="segundo"> <div class="content"><p>Having the right people on board with us is one of our major criteria for success.</p><p> Identifying and developing talent, empowering our colleagues to do an excellent job is one of the goals that drive us - everyday. </p></div></div>

            <img class="paises" src="../RESOURCES/img/ucrania1.jpg" alt="Avatar"  width="400" height="250">
            <div class="container">
              <h4><b>ucrania</b><br><i class='bx bx-expand-vertical'></i></h4>
              <div class="content"><p>Pocos lugares son más pacificos que este país, ideal para ir con la familia.</p></div>
              <br>
            </div>
            
          </div>
        
         
          <div class="card" onclick="openReal('tercero'), selectReal('sele3')" id="sele3">
            <div class="real" id="tercero"> <div class="content"><p>Having the right people on board with us is one of our major criteria for success.<p></p> Identifying and developing talent, empowering our colleagues to do an excellent job is one of the goals that drive us - everyday. </p></div></div>

            <img class="paises" src="../RESOURCES/img/venezuela1.jpeg" alt="Avatar"  width="400" height="250">
            <div class="container">
              <h4><b>venezuela</b><br><i class='bx bx-expand-vertical'></i></h4>
              <div class="content"><p>Unos de los paises con mejor calidad de vida gracias a su buena économia.</p></div>
              <br>
            </div>
            
          </div>
          
       
       
          <div class="card" onclick="openReal('cuarto'), selectReal('sele4')" id="sele4">
            <div class="real" id="cuarto"> <div class="content"><p>Having the right people on board with us is one of our major criteria for success.<p></p> Identifying and developing talent, empowering our colleagues to do an excellent job is one of the goals that drive us - everyday. </p></div></div>

            <img class="paises" src="../RESOURCES/img/argentina1.jfif" alt="Avatar"  width="400" height="250">
            <div class="container">
              <h4><b>argentina</b><br><i class='bx bx-expand-vertical'></i></h4>
              <div class="content"><p>Ir a Argentina, con esa économia tan buena, es un viaje de solo ida.</p></div>
              <br>
            </div>
            
          </div>
          <div class="card" onclick="openReal('quinto'), selectReal('sele5')" id="sele5">
            <div class="real" id="quinto"> <div class="content"><p>Having the right people on board with us is one of our major criteria for success.<p></p> Identifying and developing talent, empowering our colleagues to do an excellent job is one of the goals that drive us - everyday. </p></div></div>

            <img class="paises" src="../RESOURCES/img/somalia2.jpg" alt="Avatar"  width="400" height="250">
            <div class="container">
              <h4><b>mongolia</b><br><i class='bx bx-expand-vertical'></i></h4>
              <div class="content"><p>Ganador de el titulo a mejor pais del mundo, Mongolia ofrece la perfección en todos los aspectos.</p></div>
              <br>
            </div>
            
          </div>
          <div class="card" onclick="openReal('sexto'), selectReal('sele6')" id="sele6">
            <div class="real" id="sexto"> <div class="content"><p>Having the right people on board with us is one of our major criteria for success.<p></p>Identifying and developing talent, empowering our colleagues to do an excellent job is one of the goals that drive us - everyday. </p></div></div>

            <img class="paises" src="../RESOURCES/img/somala.jfif" alt="Avatar"  width="400" height="250">
            <div class="container">
              <h4><b>somalia</b><br><i class='bx bx-expand-vertical'></i></h4>
              <div class="content"><p>Con su buena gente y creencias, es un muy tranquilo lugar para ir de viaje.</p></div>
              <br>
            </div>
                     
          </div>
        
    </nav>
 

    
  </div>
  
  


  <script>
localStorage.setItem('emailf', '<?php echo $_SESSION['emailf'];?>');  
localStorage.setItem('passwordf', '<?php echo $_SESSION['passwordf'];?>');
</script>
  <script src="../JS/script.js"></script>
  <script src="../JS/formReclamos.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>
</html>