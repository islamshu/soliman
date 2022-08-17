<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard
    </title>
    <link rel="apple-touch-icon" href="{{ asset('backend/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css-rtl/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/sliderstyler.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css-rtl/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/vendors/css/tables/datatable/select.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/vendors/css/tables/extensions/keyTable.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
    <link
        href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/vendors/css/tables/datatable/datatables.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/simple-line-icons/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/forms/selects/select2.min.css') }}">
        <style>
            .select2 {
                width: 100% !important;
               
            }
            .radies {
                    border-radius: 50%
                }
        </style>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/chat.css') }}"> --}}


 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .bootstrap-select.btn-group .dropdown-menu li {
            position: relative !important;
            width: 100% !important;
            padding: 10px !important;
            color: #000;
        }

        .bootstrap-select.btn-group .dropdown-menu li a span.text {
            display: inline-block !important;
            color: black !important;
        }

        .bootstrap-select.btn-group .dropdown-menu li.selected {
            background: #cec3c3;

        }
        .required{
            color: red
        }
    </style>

    @yield('css')

</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->
    @include('dashboard.parts.nav')


    @include('dashboard.parts.aside')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- eCommerce statistic -->
                @yield('content')
                <!--/ Basic Horizontal Timeline -->
            </div>
        </div>
    </div>

    @include('dashboard.parts.footer')

    <script src="{{ asset('backend/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/scripts/tables/datatables/datatable-advanced.js') }}" type="text/javascript">
 </script>
   
            <script src="{{ asset('backend/slidersc.js') }}" type="text/javascript"> </script>



    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script src="{{ asset('backend/css/chat.js') }}"></script> --}}
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script src="{{ asset('backend/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>

    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->



    <script>
        $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `هل متأكد من حذف العنصر ؟`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".ckeditor").each(function(index) {
                CKEDITOR.replace($(this).attr("id"), {
                    //your configurations
                });
            });
        });
    </script>
    <script>
        function isNumber(evt)
		 {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true; }
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });
        $(".image").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
        $('#reeed').click(function() {
                    $('.usercount').empty();
                    $('.usercount').html(0);
        });
     
     
       
        $(".video").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.video-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @yield('script')
        <script>
            $('table').DataTable({
                // scrollX: true,

                "language": {
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخلات",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    }
                }
            });
            
        </script>
</body>

</html>
