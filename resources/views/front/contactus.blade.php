@extends('front.includes.container')
@section('content')

{{-- Add CSRF token meta tag --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- new theme start --}}

<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">
    <div class="breadcrumb-two">
        <img src="../assets/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content text-center">
                        <ul class="breadcrumb-list flx-align gap-2 mb-2 justify-content-center">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="{{ route('front.index') }}" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__text">Contact</span>
                            </li>
                        </ul>
                        <h3 class="breadcrumb-two-content__title mb-0 text-capitalize">Contact Us</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact padding-t-120 padding-b-60 section-bg position-relative z-index-1 overflow-hidden">
    <img src="../assets/images/gradients/banner-two-gradient.png" alt="" class="bg--gradient">
    <img src="../assets/images/shapes/pattern-five.png" class="position-absolute end-0 top-0 z-index--1" alt="">

    <div class="container container-two">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="contact-info">
                    <h3 class="contact-info__title">Get in touch with us today</h3>
                    <p class="contact-info__desc">Have questions or need support? Reach out to us anytime – we respond within 2-3 working days.</p>

                    <div class="contact-info__item-wrapper flx-between gap-4">
                        <div class="contact-info__item">
                            <span class="contact-info__text text-capitalize d-block mb-1">Give Us A Call</span>
                            <a href="tel:+917904414156" class="contact-info__link font-24 fw-500 text-heading hover-text-main">+91-9994645424</a>
                        </div>
                        <div class="contact-info__item">
                            <span class="contact-info__text text-capitalize d-block mb-1">Send Us An Email</span>
                            <a href="mailto:slidesbuy@gmail.com" class="contact-info__link font-24 fw-500 text-heading hover-text-main">support@slidesbuy.com</a>
                        </div>
                    </div>

                    <div class="mt-24">
                        <ul class="social-icon-list">
                            <li class="social-icon-list__item">
                                <a href="https://www.facebook.com" class="social-icon-list__link text-heading flx-center" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="social-icon-list__item">
                                <a href="https://www.twitter.com" class="social-icon-list__link text-heading flx-center" target="_blank"> <i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="social-icon-list__item">
                                <a href="https://www.linkedin.com" class="social-icon-list__link text-heading flx-center" target="_blank"> <i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="social-icon-list__item">
                                <a href="https://www.pinterest.com" class="social-icon-list__link text-heading flx-center" target="_blank"> <i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li class="social-icon-list__item">
                                <a href="https://www.youtube.com" class="social-icon-list__link text-heading flx-center" target="_blank"> <i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 ps-lg-5">
                <div class="card common-card p-sm-4">
                    <div class="card-body">
                        <form id="contactForm" action="{{ route('front.contact') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-sm-6 col-xs-6">
                                    <label for="name" class="form-label mb-2 font-18 font-heading fw-600">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="common-input common-input--grayBg border @error('userName') is-invalid @enderror" id="name" name="userName" placeholder="Your name here" value="{{ old('userName') }}" required>
                                    @error('userName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Your Email <span class="text-danger">*</span></label>
                                    <input type="email" class="common-input common-input--grayBg border @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your email here" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="message" class="form-label mb-2 font-18 font-heading fw-600">Your Message <span class="text-danger">*</span></label>
                                    <textarea class="common-input common-input--grayBg border @error('comment') is-invalid @enderror" id="message" name="comment" placeholder="Write Your Message Here" rows="5" required>{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-main btn-lg pill w-100" id="contactSubmitBtn">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                                <div class="col-sm-12">
                                    <div id="contactInlineAlert" style="display:none;" class="mt-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script>

jQuery(document).ready(function ($) {
    console.log('Contact form script loaded'); // Debug log

    $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Prevent form from submitting normally
        console.log('Form submitted'); // Debug log

        // Get form data
        var formData = $(this).serialize();
        var submitBtn = $('#contactSubmitBtn');
        var originalText = submitBtn.html();

        // Disable submit button and show loading state
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Sending Message...');

        // Hide any previous alerts
        $('#contactInlineAlert').hide();

        console.log('Sending AJAX request to:', $(this).attr('action')); // Debug log

        // Make AJAX request
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Success response:', response); // Debug log
                if (response.success) {
                    // Show success message
                    $('#contactInlineAlert')
                        .removeClass('alert-danger')
                        .addClass('alert alert-success')
                        .html('<div class="d-flex align-items-center"><i class="fas fa-check-circle me-2"></i><div><strong>Message Sent Successfully!</strong><br>Thank you for contacting us! We have received your message and will get back to you within 24-48 hours. A confirmation email has been sent to your email address.</div></div>')
                        .show();

                    // Reset form
                    $('#contactForm')[0].reset();

                    // Scroll to alert
                    $('html, body').animate({
                        scrollTop: $('#contactInlineAlert').offset().top - 100
                    }, 500);

                    // Auto-hide success message after 8 seconds
                    setTimeout(function() {
                        $('#contactInlineAlert').fadeOut();
                    }, 8000);
                } else {
                    // Show error message
                    $('#contactInlineAlert')
                        .removeClass('alert-success')
                        .addClass('alert alert-danger')
                        .html('<div class="d-flex align-items-center"><i class="fas fa-exclamation-circle me-2"></i><div><strong>Oops!</strong><br>' + response.message + '</div></div>')
                        .show();
                }
            },
            error: function(xhr, status, error) {
                console.log('Error response:', xhr.responseText); // Debug log
                var message = 'An error occurred. Please try again.';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = [];

                    for (var field in errors) {
                        if (errors.hasOwnProperty(field)) {
                            errorMessages.push(errors[field][0]);
                        }
                    }

                    message = errorMessages.join('<br>');
                }

                // Show error message
                $('#contactInlineAlert')
                    .removeClass('alert-success')
                    .addClass('alert alert-danger')
                    .html('<div class="d-flex align-items-center"><i class="fas fa-exclamation-circle me-2"></i><div><strong>Error!</strong><br>' + message + '</div></div>')
                    .show();
            },
            complete: function() {
                // Re-enable submit button and restore original text
                submitBtn.prop('disabled', false).html(originalText);
            }
        });
    });

    // Hide alert when user starts typing
    $('#contactForm input, #contactForm textarea').on('input', function() {
        $('#contactInlineAlert').hide();
    });

    // Add character counter for message
    $('#message').on('input', function() {
        var maxLength = 1000;
        var currentLength = $(this).val().length;
        var remaining = maxLength - currentLength;

        if (!$(this).next('.char-counter').length) {
            $(this).after('<small class="char-counter text-muted mt-1 d-block"></small>');
        }

        $(this).next('.char-counter').text(remaining + ' characters remaining');

        if (remaining < 0) {
            $(this).next('.char-counter').addClass('text-danger');
        } else {
            $(this).next('.char-counter').removeClass('text-danger');
        }
    });
});

// Fallback if jQuery is not loaded
if (typeof $ === 'undefined') {
    console.error('jQuery is not loaded! Contact form will not work.');
    // Show error message on page
    document.addEventListener('DOMContentLoaded', function() {
        var alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger';
        alertDiv.innerHTML = '<strong>Error:</strong> jQuery is not loaded. Contact form will not work properly.';
        document.querySelector('.contact').insertBefore(alertDiv, document.querySelector('.container'));
    });
}

</script>

<style>
.alert {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    padding: 20px;
    margin-top: 20px;
    font-size: 16px;
    line-height: 1.5;
}

.alert-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
    border-left: 5px solid #28a745;
}

.alert-danger {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    color: #721c24;
    border-left: 5px solid #dc3545;
}

.alert i {
    font-size: 24px;
    margin-right: 12px;
}

.alert strong {
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

.alert.fade-out {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

#contactInlineAlert {
    animation: slideInDown 0.5s ease-out;
}

#contactSubmitBtn {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

#contactSubmitBtn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

#contactSubmitBtn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

#contactSubmitBtn .fa-spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes slideInDown {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
}

.is-invalid {
    border-color: #dc3545 !important;
}

.contact-info__desc {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}
</style>






{{-- new theme end --}}
