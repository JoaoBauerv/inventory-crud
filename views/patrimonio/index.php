<?php include '../../components/sidebar.php'; ?>

<!-- Conteúdo principal -->
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Patrimonios</h1>
        <a href="/inventario/views/patrimonio/create.php" class="btn btn-success">Cadastrar Patrimonio</a>
    </div>

    <div class="table-responsive">
        <?php
            $stmt = $pdo->prepare("SELECT a.*, b.nm_categoria FROM tb_produto A join tb_categoria b ON a.id_categoria = b.id_categoria  ORDER BY id_produto;"); 
            $stmt->execute();
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<thead class='table-dark'>";
                    echo "<tr><th>Nome</th><th>Categoria</th><th>Preço</th><th>Descrição</th><th>Opções</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["nm_produto"]) . "</td>";
                            echo "<td>" . ($row["nm_categoria"]) . "</td>";
                            echo "<td>" . ($row["vl_preco"]) . "</td>";
                            echo "<td>" . ($row["txt_descricao"]) . "</td>";
                            echo "<td>";
                            echo '<a href="edit.php?id=' . $row["id_produto"] . '" class="btn btn-warning btn-sm me-2">Editar</a>';
                            echo '<form action="/inventario/functions/produto/deletar.php?id=' . $row["id_produto"] . '" method="post" class="d-inline">';
                            echo '<button type="submit" class="btn btn-danger btn-sm">Excluir</button>';
                            echo '</form>';
                            echo "</td>";
                            echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
            } else {
                    echo "<p class='text-muted'>Nenhum produto cadastrado.</p>";
            }
        ?>
    </div>
</div>
