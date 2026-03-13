<x-app-layout>

    <h2 class="font-semibold text-xl text-gray-800 ">

        <style>
            .notice-container {
                max-width: 800px;
                margin: auto;
                font-family: 'Popins';
                margin-left: 260px;
                margin-top: 80px;
            }

            .notice-form {
                background: #ffffff;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                margin-bottom: 30px;
            }

            .notice-form input,
            .notice-form textarea,
            .notice-form select {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 6px;
                font-size: 14px;
            }

            .notice-form textarea {
                min-height: 100px;
            }

            .notice-form button {
                background: #2563eb;
                color: white;
                border: none;
                padding: 10px 18px;
                border-radius: 6px;
                cursor: pointer;
                font-weight: 600;
            }

            .notice-form button:hover {
                background: #1d4ed8;
            }

            .notice-card {
                background: #fff;
                border-left: 5px solid #2563eb;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
                margin-top: 15px;
            }

            .notice-card h4 {
                margin: 0;
                color: #111827;
            }

            .notice-card p {
                margin: 8px 0;
                color: #374151;
            }

            .notice-date {
                font-size: 12px;
                color: #6b7280;
            }

            .notice-urgent {
                border-left: 5px solid #ef4444;
            }

            .delete-btn {
                background: #ef4444;
                color: white;
                border: none;
                padding: 6px 12px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 13px;
            }

            .delete-btn:hover {
                background: #dc2626;
            }

            h3 {
                font-size: 25px;
                font-weight: 600;
                color: black;
                margin-bottom: 20px;
            }
        </style>

        <div class="notice-container">

            @if (session('success'))
                <style>
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

            <h3>Create Announcement</h3>

            <form method="POST" action="/admin/announcements" class="notice-form">

                @csrf

                <input type="text" name="title" placeholder="Title" required>

                <textarea name="message" placeholder="Notice message" required></textarea>

                <select name="type">
                    <option value="general">General</option>
                    <option value="urgent">Urgent</option>
                </select>

                <button type="submit">Post Notice</button>

            </form>

            <h3>All Announcements</h3>

            @foreach ($announcements as $a)
                <div class="notice-card {{ $a->type == 'urgent' ? 'notice-urgent' : '' }}">

                    <h4>{{ $a->title }}</h4>

                    <p>{{ $a->message }}</p>

                    <small class="notice-date">{{ $a->created_at->format('d M Y') }}</small>

                    <form method="POST" action="/admin/announcements/{{ $a->id }}" style="margin-top:10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>

                </div>
            @endforeach

        </div>

</x-app-layout>
