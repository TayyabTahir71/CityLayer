 @extends('layouts.app')

 @section('main')

 <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
        </a>
     
         <div class="flex flex-col items-center mx-auto">

             <label for="dropzone-file" class="flex flex-col justify-center md:w-2/4 pt-8">

                 <div class="flex flex-col items-center justify-center pb-6">
                     <h1 class="text-4xl font-extrabold text-center  text-[#2d9bf0] italic">{{ __('messages.welcome to') }} City
                         Layers!
                     </h1>
                     <p class="mt-2 text-base text-center text-black italic pt-[30px] pb-[30px]">
                       The project <span class="font-extrabold">City Layers: Citizen Mapping as a Practice of City-Making</span>
                     founded by the <span class="font-extrabold">Austrian Science Fund(FWF)</span> seeks to develop a contemporary framework for
                         city-mapping which centers on citizen experience of urban space as an integrative way to contribute
                         to more diverse approaches to city design.
                     </p>

                     <h1 class=" text-4xl italic text-[#2d9bf0]  font-bold">Hypotheses</h1>
                     <p class="mt-2 text-base text-center text-black italic pt-[30px] pb-[30px]">
                         The research  hypothesis that current data collection methods have prioritised simulated and measurable
                         data, alienating and excluding diverse data sets.City Layers utilises innovative and contemporary data
                         collection methods which allow for the recording of subjective experience of the city. the project thus propose
                         a more inclusive and adaptable form of collecting information for urban design,whether it be material or immaterial,
                         based on terms dictated by citizens.
                     </p>


                     <h1 class="text-4xl italic text-[#2d9bf0]  font-bold">Objectives</h1>
                     <p class="mt-2 text-base text-center text-black italic pt-[30px] pb-[30px]">
                         The research aims to deepen the engagement between citizens and urban design using the City Layers tool
                         by inviting citizens to identify, record and reflect upon a range of different material and immaterial
                         parameters in their cities. These include accessibility ,noise ,safety,weather resistance ,amenities and many more.
                         The innovative city mapping aims to become a means of communication between citizens and the city, with the aim of creating
                         a new type of data that is collectively generated, managed and cared for.
                     </p>

                     <h1 class="text-4xl italic text-[#2d9bf0]  font-bold">Approach and methods</h1>
                     <p class="mt-2 text-base text-center text-black italic pt-[30px] pb-[30px]">
                        By recognizing and voicing  their subjective experiences in specific spaces ,citizens procure meaning
                         and values, but also provide valuable data on how these spaces can be improved.Besides mapping existing
                         'city layers', they can add new ones,be they places or observations, to highlight urban phenomena they
                         find most significant. Citizen's contributions are made available online as a form of commons
                         for active use.This innovative mapping tool thus aims to reorganise individual observations into collective
                         knowledge and brings out the strengths of citizen participation in urban design. The collected data is intended to
                         enable a basis for a better dialogue between those who use urban space and those who plan it.Therefore,
                         the research recognizes the citizen science approach as a democratic and urgent strategy for identifying the
                         essential components which constitute a city.
                     </p>

                     <h1 class="text-4xl italic text-[#2d9bf0]  font-bold text-center">Citizen Science Award 2023</h1>
                     <p class="mt-2 text-base text-center text-black italic pt-[30px] pb-[30px]">
                       City Layers has been selected for the <span>Citizen Science Award 2023!</span> On behalf of
                         the Federal Ministry of  Education,Science and Research (BMBWF), the australian agency  for Education and Internationalization
                         (OAD) invited schools and pupils, as well as people of all ages to participate  in City Layers and seven other projects
                         from all scientific diciplines from April - July,2023.The most dedicated participants have received prize at a
                         ceremony during the 2nd  Young-Science Congress on October 19.2023.
                     </p>


                 </div>
             </label>
         </div>
         <div class="flex flex-col items-center justify-center bg-gray-300">

         </div>
         <div class="fixed bottom-0 left-0 right-0 text-white bg-gray-300">
             <div class="flex justify-center pt-4 pb-4 mx-4 text-sm font-bold text-center">
                 <a href="/">
                     <h1 class="text-3xl text-center text-black">{{ __('messages.Back') }}</h1>
                 </a>
             </div>
         </div>
     </div>
 @endsection
