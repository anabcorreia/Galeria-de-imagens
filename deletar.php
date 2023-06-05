<?php

include 'db.php';

if (!isset($_GET['id'])) { 
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM imagens WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
 header('Location: listar.php');
 exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$stmt = $pdo->prepare('DELETE FROM imagens WHERE id = ?');
$stmt->execute([$id]);
header('Location: listar.php');
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<style>
  
  body {
    font-family: Arial, sans-serif;
    text-decoration-color: burlywood;
 }
 header{
     display: flex;
     align-items: center;
     justify-content: space-between;
     padding: 25px 48px;
     background-color: rgba(99, 79, 248, 0.6);
 }
 .logo{
     max-width: 250px;
     max-height: auto;
     
 }
 .navigation ul{
     display: flex;
     align-items: center;
     gap: 60px;
     
 }
 .navigation li a{
     color: #ffffff;
     font-size: 30px;
     padding-bottom: 5px;
     border-bottom: 2px solid transparent;
     transition: all 6s;
     display: inline;
     text-decoration: none;
 }
 .navigation li a:hover{
     border-bottom: 2px solid #ffffff;
     display: inline;
     text-decoration: none;
 }
 .navigation .search{
     width: 40px;
     filter: invert(1);
 }
 .navigation .perfil{
     width: 50px;
     
 }
 
 
 </style>
 <header>
     <a href="#"><img src="imagens/ABCGallery.png" alt="logo" class="logo"></a>
     <nav class="navigation">
         <ul>
         <li><a href="http://localhost/galeria/index.html">INÍCIO</a></li>
            <li><a href="http://localhost/galeria/index.php">CADASTRO</a></li>
            <li><a href="http://localhost/galeria/galeria.html">GALERIA</a></li>
            <li><a href="http://localhost/galeria/sobre.html">SOBRE</a></li>
             <img src="imagens/search.png" alt="Pesquisa" class="search">
        
             <a href="index.php"><img src="imagens/cadastro.png" alt="logo do canal" class="perfil"></a>
      
         </ul>
     </nav>
 </header>
</body>
</html>

<br>
<br>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
  <title>Deletar Cadastro</title>
</head>
<body background= "imagens/Fundo Do Céu Preto H5.jpg">

<style>
   form {
   max-width: 500px;
   margin: 0 auto;
   padding: 20px;
   background-color: #81818187;
   border-radius: 5px;
   color: white;
  }   
  
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  h1 {
    text-align: center;
    font-size: 50px;
  }
    
  h5 {
   text-align: center;
   font-size: 25px;
  }
  button[type="submit"] {
    background-color:white;
    color: black;
    border: none;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
  
  }
  .persona_a  {
    background-color:white;
    color: black;
    border: none;
    border-radius: 5px;
    padding: 9px;
    cursor: pointer;
    display: inline;
    text-decoration: none;
  }
  
  button[type="submit"]:hover {
    background-color:blue;
  }
    
</style>

<div class="form label">
<form method="post">
  <h1>Deletar Cadastro?</h1>
  <h5>Tem certeza que deseja deletar o cadastro de
    <?php echo $appointment['nome']; ?>
    em <?php echo date('d/m/Y', strtotime($appointment['data'])); ?>?</h5>
    
   
 <div>
   <button type="submit">Sim</button>
   <a class="persona_a" href="listar.php">Não</a>
</form></div></body></html>