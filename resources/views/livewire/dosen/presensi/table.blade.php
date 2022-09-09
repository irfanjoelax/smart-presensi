<div class="table-responsive bg-white p-3 shadow rounded">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">NIM</th>
                <th scope="col">Waktu Hadir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($presensis as $item)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->no_induk }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-danger">
                        Pilih mata kuliah dan pertemuan untuk melihat data presensi
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
