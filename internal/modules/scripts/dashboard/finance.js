new Vue({
    el: '#slApplication',
    data() {
        return {
            info: null,
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
        getDashboard: function () {
            axios
                .get('https://api.leonardosamara.com:8443/dashboard', this.config)
                .then(response => (this.info = response.data))
        }
    },
    mounted() {
        this.getDashboard();
    }
});

