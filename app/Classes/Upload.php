<?php

namespace App\Classes;

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
    $this->type     = $file['type'];
    $this->tmpName  = $file['tmp_name'];
    $this->error    = $file['error'];
    $this->size     = $file['size'];

    $info = pathinfo($file['name']);
    $this->name       = $info['filename'];
    $this->extension  = $info['extension'];
  }

  /* Metodo responsavel por retornar o nome do arquivo com sua extensão */
  public function getBaseName()
  {
    // VALIDA A EXTENSÃO
    $extension = strlen($this->extension) ? '.' . $this->extension : '';


    // RETORNA O NOME COMPLETO DA IMAGEM
    return $this->name . $extension;
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

    // MOVE O ARQUIVO PARA PASTA DE DESTINO
    return move_uploaded_file($this->tmpName, $path);
  }
}
