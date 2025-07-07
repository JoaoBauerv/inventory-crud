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
        $sql = "INSERT INTO tb_categoria (nm_categoria) VALUES (:nome_categoria)";
        $stmt = $pdo->prepare($sql);

        

        $dados = array(
            ':nome_categoria' => $_POST['nome_categoria'],

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