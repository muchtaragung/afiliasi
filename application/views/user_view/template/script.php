<script data-require="jquery-validate@*" data-semver="1.15.0" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script data-require="jquery-validate@*" data-semver="1.15.0" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>
<script src="<?= base_url() ?>assets/vendor/animsition/js/animsition.min.js"></script>

<script src="<?= base_url() ?>assets/vendor/bootstrap/js/popper.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
    $(document).ready(function() {
        $('#home').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });
</script>

<script src="<?= base_url() ?>assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url() ?>assets/vendor/countdowntime/countdowntime.js"></script>

<script src="<?= base_url() ?>assets/js/main.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>



<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v64f9daad31f64f81be21cbef6184a5e31634941392597" integrity="sha512-gV/bogrUTVP2N3IzTDKzgP0Js1gg4fbwtYB6ftgLbKQu/V8yH2+lrKCfKHelh4SO3DPzKj4/glTO+tNJGDnb0A==" data-cf-beacon='{"rayId":"6ba26a5ecba43574","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.11.0","si":100}' crossorigin="anonymous"></script>