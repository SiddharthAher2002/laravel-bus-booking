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
    <title>Aria - Business HTML Landing Page Template</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
   

    <link href="{{ asset('AriaTheme/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('AriaTheme/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('AriaTheme/css/swiper.css') }}" rel="stylesheet">
	<link href="{{ asset('AriaTheme/css/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('AriaTheme/css/styles.css') }}" rel="stylesheet">

      <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	
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


    <!-- Scripts -->
     <!-- Add Bootstrap JS and jQuery scripts at the end of the body for functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    
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
        let bookingDetails;
        $(document).ready(function() {
            //---------   Disable buses which are fully booked -------------------
            $('#booking_date').on("blur",function() {
                console.log("blur called");
                var booking_date = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('bus.on.date', ['booking_date' => '']) }}" + "/" + booking_date,
                    success: function(response) {

                        bookingDetails = response.bookingDetails;
                        busActiveStatus = response.busActiveStatus;
                        console.log("blur",bookingDetails);
                        console.log(busActiveStatus)
                        
                        checkArrExist = Object.keys(bookingDetails).length;
                        if (checkArrExist != 0) {

                            for (let busId in bookingDetails) {

                                const seatStatuses = bookingDetails[busId];
                                const totalSeats = Object.keys(seatStatuses).length;
                                let bookedSeatsCount = 0;


                                for (let seatNumber in seatStatuses) {
                                    const seatStatus = seatStatuses[seatNumber];


                                    if (seatStatus === 2) { // removing seatStatus === 1 ||  condition to enable the user if he had booked the seats
                                        bookedSeatsCount++;
                                    }

                                }

                                let selectedOption = $('#busSelect option[value="' + busId +'"]');
                                
                                if (bookedSeatsCount >= totalSeats) {
                                    selectedOption.prop('disabled', true);
                                } else {
                                    selectedOption.prop('disabled', false);
                                }
                            }

                        }
                        // else{
                        //     $('#busSelect option').prop('disabled', false);
                            
                        // }

                        for(let bus in busActiveStatus){
                            if(busActiveStatus[bus]==0){
                                let selectedOption = $('#busSelect option[value="' + bus +'"]');
                                 selectedOption.prop('disabled', true);
                            }
                        }

                        $('#busSelect').trigger('change');

                    },
                    error: function(error) {

                    }
                })
                bookingDetails = bookingDetails;
                
            });
            //------------ Show bus seats on selecting bus option  --------------------
            $('#busSelect').on("change",function() {
                const selectedOption = $('#busSelect option:selected');
                const totalSeats = parseInt(selectedOption.data('total-seats'));

                const seatSelection = $('#seatSelection');
                seatSelection.empty();

                const seatsPerRow = 5;
                const numRows = Math.ceil(totalSeats / seatsPerRow);



                console.log("change :",bookingDetails);
                for (let row = 1; row <= numRows; row++) {
                    
                    const seatRow = $('<div class="seat-row d-flex"></div>');

                    for (let col = 1; col <= seatsPerRow; col++) {
                        const seatNumber = (row - 1) * seatsPerRow + col;
                        if (seatNumber <= totalSeats) {
                            const seatDiv = $(
                                '<a class="seat text-decoration-none" id="seat"></a>').text(
                                'Seat ' + seatNumber).attr('value', seatNumber);


                            const busId = selectedOption.val();


                            const seatStatus = bookingDetails[busId] && bookingDetails[busId][seatNumber] ||0;
                            
                            if (seatStatus === 0) {
                                seatDiv.addClass('seat-unbooked');
                            } else if (seatStatus === 1) {
                                seatDiv.addClass('seat-booked');
                            } else if (seatStatus === 2) {
                                seatDiv.addClass('seat-booked-other');
                            }

                            if (col === 3) {
                                const emptySeatDiv = $('<div class="seat empty-seat"></div>');
                                seatRow.append(emptySeatDiv);
                            }
                            seatRow.append(seatDiv);
                        }
                    }

                    seatSelection.append(seatRow);
                }
            });




            //------------- seat selection toggle color and store seat numbers in array --------------
            $('#seatSelection').on('click', '#seat', function() {
                $(this).toggleClass('selected-seat');

                const seatValue = $(this).attr('value');
                const isSelected = $(this).hasClass('selected-seat');

                if (isSelected) {
                    console.log("selected", seatValue);
                    selectedSeatsArray.push(seatValue);

                } else {
                    console.log("de-selected", seatValue);
                    let newArr = selectedSeatsArray.filter(element => element !== seatValue);
                    selectedSeatsArray = newArr;
                }
                console.log(selectedSeatsArray);

            });

            $('#submit-booking-form').click(function() {
                console.log("check");
                var cus_name = $('#cus_name').val();
                var booking_date = $('#booking_date').val();
                var bus_id = $('#busSelect').val();
                const seats = selectedSeatsArray;

                // console.log(cus_name);
                // console.log(booking_date);
                // console.log(bus_id);
                // console.log(seats.length);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('cus.post.booking') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cus_name: cus_name,
                        booking_date: booking_date,
                        bus_id: bus_id,
                        seats: seats
                    },
                    success: function(response) {
                        alert("Journey Booked Successfully!");
                        window.location.href = '{{ route('home') }}';
                    },
                    error: function(error) {
                        console.log('error');
                    }


                });

            });


            // Filter Available bus from travel source and destination
            $('#to').on("blur",function(){
                var from = $('#from').val();
                var to = $(this).val();

                $.ajax({
                    type:'GET',
                    url: "{{ route('bus.get.available',['from' => ''],['to' => '']) }}" + "/" + from +"/" + to,
                    success : function(response){
                        if(response){
                    
                            let availableBuses = response.availableBuses;
                            let buses = response.buses;
                            let count = 0;
                            for(let i in buses ){
                                let flag = 0;
                                for(let j in availableBuses){
                                    if(buses[i].id==availableBuses[j].id){
                                        flag=1;
                                        count++;
                                        break;
                                    }                               
                                }
                                if(!flag){
                                    let bus = buses[i].id;
                                    let selectedOption = $('#busSelect option[value="' + bus +'"]');
                                    selectedOption.prop('disabled', true);
                                }
                            }
                            $('#number').text("Number of avaialble buses :"+count);
                            
                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });


        });
    </script>
</body>
</html>


@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
{{ session()->forget('error') }}
@if(session('busAdded')=='1')
    <script>alert('Bus Added Successfully')</script>
@endif
{{ session()->forget('busAdded') }}