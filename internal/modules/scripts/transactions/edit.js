/// EDIT IS NOT WORKING!!!! NEED BUILD IT

jQuery(document).ready(function () {
    window.setInterval(function () {
        $("#id_category,#id_wallet").selectpicker();
    }, 100);
});


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
            categories: null,
            wallets: null,
            config: {
                headers: {
                    Authorization: "Bearer " + userSession.token
                }
            },
        }
    },
    filters: {
        currencydecimal(value) {
            return value.toFixed(2)
        }
    },
    methods: {
        getCategories: function () {
            axios
                .get('https://api.leonardosamara.com:8443/categories/debit', this.config)
                .then(response => (this.categories = response.data));
        },
        getWallets: function () {
            axios
                .get('https://api.leonardosamara.com:8443/wallets', this.config)
                .then(response => (this.wallets = response.data));
        },
        getTransaction: function () {
            var id_transaction = document.getElementById("id_transaction").value;
            axios
                .get('https://api.leonardosamara.com:8443/transactions/' + id_transaction, this.config)
                .then(response => {
                    this.transaction = response.data
                });
        },
        store: function (event) {
            event.preventDefault();
            var form = document.getElementById('formElement');
            var formData = new FormData(form);
            formData.append("id_user", userSession.user);
            formData.append("is_credit", false);
            var object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });
            var json = JSON.stringify(object);
            json = JSON.parse(json);
            if (json.title.length < 5) {
                swal.fire("Conte um pouco mais...", "Preencha o título do registro com um pouco mais de detalhes.", "warning");
                return;
            }
            axios
                .put('https://api.leonardosamara.com:8443/transactions', json, this.config)
                .then(function (response) {
                    swal.fire("Deu certo!", "Registro atualizado com sucesso", "success");
                })
                .catch(function (error) {
                    swal.fire("Não foi possível atualizar o registro.", error.response.data.error, "error");
                });
            console.log(json);
        }
    },
    mounted() {
        this.getCategories();
        this.getWallets();
        this.getTransaction();
    }
});


