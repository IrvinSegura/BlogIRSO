<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG JEIRSA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tag-cloud/src/tagcloud.css">
    <link rel="stylesheet" href="{{ asset('css/publication_muestra.css') }}">
</head>

<body class="bg-gray-200 min-h-screen">

    <header class="p-4 bg-white shadow-xl">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex justify-between items-center xl:mx-3">
                <a href="#" class="font-semibold text-xl">BLOG JEIRSA</a>
                <nav id="nav"
                    class="hidden bg-white md:block absolute top-0 left-0 right-0 bottom-0 p-4 z-40 flex items-center md:relative md:p-0">
                    <ul class="flex items-center flex-col md:flex-row w-full md:w-auto">
                        <li class="mx-3">
                            <a href="#"
                                class="border-b-2 border-white transition hover:border-gray-700 font-semibold hover:text-gray-500 py-1 text-2xl md:text-base block mb-1 md:mb-0">Home</a>
                        </li>
                        <li class="mx-3">
                            <a href="#"
                                class="border-b-2 border-white transition hover:border-gray-700 font-semibold hover:text-gray-500 py-1 text-2xl md:text-base block mb-1 md:mb-0">About</a>
                        </li>
                        <li class="mx-3">
                            <a href="#"
                                class="border-b-2 border-white transition hover:border-gray-700 font-semibold hover:text-gray-500 py-1 text-2xl md:text-base block mb-1 md:mb-0">Portfolio</a>
                        </li>
                        <li class="mx-3">
                            <a href="#"
                                class="border-b-2 border-gray-700 text-gray-400 transition hover:border-gray-700 font-semibold py-1 text-2xl md:text-base block pt-1 mb-1 md:mb-0">Blog</a>
                        </li>
                        <li class="ml-3">
                            <button
                                class="mt-4 md:mt-0 bg-gray-800 text-white px-6 md:px-3 py-2 md:py-1 font-bold transition duration-300 border-2 border-white hover:bg-gray-300 hover:text-black focus:border-black focus:bg-gray-400 text-2xl md:text-base">Contact</button>
                        </li>
                    </ul>
                    <a href="#" class="md:hidden" onclick="closeNav()">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times"
                            class="absolute top-4 right-4 w-5" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 352 512">
                            <path fill="currentColor"
                                d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                            </path>
                        </svg>
                    </a>
                </nav>
                <a href="#" class="md:hidden" onclick="openNav()">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="w-5"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <div class="max-w-screen-xl mx-auto px-4 pt-8 pb-4">
        <h2 class="border-b-2 border-yellow-600 mb-4">
            <span class="bg-yellow-600 px-2 py-1 text-white uppercase tracking-wide">En tendencia:</span>
        </h2>
        <div class="flex flex-col flex-wrap md:flex-row md:-mx-2">
            @foreach ($publications_recent as $publicacion)
                <div class="h-72 md:h-96 w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                    <a href="#" class="h-72 md:h-96 block group relative md:mx-2 overflow-hidden">
                        <img src="{{ $publicacion->src_img_url }}" alt="" width="400px"
                            class="absolute z-0 object-cover w-full h-72 md:h-96" />
                        <div
                            class="absolute gradient transition duration-300 group-hover:bg-black group-hover:opacity-90 w-full h-72 md:h-96 z-10">
                        </div>
                        <div
                            class="absolute left-0 right-0 bottom-0 p-6 z-30 transform translate-y-1/2 transition duration-300 h-full group-hover:translate-y-0 delay-100">
                            <div class="h-1/2 relative">
                                <div class="absolute bottom-0">
                                    <h2
                                        class="font-bold text-white leading-tight transition duration-300 text-xl pb-6 group-hover:underline">
                                        {{ $publicacion->title }}
                                    </h2>
                                </div>
                            </div>
                            <div class="h-1/2">
                                <p class="text-white pb-4 opacity-0 transition duration-300 group-hover:opacity-100">
                                    {{ $publicacion->content }}
                                </p>
                                <button
                                    class="bg-white text-black text-sm px-3 py-1 font-semibold opacity-0 transition duration-300 group-hover:opacity-100 border-2 border-white focus:border-black focus:bg-gray-300">
                                    Read More
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="flex flex-col flex-wrap md:flex-row md:-mx-4 my-8">
            <div class="w-full md:w-2/3 mb-4 lg:mb-0">
                <div class="md:mx-4">
                    <h2 class="border-b-2 border-red-600 mb-4">
                        <span class="bg-red-600 px-2 py-1 text-white uppercase tracking-wide">Latest</span>
                    </h2>
                    <div class="flex flex-wrap items-center md:-mx-2">
                        <div class="w-full md:w-3/12">
                            <div class="md:mx-2">
                                <img src="https://images.unsplash.com/photo-1485712207830-8a665e701494?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=732&h=488&q=80"
                                    class="w-full mb-4 md:mb-0" />
                            </div>
                        </div>
                        <div class="md:w-9/12">
                            <div class="md:mx-2">
                                <h2 class="text-gray-900 font-bold text-2xl pb-4 leading-tight">
                                    <a href="#" class="text-gray-900 hover:underline">People devote third of
                                        waking time to mobile apps</a>
                                </h2>
                                <p class="text-gray-800 pb-2">
                                    People are spending an average of 4.8 hours a day on their
                                    mobile phones, according to app monitoring firm App Annie.
                                </p>
                                <div class="text-gray-700 inline-block py-1 italic text-sm">
                                    Posted on:
                                    <time datetime="2021-11-19 20:00">November 19, 2021</time> by
                                    <a href="#" class="underline hover:no-underline">Stephen Ainsworth</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mb-5 pb-5 border-b border-gray-400 md:mx-2"></div>
                    </div>
                    <div class="flex flex-wrap items-center md:-mx-2">
                        <div class="w-full md:w-3/12">
                            <div class="md:mx-2">
                                <img src="https://images.unsplash.com/photo-1636188540036-1879f679c2b0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=732&h=488&q=80"
                                    class="w-full mb-4 md:mb-0" />
                            </div>
                        </div>
                        <div class="md:w-9/12">
                            <div class="md:mx-2">
                                <h2 class="text-gray-900 font-bold text-2xl pb-4 leading-tight">
                                    <a href="#" class="text-gray-900 hover:underline">Fact-checkers label
                                        YouTube a 'major conduit of online
                                        disinformation'</a>
                                </h2>
                                <p class="text-gray-800 pb-2">
                                    Fact-checking organisations around the world say that YouTube
                                    is not doing enough to prevent the spread of misinformation on
                                    the platform.
                                </p>
                                <div class="text-gray-700 inline-block py-1 italic text-sm">
                                    Posted on:
                                    <time datetime="2021-11-19 20:00">November 19, 2021</time> by
                                    <a href="#" class="underline hover:no-underline">Stephen Ainsworth</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mb-5 pb-5 border-b border-gray-400 md:mx-2"></div>
                    </div>
                    <div class="flex flex-wrap items-center md:-mx-2">
                        <div class="w-full md:w-3/12">
                            <div class="md:mx-2">
                                <img src="https://images.unsplash.com/photo-1636114673156-052a83459fc1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=732&h=488&q=80"
                                    class="w-full mb-4 md:mb-0" />
                            </div>
                        </div>
                        <div class="md:w-9/12">
                            <div class="md:mx-2">
                                <h2 class="text-gray-900 font-bold text-2xl pb-4 leading-tight">
                                    <a href="#" class="text-gray-900 hover:underline">Meta monopoly case from
                                        FTC given go-ahead</a>
                                </h2>
                                <p class="text-gray-800 pb-2">
                                    The US Federal Trade Commission (FTC) has been given the
                                    go-ahead to take Facebook to court over anti-trust rules.
                                </p>
                                <div class="text-gray-700 inline-block py-1 italic text-sm">
                                    Posted on:
                                    <time datetime="2021-11-19 20:00">November 19, 2021</time> by
                                    <a href="#" class="underline hover:no-underline">Stephen Ainsworth</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mb-5 pb-5 border-b border-gray-400 md:mx-2"></div>
                    </div>
                    <div class="flex flex-wrap items-center md:-mx-2">
                        <div class="w-full md:w-3/12">
                            <div class="md:mx-2">
                                <img src="https://images.unsplash.com/photo-1532356884227-66d7c0e9e4c2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=732&h=488&q=80"
                                    class="w-full mb-4 md:mb-0" />
                            </div>
                        </div>
                        <div class="md:w-9/12">
                            <div class="md:mx-2">
                                <h2 class="text-gray-900 font-bold text-2xl pb-4 leading-tight">
                                    <a href="#" class="text-gray-900 hover:underline">Virgin Mobile and O2 users
                                        will not face EU roaming
                                        charges</a>
                                </h2>
                                <p class="text-gray-800 pb-2">
                                    Virgin Mobile and O2 phone users will not face roaming charges
                                    following announcements by other networks to reintroduce extra
                                    fees after Brexit.
                                </p>
                                <div class="text-gray-700 inline-block py-1 italic text-sm">
                                    Posted on:
                                    <time datetime="2021-11-19 20:00">November 19, 2021</time> by
                                    <a href="#" class="underline hover:no-underline">Stephen Ainsworth</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mb-5 pb-5 border-b border-gray-400 md:mx-2"></div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 mb-4 lg:mb-0">
                <div class="md:mx-4">
                    <h2 class="border-b-2 border-blue-600 mb-4">
                        <span class="bg-blue-600 px-2 py-1 text-white uppercase tracking-wide">Featured</span>
                    </h2>
                    <?php $categories = DB::table('category')->get(); ?>
                    @foreach ($categories as $category)
                        <div class="blog-tags">
                            <ul>
                                <li><a href="#" id="{{$category->id}}">{{$category->name}}</a></li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer class="py-4 bg-gray-900">
        <div class="text-center text-white text-lg">
            &copy; BLOG JEIRSA <a class="underline hover:no-underline" href="" target="_blank"
                title=""></a>
        </div>
    </footer>

    <script>
        function openNav() {
            // Código para mostrar el menú de navegación en dispositivos móviles


        }

        function closeNav() {
            // Código para ocultar el menú de navegación en dispositivos móviles
        }
    </script>

</body>

</html>
