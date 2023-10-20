@extends('layouts.app')
@section('content')
<div class="container mx-auto relative">
  
  <h1
    class="px-8 mt-16 mb-4 text-5xl font-extrabold leading-tight text-center xl:text-6xl"
  >
    Starting template for <span class="text-indigo-700">Lite framework</span>
  </h1>
  <p class="max-w-xl mx-auto mb-8 text-xl text-center xl:max-w-2xl">
    Notre framework <strong class="text-2xl">Lite</strong> vous permet de démarrer rapidement en suivant les meilleures pratiques. Vous économiserez considérablement du temps pour les projets de petite envergure, tout en renforçant la sécurité et l'efficacité par rapport à des frameworks plus volumineux.
  </p>
  <div
    class="flex flex-col justify-center max-w-xs mx-auto mb-12 sm:max-w-full sm:flex-row"
  >
    <a
      class="w-full mb-4 px-4 py-2 text-white text-xl font-bold whitespace-no-wrap bg-indigo-600 btn md:w-auto hover:bg-indigo-500"
      href="#"
    >
      Get started
    </a>    
  </div>
  <div class="mb-16">
    <img
      class="block w-full max-w-5xl mx-auto rounded"
      src="{{ asset('images/pages/home/video-placeholder.jpg') }}"
      alt=""
    />
  </div>
  <div>
    <h2 class="title sm:text-4xl md:text-5xl">
      Build up the whole picture
    </h2>
    <p class="mb-16 mx-auto intro sm:max-w-xl">
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
      officia deserunt mollit anim id est laborum — semper quis lectus nulla
      at volutpat diam ut venenatis.
    </p>
    <ul
      class="flex flex-col flex-wrap justify-center mb-20 text-center border-b border-gray-900 sm:flex-row"
    >
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/home/feature-tile-icon-01.svg') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-bold text-white">Robust Workflow</h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
          cupidatat.
        </p>
      </li>
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/home/feature-tile-icon-02.svg') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-bold text-white">Robust Workflow</h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
          cupidatat.
        </p>
      </li>
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/home/feature-tile-icon-03.svg') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-bold text-white">Robust Workflow</h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
          cupidatat.
        </p>
      </li>
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/home/feature-tile-icon-04.svg') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-medium text-white">
          Robust Workflow
        </h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
          cupidatat.
        </p>
      </li>
      <li class="w-full px-6 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/home/feature-tile-icon-05.svg') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-medium text-white">
          Robust Workflow
        </h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
          cupidatat.
        </p>
      </li>
      <li class="w-full px-8 mb-8 sm:mb-16 md:w-1/2 lg:w-1/3">
        <span
          class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-3xl text-white bg-indigo-700 rounded-full"
        >
          <img src="{{ asset('images/pages/home/feature-tile-icon-06.svg') }}" alt="" />
        </span>
        <h3 class="mb-2 text-2xl font-medium text-white">
          Robust Workflow
        </h3>
        <p class="max-w-xs mx-auto text-lg text-gray-500">
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
          cupidatat.
        </p>
      </li>
    </ul>
  </div>
  <div class="mb-16 border-b border-gray-800">
    <h2 class="mb-2 title sm:text-4xl md:text-5xl">
      Workflow that just works
    </h2>
    <p class="mb-20 mx-auto intro sm:max-w-xl">
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
      officia deserunt mollit anim id est laborum — semper quis lectus nulla
      at volutpat diam ut venenatis.
    </p>
    <div class="flex flex-col mb-8 sm:flex-row">
      <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
        <img
          class="rounded-sm"
          src="{{ asset('images/pages/home/features-split-image-01.png') }}"
          alt=""
        />
      </div>
      <div
        class="flex flex-col justify-center mb-8 sm:w-1/2 md:w-7/12 sm:pr-16"
      >
        <p
          class="mb-2 text-sm font-semibold leading-none text-center text-indigo-600 uppercase sm:text-left"
        >
          Lightning fast workflow
        </p>
        <h3 class="title title-small sm:text-left md:text-4xl">
          Data-driven insights
        </h3>
        <p class="text md:text-left">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua — Ut
          enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>
    </div>
    <div class="flex flex-col mb-8 sm:flex-row">
      <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12">
        <img
          class="rounded-sm"
          src="{{ asset('images/pages/home/features-split-image-02.png') }}"
          alt=""
        />
      </div>
      <div
        class="flex flex-col justify-center mb-8 sm:w-1/2 md:w-7/12 sm:pl-16"
      >
        <p
          class="mb-2 text-sm font-semibold leading-none text-center text-indigo-600 uppercase sm:text-left"
        >
          Lightning fast workflow
        </p>
        <h3 class="title title-small sm:text-left md:text-4xl">
          Data-driven insights
        </h3>
        <p class="text md:text-left">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua — Ut
          enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>
    </div>
    <div class="flex flex-col mb-8 sm:flex-row">
      <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
        <img
          class="rounded-sm"
          src="{{ asset('images/pages/home/features-split-image-03.png') }}"
          alt=""
        />
      </div>
      <div
        class="flex flex-col justify-center mb-8 sm:w-1/2 md:w-7/12 sm:pr-16"
      >
        <p
          class="mb-2 text-sm font-semibold leading-none text-center text-indigo-600 uppercase sm:text-left"
        >
          Lightning fast workflow
        </p>
        <h3 class="title title-small sm:text-left md:text-4xl">
          Data-driven insights
        </h3>
        <p class="text md:text-left">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua — Ut
          enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>
    </div>
  </div>  
  <div
    class="flex flex-col items-center px-4 py-8 mb-16 bg-indigo-700 bg-right-bottom bg-no-repeat bg-cover sm:flex-row sm:py-16 sm:px-12"
    style="background-image: url('{{ asset('images/pages/home/cta-illustration.svg') }} )"
  >
    <h2
      class="max-w-xs mx-auto mb-10 text-2xl font-bold text-center text-white sm:text-3xl sm:mr-10 sm:max-w-full sm:text-left sm:w-1/3 sm:mx-0 sm:mb-0 md:w-1/2 lg:w-7/12"
    >
      For previewing layouts and visual?
    </h2>
    <div class="flex flex-grow w-full sm:w-2/3 md:w-1/2 lg:w-5/12">
      <form
        class="flex items-center w-full p-4 bg-white rounded-sm space-between"
        action="#"
      >
        <input
          class="flex-grow text-gray-900 placeholder-gray-500 bg-white appearance-none"
          type="text"
          placeholder="Your best email"
        />
        <svg
          class="text-indigo-700 fill-current"
          width="16"
          height="12"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M9 5H1c-.6 0-1 .4-1 1s.4 1 1 1h8v5l7-6-7-6v5z"
            fill="#376DF9"
          ></path>
        </svg>
      </form>
    </div>
  </div>  
</div>
@endsection