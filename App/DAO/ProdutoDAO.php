<?php


class ProdutoDAO
{
 private $conexao;
    /**  Neste caso, é um método de conexão do BD com o site*/
    public function __construct()
    {
       
        $dsn = "mysql:host=localhost:3307;dbname=db_mvc";  


        $this->conexao = new PDO($dsn, 'root', 'etecjau' );
    }


    /** Aqui é onde o BD insere cada campo novo preenchido nas tabelas determinadas */
    public function insert(ProdutoModel $model)
    {
        
        $sql = "INSERT INTO produto (nome, preco, cod_barra, marca) VALUES (?, ?, ?, ?) ";


    
        $stmt = $this->conexao->prepare($sql);


        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->cod_barra);
        $stmt->bindValue(4, $model->marca);

       
        $stmt->execute();
    }


    /** Nesse, os cmapos ja criados vão ser atualizados quando uma modificação ser feita no mesmo*/
    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE produto SET nome=?, preco=?, cod_barra=?, marca=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->cod_barra);
        $stmt->bindValue(4, $model->marca);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }


    /** Aqui retornamos os registros da tabela produto para o BD */
    public function select()
    {
        $sql = "SELECT * FROM produto";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    /** Assim como o de cima, retorna um registro ao BD, mas dessa vez, um especifico */
    public function selectById(int $id)
    {
        include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel"); 
    }


    /** Usado para remover um registro da tabela produto do BD*/
    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}