@extends('layouts.app')

@section('main')
    @php $locale = session()->get('locale');  @endphp
    <div data-barba="container">
        <div class="flex flex-col h-screen mx-auto">
            <div class="p-3 pt-8 lg:mx-16 md:pt-20">
                <div class="flex flex-row items-center pt-2">
                    <a href="/" class="prevent"> <i class="ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
                </div>
                @if ($locale == 'de')
                      <div class="flex flex-col items-center justify-center pt-8">
                        <h1 class="pb-4 font-extrabold text-center text-gray-900">Inhaber der Website:</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> FORSCHUNGSBEREICH</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> VISUELLE KULTUR (E264-03)</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> INSTITUTE OF ART AND DESIGN</h1>
                        <h1 class="pb-4 text-xl font-bold text-center text-gray-900"> INSTITUT FÜR KUNST UND GESTALTUNG</h1>
                        <p class="pb-4 text-base text-center text-gray-600">  Technische Universität Wien <br> Karlsplatz 13/264-03, 1040 Wien </p>
                        <p class="pb-4 text-base text-center text-gray-600"> +43 1 58801-26403</p>
                        <a href="mailto:visualculture@tuwien.ac.at"
                            class="pb-4 text-base text-center text-blue-400">visualculture@tuwien.ac.at</a>
                    </div>
                @else
                 <div class="flex flex-col items-center justify-center pt-8">
                        <h1 class="pb-4 font-extrabold text-center text-3xl text-gray-900">Impressum Website owner:</h1>
                        <h1 class="pb-4 text-xl font-bold  text-gray-900 p-[20px]"> DEPARTMENT OF VISUAL CULTURE (E264-03)
                        </h1>
                        <h1 class="pb-4 text-xl font-bold  text-gray-900"> INSTITUTE OF ART AND DESIGN</h1>
                        <p class="pb-4 text-base text-center text-gray-600"> TU Wien<br> Karlsplatz 13/264-03, 1040 Vienna
                        </p>
                        <p class="pb-4 text-base  text-gray-600"> +43 1 58801-26403</p>
                        <a href="mailto:visualculture@tuwien.ac.at"
                            class="pb-4 text-base  text-blue-400">visualculture@tuwien.ac.at</a>
                    </div>
              <div class="px-[50px]">
                  <div class="mt-2 text-base  text-black italic font-bold">
                      Declaration on Accessibility
                  </div>
                  <p class="mt-2 text-base  text-black italic font-bold ">City layers make every effort to make our website accessible in accordance with the Web Accessibility Act
                      ("Web-Zuganglichkeits-Guestz"-WZG).This declaration on accessibility applies to the website and corresponding web app,
                      hosted on a Tu.it server and conncted to the central TUW TYPO3 system.
                  </p>
                  <p class="mt-2 text-base  text-black italic font-bold">
                      To fulfil the requirements of the Web-Zuganglichkeits-Gesetz (WZG) and the Web Content Accessibility Guidelines
                      (WCAG)2.1, level AA we have implemented various acessibility features,including:
                  </p>
                  <ul class="list-disc p-[20px]">
                      <li>A fully responsive design that works on all devices</li>
                      <li>Keyboard navigation</li>
                      <li>Clear and consistent headings,labels,and instructions</li>
                      <li>High color contrast to make text and images easier to read</li>
                      <li>Alternative text descriptions for all images and non-text content</li>
                  </ul>
                  <p class="mt-2 text-base font-bold text-black italic  ">Efforts to support accessibility
                      We are continually testing and improving our app to ensure that it remains accessible  to everyone.
                      However,wew recognize that some areas of our city-mapping web app may not be fully accessible.For example,
                      our mapping features may be difficult to navigate for users who rely on screen readers.We are actively working to address
                      the issues and welcome your feedback on areas where we can improve.

                  </p>

                  <p class="mt-2 text-base font-bold text-black italic  ">                        Creation of the decleration on accessibility
                      This deceleration was issued on April 15,2023.
                      The declaration was prepared on the basis of a self-assessment conducted by the  City Layers team.
                  </p>

                  <p class="mt-2 text-base font-bold text-black italic  ">Feedback and contact details
                      If you notice any other barriers that prevent you from using our website,please let us know by e-mail.We will
                      check your request and contact you as soon as possible.
                      Please send all messages and suggestions to <a class="underline italic text-[#2d9bf0]">support@citylayers.org</a>
                  </p>

                  <p class="mt-2 text-base font-bold text-black italic  ">Enforcement Procedure
                      In case of unsatisfactory answers from the above-mentioned contact possibility you can turn to the Austrian Research
                      Promotion Agency("Osterreichische Forschungsforderungsgesellschaft"-FFG) by means of a complaint.The FFG
                      accepts complaints electronically via a contact form.
                      The contact form of the complaints office can be found at <a class="underline italic text-[#2d9bf0]">www.ffg.at/form/kontaktformular-beschwerdestelle.</a>
                  </p>
                  <p class="mt-2 text-base  text-black italic ">
                      These complaints are examined by the FFG to determine whether they relate to violations of the Web Accessibility Act
                      (WZG),in particular deficiencies  in compliance with accessibility requirements, by the  federal government or an institution
                      assigned to it.
                  </p>
                  <p class="mt-2 text-base  text-black italic">
                      If the complaint is justified,the FFG must make recommendations to the federal government or the legal entities
                      concerned and purpose measures  to remedy the existing deficiencies.
                      Further information on the appeal procedure can be found at www.ffg.at/barrierefreiheit/beschwerdestelle.
                  </p>
              </div>
                @endif

            </div>
        </div>
    @endsection
