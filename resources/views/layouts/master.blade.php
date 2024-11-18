<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>online grocery store</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    @include('layouts.alert')
    <div class="flex flex-wrap justify-between items-center px-6 sm:px-16 py-2 bg-green-700 text-white">
        <!-- Social Media Icons -->
        <div class="flex space-x-4 mb-2 sm:mb-0">
            <a href="https://facebook.com" target="_blank" class="text-white text-2xl hover:text-teal-300 transition-transform transform hover:scale-110">
                <i class="ri-facebook-fill"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="text-white text-2xl hover:text-teal-300 transition-transform transform hover:scale-110">
                <i class="ri-twitter-fill"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="text-white text-2xl hover:text-teal-300 transition-transform transform hover:scale-110">
                <i class="ri-instagram-fill"></i>
            </a>
            <a href="https://youtube.com" target="_blank" class="text-white text-2xl hover:text-teal-300 transition-transform transform hover:scale-110">
                <i class="ri-youtube-fill"></i>
            </a>
        </div>
        <!-- Contact Info -->
        <p class="text-lg sm:text-base">Call us: 9821009128</p>
    </div>

    <nav
        class="shadow bg-white px-16 py-4 mb-10 h-16 flex justify-between font-semibold text-xl items-center sticky top-0 z-40">
        <img src="{{ asset('images/logo.png') }}" alt="" class="h-16">


        <form action="{{route('search')}}" method="GET">
            <input type="search" id="" class="border border-gray-300  rounded-lg px-16 py-2"
                placeholder="Search" name="search" value="{{request()->query('search')}}">
            <button type="submit" class="bg-green-700 text-white rounded-lg px-4 py-2">Search</button>
        </form>




        <div class="flex gap-4">
            <a href="{{ route('home') }}" class="hover:text-green-700">Home</a>
            @php
                $categories = App\Models\Categories::orderBy('priority')->get();
            @endphp

            @foreach ($categories as $category)
                <a href="{{ route('categoryproduct', $category->id) }}"
                    class="hover:text-green-700">{{ $category->name }}</a>
            @endforeach


                    <!-- Auth Section (User Profile) -->
                @auth
                <div class="relative group">
                    <!-- Profile Picture auth -->
                    <div class="relative inline-block">
                        @if (auth()->user()->profilepicture)
                            <img class="object-cover w-10 h-10 rounded-full cursor-pointer"
                                src="{{ asset('images/profilepictures/' . auth()->user()->profilepicture) }}">
                                @else
                                <div
                                    class="flex items-center justify-center w-10 h-10 text-white bg-[#9a031fdd] rounded-full cursor-pointer">
                                    <span class="font-bold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                </div>
                            @endif
                        </div>
                    <div class="absolute hidden group-hover:block top-8 -right-10 bg-white shadow w-32 rounded-lg ">
                        <a href="{{route('mycart')}}" class="block hover:bg-gray-200 p-4 py-2 rounded-md ">My Cart</a>
                        <a href="{{route('myorder')}}" class="block hover:bg-gray-200 p-4 py-2 rounded-md ">My Order</a>
                        <a href="{{route('profile.edit')}}" class="block hover:bg-gray-200 p-4 py-2 rounded-md ">My Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block py-2 hover:bg-gray-200 p-4 rounded-md w-full text-left">Logout</button>
                        </form>

                    </div>

                </div>
            @else
                <a href="{{ route('login') }}" class="hover:text-green-700">Login</a>
            @endauth
        </div>
    </nav>
    </nav>


    @yield('content')
    <footer
    class="text-white text-center text-surface/75 bg-green-700 lg:text-left mt-10">
    <div
      class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-white/10 lg:justify-between">
      <div class="me-12 hidden lg:block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Social network icons container -->
      <div class="flex justify-center">
        <!-- Facebook -->
    <a href="#!" class="me-6">
        <i class="ri-facebook-fill text-xl"></i>
      </a>

      <!-- Twitter -->
      <a href="#!" class="me-6">

        <i class="ri-twitter-fill text-xl"></i>
      </a>

      <!-- Instagram -->
      <a href="https://www.instagram.com" target="_blank" class="me-6">
        <i class="ri-instagram-fill text-xl"></i>
      </a>

      <!-- WhatsApp -->
      <a href="https://wa.me/yourphonenumber" target="_blank" class="me-6">
        <i class="ri-whatsapp-fill text-xl"></i>
      </a>

      <!-- TikTok -->
      <a href="https://www.tiktok.com/@yourusername" target="_blank" class="me-6">
        <i class="ri-tiktok-fill text-xl"></i>
      </a>

      </div>
    </div>

    <!-- Main container div: holds the entire content of the footer, including four sections (TW Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
    <div class="mx-6 py-10 text-center md:text-left">
      <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- TW Elements section -->
        <div class="">
          <h6
            class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start">
            <span class="me-3 [&>svg]:h-4 [&>svg]:w-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor">
                <path
                  d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
              </svg>
            </span>
         Greenland Store
          </h6>
          <p>
            Vegetable & Fruit Market provides a diverse range of premium, locally-sourced vegetables and fruits, ensuring freshness and quality with every purchase.
          </p>
        </div>
        <!-- Products section -->
        <div>
          <h6
            class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
            Products
          </h6>
          @php
          $categories=App\Models\categories::all();

          @endphp
          @foreach ($categories as $category)


          <p class="mb-4">
            <a href="{{route('categoryproduct',$category->id)}}">{{$category->name}}</a>
          </p>
          @endforeach
        </div>
        <!-- Useful links section -->
        <div>
          <h6
            class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
            Useful links
          </h6>
          <p class="mb-4">
            <a href="#!">Pricing</a>
          </p>
          <p class="mb-4">
            <a href="#!">Settings</a>
          </p>
          <p class="mb-4">
            <a href="#!">Orders</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>
        </div>
        <!-- Contact section -->
        <div>
          <h6
            class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
            Contact
          </h6>
          <p class="mb-4 flex items-center justify-center md:justify-start">
            <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor">
                <path
                  d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path
                  d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
              </svg>
            </span>
            Gaindakot-02, Nawalparasi
          </p>
          <p class="mb-4 flex items-center justify-center md:justify-start">
            <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor">
                <path
                  d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                <path
                  d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
              </svg>
            </span>
           anjalimhto123@gamil.com
          </p>
          <p class="mb-4 flex items-center justify-center md:justify-start">
            <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor">
                <path
                  fill-rule="evenodd"
                  d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                  clip-rule="evenodd" />
              </svg>
            </span>
         9821009128
          </p>
          <p class="flex items-center justify-center md:justify-start">
            <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor">
                <path
                  fill-rule="evenodd"
                  d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                  clip-rule="evenodd" />
              </svg>
            </span>
           07898176
          </p>
        </div>
      </div>
    </div>

    <!--Copyright section-->
    <div class="bg-black/5 p-6 text-center">
      <span>© 2024 Copyright:</span>
      <a class="font-semibold" href=""
        >Greenland Store</a
      >
    </div>
    </footer>

    </body>

    </html>
