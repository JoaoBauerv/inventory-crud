<?php include  '../../components/sidebar.php'; 
?>




            
            <form method="POST" action="/inventario/functions/patrimonio/registrar.php" style="max-width: 600px;">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="patrimonio" class="form-label">Patrimonio</label>
                        <input type="text" name="patrimonio" id="patrimonio" class="form-control" required placeholder="Digite o nome do produto">
                    </div>

                <div class="col-md-6">
                        <label for="id_produto" class="form-label">Produto</label>
                        <select name="id_produto" id="id_produto" class="form-select" required>
                            <option value="">Selecione o produto</option>
                            
                        <?php
                         

                        if (!isset($pdo)) {
                            echo '<option value="">Erro na conexão com o banco de dados</option>';
                        } else {
                            try {
                                $stmt = $pdo->query("SELECT nm_produto, id_produto FROM tb_produto ORDER BY nm_produto");
                                $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if (count($produtos)) {
                                    foreach ($produtos as $row) {
                                        echo '<option value="' . htmlspecialchars($row['id_produto']) . '">' . htmlspecialchars($row['nm_produto']) . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Nenhum produto encontrado</option>';
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
                            $('#id_produto').select2({
                            });
                        });

                        
                    </script>          
                    
                <div class="col-md-6">
                        <label for="id_setor" class="form-label">Setor</label>
                        <select name="id_setor" id="id_setor" class="form-select" required>
                            <option value="">Selecione o setor</option>
                            
                        <?php
                         

                        if (!isset($pdo)) {
                            echo '<option value="">Erro na conexão com o banco de dados</option>';
                        } else {
                            try {
                                $stmt = $pdo->query("SELECT nm_setor, id_setor FROM tb_setor ORDER BY nm_setor");
                                $setor = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if (count($setor)) {
                                    foreach ($setor as $row) {
                                        echo '<option value="' . htmlspecialchars($row['id_setor']) . '">' . htmlspecialchars($row['nm_setor']) . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Nenhum setor encontrado</option>';
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
                            $('#id_setor').select2({
                            });
                        });

                        
                    </script>       


                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Cadastrar Patrimonio</button>
                    </div>
                </div>
            </form>
                
                
                
            

    </main>

