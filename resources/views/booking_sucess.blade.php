<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pemesanan Tiket Berhasils
        </h2>
    </x-slot>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
				    <div class="alert alert-primary" role="alert">
					  	<span class="block mb-4">Berikut adalah Nomor ID Tiket Anda : <b>{{ $tikets->id_ticket }}</b></span>
					  	<a href="{{ url('/') }}">Kembali ke Home</a>
					</div>
				</div>
            </div>
        </div>
    </div>
</x-guest-layout>