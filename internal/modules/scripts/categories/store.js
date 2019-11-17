jQuery(document).ready(function () {
    window.setTimeout(function () {
        reloadFields();
    }, 150);
});

function reloadFields() {
    //$(".money").mask('000000000000.00', {reverse: true});
    $("#transaction_type").selectpicker();
}


new Vue({
    el: '#slApplication',
    data() {
        return {
            loader: true,
            category_name: null,

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
        store: function (event) {
            event.preventDefault();

            var form = document.getElementById('formElement');
            var formData = new FormData(form);

            var object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });
            var json = JSON.stringify(object);
            json = JSON.parse(json);

            console.log(json.transaction_type);

            if (json.transaction_type === "debit") {
                json.is_credit = false;
            } else {
                json.is_credit = true;
            }

            if (json.category_name.length < 3) {
                swal.fire("Dê um nome mais significativo a categoria", "warning");
                return;
            }


            axios
                .post('http://173.249.32.58:3030/categories', json, this.config)
                .then(function (response) {
                    swal.fire("Deu certo!", "Categoria cadastrada com sucesso", "success");
                })
                .catch(function (error) {
                    swal.fire("Não foi possível concluír o cadastro.", error.response.data.error, "error");
                });

            console.log(json);

        },
        checkCredit: function () {
            const form = document.getElementById('formElement');
            const formData = new FormData(form);

            const object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });
            let json = JSON.stringify(object);
            json = JSON.parse(json);
            this.is_credit = json.wallet_type === 'CC';
        }
    },
    mounted() {
    }
});


