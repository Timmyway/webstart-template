@extends('layouts.app')
@section('content')
<div class="container mx-auto relative">  
  {{-- {{ dd($request->getSession()->get('csrf_token'))}} --}}
  <h1
    class="px-8 mt-16 mb-4 text-5xl font-extrabold leading-tight text-center xl:text-6xl"
  >
    Développez plus vite votre projets avec<br> <span class="text-indigo-700">Lite framework</span>
  </h1>
  <p class="max-w-xl mx-auto mb-8 text-xl text-center xl:max-w-2xl">
    Notre framework <strong class="text-2xl">Lite</strong> vous permet de démarrer rapidement en suivant les meilleures pratiques. Vous économiserez considérablement du temps pour les projets de petite envergure, tout en renforçant la sécurité et l'efficacité par rapport à des frameworks plus volumineux.
  </p>
  <div
    class="flex flex-col justify-center max-w-xs mx-auto mb-12 sm:max-w-full sm:flex-row"
  >
    <a
      class="w-full mb-4 px-4 py-2 text-white text-xl font-bold whitespace-no-wrap bg-indigo-600 btn md:w-auto hover:bg-indigo-500"
      href="https://github.com/Timmyway/webstart-template.git" target="_blank"
    >
      Je suis interressé
    </a>    
  </div>
  <div class="mb-16">
    <img
      class="block w-full max-w-5xl mx-auto rounded"
      src="{{ asset('images/pages/home/group-human-hands-holding-together.WebP') }}"
      alt=""
    />
  </div>
  <div>
    <h2 class="text-center mb-4 sm:text-4xl md:text-5xl">
      Pensé pour être simple et performant
    </h2>
    <p class="mb-16 mx-auto intro sm:max-w-xl text-gray-500">
      Un microframework agile conçu pour les projets modestes, 
      offrant une sécurité renforcée et une rapidité de développement optimale. 
      Une alternative légère, flexible et rapide aux frameworks plus imposants, 
      idéale pour les projets de petite envergure.
    </p>
    <ul
      class="flex flex-col flex-wrap justify-center mb-20 text-center border-b border-gray-900 sm:flex-row"
    >
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/icons/cool.png') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-bold text-dark">Un Microframework Agile</h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Alliez sécurité et rapidité avec un microframework agile, 
          conçu spécialement pour les petits projets. 
          Simplifiez le développement sans compromettre la flexibilité ni la puissance.
        </p>
      </li>
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/icons/code.png') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-bold text-dark"> Rapidité de Développement</h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Accélérez votre processus de développement avec un framework réactif, 
          offrant une solution rapide et efficace pour concrétiser vos idées sans délai.
        </p>
      </li>
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/icons/lightning.png') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-bold text-dark">Flexibilité et Légèreté</h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Libérez votre potentiel créatif avec un cadre flexible et léger, 
          parfaitement adapté pour les projets agiles où la liberté et la rapidité sont essentielles.
        </p>
      </li>      
    </ul>
  </div>
  <div class="mb-16 border-b border-gray-800">
    <h2 class="mb-2 title sm:text-4xl md:text-5xl text-center">
      Un framework adapté à votre utilisation
    </h2>
    <p class="mb-20 mx-auto intro sm:max-w-xl">
      Lite Framework : Léger et flexible, il simplifie le développement d'applications web robustes 
      en s'appuyant sur les bases éprouvées de Laravel et Symfony. 
      Une solution simple mais puissante pour des applications évolutives et performantes.
    </p>
    <div class="flex flex-col mb-8 sm:flex-row">
      <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
        <img
          class="rounded-sm"
          src="{{ asset('images/pages/home/business.WebP') }}"
          alt=""
        />
      </div>
      <div
        class="flex flex-col justify-center mb-8 sm:w-1/2 md:w-7/12 sm:pr-16"
      >
        <p
          class="mb-2 text-sm font-semibold leading-none text-center text-indigo-600 uppercase sm:text-left"
        >
          Légèreté et rapide
        </p>
        <h3 class="title title-small sm:text-left md:text-4xl">
          Un Framework Agile pour un Développement Réactif
        </h3>
        <p class="text md:text-left">
          Découvrez une expérience de développement fluide grâce à un framework léger 
          qui simplifie la création d'applications sans compromettre la puissance ou la flexibilité.
        </p>
      </div>
    </div>
    <div class="flex flex-col mb-8 sm:flex-row">
      <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12">
        <img
          class="rounded-sm"
          src="{{ asset('images/pages/home/tech.WebP') }}"
          alt=""
        />
      </div>
      <div
        class="flex flex-col justify-center mb-8 sm:w-1/2 md:w-7/12 sm:pl-16"
      >
        <p
          class="mb-2 text-sm font-semibold leading-none text-center text-indigo-600 uppercase sm:text-left"
        >
          Flexibilité sans compromis
        </p>
        <h3 class="title title-small sm:text-left md:text-4xl">
          Un Cadre adapté et sur mesure
        </h3>
        <p class="text md:text-left">
          Bénéficiez d'une flexibilité maximale pour façonner vos applications selon vos besoins, 
          en intégrant des composants de renom tels que ceux de Laravel et Symfony, 
          tout en adaptant votre approche de développement.
        </p>
      </div>
    </div>
    <div class="flex flex-col mb-8 sm:flex-row">
      <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
        <img
          class="rounded-sm"
          src="{{ asset('images/pages/home/quality.WebP') }}"
          alt=""
        />
      </div>
      <div
        class="flex flex-col justify-center mb-8 sm:w-1/2 md:w-7/12 sm:pr-16"
      >
        <p
          class="mb-2 text-sm font-semibold leading-none text-center text-indigo-600 uppercase sm:text-left"
        >
          Simplicité d'utilisation
        </p>
        <h3 class="title title-small sm:text-left md:text-4xl">
          Une Expérience Intuitive pour des Applications Puissantes
        </h3>
        <p class="text md:text-left">
          Appréciez une expérience de développement simplifiée grâce à une structure intuitive et conviviale 
          qui vous permet de vous concentrer sur la création d'applications sans les tracas de la complexité excessive.
        </p>
      </div>
    </div>
  </div>  
</div>
@endsection