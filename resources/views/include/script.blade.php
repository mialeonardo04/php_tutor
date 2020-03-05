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
    <script src="{{ asset('theme/src/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/responsive.bootstrap4.js') }}"></script>
    <!-- buttons for Export datatable -->
    <script src="{{ asset('theme/src/plugins/datatables/media/js/button/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/button/buttons.bootstrap4.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/button/buttons.print.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/button/buttons.html5.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/button/buttons.flash.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/button/pdfmake.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/media/js/button/vfs_fonts.js') }}"></script>
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
    <script>
        $('document').ready(function(){
            $('.data-table').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[4, 8, 12, -1], [4, 8, 12, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search"
                },
            });
            $('.data-table-export').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[4, 8, 12, -1], [4, 8, 12, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search"
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'pdf', 'print'
                ]
            });
            var table = $('.select-row').DataTable();
            $('.select-row tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            var multipletable = $('.multiple-select-row').DataTable();
            $('.multiple-select-row tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });
        });
    </script>
    <script src="{{ asset('theme/src/plugins/cropperjs/dist/cropper.js')}}"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var image = document.getElementById('image');
            var cropBoxData;
            var canvasData;
            var cropper;

            $('#modal').on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                    autoCropArea: 0.5,
                    dragMode: 'move',
                    aspectRatio: 3 / 3,
                    restore: false,
                    guides: false,
                    center: false,
                    highlight: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false,
                    ready: function () {
                        cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                    }
                });
            }).on('hidden.bs.modal', function () {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input').attr('autocomplete','off');
        });
    </script>
    <script src="{{ asset('form/ace-builds/src-noconflict/ace.js')}}"></script>
    <script>
        function createEditor(name) {
            // find the textarea
            var textarea = document.querySelector("form textarea[name=" + name + "]");

            // create ace editor
            var editor = ace.edit()
            editor.container.style.height = "400px";
            editor.container.style.width = "1000px";
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("ace/mode/php");
            editor.session.setValue(textarea.value);
            editor.setOptions({
                fontSize: "12pt"
            });

            // replace textarea with ace
            textarea.parentNode.insertBefore(editor.container, textarea);
            textarea.style.display = "none";
            // find the parent form and add submit event listener
            var form = textarea;
            while (form && form.localName != "form") form = form.parentNode;
            form.addEventListener("submit", function() {
                // update value of textarea to match value in ace
                textarea.value = editor.getValue();
            }, true)
        }
        createEditor("code")
    </script>
    {{--<script>--}}
        {{--setTimeout(function(){--}}
            {{--$('#hehe').hide();--}}
        {{--}, 60000);--}}
    {{--</script>--}}
    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;

            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(minutes + ":" + seconds);

                if (--timer < 0) {
                    document.getElementById('notiftime').style.display = "none";
                    document.getElementById('hehe').style.display = "none";
                    document.getElementById('formaction2').style.display = "block";

                }
                // if ((--timer < 10) && (--timer >=0)) {
                //     document.getElementById('notiftime').style.color = "red";
                // }
            }, 1000);
        }

        jQuery(function ($) {
            var fiveMinutes = 60 * 20,
                display = $('#time');
            startTimer(fiveMinutes, display);
        });
    </script>
