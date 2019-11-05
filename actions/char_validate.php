<?php
session_start();
$nick = isset($_POST["nickname"])?($_POST["nickname"]):"";
$race = isset($_POST["raca"])?($_POST["raca"]):"";
$picture = isset($_POST["foto-personagem"])?($_POST["foto-personagem"]):"";



$local = "localhost";
$userRoot = "root";
$passRoot = "root";
$db_name = "db_agonizingVillage";

switch ($race){
  case "elfo":
    $race = 1;
    $forca = 15;
    $defesa = 5;
    $inventario = null;
    $level = 1;
    $habilidades = null;
    $chanceCrit = 0;
    $dinheiro = 0;
    $exp = 0;
    $vida = 100;
    $energia = 100;
  break;

  case "orc":
    $race = 2;
    $forca = 20;
    $defesa = 10;
    $inventario = null;
    $level = 1;
    $habilidades = null;
    $chanceCrit = 0;
    $dinheiro = 0;
    $exp = 0;
    $vida = 300;
    $energia = 150;
  break;

  case "mago":
    $race = 3;
    $forca = 2;
    $defesa = 3;
    $inventario = null;
    $level = 1;
    $habilidades = null;
    $chanceCrit = 0;
    $dinheiro = 0;
    $exp = 0;
    $vida = 100;
    $energia = 300;
  break;

  case "humano":
  //Atributos base da raça humana
    $race = 4;
    $forca = 10;
    $defesa = 3;
    $inventario = null;
    $level = 1;
    $habilidades = null;
    $chanceCrit = 0;
    $dinheiro = 0;
    $exp = 0;
    $vida = 100;
    $energia = 100;
  break;
}
echo ($race);
if ($picture == 0) {
    


// Aqui você faz a conexão com o banco de dados
$conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error());
$id = $_SESSION['user'];
$idUser = mysqli_query($conexao,"SELECT * FROM users WHERE id_user = '".$id["id_user"]."'");
$arr = mysqli_fetch_all($idUser, MYSQLI_ASSOC);
  // Lista de tipos de arquivos permitidos
  //$tiposPermitidos= array('image/jpg','image/jpeg','image/pjpeg','image/png');
// Array com as extensões permitidas
$tiposPermitidos = array('image/jpg', 'image/jpeg', 'image/png');


  // Tamanho máximo (em bytes)
  $tamanhoPermitido = 1920 * 1080; 
  // O nome original do arquivo no computador do usuário
  $arqName = $_FILES['foto-personagem']['name'];
  // O tipo mime do arquivo. Um exemplo pode ser "image/gif"
  $arqType = $_FILES['foto-personagem']['type'];
  // O tamanho, em bytes, do arquivo
  $arqSize = $_FILES['foto-personagem']['size'];
  // O nome temporário do arquivo, como foi guardado no servidor
  $arqTemp = $_FILES['foto-personagem']['tmp_name'];
  // O código de erro associado a este upload de arquivo
  $arqError = $_FILES['foto-personagem']['error'];


  if ($arqError == 0) {
        // Verifica o tipo de arquivo enviado
    // Faz a verificação da extensão do arquivo enviado
// $extensao = strrchr($_FILES['foto-personagem']['name'],'.');

// Faz a validação do arquivo enviado
if (array_search($arqType, $tiposPermitidos) === false) {
  echo 'O tipo de arquivo enviado é inválido!';
// Não houveram erros, move o arquivo
    } else {
      $pasta = "../images/personagens/";  
      $upload = move_uploaded_file($arqTemp, $pasta.$arqName);
      $foto = $_FILES["foto-personagem"]['name'];
      
      // Verifica se o arquivo foi movido com sucesso
      if ($upload == true) {
        // Cria uma query MySQL
        $select = mysqli_query($conexao, "SELECT * FROM characters, users WHERE c_nickname = '$nick'");
        $query = mysqli_query($conexao, "INSERT INTO characters (c_nickname,fk_id_user,fk_race,c_experience,c_life,c_energy,c_strenght,c_defense,c_inventory,c_level,c_ability,c_crit_chance,c_money,c_picture) VALUES ('$nick',(SELECT id_user FROM users WHERE u_user = {$id["id_user"]}),(SELECT id_race FROM characters WHERE race = {$id["id_user"]}),$exp,$vida,$energia,$forca,$defesa,$inventario,$level,$habilidades,$chanceCrit,$dinheiro,'$foto'");
        echo 'Usuário inserido com sucesso!';//.
        print_r($id);
        print_r ($query);
        //"<script>window.location.href='../menu.php';</script>";
        }else { 
          echo 'Ocorreu algum com o cadastro, por favor, tente novamente ou contate o suporte';
      }
    }
  } 
}
?>