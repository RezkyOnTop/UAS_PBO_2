<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengacara</title>
</head>
<body>

<h1>Daftar Pengacara</h1>

@foreach($lawyers as $lawyer)
<tr>
    <td>
        @if($lawyer->foto)
            <img src="{{ $lawyer->foto }}" width="80" alt="Foto Pengacara">
        @endif
        <br>{{ $lawyer->nama }}
    </td>
    <td>{{ $lawyer->spesialisasi }}</td>
    <td>Rp {{ number_format($lawyer->tarif) }}</td>
    <td>
        <a href="{{ route('pengacara.detail', $lawyer->id) }}">Booking</a>
    </td>
</tr>
@endforeach


</body>
</html>
