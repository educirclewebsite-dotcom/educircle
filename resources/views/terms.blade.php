@extends('layout.app')
@section('title', ' Overseas Education-Terms')

@section('content')
    <section class="header-title head-opacity" style="padding-bottom: 30px;">
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
                                <li class="breadcrumb-item active text-dark" aria-current="page">Terms of Service</li>
                            </ol>
                        </nav>
                        <h4 class="mt-6">Terms of Service</h4>
                        <p class="mb-4">
                            Welcome to Educircle Education Services Private Limited (“Educircle”, “we”, “us”, or “our”).
                            These Terms of Service (“Terms”) govern your use of our website, mobile applications, and
                            related services (collectively, “Services”). By accessing or using our Services, you agree to
                            these Terms. If you do not agree, please refrain from using our Services.
                        </p>

                        <h4 class="mt-6">Your Responsibilities</h4>
                        <p class="mb-4">
                            You are responsible for:
                        </p>
                        <ul class="list-disc pl-6 mb-4">
                            <li>Providing accurate, complete, and current information as requested.</li>
                            <li>Using the Services lawfully and in compliance with these Terms.</li>
                            <li>Ensuring any content you share respects the rights of others and is not harmful or illegal.
                            </li>
                        </ul>
                        <p class="mb-4">
                            Any content you submit may be shared with third parties (e.g., universities or visa agencies) as
                            part of our Services. Only share content you are comfortable disclosing.
                        </p>

                        <h4 class="mt-6">Eligibility</h4>
                        <p class="mb-4">
                            To use our Services, you must be at least 18 years old or have consent from a parent or
                            guardian. You must also be legally capable of entering a binding contract under Indian law or
                            the laws of your jurisdiction.
                        </p>

                        <h4 class="mt-6">Service Changes and Availability</h4>
                        <p class="mb-4">
                            Educircle may modify, limit, or discontinue any part of the Services at our discretion, without
                            prior notice. We may also impose restrictions on usage or storage. We are not liable for any
                            disruptions caused by such changes.
                        </p>

                        <h4 class="mt-6">Advertisements</h4>
                        <p class="mb-4">
                            Our Services may display advertisements based on your activity or preferences. By using our
                            Services, you consent to viewing ads from Educircle and our partners.
                        </p>

                        <h4 class="mt-6">Education Counseling Services</h4>
                        <p class="mb-4">
                            By enrolling in our education counseling services (“Counseling Services”), which include profile
                            building, university shortlisting, application support, essay feedback, visa assistance, and
                            financial guidance, you agree to:
                        </p>
                        <ul class="list-disc pl-6 mb-4">
                            <li>Submit verified documents, including academic records, test scores, and recommendation
                                letters.</li>
                            <li>Receive assistance for applications to up to 7 institutions across 2 countries, with up to 2
                                rounds of feedback on essays or statements of purpose.</li>
                            <li>Provide all required documents at least 5 weeks before application deadlines.</li>
                            <li>Cover all costs, including service fees, application fees, test reporting, and courier
                                charges.</li>
                            <li>Acknowledge that application outcomes may take up to 40 days and are not guaranteed.</li>
                            <li>Request deferrals for one subsequent intake, subject to approval.</li>
                            <li>Permit Educircle to share your information with third parties (e.g., universities or
                                consultants) to facilitate the process.</li>
                        </ul>
                        <p class="mb-4">
                            Educircle is not responsible for rejections due to incomplete documents, delays, or factors
                            beyond our control, such as academic performance or test scores.
                        </p>

                        <h4 class="mt-6">Refund Policy for Counseling Services</h4>
                        <p class="mb-4">
                            Refunds for Counseling Services may be requested within 10 days of enrollment, provided no
                            applications have been submitted. A 15% processing fee will apply, and refunds will be processed
                            within 25 days.
                        </p>

                        <h4 class="mt-6">IELTS Coaching Terms</h4>
                        <ul class="list-disc pl-6 mb-4">
                            <li>A deposit of INR 9,000 is required, refundable only if you secure a student visa through
                                Educircle within 15 months of enrollment.</li>
                            <li>Training must be completed within your assigned batch, with one deferral permitted if seats
                                are available.</li>
                            <li>Optional web-based practice tests are available for INR 2,200.</li>
                            <li>Educircle provides coaching but does not guarantee IELTS scores, as the exam is administered
                                by third parties.</li>
                            <li>Full payment and supporting documents (e.g., ID proof) are required before classes start.
                            </li>
                            <li>You are responsible for all IELTS exam-related expenses.</li>
                        </ul>

                        <h4 class="mt-6">Content Ownership and Licensing</h4>
                        <p class="mb-4">
                            You own the content you submit but grant Educircle a worldwide, non-exclusive, royalty-free
                            license to use, modify, and share it as needed to provide our Services (e.g., for applications
                            or processing). We may share your content with third parties involved in your education process.
                            All other materials on our platform are owned by Educircle or our licensors.
                        </p>

                        <h4 class="mt-6">Prohibited Activities</h4>
                        <ul class="list-disc pl-6 mb-4">
                            <li>Accessing restricted or non-public areas of our Services.</li>
                            <li>Using automated tools (e.g., bots or scrapers) to extract data.</li>
                            <li>Attempting to compromise the security or functionality of our platform.</li>
                            <li>Using our Services to promote unrelated products or services.</li>
                        </ul>
                        <p class="mb-4">
                            Educircle may remove content or suspend users violating these restrictions.
                        </p>

                        <h4 class="mt-6">Copyright Policy</h4>
                        <p class="mb-4">
                            We respect intellectual property rights. If you believe your copyright has been infringed on our
                            platform, email <a href="mailto:support@educircle.com"
                                class="text-blue-500">support@educircle.com</a> with evidence. We will investigate and take
                            appropriate action, which may include removing the content or terminating accounts for repeat
                            violations.
                        </p>

                        <h4 class="mt-6">Disclaimer</h4>
                        <p class="mb-4">
                            Our Services are provided “as is” without warranties of any kind, including for accuracy,
                            availability, or fitness for a particular purpose. Your use of the Services is at your own risk.
                        </p>

                        <h4 class="mt-6">Limitation of Liability</h4>
                        <p class="mb-4">
                            To the extent permitted by law, Educircle and its affiliates will not be liable for any
                            indirect, incidental, or consequential damages, including loss of data or opportunities, arising
                            from your use of the Services, even if we were informed of the potential for such damages.
                        </p>

                        <h4 class="mt-6">Governing Law</h4>
                        <p class="mb-4">
                            These Terms are governed by the laws of India. Any disputes will be resolved exclusively in the
                            courts of Bangalore, Karnataka, India, and you consent to their jurisdiction.
                        </p>

                        <h4 class="mt-6">Entire Agreement</h4>
                        <p class="mb-4">
                            These Terms, together with our Privacy Policy, represent the complete agreement between you and
                            Educircle regarding the Services. We may update these Terms from time to time, and continued use
                            after updates signifies your acceptance of the revised Terms.
                        </p>

                        <h4 class="mt-6">Contact Us</h4>
                        <p class="mb-2">For questions or concerns about these Terms, please contact:</p>
                        <ul class="list-unstyled">
                            <li><strong>Educircle Education Services Private Limited</strong></li>
                            <li>Email: <a href="mailto:support@educircle.com"
                                    class="text-blue-600">support@educircle.com</a></li>
                            <li>Address: 456 Learning Avenue, Bangalore, Karnataka, India</li>
                        </ul>
                        <p class="text-gray-600 mb-4">Effective Date: June 18, 2025</p>
                        <div class="mt-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
