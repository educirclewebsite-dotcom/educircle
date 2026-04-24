@extends('layout.app')
@section('title', ' Overseas Education-Privacy')

@section('content')
    <section class="header-title head-opacity" style="padding-bottom: 30px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h1 class="mb10">Privacy Policy</h1>
                    <p class="h-light mb30">
                        This Privacy Policy outlines how Educircle handles your personal data—how we collect, use, and safeguard your information when you engage with our platform.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-pad" style="padding-top: 30px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="page-heading">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" class="text-decoration-none text-dark">
                                        <i class="fas fa-home"></i> Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active text-dark" aria-current="page">Privacy</li>
                            </ol>
                        </nav>

                        <h4 class="mt-6">How We Collect and Use Information</h4>

                        <p><strong>Registration Details:</strong><br>
                            When signing up with Educircle—especially through platforms like Facebook—we may receive your basic details including your name, profile picture, and email address. These are used to personalize your experience.</p>

                        <p><strong>Optional Information:</strong><br>
                            You may choose to add educational preferences, background, or interests. This enables us to tailor content and connect you with relevant institutions or opportunities.</p>

                        <p><strong>Sharing with Institutions:</strong><br>
                            Only the academic institutions or partners you explicitly engage with will have access to your shared profile. We do not broadcast your information to third parties without permission.</p>

                        <p><strong>Technical & Usage Logs:</strong><br>
                            To improve platform performance and security, we collect anonymous data such as browser type, time of access, IP address, and visited pages. This is automatically removed or anonymized after a defined period.</p>

                        <p><strong>Interaction Tracking:</strong><br>
                            We may monitor your interactions with links, buttons, or content to enhance your overall experience and our service relevance.</p>

                        <h4 class="mt-4">When and Why We Share Your Data</h4>

                        <p><strong>With Your Approval:</strong><br>
                            Your data is only shared when you interact with particular services or institutions, or authorize us to do so.</p>

                        <p><strong>Legal Situations:</strong><br>
                            We may disclose data if required by law, legal processes, or if necessary to prevent harm, enforce our terms, or address fraud/security threats.</p>

                        <p><strong>Business Events:</strong><br>
                            Should Educircle undergo a merger, acquisition, or other business restructuring, user information may be transferred to the new entity with the same privacy commitments.</p>

                        <p><strong>Aggregated Insights:</strong><br>
                            We may publish trends or general usage statistics that do not identify individuals (e.g., number of views or clicks).</p>

                        <h4 class="mt-4">Managing Your Information</h4>

                        <p>You are in control. Update or change your details anytime from your account settings.</p>

                        <p>If you wish to delete your account, you can remove access from your connected social media account or contact us at 
                            <a href="mailto:support@educircle.com">support@educircle.com</a>. We initiate permanent deletion within 7 days following a 30-day deactivation period.
                        </p>

                        <h4 class="mt-4">Policy Updates</h4>

                        <p>This policy may change over time. All updates will be posted at 
                            <a href="https://www.educircle.com/privacy">https://www.educircle.com/privacy</a>. Continued use of the platform constitutes acceptance of any changes.
                        </p>

                        <p><strong>Effective Date: June 18, 2025</strong></p>

                        <div class="mt-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
