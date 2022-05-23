<?php
/** Classe controller, ela serve para que quando o usuário chamar alguma rota ou método ela é chamada*/
class ProdutoCatController 
{
    
 public static function index() 
  {
    /** código para incluir o arquivo model*/
    include 'Model/ProdutoCatModel.php'; 
        
        $model = new ProdutoCatModel(); 
        $model->getAllRows();  /** pegando os registros feitos, para coloca-los nas "linhas" da model*/

    include 'View/modules/ProdutoCAT/ListaProdutoCAT.php'; 
  }


   
    public static function form() /** devolvendo a view form */
    {
        include 'Model/ProdutoCatModel.php'; 
        $model = new ProdutoCatModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 
            

        include 'View/modules/ProdutoCAT/FormProdutoCAT.php'; 
    }

    /** Código para salvar-mos cada um dos registros preenchidos na form para o BD */
    public static function save()
    {
       include 'Model/ProdutoCatModel.php'; 

      
       $model = new ProdutoCatModel();

       $model->id =  $_POST['id'];
       $model->nome = $_POST['nome'];
   

       $model->save(); 

       header("Location: /produtoCat"); 
    }

    /** Esse aqui deleta os códigos quando clicarmos em um botão, no caso o X que foi programado */
    public static function delete()
    {
        include 'Model/ProdutoCatModel.php'; 

        $model = new ProdutoCatModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /produtoCat"); 
    }
}