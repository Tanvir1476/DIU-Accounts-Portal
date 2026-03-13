<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 ">

        <style>
            .broadcast-form {
                margin-left: 260px;
                font-family: 'Poppins', sans-serif;
                width: 70%;
                background: #ffffff;
                padding: 25px;
                border-radius: 8px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                border: 1px solid #e5e7eb;
            }

            .broadcast-form label {
                display: block;
                margin-bottom: 6px;
                font-weight: 500;
            }

            .broadcast-form input,
            .broadcast-form select,
            .broadcast-form textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #d1d5db;
                border-radius: 6px;
            }

            .broadcast-form button {
                background: #2563eb;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 6px;
            }

            p {
                margin-left: 260px;
                margin-top: 70px;
                font-size: 25px;
                font-weight: 600;
                color: black;
                margin-bottom: 25px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            label {
                display: block;
                margin-bottom: 6px;
                font-weight: 500;
                color: #374151;
            }

            input,
            select,
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #d1d5db;
                border-radius: 6px;
                font-size: 14px;
                outline: none;
            }

            input:focus,
            select:focus,
            textarea:focus {
                border-color: #2563eb;
                box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
            }

            #studentBox {
                display: none;
            }

            .toast {
                position: fixed;
                width: 30%;
                top: 20px;
                right: 20px;
                background: #ffffff;
                color: #111827;
                padding: 12px 18px;
                border-radius: 8px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                border-left: 4px solid #16793a;
                font-size: 17px;
                z-index: 9999;
            }

            .toast small {
                color: #6b7280;
                display: block;
                margin-top: 2px;
                font-size: 17px;
            }
        </style>

        <p>Emergency Broadcast</p>

        @if (session('success'))
            <div class="toast" id="toast">
                <strong>Success</strong>
                <small>{{ session('success') }}</small>
            </div>

            <script>
                setTimeout(function() {
                    let t = document.getElementById('toast');
                    if (t) {
                        t.style.display = 'none';
                    }
                }, 3000);
            </script>
        @endif


        <form method="POST" action="/admin/broadcast/send" class="broadcast-form">

            @csrf

            <div class="form-group">
                <label>Send To</label>

                <select name="type" id="type">
                    <option value="all">All Students</option>
                    <option value="single">Select Student</option>
                </select>
            </div>


            <div id="studentBox" class="form-group">

                <label>Select Student</label>

                <select name="student_id">
                    @foreach ($students as $s)
                        <option value="{{ $s->id }}">
                            {{ $s->id }} . {{ $s->name }} ({{ $s->email }})
                        </option>
                    @endforeach
                </select>

            </div>


            <div class="form-group">
                <label>Email Subject</label>

                <input type="text" name="subject" placeholder="Enter email subject" required>
            </div>


            <div class="form-group">
                <label>Message</label>

                <textarea name="message" rows="5" placeholder="Write message..." required></textarea>
            </div>


            <div>
                <button type="submit">
                    Send Broadcast
                </button>
            </div>

        </form>


        <script>
            document.getElementById('type').addEventListener('change', function() {

                if (this.value == 'single') {
                    document.getElementById('studentBox').style.display = 'block';
                } else {
                    document.getElementById('studentBox').style.display = 'none';
                }

            });
        </script>

</x-app-layout>
