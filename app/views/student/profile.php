<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile</title>

    <link rel="stylesheet" href="/LavaLust/public/css/student.css">
</head>

<body>

<!-- Decorative background elements -->
<div class="decor one">✦</div>
<div class="decor two">♡</div>
<div class="decor three">✦</div>
<div class="decor four">♡</div>

<div class="container">

    <div class="card">

        <div class="pudding">🍮</div>

        <h1>Student Profile</h1>

        <div class="accent"></div>

        <div class="profile-title">
            ✦ Personal Academic Details ✦
        </div>

        <div class="profile-box">

            <div class="info">
                <span class="label">Student ID</span>
                <span><?= $student['student_id']; ?></span>
            </div>

            <div class="info">
                <span class="label">Name</span>
                <span><?= $student['name']; ?></span>
            </div>

            <div class="info">
                <span class="label">Course</span>
                <span><?= $student['course']; ?></span>
            </div>

            <div class="info">
                <span class="label">Year Level</span>
                <span><?= $student['year']; ?></span>
            </div>

            <div class="info">
                <span class="label">Section</span>
                <span><?= $student['section']; ?></span>
            </div>

            <div class="info">
                <span class="label">Email</span>
                <span><?= $student['email']; ?></span>
            </div>

        </div>

        <nav>
            <a href="/LavaLust/student">← Back to Home</a>
        </nav>

        

    </div>

</div>

</body>
</html>