<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content goes here -->
</head>

<body>
    <header class="u-align-center-sm u-align-center-xs u-clearfix u-header u-sticky u-sticky-5894 bg-white"
        id="sec-92d8">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <div class="u-left-side-logo">
                <a href="{{ route('index') }}" class="u-image u-logo u-image-1" data-image-width="1496"
                    data-image-height="728" data-animation-duration="1000" data-animation-direction="">
                    <img src="{{ url('uploads/sitesetting/' . $sitesetting->main_logo) }}"
                        class="u-logo-image u-logo-image-1" style=" ">
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
                        <!-- <li class="u-nav-item {{ Request::routeIs('index') ?: '' }}">
                            <a class="u-active-custom u-button-style u-nav-link" href="{{ route('index') }}"
                                style="padding: 10px 24px;">
                                Home
                            </a>
                        </li> -->
                        <li class="u-nav-item u-has-submenu {{ Request::routeIs('About') ? 'active' : '' }}">
                            <a id="introduction-dropdown" class="u-button-style u-nav-link" href="#"
                                style="padding: 10px 24px; color: #YourActiveColor; background-color: transparent; border-color: transparent;">
                                Introduction
                            </a>
                            <div id="introduction-submenu" class="u-nav-popup" style="display: none;">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                    <li class="u-nav-item">
                                        <a href="{{ route('About') }}" class="u-button-style u-nav-link">About Us</a>
                                    </li>
                                    <li class="u-nav-item">
                                        <a href="{{ route('Service') }}" class="u-button-style u-nav-link">Services</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!-- Other list items -->
                        <li class="u-nav-item u-has-submenu {{ Request::routeIs('Gallery', 'Video') ? 'active' : '' }}">
                            <a id="gallery-dropdown" class="u-button-style u-nav-link" href="#"
                                style="padding: 10px 24px; color: #YourActiveColor; background-color: transparent; border-color: transparent;">
                                Gallery
                            </a>
                            <div id="gallery-submenu" class="u-nav-popup" style="display: none;">
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
                        <li class="u-nav-item {{ Request::routeIs('Allprojects') ? 'active' : '' }} u-has-submenu">
                            <a id="projects-dropdown" class="u-active-custom u-button-style u-nav-link"
                                href="{{ route('Allprojects') }}" style="padding: 10px 24px;">Projects</a>
                            <div id="projects-submenu" class="u-nav-popup" style="display: none;">
                                <ul class="u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                    <li class="u-nav-item {{ Request::routeIs('Testimonial') ? 'active' : '' }}">
                                        <a href="{{ route('Testimonial') }}"
                                            class="u-button-style u-nav-link">Testimonials</a>
                                    </li>
                                    <li class="u-nav-item {{ Request::routeIs('Clients') ? 'active' : '' }}">
                                        <a href="{{ route('clientList') }}"
                                            class="u-button-style u-nav-link">Clients</a>
                                    </li>
                                    <li class="u-nav-item {{ Request::routeIs('Allprojects') ? 'active' : '' }}">
                                        <a href="{{ route('Allprojects') }}" class="u-button-style u-nav-link">All
                                            Projects</a>
                                    </li>
                                </ul>
                            </div>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var projectsDropdown = document.getElementById('projects-dropdown');
        var projectsSubmenu = document.getElementById('projects-submenu');

        projectsDropdown.addEventListener('click', function(event) {
            event.preventDefault();
            if (projectsSubmenu.style.display === 'none') {
                projectsSubmenu.style.display = 'block';
            } else {
                projectsSubmenu.style.display = 'none';
            }
        });
    });
</script>
<script>
    // JavaScript to toggle submenu display
    document.addEventListener("DOMContentLoaded", function() {
        var dropdown = document.getElementById('introduction-dropdown');
        var submenu = document.getElementById('introduction-submenu');

        dropdown.addEventListener('click', function(e) {
            e.preventDefault();
            if (submenu.style.display === 'none' || submenu.style.display === '') {
                submenu.style.display = 'block';
            } else {
                submenu.style.display = 'none';
            }
        });
    });
</script>

</html>
