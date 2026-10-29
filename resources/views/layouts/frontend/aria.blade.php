<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Bus-Book | Online Bus Ticket Booking & Reservation</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700,800&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&display=swap&subset=latin-ext" rel="stylesheet">

    <link href="{{ asset('AriaTheme/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('AriaTheme/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('AriaTheme/css/swiper.css') }}" rel="stylesheet">
	<link href="{{ asset('AriaTheme/css/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('AriaTheme/css/styles.css') }}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{asset('AriaTheme/images/favicon.png')}}">

    <!-- Overriding the Aria Theme Css -->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/busBookCustom.css') }}" rel="stylesheet">

</head>
<body data-spy="scroll" data-target=".fixed-top">

    <!-- Nav Bar -->
    <div>
        @include('frontend.aria_includes.navbar')
    </div>
    <!-- End Nav Bar -->

    <div>
        @yield('content')
    </div>
   

    <!-- Footer -->
     <div class="footer">
        @include('frontend.aria_includes.footer')
    </div>

    <!-- AI Chatbot Floating Helper -->
    @include('frontend.aria_includes.chatbot')


    <!-- Scripts -->
    <script src="{{ asset('AriaTheme/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ asset('AriaTheme/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ asset('AriaTheme/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('AriaTheme/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('AriaTheme/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('AriaTheme/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ asset('AriaTheme/js/morphext.min.js') }}"></script> <!-- Morphtext rotating text in the header -->
    <script src="{{ asset('AriaTheme/js/isotope.pkgd.min.js') }}"></script> <!-- Isotope for filter -->
    <script src="{{ asset('AriaTheme/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ asset('AriaTheme/js/scripts.js') }}"></script> <!-- Custom scripts -->
        <script>
        let selectedSeatsArray = [];
        let bookingDetails = {};
        let busActiveStatus = {};

        $(document).ready(function() {

            // --------- Helper: re-apply active-status + full-booked filters ---------------
            function applyBusFilters() {
                for (let bus in busActiveStatus) {
                    if (busActiveStatus[bus] == 0) {
                        $('#busSelect option[value=' + bus + ']').prop('disabled', true);
                    }
                }
                for (let busId in bookingDetails) {
                    const seatStatuses = bookingDetails[busId];
                    const totalSeats = Object.keys(seatStatuses).length;
                    let bookedSeatsCount = 0;
                    for (let seatNumber in seatStatuses) {
                        if (seatStatuses[seatNumber] === 2) bookedSeatsCount++;
                    }
                    let opt = $('#busSelect option[value=' + busId + ']');
                    if (bookedSeatsCount >= totalSeats) { opt.prop('disabled', true); }
                    else { if (!opt.data('route-disabled')) opt.prop('disabled', false); }
                }
            }

            $('#booking_date').on('change', function() {
                var booking_date = $(this).val();
                if (!booking_date) return;
                $.ajax({
                    type: 'GET',
                    url: '{{ route("bus.on.date", ["booking_date" => ""]) }}' + '/' + booking_date,
                    success: function(response) {
                        bookingDetails  = response.bookingDetails  || {};
                        busActiveStatus = response.busActiveStatus || {};
                        $('#busSelect option:not(:first-child)').prop('disabled', false).removeData('route-disabled');
                        applyBusFilters();
                        var from = $('#from').val(), to = $('#to').val();
                        if (from && to) applyRouteFilter(from, to);
                        if ($('#busSelect').val()) $('#busSelect').trigger('change');
                    },
                    error: function() { console.log('Error fetching booking details.'); }
                });
            });

            function applyRouteFilter(from, to) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("bus.get.available", ["from" => ""]) }}' + '/' + from + '/' + to,
                    success: function(response) {
                        if (!response) return;
                        let availableBuses = response.availableBuses;
                        let buses = response.buses;
                        let count = 0;
                        $('#busSelect option:not(:first-child)').prop('disabled', false).removeData('route-disabled');
                        for (let i in buses) {
                            let found = false;
                            for (let j in availableBuses) {
                                if (buses[i].id == availableBuses[j].id) { found = true; count++; break; }
                            }
                            if (!found) {
                                let opt = $('#busSelect option[value=' + buses[i].id + ']');
                                opt.prop('disabled', true).data('route-disabled', true);
                            }
                        }
                        applyBusFilters();
                        $('#number').text('Available buses on this route: ' + count);
                    },
                    error: function() { console.log('Error fetching available buses.'); }
                });
            }

            $('#from').on('change', function() {
                var from = $(this).val(), to = $('#to').val();
                if (from && to) applyRouteFilter(from, to);
            });
            $('#to').on('change', function() {
                var from = $('#from').val(), to = $(this).val();
                if (from && to) applyRouteFilter(from, to);
            });

            $('#busSelect').on('change', function() {
                const selectedOption = $('#busSelect option:selected');
                const totalSeats = parseInt(selectedOption.data('total-seats'));
                const busId = selectedOption.val();
                const seatSelection = $('#seatSelection');
                seatSelection.empty();
                selectedSeatsArray = [];
                if (!totalSeats || !busId) return;
                const seatsPerRow = 5;
                const numRows = Math.ceil(totalSeats / seatsPerRow);
                for (let row = 1; row <= numRows; row++) {
                    const seatRow = $('<div class="seat-row d-flex"></div>');
                    for (let col = 1; col <= seatsPerRow; col++) {
                        const seatNumber = (row - 1) * seatsPerRow + col;
                        if (seatNumber <= totalSeats) {
                            const seatDiv = $('<a class="seat text-decoration-none" data-seat="' + seatNumber + '"></a>').text('S' + seatNumber);
                            const seatStatus = (bookingDetails[busId] && bookingDetails[busId][seatNumber]) || 0;
                            if (seatStatus === 1) seatDiv.addClass('seat-booked');
                            else if (seatStatus === 2) seatDiv.addClass('seat-booked-other');
                            if (col === 3) seatRow.append($('<div class="seat empty-seat"></div>'));
                            seatRow.append(seatDiv);
                        }
                    }
                    seatSelection.append(seatRow);
                }
            });

            $('#seatSelection').on('click', '.seat:not(.seat-booked):not(.seat-booked-other)', function() {
                $(this).toggleClass('selected-seat');
                const seatValue = String($(this).data('seat'));
                const isSelected = $(this).hasClass('selected-seat');
                if (isSelected) { selectedSeatsArray.push(seatValue); }
                else { selectedSeatsArray = selectedSeatsArray.filter(s => s !== seatValue); }
            });

            $('#submit-booking-form').on('click', function() {
                var cus_name = $('#cus_name').val();
                var booking_date = $('#booking_date').val();
                var bus_id = $('#busSelect').val();
                if (!cus_name || !booking_date || !bus_id) {
                    alert('Please fill in your name, travel date, and select a bus.'); return;
                }
                if (selectedSeatsArray.length === 0) {
                    alert('Please select at least one seat.'); return;
                }
                if (!$('#lterms').is(':checked')) {
                    alert('Please agree to the Terms & Conditions.'); return;
                }
                $.ajax({
                    type: 'POST',
                    url: '{{ route("cus.post.booking") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cus_name: cus_name,
                        booking_date: booking_date,
                        bus_id: bus_id,
                        seats: selectedSeatsArray
                    },
                    success: function() {
                        alert('Journey Booked Successfully!');
                        window.location.href = '{{ route("home") }}';
                    },
                    error: function(xhr) {
                        var msg = 'Booking failed. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                        alert(msg);
                    }
                });
            });

        });
    </script>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show fixed-bottom m-3" role="alert" style="max-width: 400px; z-index: 9999;">
            <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ session()->forget('error') }}
    @endif
    @if(session('busAdded')=='1')
        <script>alert('Bus Added Successfully');</script>
        {{ session()->forget('busAdded') }}
    @endif
</body>
</html>