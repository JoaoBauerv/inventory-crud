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
        $sql = "INSERT INTO tb_patrimonio (nm_patrimonio,id_produto, id_setor, data_entrada) VALUES (:patrimonio, :id_produto, :id_setor, :data_entrada)";
        $stmt = $pdo->prepare($sql);

        

        $dados = array(
            ':patrimonio' => $_POST['patrimonio'],
            ':id_produto' => $_POST['id_produto'],
            ':id_setor' => $_POST['id_setor'],
            ':data_entrada' => date('Y-m-d')
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