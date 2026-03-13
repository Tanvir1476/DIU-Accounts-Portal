<x-app-layout>

    <style>
        .profile-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            margin-left: 260px;
            margin-top: 80px;
        }

        .profile-card {
            width: 420px;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            margin-left: 260px;
            margin-top: 20px;
        }

        .profile-row {
            margin-bottom: 12px;
            font-size: 15px;
        }

        .profile-label {
            font-weight: 600;
            color: #374151;
        }

        .profile-img {
            margin-top: 15px;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .approve-btn {
            background: #16a34a;
            color: white;
            border: none;
            padding: 7px 14px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 260px;
            margin-top: 20px;
        }

        .approve-btn:hover {
            background: #15803d;
        }
    </style>


    <h2 class="profile-title">Student Profile</h2>


    <div class="profile-card">

        <div class="profile-row">
            <span class="profile-label">Department:</span>
            {{ $profile->department }}
        </div>

        <div class="profile-row">
            <span class="profile-label">Semester:</span>
            {{ $profile->semester }}
        </div>

        <div class="profile-row">
            <span class="profile-label">Phone:</span>
            {{ $profile->phone }}
        </div>

        <div class="profile-row">
            <span class="profile-label">Address:</span>
            {{ $profile->address }}
        </div>

        @if ($profile->photo)
            <img src="{{ asset('storage/' . $profile->photo) }}" class="profile-img">
        @endif

    </div>
    <a href="/admin/students">
        <button type="submit" class="approve-btn">Back</button>
    </a>

</x-app-layout>
