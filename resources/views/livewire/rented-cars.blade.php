<div>
    @if($rentals->isEmpty())
        <h2 class="font-bold text-2xl mb-3">Kamu Belum Rental Mobil</h2>
    @else
        <h2 class="font-bold text-2xl mb-3">History Aktifitas Rental Kamu</h2>
        @foreach($rentals as $rental)
            @if ($rental->status == 'completed')
                <!-- start  -->
                <div class="bg-gray-100 mx-auto border-gray-500 border rounded-sm text-gray-700 mb-0.5">
                    <div class="flex p-3 border-l-8 border-green-600">
                        <div class="space-y-1 border-r-2 pr-3">
                            <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500"> No Rental #</span> {{ $rental->id }} </div>
                            <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500 pr"> Tanggal Rental :</span> {{ $rental->start_date }} </div>
                            <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500 pr"> Tanggal Sampai :</span> {{ $rental->end_date }} </div>
                            <div class="text-sm leading-5 font-semibold">Total Hari : {{ number_format($this->calculateTotalDays($rental), 0, ',', '.') }} Hari</div>
                            <div class="text-sm leading-5 font-semibold">Total : Rp. {{ number_format($this->calculateTotalCost($rental), 0, ',', '.') }}</div>
                            <div class="text-sm leading-5 font-semibold">Tanggal Diselesaikan : {{ $rental->return_date }}</div>
                        </div>
                        <div class="flex-1">
                            <div class="ml-3 space-y-1 border-r-2 pr-3">
                                <div class="text-base leading-6 font-normal">{{ $rental->car->brand }}</div>
                                <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Model</span> {{ $rental->car->model }} </div>
                                <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Nomor Kendaraan </span> #{{ $rental->car->license_plate }} </div>
                                <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Biaya Rental Harian </span> Rp. {{ number_format($rental->car->daily_rate, 0, ',', '.') }}</div>
                                <div class="text-sm leading-4 font-normal flex gap-x-6 align-center">
                                    <span class="text-xs leading-4 font-normal text-gray-500"> Status </span> 
                                    <div class="bg-blue-600 p-1 w-20">
                                        <div class="uppercase text-xs leading-4 font-semibold text-center text-blue-100">Selesai</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-r-2 pr-3">
                            <div >
                                <div class="ml-3 my-3 border-gray-200 border-2 bg-gray-300 p-1">
                                    <div class="uppercase text-xs leading-4 font-medium">No Kendaraan</div>
                                    <div class="text-center text-sm leading-4 font-semibold text-gray-800">#{{ $rental->car->license_plate }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
            @else
                <!-- start  -->
                <div class="bg-gray-100 mx-auto border-gray-500 border rounded-sm text-gray-700 mb-0.5">
                    <div class="flex p-3 border-l-8 border-yellow-600">
                        <div class="space-y-1 border-r-2 pr-3">
                            <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500"> No Rental #</span> {{ $rental->id }} </div>
                            <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500 pr"> Tanggal Rental :</span> {{ $rental->start_date }} </div>
                            <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500 pr"> Tanggal Sampai :</span> {{ $rental->end_date }} </div>
                            <div class="text-sm leading-5 font-semibold">Total Hari : {{ number_format($this->calculateTotalDays($rental), 0, ',', '.') }} Hari</div>
                            <div class="text-sm leading-5 font-semibold">Total : Rp. {{ number_format($this->calculateTotalCost($rental), 0, ',', '.') }}</div>
                        </div>
                        <div class="flex-1">
                            <div class="ml-3 space-y-1 border-r-2 pr-3">
                                <div class="text-base leading-6 font-normal">{{ $rental->car->brand }}</div>
                                <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Model</span> {{ $rental->car->model }} </div>
                                <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Nomor Kendaraan </span> #{{ $rental->car->license_plate }} </div>
                                <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Biaya Rental Harian </span> Rp. {{ number_format($rental->car->daily_rate, 0, ',', '.') }}</div>
                                <div class="text-sm leading-4 font-normal flex gap-x-6 align-center">
                                    <span class="text-xs leading-4 font-normal text-gray-500"> Status </span> 
                                    <div class="bg-yellow-600 p-1 w-20">
                                        <div class="uppercase text-xs leading-4 font-semibold text-center text-yellow-100">Dirental</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-r-2 pr-3">
                            <div >
                                <div class="ml-3 my-3 border-gray-200 border-2 bg-gray-300 p-1">
                                    <div class="uppercase text-xs leading-4 font-medium">No Kendaraan</div>
                                    <div class="text-center text-sm leading-4 font-semibold text-gray-800">#{{ $rental->car->license_plate }}</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="ml-3 my-5 bg-red-600 p-1 w-20">
                                <form action="{{ route('rental.return', $rental->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="uppercase text-xs leading-4 font-semibold text-center text-red-100">Selesaikan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
            @endif
        @endforeach
    @endif
</div>
