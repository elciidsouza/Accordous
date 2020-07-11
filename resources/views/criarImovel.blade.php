<form method="POST" v-on:submit.prevent="createImoveis">
    <div class="modal fade" id="criar-imovel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Criar novo imóvel</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="email">E-mail do proprietário</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite o e-mail do proprietário" v-model="newEmail" required>

                    <span class="text-bold">Endereço do imóvel</span><br>

                    <label for="rua">Rua</label>
                    <input type="text" name="rua" class="form-control" placeholder="Digite a rua" v-model="newRua" required>

                    <label for="numero">Número</label>
                    <input type="text" name="numero" class="form-control" placeholder="Digite o número" v-model="newNumero">

                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" class="form-control" placeholder="Digite o complemento" v-model="newComplemento">

                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control" placeholder="Digite o bairro" v-model="newBairro" required>

                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" class="form-control" placeholder="Digite a cidade" v-model="newCidade" required>

                    <label for="estado">Estado</label>
                    <input type="text" name="estado" class="form-control" placeholder="Digite o estado" v-model="newEstado" required>


                    
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
            </div>
        </div>
    </div>
</form>