<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 ">
<style>

.container {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    width: 350px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    margin-left: 600px;
    margin-top: 40px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 25px;
}

.input-group {
    margin-bottom: 15px;
}

.input-group input,
.input-group select {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

input[readonly] {
    background: #f2f2f2;
}

button {
    width: 100%;
    padding: 12px;
    border: none;
    background: #667eea;
    color: #fff;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #5a67d8;
}

.token-box {
    margin-top: 15px;
    padding: 10px;
    background: #e6fffa;
    color: #064231;
    text-align: center;
    border-radius: 8px;
    
}
</style>

<div class="container">
<h1>Fee Token Request</h1>

<form method="POST" action="{{ route('fee.request') }}">
    @csrf

    <div class="input-group">
        <input type="text" value="{{ Auth::user()->name }}" readonly>
    </div>

    <div class="input-group">
        <input type="email" value="{{ Auth::user()->email }}" readonly>
    </div>

    <div class="input-group">
        <select name="fee_for" required>
            <option value="">Select Fee For</option>
            <option value="Registration">Registration</option>
            <option value="Midterm">Midterm</option>
            <option value="Final">Final</option>
            <option value="Transport">Transport</option>
        </select>
    </div>

    <div class="input-group">
        <input type="number" name="amount" placeholder="Enter Amount" required>
    </div>

    <button type="submit">Get Token</button>

    @if(session('token'))
    <div class="token-box">
         Your Token Number is: <b>{{ session('token') }}</b>
    </div>
    @endif
    
    @if(session('error'))
    <div class="token-box">
        <b style="color: red;">{{ session('error') }}</b><br><a href="/contact" style="text-decoration: underline;">Contact Accounts Office</a> 
    </div>
    @endif

</form>

</div>
</x-app-layout>