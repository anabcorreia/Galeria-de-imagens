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
$nome = $appointment['nome'];
$email = $appointment['email'];
$telefone = $appointment['telefone'];
$data = $appointment['data']; 
$img = $appointment['img']; 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
  <title>Atualizar Cadastro</title>
</head>
<body background= "imagens/Fundo Do Céu Preto H5.jpg">

<style>
 
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

<style>
    body {
    font-family: Arial, sans-serif;
    text-decoration-color: burlywood;
    
  }
  
  h1 {
    text-align: center;
    color: white;
    font-size: 40px;
  }
    
  h2 {
   text-align: center;
  }
    
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
  
  input[type="text"],
  input[type="e-mail"],
  input[type="email"],
  input[type="tel"],
  input[type="date"],
  input[type="text-area"],
  input[type="number"],
  select[id="estado"],
  
  textarea {
    width: 95%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  input[type="submit"] {
    background-color: #522a0c;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
  
  }
  
  
  input[type="submit"]:hover {
    background-color: #eaaf82;
  }
  
</style>

  <h1>Atualizar Cadastro</h1>
  <div class="form label">
  <form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" value="<?php echo $email; ?>" required><br>

    <label for="telefone">Telefone:</label>
    <input type="tel" name="telefone" value="<?php echo $telefone;?>" required><br>

    <label for="data">Data de Nascimento:</label>
    <input type="date" name="data" value="<?php echo $data;?>" required><br>

    <label for="img">Imagem:</label>
    <input type="text" name="img" required>
    <img src="img" alt="">
    <br>

    <button type="submit">Atualizar</button>
  </form>
</div>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data']; 
    $img = $_POST['img'];

    // validação dos dados do formulário aqui
    $stmt = $pdo->prepare 
    ('UPDATE imagens SET 
        nome = ?, 
        email = ?, 
        telefone = ?, 
        data = ?,
        img = ?
    WHERE id = ?');

    $stmt->execute([$nome, $email, $telefone, $data, $img, $id]);
    header('Location: listar.php');
    exit;
}

?>



