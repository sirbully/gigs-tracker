</div>
</div>
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
        }
    })
</script>

</body>

</html>