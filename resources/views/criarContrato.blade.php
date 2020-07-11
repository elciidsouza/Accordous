<form method="POST" v-on:submit.prevent="createContrato">
    <div class="modal fade" id="criar-contrato">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Criar novo contrato</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="imovel_id">Selecione a localização do imóvel</label>
                    <select name="imovel_id" class="form-control" v-model="imovel_id" required>
                        <option value="">Selecione</option>
                        <option v-for="item in imoveis" :value="item.id_imoveis">@{{item.rua}}, @{{item.numero}}, @{{item.cidade}}, @{{item.estado}}</option>
                    <select>

                    <label for="tipo_pessoa">Tipo de pessoa</label>
                    <select id="tipo_pessoa" class="form-control" v-model="tipo_pessoa" required>
                        <option value="">Selecione</option>
                        <option>Física</option>
                        <option>Jurídica</option>
                    </select>

                    <label for="documento">Documento</label>
                    <input type="text" name="documento" id="documento" v-model="documento" class="form-control documento" disabled required>

                    <label for="email_contratante">E-mail do contratante</label>
                    <input type="email" name="email_contratante" id="email_contratante" v-model="email_contratante" class="form-control" required>

                    <label for="nome_completo">Nome completo do contratante</label>
                    <input type="text" name="nome_completo" id="nome_completo" v-model="nome_completo" class="form-control" required>

                    
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
            </div>
        </div>
    </div>
</form>