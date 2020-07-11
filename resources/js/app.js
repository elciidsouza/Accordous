new Vue({
    el: '#dashboard',
    data: {
        imoveis: [],
        newEmail: '',
        newRua: '',
        newNumero: '',
        newComplemento: '',
        newBairro: '',
        newCidade: '',
        newEstado: '',
        imovel_id: '',
        tipo_pessoa: '',
        documento: '',
        email_contratante: '',
        nome_completo: '',
        errors: []
    },
    methods: {
        getImoveis: function() {
            var urlImoveis = 'api/imoveis';
            axios.get(urlImoveis).then(response => {
                this.imoveis = response.data
            });
        },

        deleteImoveis: function(imovel) {
            var urlDeleteImoveis = 'api/imoveis/' + imovel.id_imoveis;
            axios.delete(urlDeleteImoveis).then(response => {
                this.getImoveis();
                toastr.success('Registro excluído com sucesso');
            }).catch(error => {
                toastr.error('O imóvel já foi contratado, não pode ser excluído.');
            });
        },

        createImoveis: function() {
            var urlCreateImoveis = 'api/imoveis';
            axios.post(urlCreateImoveis, {
                email: this.newEmail,
                rua: this.newRua,
                numero: this.newNumero,
                complemento: this.newComplemento,
                bairro: this.newBairro,
                cidade: this.newCidade,
                estado: this.newEstado,

            }).then(response => {
                this.getImoveis();
                this.newEmail = '';
                this.newRua = '';
                this.newRua = '';
                this.newNumero = '';
                this.newComplemento = '';
                this.newBairro = '';
                this.newCidade = '';
                this.newEstado = '';
                this.errors = [];
                $('#criar-imovel').modal('hide');
                toastr.success('Imóvel criado com sucesso');
            }).catch(error => {
                this.getImoveis();
                this.newEmail = '';
                this.newRua = '';
                this.newRua = '';
                this.newNumero = '';
                this.newComplemento = '';
                this.newBairro = '';
                this.newCidade = '';
                this.newEstado = '';
                this.errors = [];
                $('#criar-imovel').modal('hide');
                toastr.error('Houve um erro na criação do imóvel. Tente novamente.');
            })
        },

        createContrato: function() {
            var urlCreateImoveis = 'api/contrato';
            axios.post(urlCreateImoveis, {
                imoveis_id: this.imovel_id,
                tipo_pessoa: this.tipo_pessoa,
                documento: this.documento,
                email_contratante: this.email_contratante,
                nome_completo: this.nome_completo,
            }).then(response => {
                this.getImoveis();
                this.imovel_id = '';
                this.tipo_pessoa = '';
                this.documento = '';
                this.email_contratante = '';
                this.nome_completo = '';
                $('#criar-contrato').modal('hide');
                toastr.success('Contrato associado com sucesso.');
            }).catch(error => {
                this.getImoveis();
                this.imovel_id = '';
                this.tipo_pessoa = '';
                this.documento = '';
                this.email_contratante = '';
                this.nome_completo = '';
                $('#criar-contrato').modal('hide');
                toastr.error('Imóvel já associado a outro contrato.');
            })
        },
    },
    mounted() {
        this.getImoveis();
        setTimeout(function() {
            var table = $(".table").DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json",
                    "sZeroRecords": ""
                },
                "order": [],
                "paging": false,
                "searching": false,
                "info": false,
            });

    }, 800);

    $('#tipo_pessoa').on('change', function() {
        if($('#tipo_pessoa').val() != ''){
            $('.documento').attr('disabled',false)
            if($('#tipo_pessoa').val() == 'Física'){
                $('.documento').mask('000.000.000-00');
            } else {
                $('.documento').mask('00.000.000/0000-00');
            }
        } else {
            $('.documento').attr('disabled',true)
        }
    });

    },
});