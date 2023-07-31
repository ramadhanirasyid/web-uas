<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>Jenis Perusahaan</th>
            <th>Email</th>
            <th>No Telephone</th>
            <th>Layanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $index => $employee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employee->firstname }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->age }}</td>
                <td>{{ $employee->position->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
