<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mobil Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg sm:p-6 lg:p-8">

                <div class="w-full">
                    <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Isi Inputannya</h2>
                    <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
                        <form action="{{ route('cars.store') }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="brand" class="block mb-2 font-bold text-gray-600">Merk</label>
                                <input class="border border-gray-300 shadow p-3 w-full rounded mb-" type="text" id="brand" name="brand" required><br>
                            </div>

                            <div class="mb-5">
                                <label for="model" class="block mb-2 font-bold text-gray-600">Model</label>
                                <input class="border border-gray-300 shadow p-3 w-full rounded mb-" type="text" id="model" name="model" required><br>
                            </div>

                            <div class="mb-5">
                                <label for="license_plate" class="block mb-2 font-bold text-gray-600">Nomor Kendaraan</label>
                                <input class="border border-gray-300 shadow p-3 w-full rounded mb-" type="text" id="license_plate" name="license_plate" required><br>
                            </div>

                            <div class="mb-5">
                                <label for="daily_rate" class="block mb-2 font-bold text-gray-600">Biaya/Hari</label>
                                <input class="border border-gray-300 shadow p-3 w-full rounded mb-" type="text" id="daily_rate" name="daily_rate" required><br>
                            </div>

                            <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
