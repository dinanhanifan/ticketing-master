@php

use App\Models\Pemesan;

@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check Ins') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                	@if($errors->any())
				    <div class="alert alert-danger mb-4" role="alert">
					  	<span class="block">{{$errors->first()}}</span>
					</div>
					@endif
				    <form action="{{ route('tiket.checkIn'); }}" method="POST">
				        @csrf
						<div class="form-group mb-4">
							<div class="form-input-wrap">
								<label class="form-label block font-medium text-sm text-gray-700">
									<span class="required">ID Ticket</span>
								</label>
								<input type="text" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required placeholder="Masukan ID Ticket" name="id_ticket">
                                @error('id_ticket')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="form-submit">
							<button type="submit" class="btn btn-primary">
								<span class="indicator-label">Check In</span>
							</button>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</x-app-layout>
