<?php
session_start();
$nick = isset($_POST["nickname"])?($_POST["nickname"]):"";
$race = isset($_POST["raca"])?($_POST["raca"]):"";
$picture = isset($_POST["foto-personagem"])?($_POST["foto-personagem"]):"";
// Aqui você faz a conexão com o banco de dados
require_once "../bd/connection_bd.php";

$arrayUser = $_SESSION['user'];
$select_all_race = mysqli_query($conexao,"SELECT * FROM race WHERE id_race = '$race'");
$arrayRace= mysqli_fetch_assoc($select_all_race);      


echo "<pre>";
print_r($arrayRace);
print_r($arrayUser);
print_r($arrayUser['id_user']);

echo "</pre>";
if ($picture == 0) {
    
$id = $_SESSION['user'];
$idUser = mysqli_query($conexao,"SELECT * FROM users WHERE id_user = '".$id["id_user"]."'");
$arr = mysqli_fetch_all($idUser, MYSQLI_ASSOC);

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

// Faz a validação do arquivo enviado
if (array_search($arqType, $tiposPermitidos) === false) {
  echo 'O tipo de arquivo enviado é inválido!';
// Não houveram erros, move o arquivo
    } else {
      $pasta = "../images/personagens/";  
      $upload = move_uploaded_file($arqTemp, $pasta.$arqName);
      $foto = $_FILES["foto-personagem"]['name'];
      echo $foto;
      
      // Verifica se o arquivo foi movido com sucesso
      if ($upload == true) {
        // Cria uma query MySQL
        $insertChar = mysqli_query($conexao, "INSERT INTO characters (
        id_characters,
        c_nickname,
        c_experience,
        c_life,
        c_energy,
        c_strenght,
        c_defense,
        c_level,
        c_crit_chance,
        c_money,
        race_id_race,
        users_id_user,
        c_picture,
        c_type) 
        VALUES (
        DEFAULT,
        '$nick',
        '0',
        '$arrayRace[r_life]',
        '$arrayRace[r_energy]',
        '$arrayRace[r_strenght]',
        '$arrayRace[r_defense]',
        1,
        '$arrayRace[r_crit_chance]',
        '0',
        '$race',
        '$arrayUser[id_user]',
        '$foto',
        '$arrayUser[u_type]')") OR die(mysqli_error($conexao));

        echo 'Usuário inserido com sucesso!';
        
        }else { 
          echo 'Ocorreu algum com o cadastro, por favor, tente novamente ou contate o suporte';
      }
    }
  } 

?>