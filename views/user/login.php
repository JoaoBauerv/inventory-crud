<!-- Sidebar -->
<?php include '../../components/sidebar.php'; 

if (!empty($_POST)) {
    // Pegando os dados enviados pelo formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Preparar a query (protege contra SQL Injection)
    $stmt = $pdo->prepare("SELECT * FROM tb_usuario WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe e a senha está correta
    if ($user && password_verify($senha, $user['senha'])) {
      $_SESSION['usuario'] = $_POST['usuario'];  
      header("Location: ../../index.php?msgSucesso=Login realizado com sucesso!");

    } else {
        echo "Usuário ou senha inválidos!";
    }
}



?>

<!-- Página escura de fundo -->
<div class="container-fluid  min-vh-100 d-flex justify-content-center align-items-center">
  <div class="card shadow-lg bg-dark p-4" style="width: 100%; max-width: 400px;">
    <div class="text-center mb-4">
      <img src="/caminho/para/logo.png" alt="Logo" style="max-height: 80px;" onerror="this.style.display='none'">
      <h3 class="mt-2 text-white">Login</h3>
    </div>

    <form action="" method="POST">
      <div class="mb-3">
        <label for="usuario" class="form-label text-white">Usuário</label>
        <input type="text" class="form-control" id="usuario" name="usuario" required>
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label text-white">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Acessar</button>
      </div>
    </form>
  </div>
</div>
