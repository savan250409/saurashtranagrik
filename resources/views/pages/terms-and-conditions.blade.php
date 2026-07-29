@extends('layouts.app')

@section('title', 'Terms and Conditions | Shree Saurastra Nagrik Sharafi Mandali LTD')

@push('head')
<link href="{{ asset('css/legal.css') }}" rel="stylesheet">
@endpush

@section('content')
<!--Main Content Start-->
        <div class="main-content">
            <section class="wf100 p75-50  depart-info">
                <div class="container">
                    <div class="row text-center mb30 title-style-3">
                        <h3>Terms and Conditions</h3>
                    </div>
                    <div class="row">
                        {{-- col-md-12 (not col-12): this theme is Bootstrap 3, where only
                             the col-*-* classes carry the 15px gutter padding. --}}
                        <div class="col-md-12">
                            <div class="legal-page">
                                <p class="legal-updated">Last updated: 28 July 2026</p>

                                <p>These Terms and Conditions govern your use of the website saurashtranagrik.com (the &ldquo;Website&rdquo;), operated by Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd., Bagasara, a co-operative credit society registered under the Gujarat Co-operative Societies Act (referred to as &ldquo;the Mandali&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo; or &ldquo;our&rdquo;).</p>

                                <p>By accessing or using the Website, you accept these Terms and Conditions in full. If you do not agree with any part of them, please do not use the Website. Please also read our <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.</p>

                                <h4>1. Nature of the Website</h4>
                                <p>The Website is provided for general information purposes only. It describes the Mandali, its branches, board of directors, managers, deposit and loan schemes, activities and published accounts. The Website does not offer internet banking, mobile banking, online account opening, fund transfer, online payment or any other transactional service. All services of the Mandali are provided only at its branch offices.</p>

                                <h4>2. Not an Offer or Commitment</h4>
                                <p>Interest rates, deposit schemes, loan schemes, eligibility criteria, charges and any other particulars shown on the Website are indicative and are published for information only. They do not constitute an offer, invitation, advice or commitment to provide any facility. All products and services are subject to the bye-laws of the Mandali, the terms of the relevant scheme, satisfactory documentation and KYC verification, credit appraisal, and the approval of the competent authority of the Mandali. Rates and terms are subject to change at any time without prior notice. In the event of any difference between the information on the Website and the records, bye-laws or resolutions of the Mandali, the records of the Mandali shall prevail.</p>

                                <h4>3. Membership and Services</h4>
                                <p>Deposits, loans and other facilities are available only to members and account holders of the Mandali, in accordance with its bye-laws and applicable law. Membership, deposits and loans are governed by the application form, scheme rules, sanction letter and other documents executed at the branch, which shall constitute the binding contract between you and the Mandali. Nothing on this Website amends, replaces or overrides those documents.</p>

                                <h4>4. Accuracy of Information</h4>
                                <p>We make reasonable efforts to keep the information on the Website correct and up to date. However, we do not warrant that the content is complete, accurate, current or free of errors. Balance sheets, profit and loss accounts, progress reports and other documents made available for download relate to the financial year stated in each document and should be read together with the audited statements and reports of the Mandali. Content may be added, changed, suspended or removed at any time without notice.</p>

                                <h4>5. No Professional Advice</h4>
                                <p>Nothing on the Website constitutes financial, investment, legal, tax or other professional advice. You should obtain independent advice and contact the branch concerned before taking any decision based on information published here.</p>

                                <h4>6. Permitted Use</h4>
                                <p>You may view, print and download material from the Website for your personal, non-commercial reference. You agree that you will not:</p>
                                <ul>
                                    <li>use the Website for any unlawful, fraudulent or misleading purpose</li>
                                    <li>attempt to gain unauthorised access to the Website, its server, or any connected system or network</li>
                                    <li>introduce any virus, malware, or other harmful code, or attempt to disrupt or overload the Website</li>
                                    <li>copy, republish, sell or commercially exploit any content of the Website without our prior written permission</li>
                                    <li>use any automated system, robot or scraper to extract content from the Website in a manner that affects its normal working</li>
                                    <li>misrepresent yourself as the Mandali, or use our name or logo in a way that may cause confusion</li>
                                </ul>

                                <h4>7. Intellectual Property</h4>
                                <p>All content on the Website &mdash; including the name, logo, text, images, photographs, documents, design and layout &mdash; is owned by or licensed to the Mandali and is protected by applicable intellectual property laws. Use of any such material other than as permitted in Clause 6 requires our prior written consent.</p>

                                <h4>8. Links to Other Websites</h4>
                                <p>The Website may contain links to third-party websites, including that of our website developer. Such links are provided for convenience only. We do not control, endorse or accept responsibility for the content, products, services or practices of any third-party website. Accessing them is at your own risk.</p>

                                <h4>9. Security and Fraud Warning</h4>
                                <p>The Mandali will never ask for your account number, PIN, OTP, password or card details through email, SMS, WhatsApp, phone call or any online form, and this Website hosts no login or payment page. Please deal only with our authorised branch offices listed on the <a href="{{ route('branches') }}">Branches</a> page. We are not responsible for any loss arising from your dealings with any person, website, application or social media account falsely claiming to represent the Mandali. Any such attempt should be reported to your nearest branch immediately.</p>

                                <h4>10. Availability of the Website</h4>
                                <p>The Website is provided on an &ldquo;as is&rdquo; and &ldquo;as available&rdquo; basis. We do not guarantee uninterrupted or error-free access, and the Website may be unavailable from time to time due to maintenance, technical issues or matters beyond our control.</p>

                                <h4>11. Limitation of Liability</h4>
                                <p>To the extent permitted by law, the Mandali, its directors, officers and employees shall not be liable for any direct, indirect, incidental or consequential loss or damage arising out of the use of, or inability to use, the Website or any content, link or document available on it, including any loss caused by viruses or other harmful components.</p>

                                <h4>12. Grievance Redressal</h4>
                                <p>Any complaint or grievance relating to the Website or to the services of the Mandali may be submitted in writing at the branch concerned, or to the Head Office at the address given below. Complaints are dealt with in accordance with the bye-laws of the Mandali and applicable regulatory requirements.</p>

                                <h4>13. Changes to These Terms</h4>
                                <p>We may revise these Terms and Conditions at any time by updating this page. The revised terms take effect from the date of publication shown above. Your continued use of the Website after such publication constitutes acceptance of the revised terms.</p>

                                <h4>14. Governing Law and Jurisdiction</h4>
                                <p>These Terms and Conditions are governed by the laws of India. Subject to the dispute resolution provisions of the Gujarat Co-operative Societies Act and the bye-laws of the Mandali, the courts at Amreli, Gujarat shall have exclusive jurisdiction over any dispute arising out of or relating to the Website.</p>

                                <h4>15. Contact Us</h4>
                                <p>For any question regarding these Terms and Conditions, please contact our Head Office:</p>
                                <div class="legal-contact">
                                    <p>
                                        <strong>Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.</strong><br>
                                        Samarth Saurashtra Building, Amarpara, Bagasara,<br>
                                        Dist. Amreli, Gujarat, India
                                    </p>
                                    <p>
                                        Phone: <a href="tel:02796220525">(02796) 220 525</a> &nbsp;|&nbsp; Mobile: <a href="tel:9484529400">94845 29400</a>
                                    </p>
                                    <p>
                                        Website: <a href="{{ route('home') }}">saurashtranagrik.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--Main Content End-->
@endsection
