<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('/bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="{{ asset('/bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('/bower_components/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="{{ asset('/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/summernote/summernote-bs4.min.css') }}">

    <style>
        .bgColor {
            background-color: #2d7ae5;
        }

        .seat {
            width: 50px;
            height: 50px;
            border: 1px solid #000;
            text-align: center;
            line-height: 50px;
            margin: 5px;
            cursor: pointer;
            font-size: 10px;
        }

        .empty-seat {
            border: none;
            width: 50px;
        }

        .selected-seat {
            background-color: #19db19;
            color: white;
        }

        .seat-booked {
            background-color: orange;
            color: white;
            pointer-events: none;
        }

        .seat-booked-other {
            background-color: red;
            color: white;
            pointer-events: none;
        }

        .seat-booked-view {
            background-color: red;
            color: white;
        }

        a {
            text-decoration: none;
            color: inherit;

        }

        .popup-box {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 2px solid black;
            padding: 10px;
            z-index: 1000;
        }

        ul {
            list-style-type: none;
            color: white;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.includes.mainsidebar')
        <!-- /.content-wrapper -->

        <div class="content-wrapper">
          @yield('content')
        </div>


        @include('admin.includes.footer')

        
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- ./wrapper -->

    <script src="{{ asset('/bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="{{ asset('/bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/bower_components/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
    </script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/bower_components/admin-lte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/bower_components/admin-lte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/bower_components/admin-lte/dist/js/pages/dashboard.js') }}"></script>

    <script>
        $(document).ready(function() {

            // ------------ delete section in survey listing --------------
            $(".deleteBtn").click(function() {
                var busId = $(this).data('bus-id');
                var confirmDelete = confirm("Are you sure you want to delete this record?");
                var deleteButton = $(this);
                if (confirmDelete) {
                    $.ajax({
                        url: "{{ route('admin.delete.bus', ['busId' => '']) }}" + "/" + busId,
                        type: 'GET',
                        datatype: 'json',
                        success: function(response) {
                            if (response.success) {
                                deleteButton.closest('.record-container').remove();
                            } else {
                                alert('Error deleting record.');
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('AJAX request failed.');
                            console.log(error);
                        }
                    });
                }

            });

            $('.toggle-btn').click(function() {
                var busId = $(this).data('bus-id');
                var button = $(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.toggle.isactive', ['busId' => '']) }}" + "/" + busId,
                    data: {
                        _token: '{{ csrf_token() }}',
                        busId: busId
                    },
                    success: function(response) {
                        if (response.is_active == "1") {
                            button.removeClass('btn-danger').addClass('btn-success');
                            button.text('Active');
                        } else {
                            button.removeClass('btn-success').addClass('btn-danger');
                            button.text('Inactive');
                        }
                    },
                    error: function(response) {
                        alert('Error: ' + response.responseJSON.message);
                    }
                });
            });


            $('#searchInput').keyup(function() {
                let searchTxt = $(this).val();
                $.ajax({
                    type: "get",
                    url: "{{ route('admin.show.buslist', ['searchTxt' => '']) }}" + "/" +
                        searchTxt,
                    success: function(response) {
                        var responseContent = $(response);

                        var listContainer = responseContent.find('#listContainer');

                        $('#listContainer').html(listContainer.html());
                    },
                });
            });

            const totalSeats = $('#busDetails').data('bus-total-seats');
            const busId = $('#busDetails').data('bus-id');

            $('#view_date').blur(function() {

                const date = $(this).val();
                const seatsPerRow = 5;
                const numRows = Math.ceil(totalSeats / seatsPerRow);
                const viewSeats = $('#seatView');

                $.ajax({
                    type: "Get",
                    url: "{{ route('admin.view.seat.details', ['busId' => ':busId', 'date' => ':date']) }}"
                        .replace(':busId', busId).replace(':date', date),
                    success: function(response) {

                        viewSeats.empty();
                        console.log(response);
                        const seatDetails = response.seatDetails;
                        for (let row = 1; row <= numRows; row++) {
                            const seatRow = $('<div class="seat-row d-flex"></div>');

                            for (let col = 1; col <= seatsPerRow; col++) {
                                const seatNumber = (row - 1) * seatsPerRow + col;
                                if (seatNumber <= totalSeats) {
                                    const seatDiv = $(
                                        '<a class="seat text-decoration-none" id="seat"></a>'
                                    ).text('Seat ' + seatNumber).attr('value',
                                        seatNumber);


                                    if (seatDetails[seatNumber] != 0) {
                                        seatDiv.addClass('seat-booked-view');
                                    }
                                    if (col === 3) {
                                        const emptySeatDiv = $(
                                            '<div class="seat empty-seat"></div>');
                                        seatRow.append(emptySeatDiv);
                                    }
                                    seatRow.append(seatDiv);

                                    seatDiv.on('click', function() {
                                        const seatNumber = $(this).attr('value');
                                        const customerDetails = response.seatDetails[
                                            seatNumber];
                                        let name = customerDetails.cus_name;
                                        let id = customerDetails.cus_id;
                                        let email = customerDetails.cus_email;

                                        if (id!== undefined && id !== 0) {

                                            let popupBox = $('.popup-box');
                                            if (popupBox.length === 0) {
                                                popupBox = $(
                                                    '<div class="popup-box"></div>');
                                                $('body').append(popupBox);
                                            }
                                            popupBox.toggle();

                                            if (popupBox.is(':visible')) {
                                                const seatOffset = $(this).offset();
                                                const seatWidth = $(this).width();
                                                const seatHeight = $(this).height();

                                                const popupWidth = popupBox
                                                    .outerWidth();
                                                const popupHeight = popupBox
                                                    .outerHeight();

                                                const left = seatOffset.left +
                                                    seatWidth;
                                                const top = seatOffset.top + (
                                                    seatHeight - popupHeight) / 2;

                                                popupBox.html('ID: ' + id +'<br>Name: '+name + '<br>Email: '+email);

                                                popupBox.css({
                                                    left: left + 'px',
                                                    top: top + 'px'
                                                });
                                            }
                                        } else {
                                            let popupBox = $('.popup-box');
                                            if (popupBox.length === 0) {
                                                popupBox = $(
                                                    '<div class="popup-box"></div>');
                                                $('body').append(popupBox);
                                            }
                                            popupBox.toggle();
                                            if (popupBox.is(':visible')) {
                                                const seatOffset = $(this).offset();
                                                const seatWidth = $(this).width();
                                                const seatHeight = $(this).height();

                                                const popupWidth = popupBox
                                                    .outerWidth();
                                                const popupHeight = popupBox
                                                    .outerHeight();

                                                const left = seatOffset.left +
                                                    seatWidth;
                                                const top = seatOffset.top + (
                                                    seatHeight - popupHeight) / 2;

                                                popupBox.text('No Booking');

                                                popupBox.css({
                                                    left: left + 'px',
                                                    top: top + 'px'
                                                });
                                            }
                                        }
                                    });
                                }

                            }

                            viewSeats.append(seatRow);
                        }
                    }
                });

            });

        })
    </script>


</body>

</html>
