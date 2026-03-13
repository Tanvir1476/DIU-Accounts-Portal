<x-app-layout>

    <style>
        body {
            overflow-x: hidden;
        }

        .container {
            margin-left: 560px;
            margin-top: 60px;
        }

        .profile-form {
            width: 420px;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .profile-form label {
            display: block;
            font-weight: 500;
            margin-bottom: 6px;
            color: #374151;
        }

        .profile-form input,
        .profile-form select {
            width: 100%;
            padding: 9px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            margin-bottom: 18px;
        }

        .profile-form input:focus,
        .profile-form select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.15);
        }

        .profile-form button {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
        }

        .profile-form button:hover {
            background: #1d4ed8;
        }

        .success-msg {
            color: #15803d;
            margin-bottom: 15px;
        }

        .profile-img {
            width: 120px;
            height: auto;
            border-radius: 6px;
            border: 1px solid #ddd;
            object-fit: cover;
        }

        .title {
            font-size: 25px;
            font-weight: 600;
            color: black;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">

        <div class="title">
            Student Profile
        </div>

        @if (session('success'))
            <div class="success-msg">
                {{ session('success') }}
            </div>
        @endif


        <form method="POST" enctype="multipart/form-data" class="profile-form">

            @csrf


            <label>Department</label>

            <select name="department">

                <option value="">Select Department</option>

                <option value="CSE" {{ ($profile->department ?? '') == 'CSE' ? 'selected' : '' }}>
                    CSE
                </option>

                <option value="SWE" {{ ($profile->department ?? '') == 'SWE' ? 'selected' : '' }}>
                    SWE
                </option>

                <option value="EEE" {{ ($profile->department ?? '') == 'EEE' ? 'selected' : '' }}>
                    EEE
                </option>

                <option value="NFE" {{ ($profile->department ?? '') == 'NFE' ? 'selected' : '' }}>
                    NFE
                </option>

            </select>



            <label>Semester</label>

            <select name="semester">

                <option value="">Select Semester</option>

                <option value="Spring 26" {{ ($profile->semester ?? '') == 'Spring 26' ? 'selected' : '' }}>
                    Spring 26
                </option>

                <option value="Fall 26" {{ ($profile->semester ?? '') == 'Fall 26' ? 'selected' : '' }}>
                    Fall 26
                </option>

            </select>



            <label>Phone</label>

            <input type="text" name="phone" value="{{ $profile->phone ?? '' }}">



            <label>Address</label>

            <input type="text" name="address" value="{{ $profile->address ?? '' }}">



            <label>Profile Picture</label>

            <input type="file" name="photo">


            @if ($profile && $profile->photo)
                <img src="{{ asset('storage/' . $profile->photo) }}" width="120" class="profile-img">
            @endif


            <br><br>

            <button type="submit">
                Update Profile
            </button>

        </form>

    </div>

</x-app-layout>
