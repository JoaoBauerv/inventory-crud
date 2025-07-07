<?php
require_once(__DIR__ . '/../../banco.php');



// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// $ano = (int)$_POST['ano'];
// if ($ano > date('Y')) {
//     echo $ano." invalido";
// }
// echo date('Y');



if (!empty($_POST)) {
    try {
        $sql = "INSERT INTO tb_produto (nm_produto,id_categoria, vl_preco, txt_descricao) VALUES (:nome_produto, :id_categoria, :preco, :descricao)";
        $stmt = $pdo->prepare($sql);

        

        $dados = array(
            ':nome_produto' => $_POST['nome_produto'],
            ':id_categoria' => $_POST['id_categoria'],
            ':preco' => $_POST['preco'],
            ':descricao' => $_POST['descricao']
        );

        

        if ($stmt->execute($dados)) {
            header("Location: ../../index.php?msgSucesso=Cadastro realizado com sucesso!");
        }
    } catch (PDOException $e) {
        header("Location: ../../index.php?msgErro=Falha ao cadastrar...");
    }
} else {
    header("Location: ../../index.php?msgErro=Erro de acesso.");
}
die();


?>