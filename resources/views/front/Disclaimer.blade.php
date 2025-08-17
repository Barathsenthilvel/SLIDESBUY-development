@extends('front.includes.container')
@section('content')

<section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">Disclaimer</div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li><a href="#">Disclaimer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="disclaimer-content padding-y-80">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="disclaimer-wrapper">
                    <h4 class="disclaimer-title mb-4">1. General Information</h4>
                    <p class="disclaimer-text mb-4">The information provided on this website is for general informational purposes only. While we strive to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability of the information, products, services, or related graphics contained on the website for any purpose.</p>
                    
                    <h4 class="disclaimer-title mb-4">2. No Professional Advice</h4>
                    <p class="disclaimer-text mb-4">The information on this website is not intended to constitute professional advice. Any reliance you place on such information is therefore strictly at your own risk. We recommend consulting with qualified professionals for specific advice tailored to your situation.</p>
                    
                    <h4 class="disclaimer-title mb-4">3. Website Availability</h4>
                    <p class="disclaimer-text mb-4">We do not guarantee that our website will be available at all times or that it will be free from errors or interruptions. We reserve the right to modify, suspend, or discontinue the website or any part of it at any time without notice.</p>
                    
                    <h4 class="disclaimer-title mb-4">4. External Links</h4>
                    <p class="disclaimer-text mb-4">Our website may contain links to external websites that are not provided or maintained by us. We do not guarantee the accuracy, relevance, timeliness, or completeness of any information on these external websites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</p>
                    
                    <h4 class="disclaimer-title mb-4">5. Product Information</h4>
                    <p class="disclaimer-text mb-4">Product descriptions, specifications, and pricing information are provided for informational purposes only. We reserve the right to modify or discontinue products at any time. Product images are for illustration purposes and may not reflect the exact appearance of the actual product.</p>
                    
                    <h4 class="disclaimer-title mb-4">6. User-Generated Content</h4>
                    <p class="disclaimer-text mb-4">We are not responsible for any user-generated content posted on our website, including comments, reviews, or other submissions. Users are solely responsible for the content they post, and we reserve the right to remove any content that violates our terms of service.</p>
                    
                    <h4 class="disclaimer-title mb-4">7. Limitation of Liability</h4>
                    <p class="disclaimer-text mb-4">In no event shall Slidesbuy, its directors, employees, partners, agents, suppliers, or affiliates be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from your use of the website or any products or services.</p>
                    
                    <h4 class="disclaimer-title mb-4">8. Indemnification</h4>
                    <p class="disclaimer-text mb-4">You agree to indemnify and hold harmless Slidesbuy and its affiliates from and against any claims, damages, obligations, losses, liabilities, costs, or debt arising from your use of the website or violation of any terms of service.</p>
                    
                    <h4 class="disclaimer-title mb-4">9. Intellectual Property</h4>
                    <p class="disclaimer-text mb-4">All content on this website, including but not limited to text, graphics, logos, images, audio clips, digital downloads, and software, is the property of Slidesbuy or its content suppliers and is protected by international copyright laws.</p>
                    
                    <h4 class="disclaimer-title mb-4">10. Privacy and Security</h4>
                    <p class="disclaimer-text mb-4">While we implement reasonable security measures to protect your personal information, we cannot guarantee that our website will be completely secure. We are not responsible for any unauthorized access to or use of your personal information.</p>
                    
                    <h4 class="disclaimer-title mb-4">11. Changes to Disclaimer</h4>
                    <p class="disclaimer-text mb-4">We reserve the right to modify this disclaimer at any time. Changes will be effective immediately upon posting on the website. Your continued use of the website after any changes constitutes acceptance of the modified disclaimer.</p>
                    
                    <h4 class="disclaimer-title mb-4">12. Governing Law</h4>
                    <p class="disclaimer-text mb-4">This disclaimer is governed by and construed in accordance with applicable laws. Any disputes arising from the use of this website shall be subject to the exclusive jurisdiction of the courts in the applicable jurisdiction.</p>
                    
                    <h4 class="disclaimer-title mb-4">13. Contact Information</h4>
                    <p class="disclaimer-text mb-4">If you have any questions about this disclaimer or our website, please contact us at legal@slidesbuy.com or through our customer support channels.</p>
                    
                    <div class="disclaimer-notice mt-5 p-4 bg-light rounded">
                        <h5 class="disclaimer-notice-title mb-3">Important Notice</h5>
                        <p class="disclaimer-notice-text mb-0">By using our website, you acknowledge that you have read, understood, and agree to be bound by this disclaimer. If you do not agree with any part of this disclaimer, please do not use our website or services.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
