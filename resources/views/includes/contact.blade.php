<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form with reCAPTCHA</title>
    <!-- Include the reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Define verifyTokenRoute variable -->
    <script>
        var verifyTokenRoute = '{{ route('verify_token') }}';
    </script>
</head>

<body>

    <section class="u-align-center u-clearfix u-grey-5 u-section-11" id="sec-be4d">
        <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
            <h1 class="u-text u-text-custom-color-1 u-text-default u-text-1 mb-5">{{ __('Contact') }}</h1>

            <div class="u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
                <!-- Display success message if set -->
                <div id="successMessage"></div>

                <form action="{{ route('Contact.store') }}" method="POST"
                    class="u-clearfix u-form-spacing-20 u-form-vertical u-inner-form" style="padding: 10px"
                    enctype="multipart/form-data" id="contactForm">
                    @csrf

                    <div class="u-form-group u-form-name u-label-none">
                        <label for="name-3b9a" class="u-label">Name</label>
                        <input type="text" placeholder="Enter your Name" id="name-3b9a" name="name"
                            class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-1"
                            required="">
                    </div>

                    <div class="u-form-email u-form-group u-label-none">
                        <label for="email-3b9a" class="u-label">Email</label>
                        <input type="email" placeholder="Enter a valid email address" id="email-3b9a" name="email"
                            class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-2"
                            required="">
                    </div>

                    <div class="u-form-group u-form-phone u-label-none u-form-group-3">
                        <label for="phone-5a50" class="u-label">Phone</label>
                        <input type="tel"
                            pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                            placeholder="Enter your phone (e.g. +14155552675)" id="phone-5a50" name="phone"
                            class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-3"
                            required="">
                    </div>

                    <div class="u-form-group u-form-message u-label-none">
                        <label for="message-3b9a" class="u-label">Message</label>
                        <textarea placeholder="Enter your message" rows="4" cols="50" id="message-3b9a" name="message"
                            class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-4"
                            required=""></textarea>
                    </div>

                    <!-- Add reCAPTCHA field -->
                    <div class="u-form-group">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    </div>

                    <!-- Add an ID to your submit button for easier access in JavaScript -->
                    <input type="submit" value="submit" id="submitBtn"
                        class="u-active-custom-color-2 u-border-2 u-border-active-white u-border-custom-color-1 u-border-hover-white u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-hover-custom-color-2 u-radius-50 u-btn-1">
                </form>
            </div>

            <div class="u-grey-light-2 u-map u-map-1">
                <div class="embed-responsive">
                    <iframe class="embed-responsive-item" src="{{ $sitesetting->google_maps }}"
                        data-map="JTdCJTIyYWRkcmVzcyUyMiUzQSUyMk1hbmhhdHRhbiUyQyUyME5ldyUyQyUyME9haXklMjIlMkMlMjJ6b29tJTIyJTNBMTAlMkMlMjJ0eXBlSWQlMjIlM0ElMjJyb2FkJTIyJTJDJTIybGFuZyUyMiUzQW51bGwlMkMlMjJhcGlLZXklMjIlM0FudWxsJTJDJTIybWFya2VycyUyMiUzQSU1QiU1RCU3RA=="></iframe>
                </div>
            </div>
        </div>
    </section>
    


    <script>
        function onSubmit(token) {
            // Form submission logic
            document.getElementById("contactForm").submit();
        }
    </script>

    <!-- Associate the onSubmit function with the reCAPTCHA widget -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('contactForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Execute reCAPTCHA
                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                    action: 'submit'
                }).then(function(token) {
                    // Verify the token with your server
                    // For demonstration, assuming you have a function called verifyToken() to handle server-side validation
                    verifyToken(token);
                });
            });
        });

        // Function to verify reCAPTCHA token with server
        function verifyToken(token) {
            // Send an AJAX request to your server for verification
            // Example using fetch API
            fetch(verifyTokenRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        token: token
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // reCAPTCHA verification successful, call onSubmit to submit the form
                        onSubmit(token);
                    } else {
                        // reCAPTCHA verification failed, handle the error
                        alert('reCAPTCHA verification failed. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Handle error
                });
        }
    </script>

</body>

</html>
