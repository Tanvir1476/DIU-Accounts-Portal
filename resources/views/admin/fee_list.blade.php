<h2>Fee List</h2>

<table border="1" cellpadding="10">

<tr>
<th>Dept</th>
<th>Semester</th>
<th>Type</th>
<th>Amount</th>
<th>Action</th>
</tr>

@foreach($data as $d)

<tr>
<td>{{ $d->department }}</td>
<td>{{ $d->semester }}</td>
<td>{{ $d->fee_type }}</td>
<td>{{ $d->amount }}</td>

<td>
<a href="/edit/{{ $d->id }}">Edit</a>
|
<a href="/delete/{{ $d->id }}">Delete</a>
</td>

</tr>

@endforeach

</table>
