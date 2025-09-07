@extends('front.includes.container')
@section('content')

<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">
    <div class="breadcrumb-two">
        <img src="../assets/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content">
                        <ul class="breadcrumb-list flx-align gap-2 mb-2">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="{{ route('front.index') }}" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__text">Privacy Policy</span>
                            </li>
                        </ul>

                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">Privacy Policy</h3>
                        {{-- <p class="breadcrumb-two-content__desc font-16 text-body">Learn how we protect and handle your personal information</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="disclaimer-content ">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="disclaimer-wrapper mt-5 mb-5">
                    {{-- <h4 class="disclaimer-title mb-2">Privacy Policy – Slidesbuy</h4> --}}
                    <p class="text-muted mb-4">Last Updated: September 07, 2025</p>
                    <p class="disclaimer-text mb-4">At Slidesbuy ("we," "our," or "us"), accessible at slidesbuy.com, we respect your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your information when you use our website and services. By using our services, you consent to the practices described in this Privacy Policy.</p>

                    <h5 class="mb-3">Information We Collect</h5>
                    <ul class="mb-4">
                        <li>Account Information: Email address, mobile number, and password provided during sign-up.</li>
                        <li>Verification Data: One-time passwords (OTPs) sent to your registered email for verification.</li>
                        <li>Payment Information: Payment details (such as transaction IDs, payment status) processed securely through Razorpay.</li>
                        <li>Usage Data: Information about your interactions with our platform, such as pages visited, templates browsed, and downloads made.</li>
                    </ul>

                    <h5 class="mb-3">How We Use Your Information</h5>
                    <ul class="mb-4">
                        <li>Create and manage your Slidesbuy account.</li>
                        <li>Process payments and provide access to subscribed content.</li>
                        <li>Send OTPs and account-related communications.</li>
                        <li>Improve our services, analyze trends, and enhance user experience.</li>
                        <li>Ensure compliance with our Terms and Conditions.</li>
                    </ul>

                    <h5 class="mb-3">Sharing of Information</h5>
                    <p class="disclaimer-text mb-2">We do not sell or trade your personal data. We may share information only in the following cases:</p>
                    <ul class="mb-4">
                        <li>Payment Processing: With Razorpay, our secure payment gateway provider.</li>
                        <li>Legal Compliance: If required by law, regulation, or court order.</li>
                    </ul>
                    <p class="disclaimer-text mb-4">Razorpay’s handling of your payment data is governed by their own Privacy Policy.</p>

                    <h5 class="mb-3">Data Security</h5>
                    <ul class="mb-4">
                        <li>We use SSL encryption and industry-standard measures to protect your personal data.</li>
                        <li>While we strive to ensure data security, no method of internet transmission or storage is 100% secure. We cannot guarantee absolute protection.</li>
                    </ul>

                    <h5 class="mb-3">Your Rights</h5>
                    <p class="disclaimer-text mb-2">You have the right to:</p>
                    <ul class="mb-4">
                        <li>Request access to the personal information we hold about you.</li>
                        <li>Request corrections if your information is inaccurate or incomplete.</li>
                        <li>Request deletion of your account and personal data (subject to legal obligations).</li>
                        <li>Opt out of receiving non-essential communications such as promotional emails.</li>
                    </ul>
                    <p class="disclaimer-text mb-4">To exercise these rights, contact us at support@slidesbuy.com.</p>

                    <h5 class="mb-3">Data Retention</h5>
                    <ul class="mb-4">
                        <li>We retain your personal information only for as long as necessary to provide services or comply with legal obligations.</li>
                        <li>If you delete your account, we will remove your data, except where law requires retention (e.g., for tax or compliance purposes).</li>
                    </ul>

                    <h5 class="mb-3">Cookies and Tracking</h5>
                    <ul class="mb-4">
                        <li>We may use cookies and similar technologies to enhance user experience, remember preferences, and analyze website performance.</li>
                        <li>You can manage or disable cookies in your browser settings, but some features of the site may not function properly without them.</li>
                    </ul>

                    <h5 class="mb-3">Children’s Privacy</h5>
                    <p class="disclaimer-text mb-4">Our services are not directed to individuals under the age of 18. If you are under 18, you may only use our services with the consent and supervision of a parent or legal guardian.</p>

                    <h5 class="mb-3">International Users</h5>
                    <p class="disclaimer-text mb-4">If you are accessing our services from outside India, you are responsible for ensuring compliance with local data protection laws. By using our services, you consent to the transfer and processing of your information in India.</p>

                    <h5 class="mb-3">Changes to This Privacy Policy</h5>
                    <p class="disclaimer-text mb-4">We may update this Privacy Policy from time to time. The updated version will be posted on our website with the “Last Updated” date. Continued use of our services after changes indicates acceptance of the revised policy.</p>

                    <h5 class="mb-3">Contact Us</h5>
                    <p class="disclaimer-text mb-1">If you have any questions about this Privacy Policy or how your data is handled, please contact us:</p>
                    <ul class="mb-0">
                        <li>Email: support@slidesbuy.com</li>
                        <li>Website: slidesbuy.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
