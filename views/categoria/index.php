<?php include '../../components/sidebar.php'; ?>

<!-- Conteúdo principal -->
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">Categorias</h1>
    <a href="/inventario/views/categoria/create.php" class="btn btn-success">Cadastrar Categoria</a>
  </div>

  <div class="table-responsive">
    <?php
      $stmt = $pdo->prepare("SELECT * FROM tb_categoria ORDER BY id_categoria;");
      $stmt->execute();
      $rowCount = $stmt->rowCount();

      if ($rowCount > 0) {
          echo "<table class='table table-bordered table-striped'>";
          echo "<thead class='table-dark'>";
          echo "<tr><th>Nome</th><th>Opções</th></tr>";
          echo "</thead>";
          echo "<tbody>";

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row["nm_categoria"]) . "</td>";
              echo "<td>";
              echo '<a href="edit.php?id=' . $row["id_categoria"] . '" class="btn btn-warning btn-sm me-2">Editar</a>';
              echo '<form action="/CarManager/functions/carro/deletar.php?id=' . $row["id_categoria"] . '" method="post" class="d-inline">';
              echo '<button type="submit" class="btn btn-danger btn-sm">Excluir</button>';
              echo '</form>';
              echo "</td>";
              echo "</tr>";
          }

          echo "</tbody>";
          echo "</table>";
      } else {
          echo "<p class='text-muted'>Nenhuma categoria cadastrada.</p>";
      }
    ?>
  </div>
</div>
