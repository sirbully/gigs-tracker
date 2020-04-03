</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuejs-datepicker"></script>
<script>
    var app = new Vue({
        el: '#app',
        created() {
            let uri = window.location.search.substring(1);
            let params = new URLSearchParams(uri);
            this.page = params.get("page");
        },
        components: {
            vuejsDatepicker
        },
        data: {
            page: null,
            form_success: '<?= $success === false ? 'false' : 'true' ?>'
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

</body>

</html>