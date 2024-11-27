<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="nama" id="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $siswa->nama }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $siswa->kelas }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="umur" class="block text-sm font-medium text-gray-700">Umur</label>
                            <input type="number" name="umur" id="umur" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $siswa->umur }}" required>
                        </div>

                        <!-- Kolom Alamat -->
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $siswa->alamat }}" required>
                        </div>

                        <!-- Kolom Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $siswa->email }}" required>
                        </div>

                        <!-- Kolom Foto -->
                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                            <input type="file" name="foto" id="foto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @if ($siswa->foto)
                                <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" class="mt-2 w-20 h-20 object-cover rounded-md">
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-500 px-4 py-2 rounded-md !text-black">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
