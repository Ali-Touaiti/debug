<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startup Directory</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #1a73e8;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo span {
            margin-left: 10px;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #666;
            font-weight: 500;
            padding: 8px 0;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #1a73e8;
        }

        .nav-links a.active {
            color: #1a73e8;
        }

        /* Card Grid */
        .card-grid {
            max-width: 1200px;
            margin: 50px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 0 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            position: relative;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #666;
            border-top: 1px solid #f1f3f4;
            padding: 10px 15px;
        }

        .card-footer button {
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .card-footer .edit-btn {
            background-color: #1a73e8; /* Same as footer color */
            color: #fff;
        }

        .card-footer .edit-btn:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
        }

        .card-footer .delete-btn {
            background-color: #ff4d4d; /* Red button */
            color: #fff;
        }

        .card-footer .delete-btn:hover {
            background-color: #e60000;
            transform: translateY(-2px);
        }

        /* Collapsible Section */
        .collapsible-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            padding: 0 15px;
            background-color: #f8f9fa;
            border-top: 1px solid #f1f3f4;
        }

        .collapsible-content.active {
            max-height: 200px;
            padding: 15px 15px;
        }

        .arrow {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.2rem;
            cursor: pointer;
            color: #1a73e8;
            transition: transform 0.3s ease;
        }

        .arrow.rotate {
            transform: rotate(180deg);
        }

        /* Footer */
        .footer {
            background-color: #1a73e8; /* Same as logo color */
            color: #fff;
            padding: 60px 20px 30px;
            margin-top: 50px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #d0e1ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #d0e1ff;
            transition: background-color 0.3s ease;
        }

        .social-links a:hover {
            background-color: #fff;
            color: #1a73e8;
        }

        .copyright {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 0.9rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#1a73e8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="#1a73e8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="#1a73e8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>ElevateX</span>
            </a>
            <ul class="nav-links">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Directory</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>

    <!-- Card Grid -->
    <div class="card-grid">
        <?php foreach ($startups as $startup): ?>
        <div class="card">
            <img src="<?= $startup['logo'] ?? 'default-logo.png' ?>" alt="<?= $startup['nom'] ?> Logo">
            <div class="card-content">
                <h3 class="card-title"><?= $startup['nom'] ?></h3>
                <p class="card-subtitle"><?= $startup['secteur'] ?> Startup</p>
            </div>
            <div class="arrow">▼</div>
            <div class="collapsible-content">
                <p><strong>Description:</strong> <?= $startup['description'] ?></p>
                <p><strong>Announcement:</strong> <?= $startup['annonce'] ?></p>
            </div>
            <div class="card-footer">
                <span>Founded: <?= date('Y', strtotime($startup['date_creation'])) ?></span>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-column">
                <h3>ElevateX</h3>
                <p>The premier directory for innovative startups and emerging technologies.</p>
                <div class="social-links">
                    <a href="#" aria-label="Visit Facebook">📱</a>
                    <a href="#" aria-label="Visit Twitter">🐦</a>
                    <a href="#" aria-label="Visit LinkedIn">📘</a>
                    <a href="#" aria-label="Visit Instagram">📸</a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Directory</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Categories</h3>
                <ul class="footer-links">
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Health</a></li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">View All</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Support</h3>
                <ul class="footer-links">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Submit a Startup</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            © 2023 ElevateX. All rights reserved.
        </div>
    </div>

    <script>
        // Collapsible functionality
        document.querySelectorAll('.arrow').forEach(arrow => {
            arrow.addEventListener('click', function () {
                const content = this.nextElementSibling;
                content.classList.toggle('active');
                this.classList.toggle('rotate');
            });
        });

        // Edit and Delete functionality
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                // In a real application, this would redirect to the edit page
                alert('Edit functionality would be implemented here');
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                // In a real application, this would delete the startup
                alert('Delete functionality would be implemented here');
            });
        });
    </script>
</body>
</html>