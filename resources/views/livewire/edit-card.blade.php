@php
    $gnre = explode(',', $genre);

@endphp
<div class="relative p-10 flex flex-col items-center justify-center w-10/12 h-auto m-auto">
    {{-- back button with fontawesome --}}
    <a href="{{ route('home') }}" class="absolute top-10 left-10 text-2xl text-black">
        <i class="fas fa-arrow-left"></i>
    </a>
    <img class="rounded-lg object-cover aspect[2/5] h-min shadow-xl " src="{{ $image }}" alt="image">
    <h1 class="text-black font-bold text-4xl mb-4 mt-10">{{ $title }}</h1>
    <h1 class=" text-slate-600 font-medium text-xl mb-5">{{ $totalEpisode }} Episodes | {{ $rating }} / 100 score
    </h1>
    <span class=" flex *:bg-gray-500 *:rounded-md  *:text-white *:me-2 *:px-5 *:py-1 mb-14">
        @foreach ($gnre as $g)
            <h1 class="text-black font-medium text-1xl ">{{ $g }}</h1>
        @endforeach
    </span>

    <div class=" mb-9">
        <button wire:click="saveAnime"
            class=" bg-cyan-800 text-white text-xl border-2 px-10 py-3 rounded-lg me-4">Save</button>
        <select wire:model="category_id" class=" border-solid px-10 py-2 border-2 text-xl border-slate-800 rounded-lg ">
            <option value="0" {{ $category_id === 0 ? 'selected' : '' }}>Watching</option>
            <option value="1" {{ $category_id === 1 ? 'selected' : '' }}>Plan to watch</option>
            <option value="2" {{ $category_id === 2 ? 'selected' : '' }}>Finished</option>
        </select>
        {{-- When category is finished and total episodes is unknown don't show this --}}
        @if ($category_id !== 2 && $anime->total_episodes !== 0)
            <input type="number" wire:model.live="currentEp"
                class=" border-solid px-10 py-2 border-2 text-xl border-slate-800 rounded-lg " min="0"
                max="{{ $anime->total_episodes }}">
        @endif
    </div>
    <div class=" px-10">
        <p class=" mt-5 text-wrap text-lg mb-7 ">{!! $description !!}</p>
    </div>
</div>
