<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $student['name'] ?> | My Student Profile</title>

    <link rel="stylesheet" href="/css/student.css">
</head>

<body>

    <div class="profile-background">
        <span class="profile-decor decor-a">🍮</span>
        <span class="profile-decor decor-b">⭐</span>
        <span class="profile-decor decor-c">☁️</span>
        <span class="profile-decor decor-d">🍮</span>
    </div>

    <main class="profile-wrapper">

        <nav class="student-nav">
            <div class="nav-brand">
                🍮 <span>Sarah's Student Space</span>
            </div>

            <a href="/student" class="nav-profile">
                ← Home
            </a>
        </nav>

        <section class="profile-header">

            <div class="profile-character">
                <div class="character-hat">🤎</div>
                <div class="character-face">•ᴗ•</div>
                <div class="character-pudding">🍮</div>
            </div>

            <div class="profile-title">

                <p class="profile-kicker">MY LITTLE CORNER OF THE INTERNET</p>

                <h1>Student Profile</h1>

                <div class="yellow-line"></div>

                <h2><?= $student['name'] ?></h2>

                <p>
                    <?= $student['course'] ?>
                    · <?= $student['year'] ?>
                    · Section <?= $student['section'] ?>
                </p>

            </div>

        </section>


        <section class="profile-layout">

            <div class="profile-main">

                <article class="profile-card about-card">

                    <div class="card-heading">
                        <span class="heading-icon">🌼</span>

                        <div>
                            <p>GET TO KNOW ME</p>
                            <h2>About Me</h2>
                        </div>
                    </div>

                    <p class="profile-description">
                        <?= $student['profile_description'] ?>
                    </p>

                </article>


                <article class="profile-card">

                    <div class="card-heading">
                        <span class="heading-icon">✨</span>

                        <div>
                            <p>THINGS I ENJOY</p>
                            <h2>Hobbies</h2>
                        </div>
                    </div>

                    <div class="tag-container">

                        <?php foreach ($student['hobbies'] as $hobby): ?>

                            <span class="profile-tag hobby-tag">
                                🍮 <?= $hobby ?>
                            </span>

                        <?php endforeach; ?>

                    </div>

                </article>


                <article class="profile-card">

                    <div class="card-heading">
                        <span class="heading-icon">💻</span>

                        <div>
                            <p>WHAT I CAN DO</p>
                            <h2>Skills</h2>
                        </div>
                    </div>

                    <div class="tag-container">

                        <?php foreach ($student['skills'] as $skill): ?>

                            <span class="profile-tag skill-tag">
                                ⭐ <?= $skill ?>
                            </span>

                        <?php endforeach; ?>

                    </div>

                </article>

            </div>


            <aside class="profile-sidebar">

                <article class="identity-card">

                    <div class="identity-top">
                        <span>🍮</span>
                        <p>MY DETAILS</p>
                    </div>

                    <div class="identity-item">
                        <span>🪪</span>
                        <div>
                            <small>STUDENT ID</small>
                            <strong><?= $student['student_id'] ?></strong>
                        </div>
                    </div>

                    <div class="identity-item">
                        <span>🎓</span>
                        <div>
                            <small>COURSE</small>
                            <strong><?= $student['course'] ?></strong>
                        </div>
                    </div>

                    <div class="identity-item">
                        <span>📚</span>
                        <div>
                            <small>YEAR</small>
                            <strong><?= $student['year'] ?></strong>
                        </div>
                    </div>

                    <div class="identity-item">
                        <span>🏷️</span>
                        <div>
                            <small>SECTION</small>
                            <strong><?= $student['section'] ?></strong>
                        </div>
                    </div>

                </article>


                <article class="contact-card">

                    <div class="contact-title">
                        <span>💌</span>
                        <h2>Let's Connect</h2>
                    </div>

                    <div class="contact-item">
                        <span>✉️</span>
                        <a href="mailto:<?= $student['email'] ?>">
                            <?= $student['email'] ?>
                        </a>
                    </div>

                    <div class="contact-item">
                        <span>📍</span>
                        <p><?= $student['address'] ?></p>
                    </div>

                    <div class="contact-item">
                        <span>🎵</span>
                        <a
                            href="<?= $student['social_media']['tiktok'] ?>"
                            target="_blank"
                        >
                            TikTok Profile
                        </a>
                    </div>

                </article>

            </aside>

        </section>


        <footer class="student-footer">
            <span>🍮</span>
            <p><?= $student['name'] ?> · <?= $student['course'] ?></p>
            <span>🍮</span>
        </footer>

    </main>

</body>
</html>