<x-layouts.admin title="Edit Lokasi">
    <div class="container mx-auto p-10">
        <div class="card bg-white shadow-lg max-w-lg mx-auto">
            <div class="card-body">
                <h2 class="card-title mb-5">Edit Lokasi</h2>
                
                <form action="{{ route('admin.lokasi.update', $lokasi->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Penting: Gunakan method PUT untuk update --}}
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nama Lokasi</span>
                        </label>
                        <input type="text" name="nama_lokasi" value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}" 
                               class="input input-bordered w-full" required />
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <a href="{{ route('admin.lokasi.index') }}" class="btn btn-ghost text-gray-500">Batal</a>
                        <button type="submit" class="btn btn-warning text-white">Update Lokasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>