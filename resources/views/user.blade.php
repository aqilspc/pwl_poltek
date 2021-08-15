<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Keterangan</th>
        <th>Fakultas</th>
        <th>Kadaluarsa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $user)
        <tr>
            <td>{{$key+1}}</td>
            <td style="width: 35%">{{ $user['nama'] }}</td>
            <td style="width: 40%">{{ $user['email'] }}</td>
            <td style="width: 35%">{{ $user['no_telepon'] }}</td>
            <td style="width: 15%">
                {{$user['alias']}}
            </td>
            <td style="width: 35%">
               {{$user['nama_fakultas']}}
            </td>
            <td style="width: 30%">
                {{$user['expiration']}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
