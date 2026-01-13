<h2>Booking Pengacara</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('booking.send') }}" method="POST">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="nama_user"><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Telepon</label><br>
    <input type="text" name="telepon"><br><br>

    <label>Pilih Pengacara</label><br>
    <select name="pengacara_id">
        @foreach(\App\Models\Lawyer::all() as $lawyer)
            <option value="{{ $lawyer->id }}">{{ $lawyer->nama }} ({{ $lawyer->spesialisasi }})</option>
        @endforeach
    </select><br><br>

    <label>Pesan</label><br>
    <textarea name="pesan"></textarea><br><br>

    <button type="submit">Booking via WhatsApp</button>
</form>
