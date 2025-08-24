@extends('front.includes.container')
@section('content')


<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">
    <div class="breadcrumb-two">
        <img src="assets/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">
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
                                <span class="breadcrumb-list__text">Terms & Conditions</span>
                            </li>
                        </ul>

                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">Terms & Conditions</h3>
                        <p class="breadcrumb-two-content__desc font-16 text-body">Learn how we protect and handle your personal information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="terms-content padding-y-80">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="terms-wrapper mt-5 mb-5">
                    <h4 class="terms-title mb-4">1. Acceptance of Terms</h4>
                    <p class="terms-text mb-4">By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>

                    <h4 class="terms-title mb-4">2. Use License</h4>
                    <p class="terms-text mb-4">Permission is granted to temporarily download one copy of the materials (information or software) on Slidesbuy's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                    <ul class="terms-list mb-4">
                        <li>Modify or copy the materials</li>
                        <li>Use the materials for any commercial purpose or for any public display</li>
                        <li>Attempt to reverse engineer any software contained on Slidesbuy's website</li>
                        <li>Remove any copyright or other proprietary notations from the materials</li>
                        <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
                    </ul>

                    <h4 class="terms-title mb-4">3. Disclaimer</h4>
                    <p class="terms-text mb-4">The materials on Slidesbuy's website are provided on an 'as is' basis. Slidesbuy makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>

                    <h4 class="terms-title mb-4">4. Limitations</h4>
                    <p class="terms-text mb-4">In no event shall Slidesbuy or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Slidesbuy's website, even if Slidesbuy or a Slidesbuy authorized representative has been notified orally or in writing of the possibility of such damage.</p>

                    <h4 class="terms-title mb-4">5. Accuracy of Materials</h4>
                    <p class="terms-text mb-4">The materials appearing on Slidesbuy's website could include technical, typographical, or photographic errors. Slidesbuy does not warrant that any of the materials on its website are accurate, complete or current. Slidesbuy may make changes to the materials contained on its website at any time without notice.</p>

                    <h4 class="terms-title mb-4">6. Links</h4>
                    <p class="terms-text mb-4">Slidesbuy has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Slidesbuy of the site. Use of any such linked website is at the user's own risk.</p>

                    <h4 class="terms-title mb-4">7. Modifications</h4>
                    <p class="terms-text mb-4">Slidesbuy may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these Terms of Service.</p>

                    <h4 class="terms-title mb-4">8. Governing Law</h4>
                    <p class="terms-text mb-4">These terms and conditions are governed by and construed in accordance with the laws and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>

                    <h4 class="terms-title mb-4">9. Contact Information</h4>
                    <p class="terms-text mb-4">If you have any questions about these Terms & Conditions, please contact us at support@slidesbuy.com</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
