{{-- index file --}}
@extends('layouts.app')

{{-- title --}}
@section('title', 'Terms and Conditions')

@section('description', 'Terms and Conditions')
@section('url'){{ route('page.terms') }}@endsection
    {{-- @section('image', $article->thumb()) --}}
@section('time', \Carbon\Carbon::now())
@section('keywords',
    'shorts video download, youtube shorts download, shorts downloader,download youtube shorts, shorts
    video downloader, Youtube shorts download online,download youtube short videos,download youtube short video,short
    youtube video download,youtube short video downloader,youtube short video download,youtube shorts downloader
    online,youtube shorts downloader,youtube short download,yt short video download,youtube shorts to mp4,youtube shorts
    video download, shorts download in HD,how to download youtube shorts',)

@section('ldjson')
    {
    "@context": "https://schema.org",
    "@type": "Article",
    "name": "Terms and Conditions",
    "alternateName": "Terms and Conditions",
    "url": "{{ route('page.terms') }}"
    }
@endsection


{{-- content --}}
@section('content')
    <section class="container my-8">
        <div class="container max-w-6xl px-4 py-10 mx-auto">
            <div class="text-center">
                <p class="text-sm leading-7 text-gray-500 font-regular">
                    Terms
                </p>
                <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900 dark:text-white">
                    Terms And <span class="text-primary-600">Conditions</span>
                </h3>
            </div>

            <div class="mt-20">
                {{-- Acceptance of Terms of Service::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Acceptance of Terms of Service
                    </h3>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        These Terms of Service ( the <span class="italic font-bold">"Agreement"</span> or <span
                            class="italic font-bold">"Terms of Service"</span> ) is a legally-binding agreement between
                        you, either an individual or an entity ( <span class="italic font-bold">"you"</span> or <span
                            class="italic font-bold">"user"</span> ), and
                        <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> ( <span
                            class="italic font-bold">"<a
                                class="text-primary-600 dark:text-white dark:underline font-bold italic"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a>"</span> ) regarding use of
                        <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> and
                        other
                        related websites owned and/or operated by <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> ( together, the <span
                            class="italic font-bold">"Website"</span> ),
                        products ( for example, <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> Helper ), and Services, as defined
                        below. <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> makes Website,
                        and
                        Services, including all content, information, graphics, documents, text, products, and all other
                        elements and products offered through the Website and Services ( collectively, the <span
                            class="italic font-bold">"Content"</span> ) available
                        for your use subject to the terms and conditions set forth in this document. By accessing and using
                        the
                        Website and Services you agree to be bound by and to accept these Terms of Service and all terms and
                        conditions contained and/or referenced herein as well as any additional terms and conditions set
                        forth
                        on the Website.
                    </p>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        If you do <span class="italic font-bold">NOT</span> agree to all the terms and conditions in these
                        Terms
                        of Service, you should <span class="italic font-bold">NOT</span> use the
                        Website or Services. If you do <span class="italic font-bold">NOT</span> agree to any additional
                        specific terms which apply to particular
                        Content or to a particular transaction concluded through the Website or Services, then you should
                        <span class="italic font-bold">NOT</span>
                        use the part of the Website or Services which contains such Content or through which such
                        transactions
                        are concluded. Also, when you use any current or future <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> service or visit <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>'s Website or
                        obtain any products or services, whether free of charge or for payment, provided by <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>, you will
                        be subject to the guidelines and conditions applicable to such products or services.
                    </p>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        These Terms of Service may be amended by <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> at any time upon notice provided
                        by
                        any
                        of the
                        following means: through a posting on the main page of the Website, at or after you login into your
                        User
                        Account (as defined below), or by e-mail to the address you provided when you set up your User
                        Account.
                        Your failure to provide or maintain accurate or current contact information in your User Account
                        will
                        not obviate your responsibility to comply with these Terms of Service as amended from time to time.
                    </p>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        Please check these Terms of Service regularly to ensure that you are aware of all terms governing
                        your
                        use of the Website and Services. Specific terms and conditions may apply to non-user generated
                        Content.
                        Such specific terms may be in addition to these Terms of Service or, where inconsistent with these
                        Terms
                        of Service such specific terms will supersede these Terms of Service only to the extent that the
                        content
                        or intent of such specific terms is inconsistent with these Terms of Service.
                    </p>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        When you submit personal information to <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> through the Website, you
                        understand
                        and agree that this
                        information may be transferred across national boundaries. In addition, you authorize <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> to
                        transfer, process, store and use your information in countries other than your own in accordance
                        with
                        this Privacy Policy and to provide you with Services. All data transfers are subject to appropriate
                        guarantees, especially contractual, technical and organizational guarantees, that comply with
                        applicable
                        regulations relating to the protection of personal data.
                    </p>
                </div>
                {{-- Acceptance of Terms of Service::end --}}
                {{-- Description of Services::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Description of Services
                    </h3>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        You can use our service to download videos and other files from many popular sites.
                    </p>
                </div>
                {{-- Description of Services::end --}}
                {{-- Users' Obligations::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Users' Obligations
                    </h3>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        You agree to use the Website and Services only for purposes permitted by these Terms of Service as
                        well as any applicable law, regulation or generally accepted practices or guidelines in the relevant
                        jurisdictions. <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> IS NOT RESPONSIBLE FOR ANY
                        VIOLATION OF APPLICABLE LAWS, RULES, OR
                        REGULATIONS COMMITTED BY YOU OR A THIRD PARTY AT YOUR BEHEST. IT IS YOUR RESPONSIBILITY TO ENSURE
                        THAT YOUR USE OF THE <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> APPLICATION, WEBSITE, AND SERVICES
                        DOES NOT CONTRAVENE APPLICABLE
                        LAWS, RULES, OR REGULATIONS. Specifically, you agree and warrant that in using the Website and
                        Services, your actions do not contravene the laws, rules, or regulations of (1) the country, state,
                        or locality where you reside, or (2) the country, state, or locality where <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> is located or
                        operates. This includes complying with applicable export and import restrictions as well as other
                        restrictions.
                    </p>
                </div>
                {{-- Users' Obligations::end --}}
                {{-- Your Use of the Website and Services::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Your Use of the Website and Services
                    </h3>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        You agree not to access (or attempt to access) the Services by any means other than through the
                        means provided by <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> or its authorized partners. You
                        agree not to access (or attempt to
                        access) the Services by way of automated means and that you will not engage in any activity that
                        interferes with or disrupts the Services (or the servers and networks which are connected to the
                        Services).
                    </p>

                    <h3
                        class="my-2 text-md sm:text-xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Your Use of the Website and Services
                    </h3>
                    <ul class="list-disc pl-3 ml-3 ">
                        <li>Not to disrupt or interfere with any other user's enjoyment of the Website and Services or
                            affiliated or linked sites;</li>
                        <li>Not to upload, post, or otherwise transmit through the Website and Services any viruses or other
                            harmful, disruptive, or destructive files;</li>
                        <li>Not to use or attempt to use another user's User Account, password, or system;</li>
                        <li>Not to access or attempt to access any Content or User Content (as defined below), which you are
                            not
                            authorized to access under the terms herein;</li>
                        <li>Not to disrupt or interfere with the security of, or otherwise cause harm to the Website,
                            Services,
                            Content, User Content, system resources, accounts, passwords, servers, or networks connected to
                            or
                            accessible through the Website and Services or any affiliated or linked sites.</li>
                    </ul>

                </div>
                {{-- Your Use of the Website and Services::end --}}
                {{-- User Account::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        User Account
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        You may sign up for a personalized account ("User Account") with <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> in order to access the
                        full range of features offered by the Website and Services. In creating your User Account, you agree
                        to submit accurate, current and complete information about yourself and keep this information
                        updated. <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> reserves the right to suspend or
                        terminate User Accounts which it suspects are
                        used in contradiction to these Terms of Service and/or contain information that is untrue,
                        inaccurate, not current or incomplete.
                    </p>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        When you create your User Account, you will choose a personal, non-transferable password. User
                        Accounts may not be "shared" or used by more than one individual. After you accept these Terms of
                        Service and your User Account registration has been accepted by <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>, your User Account will be
                        established. You are solely responsible for any and all activities that occur under your User
                        Account, whether or not such use was authorized by you.
                    </p>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        You may also access the Website, and Service by logging in using an authorized third party social
                        network account, such as a Facebook or Twitter account. By doing so, you authorize <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> to
                        collect your personal profile and activity information from that third party social network.
                    </p>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        Please note that if you opt to use your Facebook account to login to our Website and/or use our
                        Services, <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> is able to access all of your data
                        in connection with your Facebook account,
                        including, without limitation your friends list, pictures you posted or those posted of you on
                        Facebook, businesses and stories you "liked", places you visited, etc.
                    </p>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        This information you provide is used for such purposes as allowing you to set up a User Account and
                        profile that can be used to interact with other users through the Service, improving the content of
                        the Service, customizing the advertising and content you see, and communicating with you about
                        specials and new features. It is completely optional for you to engage in these activities and/or
                        make any purchases from <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>.
                    </p>

                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        Please read our Privacy Policy located at Privacy <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.privacy') }}">Policy which</a>
                        describes how <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> collects, uses, discloses, manages
                        and stores your personally identifiable
                        information ("Personal Information"). You agree and understand that you are responsible for
                        maintaining the confidentiality of all user names and passwords associated with any User Account you
                        use to access the Website and Services. Additionally, you may not use a User Account that belongs to
                        someone else at any time without the permission of that account holder. <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> is not liable for
                        any harm caused or related to the theft or misappropriation of your user name, password, User
                        Content, disclosure of your user name or password, or your authorization of anyone else to use your
                        user name or password. However, you could be held liable for losses incurred by <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>, another
                        user or any third party due to misappropriation and use of your User Account. If you become aware of
                        any unauthorized use of your User Account, please notify <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> immediately at
                        <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="mailto:ytshortdownloader.com@gmail.com" target="_blank"
                            rel="noopener noreferrer">ytshortdownloader.com@gmail.com</a>
                    </p>
                </div>
                {{-- User Account::end --}}
                {{-- User Content::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        User Content
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        User Account holders may upload, store or transfer files, videos, pictures, data, information, and
                        other material through the Website, <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> blog and Services ("User
                        Content"). <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> does not
                        own any User Content and does not monitor, edit, or disclose any information regarding you or your
                        User Account without your prior permission, except in accordance with these Terms of Service or
                        Privacy Policy. <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> also does not, as a matter of
                        practice, review, inspect, edit or monitor
                        any User Content posted, stored, or accessed by you or any other user of the Website or Services.
                        However, <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> reserves the right, solely upon
                        its own discretion, to refuse, remove, or disable
                        access to User Content that <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> learns may be illegal or may
                        violate the terms of these Terms
                        of Service, although it has no obligation to do so. <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>'s action or inaction to regulate
                        content or conduct or to enforce against any potential violation of these Terms of Service by any
                        user (or any other third party) does not waive <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>'s right to implement or not
                        implement
                        regulation or enforcement measures with respect to any subsequent or similar content, conduct, or
                        potential Terms of Service violation.
                    </p>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> does not control, is not
                        responsible for, and makes no representations or warranties with
                        respect to any User Content. You are solely responsible for your access to, use of and/or reliance
                        on any User Content. You must conduct any necessary, appropriate, prudent or judicious
                        investigation, inquiry, research, and due diligence with respect to any User Content. It your
                        responsibility to investigate the licensing of any User Content prior to using such User Content in
                        any way and to ensure that your use of any such User Content complies with all applicable laws,
                        licensing requirements and does not infringe third parties' proprietary rights. You are also
                        responsible for any content that you post or transmit as well as all content posted or transmitted
                        through or by use of your User Account.
                    </p>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        Content prohibited from the Website and Services include but is not limited to: (1) illegal content;
                        (2) content relating to the creation, advertising, distribution, or receipt of illegal goods or
                        services; (3) offensive content (including, without limitation, defamatory, threatening, or
                        pornographic content); (4) content that discloses another person's personal, confidential, or
                        proprietary information; (5) fraudulent content; (6) malicious content such as malware or spyware;
                        and (7) content that offers, promotes, advertises or provides links to unsolicited products or
                        services.
                    </p>
                </div>
                {{-- User Content::end --}}
                {{-- Sponsored Content::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Sponsored Content
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        From time to time <a class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> may enter into partnerships with
                        third party service providers who may
                        use User Content in connection with commercial, sponsored, or related content, within the Website or
                        Services (such use referred to as"Sponsored Content"). If your User Content (including your name,
                        username, profile picture, content, photograph, or other likeness) is used on the Website for
                        purposes of Sponsored Content, <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> will notify you of this use and
                        provide you the option to
                        "opt-out" of having your User Content used in this way. Also, you may choose to prevent all future
                        use of your User Content for purposes of Sponsored Content within the Website. If you are under the
                        age of eighteen (18) or under any other legal age of majority, you represent that at least one of
                        your parents or legal guardians has also agreed to the terms of this section (and the use of your
                        name, username, profile picture, content, photograph, or other likeness) on your behalf. Parents or
                        legal guardians of minor children whose User Content appears in <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>'s Sponsored Content may
                        choose to "opt-out" and prevent all future use of a minor's User Content in this way. If you are
                        unsure whether your User Content has been used as part of <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>'s Sponsored Content and would
                        like to find out, please contact us at <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="mailto:ytshortdownloader.com@gmail.com" target="_blank"
                            rel="noopener noreferrer">ytshortdownloader.com@gmail.com</a>. <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a> will need to verify your
                        identify before responding to any requests so please be prepared to provide certain information such
                        as your username, password, or other information as requested by <a
                            class="text-primary-600 dark:text-white dark:underline font-bold italic"
                            href="{{ route('page.index') }}">ytshortdownloader.com</a>.
                    </p>
                </div>
                {{-- Sponsored Content::end --}}
                {{-- Term and Termination::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Term and Termination.
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        The term of these Terms of Service ("Term") shall begin when you start using the Website or Services
                        and shall continue in perpetuity unless otherwise terminated by SaveFrom or you by written notice.
                        SaveFrom reserves the right to change, suspend or discontinue the Services or any portion thereof,
                        at any time. Without prejudice to any other rights, these Terms of Service will terminate
                        automatically if you fail to comply with any of the limitations or other requirements described
                        herein. Upon any termination or expiration of these Terms of Service, you must immediately cease
                        using this Website and the Services including without limitation any use of SaveFrom's trademarks,
                        trade names, copyrights and other intellectual property.
                    </p>
                </div>
                {{-- Term and Termination::end --}}
                {{-- Intellectual Property::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Intellectual Property
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        Copyright, trademark and all other proprietary rights in the Website, SaveFrom, Services, and
                        Content (including but not limited to software, services, audio, video, text and photographs, but
                        excluding User Content) rest with SaveFrom and/or its licensors. Unless otherwise specifically
                        provided herein or authorized by SaveFrom in writing, all rights in the Website, Services, and
                        Content not expressly granted herein are reserved. You agree not to copy, republish, frame, make
                        available for download, transmit, modify, rent, lease, loan, sell, assign, distribute, license,
                        sublicense, reverse engineer, or create derivative works based on the Content, Website, SaveFrom, or
                        Services, other than in conjunction with the Services offered by SaveFrom through the Websites.
                    </p>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        SaveFrom hereby disclaims any rights to trademarks, service marks, trade names, logos, copyright,
                        patents, domain names or other intellectual property interests of third parties. All intellectual
                        property interests of third parties referenced herein, including without limitation Third Party
                        Material or otherwise provided on this Website are the properties of their respective owners.
                        SaveFrom disclaims any proprietary interests in the intellectual property rights other than their
                        own.
                    </p>
                </div>
                {{-- Intellectual Property::end --}}
                {{-- Feedback::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Feedback
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        You may from time to time provide suggestions, comments or other feedback to SaveFrom with respect
                        to any product, material, software or information provided by SaveFrom (hereinafter "Feedback"). You
                        agree that all Feedback is and shall be entirely voluntary and shall not, absent separate agreement,
                        create any confidentiality obligation for SaveFrom. SaveFrom will not disclose the source of any
                        feedback without notice to the providing party. However, SaveFrom shall be free to disclose and use
                        such Feedback as it sees fit, entirely without obligation of any kind to you. The foregoing shall
                        not, however, affect either party's obligations hereunder with respect to the information protected
                        pursuant to SaveFrom's Privacy Policy posted on this Website.
                    </p>
                </div>
                {{-- Feedback::end --}}
                {{-- Notice and Procedure for Making Claims of Copyright Infringement::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Notice and Procedure for Making Claims of Copyright Infringement
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        It is SaveFrom policy to respond to notices of alleged copyright infringement that comply with
                        applicable international intellectual property law. If you believe that your work has been copied in
                        a way that constitutes copyright infringement, please provide us with the written information
                        specified below.
                    </p>
                    <ul class="list-disc pl-3 ml-3">
                        <li>An electronic or physical signature of the copyright owner or the person authorized to act on
                            behalf of the owner of the copyright interest;</li>
                        <li>A description of the copyrighted work that you claim has been infringed upon;</li>
                        <li>A description of where the material that you claim is infringing is located on this Website;
                        </li>
                        <li>Your address, telephone number, and e-mail address;</li>
                        <li>A statement by you that you have a good-faith belief that the disputed use is not authorized by
                            the copyright owner, its agent, or the law;</li>
                        <li>A statement by you, made under penalty of perjury, that the above information in your notice is
                            accurate and that you are the copyright owner or authorized to act on the copyright owner's
                            behalf.</li>
                    </ul>
                </div>
                {{-- Notice and Procedure for Making Claims of Copyright Infringement::end --}}
                {{-- Agreement to Deal Electronically::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Agreement to Deal Electronically
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        All transactions with or through the Website or Services may, at SaveFrom's option, be conducted and
                        executed electronically. We may keep records of any type of communication conducted via the Website
                        or Services. All electronic records are deemed sent when they are properly addressed to the
                        recipient and the record enters an information processing system outside the control of the sender
                        or the record enters a region of an information processing system under the recipient's control. All
                        electronic records are received when the record enters an information processing system that the
                        recipient has designated or uses for the purpose of receiving electronic records or information of
                        the type sent, in a form capable of being processed by that system, and from which the recipient is
                        able to retrieve the electronic record.
                    </p>
                </div>
                {{-- Agreement to Deal Electronically::end --}}
                {{-- Severability::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Severability
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        These Terms of Service will be enforced to the fullest extent permitted by applicable law. If for
                        any reason any provision of these Terms of Service are held to be invalid or unenforceable under
                        applicable law to any extent, then (a) such provision will be interpreted, construed or reformed to
                        the extent reasonably required to render the same valid, enforceable and consistent with the
                        original intent underlying such provision and (b) such invalidity or unenforceability will not
                        affect any other provision of this Agreement.
                    </p>
                </div>
                {{-- Severability::end --}}
                {{-- Injunctive Relief::start --}}
                <div class="my-8">
                    <h3
                        class="my-2 text-xl sm:text-2xl italic leading-normal font-extrabold text-primary-500 dark:text-white">
                        Injunctive Relief
                    </h3>
                    <p class="my-4  text-slate-700 dark:text-gray-200 ">
                        You acknowledge and agree that any violation or breach of these Terms of Service may cause SaveFrom
                        immediate and irreparable harm and damages. As a result, SaveFrom has the right to, and may in its
                        discretion, immediately obtain preliminary injunctive relief (including, without limitation,
                        temporary restraining orders) and seek permanent injunctive relief regarding any violation or breach
                        of these Terms of Service. In addition to any and all other remedies available to SaveFrom in law or
                        in equity, SaveFrom may seek specific performance of any term in these Terms of Service.
                    </p>
                </div>
                {{-- Injunctive Relief::end --}}


                <div class="border-2 bg-red-500/30 border-gray-100 rounded-lg dark:border-gray-700">
                    <div class="relative lg:p-8 p-4">
                        <p class="text-md font-normal text-gray-900 dark:text-white">
                            This site is for educational purposes, <a class="text-primary-500 hover:underline font-bold"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a> is not affiliated with
                            YouTube,
                            and we do not host any video, photos, or any media on our server all the media delivered through
                            YouTube API and all the right goes to its respective owners. <a
                                class="text-primary-500 hover:underline font-bold"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a> have not any right
                            to videos, photos, or
                            any images. All the right goes to the original creators or YouTube. The site is using only
                            freely available information. YouTube and YouTube logos are the trademark and copyright of
                            Google.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
