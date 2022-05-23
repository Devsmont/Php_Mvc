<?php


class ProdutoCatDAO
{
 private $conexao;
    /**  Neste caso, é um método de conexão do BD com o site*/
    public function __construct()
    {
       
        $dsn = "mysql:host=localhost:3307;dbname=db_mvc";  


        $this->conexao = new PDO($dsn, 'root', 'etecjau' );
    }


    /** Aqui é onde o BD insere cada campo novo preenchido nas tabelas determinadas */
    public function insert(ProdutoCatModel $model)
    {
        
        $sql = "INSERT INTO produtoCat (nome) VALUES (?) ";


    
        $stmt = $this->conexao->prepare($sql);


        
        $stmt->bindValue(1, $model->nome);
       

       
        $stmt->execute();
    }


    /** Nesse, os cmapos ja criados vão ser atualizados quando uma modificação ser feita no mesmo*/
    public function update(ProdutoCatModel $model)
    {
        $sql = "UPDATE produtoCat SET nome=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->id);
        
        $stmt->execute  ();
    }


    /** Aqui retornamos os registros da tabela produto para o BD */
    public function select()
    {
        $sql = "SELECT * FROM produtoCat ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    /** Assim como o de cima, retorna um registro ao BD, mas dessa vez, um especifico */
    public function selectById(int $id)
    {
        include_once 'Model/ProdutoCatModel.php';

        $sql = "SELECT * FROM produtoCat WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoCatModel"); 
    }


    /** Usado para remover um registro da tabela produto do BD*/
    public function delete(int $id)
    {
        $sql = "DELETE FROM produtoCat WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}