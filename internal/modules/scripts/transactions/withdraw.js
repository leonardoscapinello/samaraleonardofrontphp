jQuery(document).ready(function () {
    window.setTimeout(function () {
        $("#credit_id_wallet,#debit_id_wallet,#id_category").selectpicker();
    }, 2000);
});

var config = {
    headers: {
        Authorization: "Bearer " + userSession.token
    }
};

new Vue({
    el: '#slApplication',
    data() {
        return {
            title: '',
            id_category: '',
            id_user: userSession.user,
            description: '',
            id_wallet: '',
            amount: '',
            categories: true,
            wallets: null
        }
    },
    filters: {
        currencydecimal(value) {
            return value.toFixed(2)
        }
    },
    methods: {
        getWallets: function () {
            axios
                .get('http://173.249.32.58:3030/wallets/credit', config)
                .then(response => (this.wallets = response.data));
        },
        store: function (event) {
            event.preventDefault();

            var form = document.getElementById('formElement');
            var formData = new FormData(form);
            formData.append("id_user", userSession.user);
            var object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });

            var json = JSON.stringify(object);
            json = JSON.parse(json);

            const account_plus = {
                title: 'TEC (Depósito)',
                id_category: 2, //DEFAULT CATEGORY
                description: 'Transferência entre contas',
                id_wallet: JSON.parse(json.credit_id_wallet),
                amount: JSON.parse(json.amount),
                id_user: JSON.parse(json.id_user),
                is_credit: true
            };

            const account_minus = {
                title: 'TEC (Saque)',
                id_category: 1, //DEFAULT CATEGORY
                description: 'Transferência entre contas',
                id_wallet: JSON.parse(json.debit_id_wallet),
                amount: JSON.parse(json.amount),
                id_user: JSON.parse(json.id_user),
                is_credit: false
            };


            axios
                .post('http://173.249.32.58:3030/transactions', account_plus, config)
                .then(function (response) {

                    axios
                        .post('http://173.249.32.58:3030/transactions', account_minus, config)
                        .then(function (response) {
                            swal.fire("Deu certo!", "A transação entre contas bancárias (TEC) foi realizada com sucesso.", "success");

                        })
                        .catch(function (error) {
                            swal.fire("Não foi possível finalizar o depósito, contate o suporte para correção!", error.response.data.error, "error");
                        });


                })
                .catch(function (error) {
                    swal.fire("Não foi possível finalizar o saque, contate o suporte para correção!", error.response.data.error, "error");
                });

            console.log(json);

        }
    },
    mounted() {
        this.getWallets();
    }
});


