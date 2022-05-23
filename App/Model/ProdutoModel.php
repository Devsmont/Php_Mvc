<?php

class ProdutoModel
{
   /** Aqui estamos criando as propriedades, de acordo com os campos da tabela produto */
    public $id, $nome, $preco, $cod_barra, $marca;

    public $rows;

    /** Método que vai chamar a DAO, para que póssamos salvar o modelo preenchido no Banco de dados */
    public function save()
    {
        include 'DAO/ProdutoDAO.php'; 

       
        $dao = new ProdutoDAO(); 

        if(empty($this->id))
        {
            
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }


    /** Pega todas as "linhas" para que possamos lista-las na view  */
    public function getAllRows()
    {
        include 'DAO/ProdutoDAO.php'; 

        $dao = new ProdutoDAO();

      
        $this->rows = $dao->select();
    }


    /** Método que recebe um id especifico para ser encontrado no BD  */
    public function getById(int $id)
    {
        include 'DAO/ProdutoDAO.php'; 

        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id); 

        
        return ($obj) ? $obj : new ProdutoModel(); 

    }


    /* Exclui o registro desejado no BD **/
    public function delete(int $id)
    {
        include 'DAO/ProdutoDAO.php'; 

        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}