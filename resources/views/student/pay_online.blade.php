<x-app-layout>

    <h2 class="font-normal text-l text-gray-800 ">

        <style>
            .payment-form {
                width: 350px;
                margin-left: 560px;
                margin-top: 150px;
                padding: 25px;
                background: white;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .payment-form input {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 6px;
            }

            .payment-form button {
                width: 100%;
                padding: 10px;
                background: #2563eb;
                color: white;
                border: none;
                border-radius: 6px;
                cursor: pointer;
            }

            .payment-form button:hover {
                background: #1d4ed8;
            }
            
            p{
                font-size: 27px;
                font-weight: 600;
                margin-bottom: 20px;
                margin-left: 5px;
            }
        </style>

        <div class="payment-form">

            <form method="POST" action="{{ route('pay') }}">
                @csrf
                <div>
                    <p>Online Payment Details</p>
                </div>
                <div>
                    <label>Phone Number</label>
                    <input type="text" name="phone" required>
                </div>

                <div>
                    <label>Amount</label>
                    <input type="number" name="amount" required>
                </div>

                <button type="submit">
                    Pay Now
                </button>

            </form>

        </div>

</x-app-layout>