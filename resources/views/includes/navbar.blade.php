<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content goes here -->
</head>

<body>
    <header class="u-align-center-sm u-align-center-xs u-clearfix u-header u-sticky u-sticky-5894" id="sec-92d8">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <div class="u-left-side-logo">
                <a href="{{ route('index') }}" class="u-image u-logo u-image-1" data-image-width="1496"
                    data-image-height="728" data-animation-duration="1000" data-animation-direction="">
                    <img src="{{ url('uploads/sitesetting/' . $sitesetting->main_logo) }}"
                        class="u-logo-image u-logo-image-1"
                        style=" ">
                </a>
            </div>
            <nav class="u-align-left u-menu u-menu-dropdown u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1rem; font-weight: 700;">
                    <a class="u-button-style u-custom-active-color u-custom-color u-custom-hover-color u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-nav-link u-text-custom-color-1"
                        href="#">
                        <!-- Your SVG content goes here -->
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
                        <li class="u-nav-item {{ Request::routeIs('index') ?: '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ route('index') }}"
                                style="padding: 10px 24px;">
                                Home
                            </a>
                        </li>

                        
                        {{-- <li class="u-nav-item {{ Request::routeIs('About') ? 'active' : '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ route('About') }}"
                                style="padding: 10px 24px;">Introduction</a>
                        </li> --}}



                        <li class="u-nav-item {{ Request::routeIs('About') ? 'active' : '' }}">
                            <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                style="padding: 10px 31px 10px 24px;" href="#">Introduction</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-3">
    
                               
                                        <li class="u-nav-item">
                                            <a href="{{ route('About') }}"
                                                class="u-button-style u-nav-link u-white">
                                                About Us
                                            </a>
                                        </li>
                                        <li class="u-nav-item">
                                            <a href="{{ route('Service') }}"
                                                class="u-button-style u-nav-link u-white">
                                                Services
                                            </a>
                                        </li>
                                        <li class="u-nav-item">
                                            <a href="{{ route('Service') }}"
                                                class="u-button-style u-nav-link u-white">
                                                Clients
                                            </a>
                                        </li>
                                        <li class="u-nav-item">
                                            <a href="{{ route('Testimonial') }}"
                                                class="u-button-style u-nav-link u-white">
                                                Testimonials
                                            </a>
                                        </li>

    
                                </ul>
                            </div>
                        </li>
    





                        <!-- Other list items -->
                        {{-- <li class="u-nav-item {{ Request::routeIs('Service') ? 'active' : '' }}">
                            <a id="services-link" class="u-active-custom u-button-style u-nav-link"
                                href="{{ route('Service') }}" style="padding: 10px 24px;">Services</a>
                        </li> --}}
                        <!-- Other list items -->
                        <li class="u-nav-item u-has-submenu {{ Request::routeIs('Gallery', 'Video') ? 'active' : '' }}">
                            <a id="gallery-dropdown" class="u-button-style u-nav-link" href="#"
                                style="padding: 10px 24px; color: #YourActiveColor; background-color: transparent; border-color: transparent;">
                                Gallery
                            </a>
                            <div id="gallery-submenu" class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                    <li class="u-nav-item">
                                        <a href="{{ route('Gallery') }}" class="u-button-style u-nav-link">Image
                                            Gallery</a>
                                    </li>
                                    <li class="u-nav-item">
                                        <a href="{{ route('Video') }}" class="u-button-style u-nav-link">Video
                                            Gallery</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Other list items -->
                        <li class="u-nav-item {{ Request::routeIs('Allprojects') ? 'active' : '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ route('Allprojects') }}"
                                style="padding: 10px 24px;">Projects</a>
                        </li>
                        <!-- Other list items -->
                        <li class="u-nav-item {{ Request::routeIs('Career') ? 'active' : '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ route('Career') }}"
                                style="padding: 10px 24px;">Careers</a>
                        </li>
                        <!-- Other list items -->
                        <li class="u-nav-item {{ Request::routeIs('blogs') ? 'active' : '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ route('blogs') }}"
                                style="padding: 10px 24px;">Blogs</a>
                        </li>
                        <!-- Other list items -->
                        <li class="u-nav-item {{ Request::routeIs('Testimonial') ? 'active' : '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ route('Testimonial') }}"
                                style="padding: 10px 24px;">Testimonials</a>
                        </li>
                        <!-- Other list items -->
                        <li class="u-nav-item {{ Request::routeIs('contactpage') ? 'active' : '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ url('contactpage') }}"
                                style="padding: 10px 24px;">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>

       








</html>
