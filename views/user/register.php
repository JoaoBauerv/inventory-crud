<!-- Sidebar -->
<?php include '../../components/sidebar.php'; 

function post_data($field){
  $_POST[$field] ??= '';
  
  return htmlspecialchars(stripslashes($_POST[$field]));
}

define('REQUIRED_FIELD_ERROR', 'É necessario preencher esse campo!');
$errors = [];

$usuario = '';
$email = '';
$senha = '';
$senha2 = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $usuario = post_data('usuario');
  $email = post_data('email');
  $senha = post_data('senha');
  $senha2 = post_data('senha2');

  if (!$usuario){
    $errors['usuario'] = REQUIRED_FIELD_ERROR;
  }elseif(strlen($usuario) < 6 || strlen($usuario) > 16 ){
    $errors['usuario'] = 'O usuário precisa ser entre 6 e 16 caracteres!';
  
  }

  if (!$email){
    $errors['email'] = REQUIRED_FIELD_ERROR;
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL )){
    $errors['email'] = 'Esse campo precisa ser um email válido!';

  }

    if (!$senha){
    $errors['senha'] = REQUIRED_FIELD_ERROR;
  }elseif(strlen($senha) < 4 || strlen($senha) > 10 ){
    $errors['senha'] = 'A senha precisa ser entre 4 e 10  caracteres!';
  
  }
    if (!$senha2){
    $errors['senha2'] = REQUIRED_FIELD_ERROR;
  }

  if ($senha && $senha2 && strcmp($senha, $senha2) !==0){
    $errors['senha2'] = 'As senhas precisam ser iguais!';
  }



}


?>

<!-- Página escura de fundo -->
<div class="container-fluid  min-vh-100 d-flex justify-content-center align-items-center">
  <div class="card shadow-lg bg-dark p-4" style="width: 100%; max-width: 400px;">
    <div class="text-center mb-4">
      <img src="/caminho/para/logo.png" alt="Logo" style="max-height: 80px;" onerror="this.style.display='none'">
      <h3 class="mt-2 text-white">Registrar-se</h3>
    </div>

    <form action="\inventario\functions\user\registrar.php" method="POST" enctype="multipart/form-data" >
        <div class="mb-3">
            <label for="usuario" class="form-label text-white">Usuário</label>
            <input type="text" class="form-control <?php echo isset($errors['usuario']) ? 'is-invalid' : '' ?>" id="usuario" name="usuario"  value="<?php echo $usuario ?>" >
            <div class="invalid-feedback"> 
              <?php echo $errors['usuario'] ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label text-white">Email</label>
            <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?php echo $email ?>"  >
            <div class="invalid-feedback"> 
              <?php echo $errors['email'] ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label text-white">Senha</label>
            <input type="password" class="form-control <?php echo isset($errors['senha']) ? 'is-invalid' : '' ?> " id="senha" name="senha" value="<?php echo $senha ?>" >
            <div class="invalid-feedback"> 
              <?php echo $errors['senha'] ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="senha2" class="form-label text-white">Confirma senha</label>
            <input type="password" class="form-control <?php echo isset($errors['senha2']) ? 'is-invalid' : '' ?>" id="senha2" name="senha2" value="<?php echo $senha2 ?>" >
            <div class="invalid-feedback"> 
              <?php echo $errors['senha2'] ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label text-white">Escolha uma foto de perfil</label>
            <input type="file" id="foto" name="foto" multiple class="form-control" /><br>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-warning">Cadastrar</button>
        </div>
    </form>
  </div>
</div>
