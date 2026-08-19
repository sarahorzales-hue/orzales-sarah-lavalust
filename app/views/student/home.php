<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $student['name'] ?> | Pompompurin Student Space</title>

    <link rel="stylesheet" href="/css/student.css">
</head>

<body>

    <div class="pudding-bg">
        <span class="decor decor-1">🍮</span>
        <span class="decor decor-2">⭐</span>
        <span class="decor decor-3">☁️</span>
        <span class="decor decor-4">🍮</span>
        <span class="decor decor-5">⭐</span>
    </div>

    <main class="home-wrapper">

        <nav class="student-nav">
            <div class="nav-brand">
                🍮 <span>Sarah's Student Space</span>
            </div>

            <a href="/student/profile" class="nav-profile">
                View Profile →
            </a>
        </nav>

        <section class="hero-card">

            <div class="hero-decoration">🍮</div>

            <div class="hero-content">

                <p class="small-label">HELLO, I'M</p>

                <h1><?= $student['name'] ?></h1>

                <div class="yellow-line"></div>

                <p class="hero-description">
                    A <?= $student['year'] ?> student exploring creativity,
                    technology, and everything in between.
                </p>

                <div class="student-badges">
                    <span>💻 <?= $student['course'] ?></span>
                    <span>📚 Section <?= $student['section'] ?></span>
                </div>

                <a href="/student/profile" class="main-button">
                    Explore My Profile ✨
                </a>

            </div>

            <div class="hero-pudding">
                <div class="pudding-character">
                    <div class="pudding-hat">🤎</div>
                    <div class="pudding-face">
                        <span>•ᴗ•</span>
                    </div>
                    <div class="pudding-body">🍮</div>
                </div>
            </div>

        </section>

        <section class="quick-info">

            <div class="section-heading">
                <span>✨</span>
                <h2>A Little About Me</h2>
                <span>✨</span>
            </div>

            <div class="info-grid">

                <div class="info-card">
                    <div class="info-icon">🎓</div>
                    <div>
                        <p class="card-label">STUDENT ID</p>
                        <h3><?= $student['student_id'] ?></h3>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">📖</div>
                    <div>
                        <p class="card-label">YEAR & SECTION</p>
                        <h3><?= $student['year'] ?> · <?= $student['section'] ?></h3>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">💌</div>
                    <div>
                        <p class="card-label">EMAIL</p>
                        <h3><?= $student['email'] ?></h3>
                    </div>
                </div>

            </div>

        </section>

        <footer class="student-footer">
            <span>🍮</span>
            <p>Made with creativity & a little pudding magic.</p>
            <span>🍮</span>
        </footer>

    </main>

</body>
</html>