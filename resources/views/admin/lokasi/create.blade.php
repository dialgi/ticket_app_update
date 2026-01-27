<x-layouts.admin title="Tambah Lokasi">
    <div class="container mx-auto p-10">
        <div class="card bg-white shadow-lg max-w-lg mx-auto">
            <div class="card-body">
                <h2 class="card-title mb-5">Tambah Lokasi Baru</h2>
                
                <form action="{{ route('admin.lokasi.store') }}" method="POST">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nama Lokasi</span>
                        </label>
                        <input type="text" name="nama_lokasi" placeholder="Contoh: Stadion Utama" class="input input-bordered w-full" required />
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <a href="{{ route('admin.lokasi.index') }}" class="btn btn-ghost">Batal</a>
                        <button type="submit" class="btn btn-primary text-white">Simpan Lokasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>