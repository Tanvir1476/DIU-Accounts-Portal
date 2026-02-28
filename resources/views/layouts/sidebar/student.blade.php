<style>
    img {
        height: 30px;
        width: 150px;
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
        font-size: 15px;
        font-weight: 200;
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
        Student Panel
    </div>

    <nav class="sidebar-menu">
        <a href="">
            <i class="fa-solid fa-gauge"></i>
            Dashboard
        </a>

        <a href="">
            <i class="fa-solid fa-list"></i>
            View Serial
        </a>

        <a href="gettoken">
            <i class="fa-solid fa-ticket"></i>
            Get Token
        </a>

        <a href="payment-history">
            <i class="fa-solid fa-file-invoice"></i>
            Payment History 
        </a>
    </nav>
</aside