<?php include("../init.php"); ?>
<?php include "../Layout/head.php"; ?>
<h1>Startseite des Blogs</h1>
<p class="lead">Das hier ist die Startseite des Blogs.</p>

<?php
    $courseRepository = $container->getCourseRepository();
    $courses = $courseRepository->fetchCourses();
?>
<ul>
    <li>
        <a href="index.php">
            Startseite
        </a>
    </li>
    <li>
        <a href="subjectArea.php">
            Kurse nach Fachbereich
        </a>
    </li>
    <li>
        <a href="coursePlace.php">
            Kurse nach Kursort
        </a>
    </li>
</ul>
<table class="table">
    <thead>
    <h3>Kursübersicht</h3>
    </thead>
    <tbody>
    <tr>
        <td>Kursnummer</td>
        <td>Name</td>
        <td>Beginn</td>
        <td>Kursort</td>
    </tr>
    <?php foreach ($courses as $row) : ?>
    <tr>
        <td><?php echo $row->kursnummer; ?></td>
        <td><a href="courseDetails.php?id=<?php echo $row->kursnummer; ?>"><?php echo $row->name; ?></a></td>
        <td><?php echo $row->beginndatum; ?></td>
        <td><?php echo $row->kursort; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include("../Layout/footer.php"); ?>
