<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="antialiased">
    <header class="fixed w-full bg-gray-100">
        
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="#" class="flex items-center">
                    <img src="./images/logo.png" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Parroquia</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-800 dark:text-white hover:bg-gray-50
                             focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4
                             lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700
                             focus:outline-none dark:focus:ring-gray-800">Log
                                in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-gray-800 dark:text-white hover:bg-gray-50
                             focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4
                             lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700
                             focus:outline-none dark:focus:ring-gray-800">Sign
                                    Up</a>
                            @endif
                        @endauth
                    @endif
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray rounded lg:bg-transparent
                                 lg:text-yellow-500 lg:p-0 dark:text-white"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#abouts"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About
                                Us</a>
                        </li>
                        <li>
                            <a href="#services"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="#gallery"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Gallery</a>
                        </li>
                        <li>
                            <a href="#faq"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">FAQ</a>
                        </li>
                        <li>
                            <a href="#contact"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact
                                Us</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mt-3 lg:mr-auto place-self-center lg:col-span-7  md:text-center sm:text-center xs:text-center">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl  dark:text-white">
                    Welcome to our Parish! <br></h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Parroquia De La Nuestra Señora Dela Paz y Buen Viaje is located in
                    <a href="https://quezoncity.gov.ph/" class="hover:underline">Quezon City.</a> It is part of the
                    Diocese of Novaliches and the
                    <a href="https://www.rcam.org/our-parishes/vicariate-of-saints-peter-and-paul/"
                        class="hover:underline">Vicariate of St. Peter</a>
                    <a href="https://novalichesdiocese.org/" class="hover:underline">(Diocese of Novaliches)</a>
                </p>



            </div>
            <div class="lg:mt-0 lg:col-span-5 lg:flex lg:hover:transition-all md:flex md:justify-center">
                <img src="./images/first.jpg" alt="hero image" class="" />
            </div>
        </div>
    </section>

    <section id="abouts" class="bg-gray-50 text-gray-600 body-font py-8">
        <h2 class="mb-4 text-center text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">About Us</h2>
        <div class="container px-5 mx-auto">
            <div class="lg:w-4/6 mx-auto">
                
                <div class="flex flex-col mt-4 px-4">
                    <div class="sm:w-full text-center ">
                        <div class="rounded-full inline-flex items-center justify-center mt-4">
                            <img src="./images/logo.png" class="h-9 w-9" alt="Landwind Logo" />
                        </div>
                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">ROMAN CATHOLIC DIOCESE OF
                                NOVALICHES</h2>
                            <h2 class="font-medium title-font text-gray-900 text-lg">Parroquia Dela Nuestra Señora De
                                La Paz y Buen Viaje</h2>
                            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                            <p class="text-base">Lorem ipsum dolor sit amet. Ut labore voluptas ex nihil tempore qui
                                dignissimos nisi. Ad ullam iste quo inventore illum non illum corporis! Est fuga sint
                                est aliquam nesciunt vel reiciendis ratione.</p>
                        </div>
                    </div>

                   
                </div>
            </div>
            
        </div>
    </section>

    
    <!-- End block -->
    <!-- About us -->

    

    <!-- End of About us -->

    <!-- Start block -->

    <section class=" dark:bg-gray-900 p-8" id="services">
        <h2 class="mb-4 text-center text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white ">Parish Services
        </h2>
        
        
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            
            <ul class="hidden text-xl font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg xs:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <li class="w-full">
                    <button id="mass-tab" data-tabs-target="#mass" type="button" role="tab" aria-controls="mass" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 text-black hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Mass Schedule</button>
                </li>
                <li class="w-full">
                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 text-black hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Other Services</button>
                </li>
                
            </ul>
            <div id="fullWidthTabContent" class="border-t border-gray-200">
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="mass" role="tabpanel" aria-labelledby="mass-tab">
                    <dl class="grid max-w-screen-xl  gap-8 p-4 mx-auto text-gray-900 xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 content-start dark:text-white sm:p-8">
                        <div
                            class="flex flex-col max-w-lg p-6 items-center  xl:p-8">
                            <p class="text-2xl font-bold text-gray-900 md:text-1xl">Sunday</p>
                            <ul class="font-light  sm:text-xl dark:text-gray-400">
                                <li class="list-disc ml-2 text-left">7:00 AM <b>*</b></li>
                                <li class="list-disc ml-2 text-left">10:00 AM</li>
                                <li class="list-disc ml-2 text-left">4:00 PM</li>
                                <li class="list-disc ml-2 text-left">6:00 PM <b>*</b></li>
                            </ul>
                            <p class="font-light text-center lg:text-xl sm:text-lg dark:text-gray-400">* Online Mass
                                are via
                                <a href="#" class="hover:underline font-bold"> Facebook Live</a>
                            </p>
                        </div>
                        <div
                            class="flex flex-col max-w-lg p-6 items-center  xl:p-8">
                            <p class="text-2xl font-bold text-gray-900 md:text-1xl">Monday-Friday</p>
                            <ul class="font-light  sm:text-xl dark:text-gray-400">
                                <li class="list-disc ml-2 text-left">7:00 AM</li>  
                            </ul>
                            <p class="font-light text-center lg:text-xl sm:text-lg dark:text-gray-400">
                               * Every Wednesday afternoon Mass, there is a Novena to our Mother of Perpetual Help.
                            </p>
                        </div>
                        <div
                            class="flex flex-col max-w-lg p-6 items-center  xl:p-8">
                            <p class="text-2xl font-bold text-gray-900 md:text-1xl">Saturday</p>
                            <ul class="font-light  sm:text-xl dark:text-gray-400">
                                <li class="list-disc ml-2 text-left">7:00 AM</li>                                
                            </ul>
                        </div>
                    </dl>
                </div>
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                    
                    <dl class="grid max-w-screen-xl  gap-8 p-4 mx-auto text-gray-900 xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 dark:text-white sm:p-8">
                        
                        <div class="flex flex-col items-center justify-center max-w-sm bg-white border border-gray-200 rounded-lg shadow overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                            <img class="rounded-t-lg hover:scale-110" src="./images/1baptism.jpg" alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Baptismal</h5>                              
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center max-w-sm bg-white border border-gray-200 rounded-lg shadow overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                            <img class="rounded-t-lg hover:scale-110" src="./images/2wedding.jpg" alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Wedding</h5>                              
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center max-w-sm bg-white border border-gray-200 rounded-lg shadow overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                            <img class="rounded-t-lg hover:scale-110" src="./images/3funeral.jpg" alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Funeral</h5>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center max-w-sm bg-white border border-gray-200 rounded-lg shadow overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                            <img class="rounded-t-lg hover:scale-110" src="./images/4kumpisal.jpg" alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Kumpisal</h5>
                            </div>
                        </div>
                    </dl>  
                </div>
                
            </div>
        </div>


    </section>
    <!-- End block -->
    <section class="bg-gray-50 dark:bg-gray-800 text-gray-600 body-font py-8" id="gallery">
        <div class="lg:container px-5 mx-auto">
            <h1 class="mb-4 text-center text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Gallery
            </h1>
            <div class="grid lg:flex lg:flex-wrap md:flex md:flex-wrap md:-m-2 -m-1 sm:grid-cols-1 xs:grid-rows-1">
                <div class="lg:flex lg:flex-wrap lg:w-1/2 lg:p-0 md:p-8  md:flex md:flex-wrap md:w-full">
                    <div class="md:p-2 p-1 w-full">
                        <img alt="gallery" class="w-full h-full object-cover object-center block rounded-lg "
                            src="./images/gallery-4.jpg">
                    </div>
                </div>
                <div class="lg:flex lg:flex-wrap lg:w-1/2 md:grid md:grid-cols-2 md:flex-wrap md:w-full">
                    <div class="md:p-8 p-1 lg:w-1/2 ">
                        <img alt="gallery" class="w-full object-cover h-full object-center block rounded-lg"
                            src="./images/gallery-6.jpg">
                    </div>
                    <div class="md:p-8 p-1 lg:w-1/2 ">
                        <img alt="gallery" class="w-full object-cover h-full object-center block rounded-lg"
                            src="./images/gallery-5.jpg">
                    </div>
                    <div class="md:p-8 p-1 lg:w-1/2 ">
                        <img alt="gallery" class="w-full h-full object-cover object-center block rounded-lg"
                            src="./images/gallery-7.jpg">
                    </div>
                    <div class="md:p-8 p-1 lg:w-1/2 ">
                        <img alt="gallery" class="w-full h-full object-cover object-center block rounded-lg"
                            src="./images/gallery-8.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Educational
                    Assistance Program (EAP)</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here at Parroquia De La Nuestra
                    Señora Dela Paz y Buen Viaje - Old Balara we focus on helping people reach their dreams by giving
                    them academic financial assistance.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-2 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div
                    class="flex flex-col max-w-lg p-6 mx-auto text-justify text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Elementary</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">The monthly allowance of <a
                            class="font-semibold">₱700</a> is given every second Saturday/Sunday of the month for ten
                        months</p>


                    <hr class="w-full my-6 border-gray-300" />

                    <!-- Pricing Card -->

                    <h3 class="mb-4 text-2xl font-semibold">Highschool</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">The monthly allowance of <a
                            class="font-semibold">₱800</a> is given every second Saturday/Sunday of the month for ten
                        months</p>


                    <hr class="w-full my-6 border-gray-300" />
                    <h3 class="mb-4 text-2xl font-semibold">College</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">The monthly allowance of <a
                            class="font-semibold">₱1300</a> is given every second Saturday/Sunday of the month for ten
                        months</p>


                    <hr class="w-full mt-6 mb-3 border-gray-300" />



                </div>
                <div class="grid grid-cols-2 gap-8">
                    <img class="object-cover w-full h-56 col-span-2 rounded shadow-lg" src="./images/aboutimg.png"
                        alt="" />
                    <img class="object-cover w-full h-48 rounded shadow-lg"
                        src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                        alt="" />
                    <img class="object-cover w-full h-48 rounded shadow-lg"
                        src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <!--FAQ-->
    <section class="bg-gray-50 dark:bg-gray-900" id="faq">
        <div class="max-w-screen-xl px-9 pb-8 mx-auto lg:pb-24 lg:px-6 ">
            <h2
                class="mb-6 p-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl dark:text-white">
                Frequently Asked Questions</h2>
            <div class="max-w-screen-md mx-auto">
                <div id="accordion-flush" data-accordion="collapse"
                    data-active-classes="pl-3.5 dark:bg-gray-900 text-gray-900 dark:text-white"
                    data-inactive-classes="pl-3 text-gray-500 dark:text-gray-400">
                    <h3 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900  border-b border-gray-200 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                            aria-controls="accordion-flush-body-1">
                            <span class="font-black">What types of financial assistance are available through the
                                Educational Assistance Program of the parish?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 pl-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-black-500 dark:text-gray-400 ">The Educational Assistance Program of the
                                parish offers a cash assistance for elementary, high school and college.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b rounded-lg border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span class="font-black">Who is eligible for the Educational Assistance Program?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 pl-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-black-500 dark:text-gray-400">Applicants must have at least an average grade
                                of 82, be Catholic, and be under the jurisdiction of the parish.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b rounded-lg border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span class="font-black">How do I apply for the Educational Assistance Program?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 pl-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-black-500 dark:text-gray-400">Applications must be completed and submitted
                                to the parish office. All required documents must be included with the application.</p>
                            </ul>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b rounded-lg border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                            aria-controls="accordion-flush-body-4">
                            <span class="font-black">How much financial assistance is available through the Educational
                                Assistance Program?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 pl-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-black-500 dark:text-gray-400">The amount of assistance available varies
                                based on the individual's educational stage (Kindergarten-Elementary = ₱700, Highschool
                                = ₱800, College = ₱1300) and the availability of funds.</p>
                        </div>
                    </div>
                    <h3 id="accordion-flush-heading-5">

                        <button type="button"
                            class="flex items-center justify-between w-full py-5 pl-3 font-medium text-left text-gray-500 border-b rounded-lg border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-5" aria-expanded="false"
                            aria-controls="accordion-flush-body-5">
                            <span class="font-black">When is the deadline to apply for the Educational Assistance
                                Program?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h3>
                    <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                        <div class="py-5 pl-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-black-500 dark:text-gray-400">The deadline to apply is typically set by the
                                parish office, but is usually at least one month before the start of the academic year.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="bg-white dark:bg-gray-900 py-8" id="contact">
        <div class="container px-5 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h2 class="text-xs text-orange-500 tracking-widest font-medium  text-center title-font mb-1">Parroquia De La Nuestra
                    Señora Dela Paz y Buen Viaje - Old Balara</h2>
                <h1 class="sm:text-3xl text-3xl font-extrabold title-font mb-4 text-center text-black">Contact Us</h1>
                
            </div>
            
            <div class="grid mb-8 border border-gray-200 rounded-lg shadow-md dark:border-gray-700 md:mb-12 md:grid-cols-2 xs:grid-cols-1">
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <img src="./images/facebook.png" class="mx-auto h-6 sm:h-9" alt="">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Facebook</h3>
                        
                    </blockquote>
                    <figcaption class="flex items-center justify-center space-x-3">
                        
                        <div class="space-y-0.5 font-medium dark:text-white text-center xs:text-sm">
                            <div>facebook.com/nuestraparishnovaliches</div>
                            
                        </div>
                    </figcaption>    
                </figure>
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <img src="./images/email.png" class="mx-auto h-6 sm:h-9" alt="">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Email</h3>
                        
                    </blockquote>
                    <figcaption class="flex items-center justify-center space-x-3">
                        
                        <div class="space-y-0.5 font-medium dark:text-white text-center xs:text-sm">
                            <div>nspbvparish@gmail.com</div>
                            
                        </div>
                    </figcaption>    
                </figure>
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <img src="./images/address.png" class="mx-auto h-6 sm:h-9" alt="">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Address</h3>
                        
                    </blockquote>
                    <figcaption class="flex items-center justify-center space-x-3">
                        
                        <div class="space-y-0.5 font-medium dark:text-white text-center xs:text-sm">
                            <div>#01 Tandang Sora cor. Capitol Hills Drive,
                                Old Balara, Quezon City, Philippines</div>
                            
                        </div>
                    </figcaption>    
                </figure>
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <img src="./images/phone.png" class="mx-auto h-6 sm:h-9" alt="">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Phone</h3>
                        
                    </blockquote>
                    <figcaption class="flex items-center justify-center space-x-3">
                        
                        <div class="space-y-0.5 font-medium dark:text-white text-center xs:text-sm">
                            <div>#289623714</div>
                            
                        </div>
                    </figcaption>    
                </figure>
                
            </div>

            
        </div>
    </section>
    <!-- End block -->
    <footer class="items-center bg-gray-100 dark:bg-gray-800">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-6 lg:p-6">
            <div class="hidden lg:flex  lg:justify-center lg:mt-4 lg:font-medium lg:flex-row lg:space-x-8 ">
                <ul class="flex flex-col justify-center mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                    <li>
                        <a href="#abouts"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About
                            Us</a>
                    </li>
                    <li>
                        <a href="#services"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Serivces</a>
                    </li>
                    <li>
                        <a href="#gallery"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Gallery</a>
                    </li>
                    
                    <li>
                        <a href="#faq"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">FAQ</a>
                    </li>
                    <li>
                        <a href="#contact"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact
                            Us</a>
                    </li>
                    <!--<li>
                                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                                lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700
                                dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li> -->
                </ul>
                <hr class="my-6 border-gray-400 sm:mx-auto dark:border-gray-700 lg:my-8">
            </div>
            <div class="text-center">
                <a href="#"
                    class="flex items-center justify-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img src="./images/logo.png" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" />
                    Parroquia
                </a>
                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2021-2022 Parroquia De La
                    Nuestra Señora Dela Paz y Buen Viaje - Old Balara. All Rights Reserved.</a>
                </span>
                <ul class="flex justify-center mt-5 space-x-5">
                    <li>
                        <a href="https://www.facebook.com/nuestraparishnovaliches"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>
            {{-- Scroll to Top Button --}}
            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="fixed hidden p-3 bg-orange-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-orange-700 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-orange-800 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5" id="btn-back-to-top">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-4 h-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg>
            </button>
        </div>
    </footer>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script>
        // Get the button
        let mybutton = document.getElementById("btn-back-to-top");
    
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };
    
        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);
    
        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>
