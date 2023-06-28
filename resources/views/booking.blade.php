<x-guest-layout>
    <x-slot name="header">
    	<div class="flex justify-between">
	        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
	            Formulir Pemesanan Tiket
	        </h2>

	        <a href="{{ url('/login') }}">Login</a>
	    </div>
    </x-slot>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
				    <form action="{{ route('tiket.store'); }}" method="POST">
				        @csrf
						<div class="form-group mb-4">
							<div class="form-input-wrap">
								<label class="form-label block font-medium text-sm text-gray-700">
									<span class="required">Nama</span>
								</label>
								<input type="text" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required placeholder="Masukan Nama Anda" name="nama">
                                @error('nama')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="form-group mb-4">
							<div class="form-input-wrap">
								<label class="form-label block font-medium text-sm text-gray-700">
									<span class="required">Email</span>
								</label>
								<input type="email" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required placeholder="Masukan Email Anda" name="email">
                                @error('email')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="form-group mb-4">
							<div class="form-input-wrap">
								<label class="form-label block font-medium text-sm text-gray-700">
									<span class="required">NIK</span>
								</label>
								<input type="number" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required placeholder="Masukan Nik Anda" name="nik">
                                @error('nik')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="form-submit">
							<button type="submit" class="btn btn-primary">
								<span class="indicator-label">Pesan Tiket</span>
							</button>
						</div>
				    </form>
				</div>
            </div>
        </div>
    </div>
</x-guest-layout>