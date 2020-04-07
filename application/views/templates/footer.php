</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="<?= asset_url() ?>js/jquery.min.js"></script>
<script src="<?= asset_url() ?>js/popper.min.js"></script>
<script src="<?= asset_url() ?>js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="<?= asset_url() ?>js/add-to-calendar.js"></script>
<script src="<?= asset_url() ?>js/bootstrap-notify.min.js"></script>
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
    <?php if ($this->session->flashdata('flash')) : ?>
        $.notify({
            message: '<?= $this->session->flashdata('flash'); ?>'
        }, {
            type: 'primary',
            delay: 800,
        });
    <?php endif; ?>

    document.onreadystatechange = () => {
        if (document.readyState == "interactive") {
            flatpickr("#datepicker", {});
        }
    }

    document.getElementById('song-notes').onchange = function() {
        const file = (this.value).replace(/.*[\/\\]/, '');
        document.getElementById('song-notes-label').textContent = file;
    };
</script>

</body>

</html>