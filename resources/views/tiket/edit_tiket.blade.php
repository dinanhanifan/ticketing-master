<x-app-layout>
    <x-slot name="header">
    	<div class="flex justify-between">
	        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
	            Edit Data Tiket
	        </h2>
	    </div>
    </x-slot>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
				    <form action="{{ route('tiket.update', $tiket->id); }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
				        @csrf
						<div class="form-group mb-4">
							<div class="form-input-wrap">
								<label class="form-label block font-medium text-sm text-gray-700">
									<span class="required">Nama</span>
								</label>
								<input type="text" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required placeholder="Masukan Nama Anda" name="nama" value="{{ $pemesan->name }}">
                                @error('nama')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="form-group mb-4">
							<div class="form-input-wrap">
								<label class="form-label block font-medium text-sm text-gray-700">
									<span class="required">Status Tiket</span>
								</label>
								<select name="status_tiket" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
									<option value="1" @if( $tiket->status == 1 ) selected @endif>Check In</option>
									<option value="0" @if( $tiket->status == 0 ) selected @endif>Belum Check In</option>
								</select>
                                @error('status_tiket')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="form-submit">
							<button type="submit" class="btn btn-primary">
								<span class="indicator-label">Ubah</span>
							</button>
						</div>
				    </form>
				</div>
            </div>
        </div>
    </div>
</x-app-layout>