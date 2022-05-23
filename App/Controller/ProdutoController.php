<?php
/** Classe controller, ela serve para que quando o usuário chamar alguma rota ou método ela é chamada*/
class ProdutoController 
{
    
 public static function index() 
  {
    /** código para incluir o arquivo model*/
    include 'Model/ProdutoModel.php'; 
        
        $model = new ProdutoModel(); 
        $model->getAllRows();  /** pegando os registros feitos, para coloca-los nas "linhas" da model*/

    include 'View/modules/Produto/ListaProdutos.php'; 
  }


    /** */
    public static function form() /** devolvendo a view form */
    {
        include 'Model/ProdutoModel.php'; 
        $model = new ProdutoModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 
            

        include 'View/modules/Produto/FormProduto.php'; 
    }

    /** Código para salvar-mos cada um dos registros preenchidos na form para o BD */
    public static function save()
    {
       include 'Model/ProdutoModel.php'; 

      
       $model = new ProdutoModel();

       $model->id =  $_POST       ['id'];
       $model->nome = $_POST      ['nome'];
       $model->preco = $_POST     ['preco'];
       $model->cod_barra = $_POST ['cod_barra'];
       $model->marca = $_POST     ['marca'];

       $model->save(); 

       header("Location: /produto"); 
    }

    /** Esse aqui deleta os códigos quando clicarmos em um botão, no caso o X que foi programado */
    public static function delete()
    {
        include 'Model/ProdutoModel.php'; 

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /produto"); 
    }
}