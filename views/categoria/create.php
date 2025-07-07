<?php include  '../../components/sidebar.php';      
?>




            
            <form method="POST" action="/inventario/functions/categoria/registrar.php" style="max-width: 600px;">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="nome_categoria" class="form-label">Categoria</label>
                        <input type="text" name="nome_categoria" id="nome_categoria" class="form-control" required placeholder="Digite o nome da categoria">
                    </div>


                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-4">Cadastrar categoria</button>
                    </div>
                </div>
            </form>
                
                
                
            

    </main>

