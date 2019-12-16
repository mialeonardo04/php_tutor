	<!-- js -->
	<script src="{{ asset('theme/vendors/scripts/script.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/switchery/dist/switchery.js') }}"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="{{ asset('theme/src/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
    <!-- bootstrap-touchspin js -->
    <script src="{{ asset('theme/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/sweetalert2/sweetalert2.css') }}">
    <script src="{{ asset('theme/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/jQuery-Knob-master/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/highcharts-6.0.7/code/highcharts-more.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script>
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
        $('.switch-btn').each(function() {
            new Switchery($(this)[0], $(this).data());
        });

        // Bootstrap Touchspin
        $("input[name='demo_vertical2']").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'fa fa-plus',
            verticaldownclass: 'fa fa-minus'
        });
        $("input[name='demo3']").TouchSpin();
        $("input[name='demo1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='demo2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='demo3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='demo5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
    </script>

