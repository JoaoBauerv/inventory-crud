<?php include  '../../components/sidebar.php'; 
?>




            
            <form method="POST" action="/inventario/functions/produto/registrar.php" style="max-width: 600px;">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="nome_produto" class="form-label">Nome do Produto</label>
                        <input type="text" name="nome_produto" id="nome_produto" class="form-control" required placeholder="Digite o nome do produto">
                    </div>

                <div class="col-md-6">
                        <label for="id_categoria" class="form-label">Categoria</label>
                        <select name="id_categoria" id="id_categoria" class="form-select" required>
                            <option value="">Selecione a categoria</option>
                            
                        <?php
                         

                        if (!isset($pdo)) {
                            echo '<option value="">Erro na conexão com o banco de dados</option>';
                        } else {
                            try {
                                $stmt = $pdo->query("SELECT id_categoria, nm_categoria FROM tb_categoria ORDER BY nm_categoria");
                                $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if (count($categorias)) {
                                    foreach ($categorias as $row) {
                                        echo '<option value="' . htmlspecialchars($row['id_categoria']) . '">' . htmlspecialchars($row['nm_categoria']) . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Nenhum proprietário encontrado</option>';
                                }
                            } catch (PDOException $e) {
                                echo '<option value="">Erro na consulta: ' . htmlspecialchars($e->getMessage()) . '</option>';
                            }
                        }
                        ?>


                        </select>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#id_categoria').select2({
                            });
                        });

                        
                    </script>          
                    

                    <div class="col-md-6">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="number" name="preco" id="preco" class="form-control" required step="0.01" min="0" placeholder="Preço">
                    </div>

                    <div class="col-md-12">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control" rows="3" placeholder="Descrição do produto"></textarea>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Cadastrar Produto</button>
                    </div>
                </div>
            </form>
                
                
                
            

    </main>

