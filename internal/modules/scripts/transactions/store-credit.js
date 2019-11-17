jQuery(document).ready(function () {
    window.setTimeout(function () {
        $("#id_category,#id_wallet").selectpicker();
    }, 2000);
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
                .get('http://173.249.32.58:3030/categories/credit', this.config)
                .then(response => (this.categories = response.data));
        },
        getWallets: function () {
            axios
                .get('http://173.249.32.58:3030/wallets/credit', this.config)
                .then(response => (this.wallets = response.data));
        },
        store: function (event) {
            event.preventDefault();

            var form = document.getElementById('formElement');
            var formData = new FormData(form);

            formData.append("id_user", userSession.user);
            formData.append("is_credit", true);

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
                .post('http://173.249.32.58:3030/transactions', json, this.config)
                .then(function (response) {
                    swal.fire("Deu certo!", "Registro concluído com sucesso", "success");
                })
                .catch(function (error) {

                    swal.fire("Não foi possível concluír o cadastro.", error.response.data.error, "error");

                });

            console.log(json);

        }
    },
    mounted() {
        this.getCategories();
        this.getWallets();
    }
});


