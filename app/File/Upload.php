<?php

namespace App\File;

class Upload
{

  private $name;

  private $extension;

  private $type;

  private $tmpName;

  private $error;

  private $size;


  /* Metodo construtor da classe
  @param array $file $_FILES[campo]

  */
  public function __construct($file)
  {
    $this->type     = $file['type']; // pega o tipo do arquivo
    $this->tmpName  = $file['tmp_name']; // pega o nome temporario do arquivo
    $this->error    = $file['error']; // pega o erro caso seja diferente de zero (0 OK) (1,2,3,4,5,6,7,8)
    $this->size     = $file['size']; // pega o tamanho do arquivo

    $info = pathinfo($file['name']); // pegando o nome edo arquivo
    $this->name       = $info['filename'];
    $this->extension  = $info['extension'];

    /*  echo "<pre>";
    print_r($info);
    echo "</pre>";
    exit; */
  }

  /* Metodo responsavel por retornar o nome do arquivo com sua extensão */

  public function getBaseName()
  {
    // VALIDA A EXTENSÃO
    $extension = strlen($this->extension) ? '.' . $this->extension : '';


    // RETORNA O NOME COMPLETO DA IMAGEM
    return $this->name . $extension;
  }



  /* Metodo para verificar o tipo de arquivo permitido */
  public function getExtensionAllowed()
  {
    $extension = $this->extension;

    $extensionsAllowed = array('doc', 'docx', 'pdf');

    if (!in_array($extension, $extensionsAllowed)) {
      echo '<script>alert("Aqrquivo em Formato Inválido!");</script>';
    }

    /*  echo "<pre>";
    var_dump($doc);
    var_dump($extension);
    echo "</pre>";
    exit; */
  }



  /* Metodo para enviar (Mover) os arquivos para pasta Files
    @param string $dir
    @return boolean (true ou false)

  */
  public function upload($dir)
  {
    // VERIFICA ERRO
    if ($this->error != 0) return false;


    // CAMINHO COMPLETO DE DESTINO
    $path = $dir . '/' . $this->getBaseName();
    /*  echo "<pre>";
    print_r($path);
    echo "</pre>";
    exit; */
    // MOVE O ARQUIVO PARA PASTA DE DESTINO
    return move_uploaded_file($this->tmpName, $path);
  }
}
