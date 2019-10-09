<?php
$nick = isset($_POST["nickname"])?($_POST["nickname"]):"";
$race = isset($_POST["raca"])?($_POST["raca"]):"";
$picture = isset($_POST["foto-personagem"])?($_POST["foto-personagem"]):"";
  // O nome original do foto-personagem no computador do usuário
  $arqName = $_FILES['foto-personagem']['name'];
  // O tipo mime do foto-personagem. Um exemplo pode ser "image/gif"
  $arqType = $_FILES['foto-personagem']['type'];
  // O tamanho, em bytes, do foto-personagem
  $arqSize = $_FILES['foto-personagem']['size'];
  // O nome temporário do foto-personagem, como foi guardado no servidor
  $arqTemp = $_FILES['foto-personagem']['tmp_name'];
  // O código de erro associado a este upload de foto-personagem
  $arqError = $_FILES['foto-personagem']['error'];


$local = "localhost";
$userRoot = "root";
$passRoot = "root";
$db_name = "db_agonizingVillage";
$conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error());
   

$insert = mysqli_query($conexao, $query);
    
//     if($insert){
//         echo"<script language='javascript' type='text/javascript'>
//         alert('O seu cadastro foi efetuado com sucesso!!');window.location.
//         href='../pages/user/login_page.php'</script>";
//     }else{
//         echo"<script language='javascript' type='text/javascript'>
//         alert('Não foi possível efetuar esse cadastro!!'); window.location.href='../pages/user/login_page.php'</script>";
//     }
// }
$tiposPermitidos= array('image/gif','image/png','image/jpeg','image/bmp','image/webp');
if ($picture == 0) {
    $pasta = '../images/personagens/';
    $upload = move_uploaded_file($arqTemp, $pasta . $arqName);


// Aqui você faz a conexão com o banco de dados
  // Lista de tipos de arquivos permitidos
  $tiposPermitidos= array('image/jpeg', 'image/pjpeg', 'image/png');
  // Tamanho máximo (em bytes)
  $tamanhoPermitido = 1920 * 1080; // 500 Kb
  // O nome original do arquivo no computador do usuário
  $arqName = $_FILES['arquivo']['name'];
  // O tipo mime do arquivo. Um exemplo pode ser "image/gif"
  $arqType = $_FILES['arquivo']['type'];
  // O tamanho, em bytes, do arquivo
  $arqSize = $_FILES['arquivo']['size'];
  // O nome temporário do arquivo, como foi guardado no servidor
  $arqTemp = $_FILES['arquivo']['tmp_name'];
  // O código de erro associado a este upload de arquivo
  $arqError = $_FILES['arquivo']['error'];
  if ($arqError == 0) {
        // Verifica o tipo de arquivo enviado
    if (array_search($arqType, $tiposPermitidos) === false) {
      echo 'O tipo de arquivo enviado é inválido!';
    // Verifica o tamanho do arquivo enviado
    } else if ($arqSize > $tamanhoPermitido) {
      echo 'O tamanho do arquivo enviado é maior que o limite!';
    // Não houveram erros, move o arquivo
    } else {
      $pasta = '../images/personagens/';
      // Pega a extensão do arquivo enviado
      $extensao = strtolower(end(explode('.', $arqName)));
      // Define o novo nome do arquivo usando um UNIX TIMESTAMP
      $nome = time() . '.' . $extensao;
      // Escapa os caracteres protegidos do MySQL (para o nome do usuário)
      $nomeMySQL = mysql_real_escape_string($_POST['nome']);
      $upload = move_uploaded_file($arqTemp, $pasta . $nome);
      // Verifica se o arquivo foi movido com sucesso
      if ($upload == true) {
        // Cria uma query MySQL
        $query = mysql_query("INSERT INTO characters (c_nickname,c_race,c_picture) VALUES ('$nick','$race','$picture')");
        // Executa a consulta
        if ($query == true) {
                    echo 'Usuário inserido com sucesso!';
                }
      }
    }
  } else {
    echo 'Ocorreu algum erro com o upload, por favor tente novamente!';
  }
  }





?>