 @extends('layouts.frontend.aria')

 @section('content')

     <!-- Header -->
    <div>
        @include('frontend.aria_includes.header')
    </div>
    <!-- End-Header -->
 
    <!-- Intro Section -->
    <div>
        @include('frontend.aria_includes.homepage-sections.intro')
    </div>
    <!-- End-Intro Section -->

    <!-- Service Sections -->
    <div>
        @include('frontend.aria_includes.homepage-sections.service')
    </div>

    <!-- Details (register-bus) Sections -->
    <div class="register-bus">
        @include('frontend.aria_includes.homepage-sections.detials')
    </div>

    <!--Contact-us Section -->
     <div class="contact-us">
        @include('frontend.aria_includes.homepage-sections.contactus')
    </div>

@endsection