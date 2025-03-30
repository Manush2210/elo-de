<!-- filepath: f:\Projets\voyance_seb\resources\views\livewire\components\carousel.blade.php -->
<div x-data class="relative w-full" x-init="@if ($autoPlay) setInterval(() => { $wire.nextSlide() }, {{ $interval }}) @endif">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden rounded-lg {{ $height }}">
        @foreach ($slides as $index => $slide)
            <div class="absolute inset-0 transition-opacity duration-700 ease-in-out {{ $index === $activeSlide ? 'opacity-100' : 'opacity-0' }}"
                wire:key="slide-{{ $index }}">
                <img src="{{ $slide['image'] }}" class="absolute block w-full h-full object-cover"
                    alt="{{ $slide['title'] ?? 'Slide ' . ($index + 1) }}">

                <!-- Optional title overlay -->
                @if (isset($slide['title']))
                    <div
                        class="absolute bottom-0 left-0 right-0 top-0 flex justify-center items-center bg-gradient-to-t from-black/70 to-transparent p-4 text-white">
                        <h3 class="text-xl font-bold">{{ $slide['title'] }}</h3>
                        @if (isset($slide['action']))
                            <div class="absolute {{ $slide['action']['position'] ?? 'left-0 right-0 bottom-10 flex justify-center' }} z-20">
                                <a href="{{ $slide['action']['url'] }}"
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow-lg transition">
                                    {{ $slide['action']['text'] }}
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Optional action button overlay -->

            </div>
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($slides as $index => $slide)
            <button type="button"
                class="w-3 h-3 rounded-full {{ $index === $activeSlide ? 'bg-white' : 'bg-white/50' }}"
                aria-current="{{ $index === $activeSlide ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                wire:click="goToSlide({{ $index }})"></button>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        wire:click="prevSlide">
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        wire:click="nextSlide">
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
