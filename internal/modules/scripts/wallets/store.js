jQuery(document).ready(function () {
    window.setTimeout(function () {
        reloadFields();
    }, 150);
});

function reloadFields() {
    $(".money").mask('000000000000.00', {reverse: true});
    $("#wallet_type,#due_day,#icon").selectpicker();
}


new Vue({
    el: '#slApplication',
    data() {
        return {
            interval: null,
            is_credit: false,
            loader: true,
            name: '',
            wallet_type: '',
            color: '',
            credit_limit: '',
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

            if (json.wallet_type === "CC") {
                if (!(json.credit_limit > 0)) {
                    swal.fire("Para registro de cartões de crédito, selecione o limite de crédito", "warning");
                    return;
                } else if (!(json.due_day !== "")) {
                    swal.fire("Para registro de cartões de crédito, selecione o dia de vencimento", "warning");
                    return;
                } else {
                    json.credit_limit = parseFloat(json.credit_limit);
                    json.due_day = parseInt(json.due_day);
                }
            } else {
                json.credit_limit = undefined;
                json.due_day = undefined;
            }

            if (json.name.length < 2) {
                swal.fire("Dê um nome mais significativo a carteira", "warning");
                return;
            }

            axios
                .post('https://api.leonardosamara.com:8443/wallets', json, this.config)
                .then(function (response) {
                    swal.fire("Deu certo!", "Carteira cadastrada com sucesso", "success");
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
        this.interval = setInterval(function () {
            this.checkCredit();
            reloadFields();
        }.bind(this), 100);
    }
});


