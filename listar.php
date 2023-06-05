<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
  <title>Cadastro de imagem</title>
</head>

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


<style>
  .tamimg {
    width: 600px;
    height: 500px;
  }
.texto {
  color:white;
  font-size: 40px;
  
}
h1 {
  color:white;
  text-align:center;
  font-size: 55px;
  }
  form {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    background-color: #000000a1;
    border-radius: 5px;
    color: white;
    font-size: 40px;
  }
  </style>
<body background="imagens/Fundo Do Céu Preto H5.jpg">
  <h1>Cadastro de imagens</h1>

  <?php
  $stmt = $pdo->query('SELECT * FROM imagens ORDER BY data');
  $img = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($img) == 0) {
    echo '<p>Nenhum cadastro realizado.</p>';
  } else {
    echo '<form method="post">';
    echo '<table border="1">';
    echo '<thead>
          <tr>
      
              <th>Imagem Cadastrada</th></div>
              <th colspan="2">Opções</th>
          </tr>
          </thead>';
    echo '<tbody>';
    echo '</form>';

    foreach ($img as $imagem) {
      echo '<tr>';
      echo '<td >' . '<img class="tamimg" src="' . $imagem['img'] . '"></td>';
      echo '<td><a class="texto" href="atualizar.php?id=' . $imagem['id'] . '"> Atualizar</a></td>';
      echo '<td><a class="texto" href="deletar.php?id=' . $imagem['id'] . '"> Deletar</a></td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
  }
  ?>

  <form method="post" action="index.html">
    <button>Voltar</button>
  </form>

</body>

</html>