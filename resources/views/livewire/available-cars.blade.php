<div>
    @if (empty($availableCars))
        <h1>Available Cars for Rent</h1>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @forelse ($availableCars as $car)
        <article class="overflow-hidden rounded-lg shadow-lg">
            <a href="#">
                <img alt="Placeholder" class="block h-auto w-full" src="https://imgd.aeplcdn.com/370x208/n/cw/ec/130591/fronx-exterior-right-front-three-quarter-109.jpeg?isig=0&q=80">
            </a>
            <header class="flex items-center justify-between leading-tight px-2 md:px-4 py-2">
                <h1 class="text-lg">
                    <p class="no-underline font-bold text-black">
                        {{ $car->brand }}
                    </p>
                    <p class="text-grey-darker text-sm">
                        {{ $car->model }}
                    </p>
                </h1>
                <p class="text-grey-darker text-md">
                    #{{ $car->license_plate }}
                </p>
            </header>
            <div class="flex items-center justify-between leading-none px-2 md:px-4 py-2">
                <div class="flex items-center justify-between no-underline text-black">
                    <p class="text-md">
                        Sewa / Hari
                    </p>
                </div>
                <p class="text-md">
                    Rp. {{ $car->daily_rate }}
                </p>
            </div>
            <footer class="flex items-center justify-between leading-none px-2 md:px-4 py-2">
                @if(auth()->user() && auth()->user()->role !== 'admin')
                <a href="{{ route('rental.form', $car->id) }}" class="col-span-12 text-center rounded-lg px-4 py-2 bg-orange-400 text-orange-100 w-full hover:bg-orange-600 duration-300">Rental</a>
                @endif
            </footer>
        </article>
        @empty
            <div class="col-span-12">Mobil sudah dirental semua :(.</div>
        @endforelse
    </div>
</div>
