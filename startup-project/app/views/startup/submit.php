<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --primary-blue: #2196F3;
            --secondary-blue: #1976D2;
            --accent-blue: #BBDEFB;
            --background: #f8f9fa;
        }

        body {
            background-color: var(--background);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Animated Sidebar */
        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            padding: 1.5rem;
            transform: translateX(0);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar:hover {
            transform: translateX(0) scale(1.02);
        }

        .sidebar a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 12px 20px;
            margin: 8px 0;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(10px);
        }

        .sidebar a.active {
            background: rgba(255, 255, 255, 0.15);
            font-weight: 500;
        }

        .brand-link {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 2rem;
            display: block;
            text-align: center;
            color: white !important;
        }

        .user-panel {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            transition: transform 0.2s ease;
        }

        .user-panel:hover {
            transform: translateY(-2px);
        }

        /* Dropdown Menu Styles */
        .menu-item {
            position: relative;
        }

        .sub-menu {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            min-width: 200px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .menu-item:hover .sub-menu {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }

        .sub-menu a {
            color: #333 !important;
            padding: 8px 20px;
            margin: 0;
            font-size: 14px;
            transition: all 0.2s ease;
            transform: none !important;
        }

        .sub-menu a:hover {
            background: #f8f9fa;
            padding-left: 25px;
        }

        .menu-item > a {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-item > a::after {
            content: "\f105";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            margin-left: auto;
            transition: transform 0.3s ease;
        }

        .menu-item:hover > a::after {
            transform: rotate(90deg);
        }

        /* Main Content */
        .main {
            margin-left: 280px;
            padding: 2rem;
            animation: slideIn 0.5s ease;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            padding: 0.8rem 1.5rem;
            margin-bottom: 2rem;
        }

        /* Content Cards */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            border: none;
        }

        .content-card:hover {
            transform: translateY(-5px);
        }

        /* Animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 240px;
            }
            
            .main {
                margin-left: 0;
            }
        }

        .footer {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 1rem;
            margin-left: 280px;
            text-align: center;
            color: #666;
            animation: slideIn 0.5s ease;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="brand-link">ElevateX</div>
        <div class="user-panel">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/40" class="rounded-circle" alt="User">
                <div class="ms-3">
                    <h6 class="mb-0">Admin User</h6>
                    <small>Administrator</small>
                </div>
            </div>
        </div>
        <nav>
            <ul style="list-style: none; padding-left: 0;">
                <!-- Forums Section -->
                <li class="menu-item">
                    <a href="#"><i class="fas fa-comments me-2"></i> Forums</a>
                    <ul class="sub-menu">
                        <li><a href="#"><i class="fas fa-plus-circle me-2"></i>Add new Forum</a></li>
                        <li><a href="#"><i class="fas fa-eye me-2"></i>Show Forums</a></li>
                    </ul>
                </li>

                <!-- StartUp Section -->
                <li class="menu-item">
                    <a href="#"><i class="fas fa-rocket me-2"></i> StartUp</a>
                    <ul class="sub-menu">
                        <li><a href="/startup-submit"><i class="fas fa-plus-circle me-2"></i>Add new StartUp</a></li>
                        <li><a href="/founder-submit"><i class="fas fa-plus-circle me-2"></i>Add new Founder</a></li>
                        <li><a href="#"><i class="fas fa-eye me-2"></i>Show StartUps</a></li>
                        <li><a href="#"><i class="fas fa-eye me-2"></i>Show founders</a></li>
                    </ul>
                </li>

                <!-- Report Section -->
                <li class="menu-item">
                    <a href="#"><i class="fas fa-flag me-2"></i> Report</a>
                    <ul class="sub-menu">
                        <li><a href="#"><i class="fas fa-plus-circle me-2"></i>Add new Report</a></li>
                        <li><a href="#"><i class="fas fa-eye me-2"></i>Consult Report</a></li>
                    </ul>
                </li>

                <!-- Events Section -->
                <li class="menu-item">
                    <a href="#"><i class="fas fa-calendar me-2"></i> Events</a>
                    <ul class="sub-menu">
                        <li><a href="#"><i class="fas fa-plus-circle me-2"></i>Add new Event</a></li>
                        <li><a href="#"><i class="fas fa-eye me-2"></i>Show Events</a></li>
                        <li><a href="#"><i class="fas fa-eye me-2"></i>Show local</a></li>
                    </ul>
                </li>

                <!-- User Section -->
                <li class="menu-item">
                    <a href="#"><i class="fas fa-user me-2"></i> User</a>
                    <ul class="sub-menu">
                        <li><a href="#"><i class="fas fa-plus-circle me-2"></i>Add new User</a></li>
                        <li><a href="#"><i class="fas fa-eye me-2"></i>Show Users</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>

    <div class="main">
        <nav class="navbar">
            <div class="container-fluid">
                <h4 class="mb-0">Dashboard Overview</h4>
            </div>
        </nav>

        <div class="form-container">
            <div class="form-header">
                <h2>Submit a New Startup</h2>
                <p>Fill out the form below to add your startup to our directory</p>
            </div>
            <form id="startup-form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Startup Name</label>
                    <input type="text" id="nom" name="nom" required class="form-control" placeholder="Enter startup name">
                </div>
                <div class="form-group">
                    <label for="secteur">Industry Sector</label>
                    <select id="secteur" name="secteur" required class="form-control">
                        <option value="" disabled selected>Select an industry sector</option>
                        <option value="technology">Technology</option>
                        <option value="finance">Finance</option>
                        <option value="health">Health</option>
                        <option value="sustainability">Sustainability</option>
                        <option value="education">Education</option>
                        <option value="transportation">Transportation</option>
                        <option value="retail">Retail</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_fondateur">Founder</label>
                    <select id="id_fondateur" name="id_fondateur" required class="form-control">
                        <option value="" disabled selected>Select a founder</option>
                        <?php foreach ($founders as $founder): ?>
                        <option value="<?= $founder['id'] ?>"><?= $founder['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required class="form-control" placeholder="Enter contact email">
                </div>
                <div class="form-group">
                    <label for="description">Startup Description</label>
                    <textarea id="description" name="description" required class="form-control" placeholder="Describe your startup and its mission"></textarea>
                </div>
                <div class="form-group">
                    <label for="siteweb">Website URL</label>
                    <input type="url" id="siteweb" name="siteweb" required class="form-control" placeholder="https://www.example.com">
                </div>
                <div class="form-group">
                    <label for="date_creation">Date of Creation</label>
                    <input type="date" id="date_creation" name="date_creation" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="annonce">Latest Announcement</label>
                    <textarea id="annonce" name="annonce" class="form-control" placeholder="Share your latest news or achievements (optional)"></textarea>
                </div>
                
                <!-- Image Upload Section -->
                <div class="form-group">
                    <label for="logo">Startup Logo</label>
                    <input type="file" id="logo" name="logo" accept="image/*" class="form-control">
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-submit">Submit Startup</button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        © 2024 Admin Dashboard. All rights reserved.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>