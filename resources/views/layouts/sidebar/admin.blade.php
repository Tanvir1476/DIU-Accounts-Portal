<style>
    img {
        height: 30px;
        width: 150px;
        margin-top: 0;
    }

    .sidebar {
        width: 220px;
        height: 100vh;
        background-color: #2c3e50;
        color: white;
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
        position: fixed;
        left: 0;
        top: 69px;
    }

    .sidebar-header {
        padding: 20px;
        font-size: 22px;
        font-weight: 600;
        border-bottom: 1px solid #34495e;
    }

    .sidebar-menu {
        padding: 10px;
        overflow: hidden;
    }

    .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 15px;
        margin-bottom: 5px;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 300;
    }

    .sidebar-menu a:hover {
        background-color: #34495e;
    }

    .main_content {
        margin-left: 250px;
        margin-top: 20px;
    }
</style>

<aside class="sidebar">
    <div class="sidebar-header">
        Admin Panel
    </div>

    <nav class="sidebar-menu">
        <a href="">
            <i class="fa-solid fa-gauge"></i>
            Dashboard
        </a>

        <a href="/admin/push-notification">
            <i class="fa-solid fa-bell"></i>
            Push Notification
        </a>

        <a href="/admin/tokens">
            <i class="fa-solid fa-list"></i>
            View Total Serial List
        </a>

        <a href="">
            <i class="fa-solid fa-ticket"></i>
            Give Token
        </a>
    </nav>
</aside