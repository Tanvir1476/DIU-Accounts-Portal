<h2>Edit Fee</h2>

<form action="/update/{{ $data->id }}" method="POST">
@csrf

<input name="department" value="{{ $data->department }}">
<br><br>

<input name="semester" value="{{ $data->semester }}">
<br><br>

<input name="fee_type" value="{{ $data->fee_type }}">
<br><br>

<input name="amount" value="{{ $data->amount }}">
<br><br>

<button>Update</button>

</form>
