<?php include  '../../components/sidebar.php';      
?>




            
            <form method="POST" action="/inventario/functions/setor/registrar.php" style="max-width: 600px;">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="nome_setor" class="form-label">Setor</label>
                        <input type="text" name="nome_setor" id="nome_setor" class="form-control" required placeholder="Digite o nome da categoria">
                    </div>


                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Cadastrar setor</button>
                    </div>
                </div>
            </form>
                
                
                
            

    </main>

