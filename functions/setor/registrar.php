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
        $sql = "INSERT INTO tb_setor (nm_setor) VALUES (:nome_setor)";
        $stmt = $pdo->prepare($sql);

        

        $dados = array(
            ':nome_setor' => $_POST['nome_setor'],

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