<?php
  $nome = $_POST['nome'];
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

  ?>