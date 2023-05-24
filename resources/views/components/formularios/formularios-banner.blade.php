<div class="relative p-4 mb-8 overflow-hidden bg-indigo-200 rounded-sm sm:p-6">
    <!-- Background illustration -->
    <div class="absolute top-0 right-0 hidden mr-16 -mt-4 pointer-events-none xl:block" aria-hidden="true">
        <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
                <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
                <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                    <stop stop-color="#A5B4FC" offset="0%" />
                    <stop stop-color="#818CF8" offset="100%" />
                </linearGradient>
                <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                    <stop stop-color="#4338CA" offset="0%" />
                    <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                </linearGradient>
            </defs>
            <g fill="none" fill-rule="evenodd">
                <g transform="rotate(64 36.592 105.604)">
                    <mask id="welcome-d" fill="#fff">
                        <use xlink:href="#welcome-a" />
                    </mask>
                    <use fill="url(#welcome-b)" xlink:href="#welcome-a" />
                    <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
                </g>
                <g transform="rotate(-51 91.324 -105.372)">
                    <mask id="welcome-f" fill="#fff">
                        <use xlink:href="#welcome-e" />
                    </mask>
                    <use fill="url(#welcome-b)" xlink:href="#welcome-e" />
                    <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
                </g>
                <g transform="rotate(44 61.546 392.623)">
                    <mask id="welcome-h" fill="#fff">
                        <use xlink:href="#welcome-g" />
                    </mask>
                    <use fill="url(#welcome-b)" xlink:href="#welcome-g" />
                    <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
                </g>
            </g>
        </svg>
    </div>

    <!-- Content -->
    <div class="relative">
        <h1 class="mb-1 text-2xl font-bold md:text-3xl text-slate-800">MODULO DE CREACION DE FORMULARIOS 👋 </h1>
        {{-- <p>Esto es lo que está sucediendo con sus formularios hoy:</p> --}}
    </div>   
    <div class="relative">
        {{-- <a href="{{ route('createformularios') }}" type="button" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal" class="text-white bg-indigo-500 btn hover:bg-indigo-600">
            <svg class="w-4 h-4 opacity-50 fill-current shrink-0" viewBox="0 0 16 16">
                <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
            </svg>
            <span class="hidden ml-2 xs:block">Agegar nuevo</span>
        </a> --}}        
    </div>
</div>