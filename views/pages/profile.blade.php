@extends('layouts.app')
@section('content')
    <div id="app" class="min-h-full">
        <main class="profile-page">
            <section class="relative block" style="height: 500px;">
              <div
                class="absolute top-0 w-full h-full bg-center bg-cover"
                style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'
              >
                <span
                  id="blackOverlay"
                  class="w-full h-full absolute opacity-50 bg-black"
                ></span>
              </div>
              <div
                class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;"
              >
                <svg
                  class="absolute bottom-0 overflow-hidden"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="none"
                  version="1.1"
                  viewBox="0 0 2560 100"
                  x="0"
                  y="0"
                >
                  <polygon
                    class="text-gray-300 fill-current"
                    points="2560 0 2560 100 0 100"
                  ></polygon>
                </svg>
              </div>
            </section>
            <section class="relative py-16 bg-gray-300">
              <div class="container mx-auto px-4">
                <div
                  class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
                >
                  <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                      <div
                        class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                      >
                        <div class="relative">
                          <img
                            alt="..."
                            src="{{ asset('images/profile.WebP') }}"
                            class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                            style="max-width: 150px;"
                          />
                        </div>
                      </div>
                      <div
                        class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                      >                        
                      </div>
                      <div class="w-full lg:w-4/12 px-4 lg:order-1">
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                          <div class="mr-4 p-3 text-center">
                            <span
                              class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                              >50</span
                            ><span class="text-sm text-gray-500">Projets</span>
                          </div>
                          <div class="mr-4 p-3 text-center">
                            <span
                              class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                              >10</span
                            ><span class="text-sm text-gray-500">Partenaire</span>
                          </div>
                          <div class="lg:mr-4 p-3 text-center">
                            <span
                              class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                              >89</span
                            ><span class="text-sm text-gray-500">Sous traitants / subcontracting partners</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-center mt-12">
                      <h3
                        class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                      >
                        Tim Kontiki
                      </h3>
                      <div
                        class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                      >
                        <i
                          class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                        ></i>
                        Antananarivo, Madagascar
                      </div>
                      <div class="mb-2 text-gray-700 mt-10">
                        <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                        >Web Developer - Kontiki
                      </div>
                      <div class="mb-2 text-gray-700">
                        <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                        >Kontiki media
                      </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-gray-300 text-center">
                      <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                          <p class="mb-4 text-lg leading-relaxed text-gray-800">
                            Bonjour, je suis Tim, un développeur web passionné par la création d'applications robustes et élégantes. 
                            Avec une expertise approfondie dans des frameworks tels que Laravel et une solide expérience 
                            dans la création de solutions web hautement performantes, mon objectif est de relever des défis 
                            techniques tout en créant des expériences utilisateurs exceptionnelles. 
                            Toujours à l'affût des dernières tendances technologiques, 
                            je suis constamment en quête de nouvelles façons d'améliorer et de perfectionner mes compétences, 
                            tout en contribuant de manière significative au monde du développement web.
                          </p>                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </main>
	</div>
@endsection