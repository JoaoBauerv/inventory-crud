<?php
require_once(__DIR__ . '/../../banco.php');


/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

    // Pega o nome completo do POST
    $nomeCompleto = trim($_POST['nome'] ?? '');

    // Separa em partes pelo espaço
    $partes = preg_split('/\s+/', $nomeCompleto);

    // Pega o primeiro e o último nome, se existirem
    if (count($partes) > 1) {
        $usuario = $partes[0] . '-' . $partes[count($partes) - 1];
    } else {
        $usuario = $nomeCompleto;
    }

    //print_r($_FILES);

    // Caminho real no disco onde o arquivo será salvo
    $save_dir = 'C:/xampp/htdocs/inventario/images/user/';

    // Caminho para ser salvo no banco e usado em links (relativo à pasta pública)
    $url_base = '/inventario/images/user/';

    $prefixo = $usuario .  '_';

    $file_name = $_FILES['foto']['name'] ?? '';
    $tmp_name = $_FILES['foto']['tmp_name'] ?? '';

    // Garante que a pasta existe
    if (!is_dir($save_dir)) {
        mkdir($save_dir, 0755, true);
    }

    $nome_final_arquivo = $prefixo . $file_name;
    $caminhoCompleto = $save_dir . $nome_final_arquivo; // Caminho no disco
    $url_arquivo = $url_base . $nome_final_arquivo;     // Caminho para o site/banco

    if (!empty($tmp_name) && is_uploaded_file($tmp_name)) {
        if (move_uploaded_file($tmp_name, $caminhoCompleto)) {
         //   echo "Arquivo enviado com sucesso!";
           // echo "<br>URL para salvar no banco: <strong>$url_arquivo</strong>";
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Nenhum arquivo enviado.";
    }




if (!empty($_POST)) {
    try {
        $sql = "INSERT INTO tb_usuario (nome, email, senha, foto, usuario) VALUES (:nome, :email, :senha, :foto, :usuario)";
        $stmt = $pdo->prepare($sql);

        $dados = array(
            ':nome' => $_POST['nome'],
            ':email' => $_POST['email'],
            ':senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
            ':foto' => $url_arquivo,
            ':usuario'=> $usuario
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