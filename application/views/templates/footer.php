</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    var app = new Vue({
        el: '#app',
        created() {
            let uri = window.location.search.substring(1);
            let params = new URLSearchParams(uri);
            this.page = params.get("page");
        },
        data: {
            page: null
        },
        computed: {
            generatePassword() {
                return Math.random().toString(36).slice(2) +
                    Math.random().toString(36)
                    .toUpperCase().slice(2);
            }
        },
        methods: {
            toCurrency(num) {
                const toNum = Number(num)
                return toNum.toLocaleString(undefined, {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                })
            }
        }
    })
</script>
<script>
    document.onreadystatechange = () => {
        if (document.readyState == "interactive") {
            flatpickr("#datepicker", {});
        }
    }
</script>

</body>

</html>