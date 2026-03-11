<style>
    img {
        height: 30px;
        width: 150px;
        margin-top: 0;
    }

    .sidebar {
        width: 220px;
        height: 100vh;
        background-color: #15203a;
        color: white;
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
        position: fixed;
        left: 0;
        top: 60px;
    }

    .sidebar-menu a.active {
        background-color: #2563eb;
        font-weight: 500;
    }

    .sidebar-header {
        padding: 20px;
        font-size: 22px;
        font-weight: 600;
        border-bottom: 1px solid #34495e;
        color: #e5e7eb;
    }

    .sidebar-menu {
        padding: 10px;
        overflow: hidden;
        color: #e5e7eb;
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
        background-color: #1e293b;
    }

    .main_content {
        margin-left: 250px;
        margin-top: 20px;
    }
</style>

<aside class="sidebar">
    <div class="sidebar-header">
        Student Panel
    </div>

    <nav class="sidebar-menu">
        <a href="/dashboard" class="{{ request()->is('/dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge"></i>
            Dashboard
        </a>

        <a href="/view_serial" class="{{ request()->is('view_serial') ? 'active' : '' }}">
            <i class="fa-solid fa-list"></i>
            View Serial
        </a>

        <a href="/gettoken" class="{{ request()->is('gettoken') ? 'active' : '' }}">
            <i class="fa-solid fa-ticket"></i>
            Get Token
        </a>

        <a href="/pay_online" class="{{ request()->is('pay_online') ? 'active' : '' }}">
            <i class="fa-solid fa-list"></i>
            Pay Online
        </a>

        <a href="/online-payment-history" class="{{ request()->is('online-payment-history') ? 'active' : '' }}">
            <i class="fa-solid fa-file-invoice"></i>
            Online Payment History
        </a>

        <a href="/payment-history" class="{{ request()->is('payment-history') ? 'active' : '' }}">
            <i class="fa-solid fa-file-invoice"></i>
            Payment History
        </a>

    </nav>
</aside>