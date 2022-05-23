<?php

class ProdutoCatModel
{
 
    public $id, $nome;

    public $rows;

 
    public function save()
    {
        include 'DAO/ProdutoCatDAO.php'; 

       
        $dao = new ProdutoCatDAO(); 

        if(empty($this->id))
        {
            
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }


   
    public function getAllRows()
    {
        include 'DAO/ProdutoCatDAO.php'; 

        $dao = new ProdutoCatDAO();

      
        $this->rows = $dao->select();
    }


    
    public function getById(int $id)
    {
        include 'DAO/ProdutoCatDAO.php'; 

        $dao = new ProdutoCatDAO();

        $obj = $dao->selectById($id); 

        
        return ($obj) ? $obj : new ProdutoCatModel(); 

    }


    
    public function delete(int $id)
    {
        include 'DAO/ProdutoCatDAO.php'; 

        $dao = new ProdutoCatDAO();

        $dao->delete($id);
    }
}