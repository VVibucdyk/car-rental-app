<div>
    <h1 class="font-bold text-3xl text-center">Isi Form Untuk Mulai Rental</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="submit">
        @csrf
        <input type="hidden" wire:model="car_id">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <div class="flex-flex-col">
                <h1 class="font-bold text-xl">Data Mobil</h1>
                <div class="-mx-3 md:flex mb-6">
                    <img class="w-96 mx-auto" src="https://imgd.aeplcdn.com/370x208/n/cw/ec/130591/fronx-exterior-right-front-three-quarter-109.jpeg?isig=0&q=80" alt="">
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="merk">
                            Merk Mobil
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" readonly
                            id="merk" type="text" value="{{ $car->brand }}">
                        <div>
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="type">
                            Tipe Mobil
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" readonly
                            id="type" type="text" placeholder="" value="{{ $car->model }}">
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="license_plate">
                            Nomor Kendaraan
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" readonly
                            id="license_plate" type="text" placeholder="" value="{{ $car->license_plate }}">
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="perhari">
                            Harga per Hari
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" readonly
                            id="perhari" type="text" placeholder="" value="{{ number_format($car->daily_rate, 0, ',', '.') }}">
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <h1 class="font-bold text-xl">Isian</h1>
                <div class="-mx-3 md:flex mb-2">
                    <div class="md:w-1/2 px-3">
                        <label for="start_date" class="uppercase tracking-wide text-black text-xs font-bold mb-2">Rental Dari</label>
                        <div>
                            <input
                                class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded"
                                id="department" type="date" id="start_date" wire:model="start_date"
                                wire:change="changeDate($event.target.value)">
                        </div>
                    </div>
    
                    <div class="md:w-1/2 px-3">
                        <label for="end_date" class="uppercase tracking-wide text-black text-xs font-bold mb-2">Sampai Dengan</label>
                        <div>
                            <input
                                class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded"
                                type="date" id="end_date" wire:model="end_date"
                                wire:change="changeDate($event.target.value)">
                        </div>
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                            Total Hari
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" 
                            type="text" class="form-control" id="total_cost" value="{{ number_format($total_days, 0, ',', '.') }}" readonly>
                    </div>
                    <div class="md:w-full flex-grow px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                            Total Bayar
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" 
                            type="text" class="form-control" id="total_cost" value="Rp. {{ number_format($total_cost, 0, ',', '.') }}" readonly>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mt-2">
                <div class="md:w-full px-3">
                    <button
                        class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                        Rental!
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
