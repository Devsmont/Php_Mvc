<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block; }
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro de Produto</legend>

        <form method="post" action="/produto/form/save">

            <input type="hidden" value="<?= $model->id ?>" name="id"                            />
            
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" value="<?= $model->nome ?>" type="text"                />

            <label for="preco">Preco:</label>
            <input id="preco" name="preco" value="<?= $model->preco ?>" type="text"             />

            <label for="cod_barra">Codigo_Barra:</label>
            <input id="cod_barra" value="<?= $model->cod_barra ?>" name="cod_barra" type="text" />

            <label for="marca">Marca:</label>
            <input id="marca" value="<?= $model->marca ?>" name="marca" type="text"             />
            
            <button type="submit">Salvar</button>
        </form>
    </fieldset>

    
</body>
</html>