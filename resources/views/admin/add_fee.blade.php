<h2>Add Semester Fee</h2>

<form action="/save" method="POST">
@csrf

<select name="department">
<option>SWE</option>
<option>CSE</option>
<option>NFE</option>
<option>EEE</option>
</select>

<br><br>

<select name="semester">
<option>Spring-26</option>
<option>Fall-25</option>
</select>

<br><br>

<select name="fee_type">
<option>Midterm</option>
<option>Final</option>
<option>Transport</option>
</select>

<br><br>

<input type="number" name="amount" placeholder="Amount">

<br><br>

<button style="background:lime;padding:10px;border:none;">
Save
</button>

</form>

<br>
<a href="/list" style="background:lime;padding:10px;">View List</a>
