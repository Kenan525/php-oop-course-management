<?php include("../init.php"); ?>
<?php include "../Layout/head.php"; ?>
<?php
$courseRepository = new App\Repositories\CourseRepository($pdo);
$coursePlaces = $courseRepository->fetchAllCoursePlaces();
if ($_POST["place"] === 'alle' || empty($_POST)) {
    $courses = $courseRepository->fetchCourses();
} else {
    $place = $_POST['place'];
    $courses = $courseRepository->fetchCoursesByPlace($place);
}
?>
<h1>Kurse nach Kursort</h1>

<main>
    <form action="coursePlace.php" method="post">
        <select name="place">
            <option value="alle" selected disabled>Alle</option>
            <?php foreach ($coursePlaces as $coursePlace): ?>
                <option value="<?php echo $coursePlace['id'] ?>"><?php echo $coursePlace['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-success" type="submit">Suche</button>
    </form>
</main>
<table class="table">
    <tr>
        <td>Kursnummer</td>
        <td>Name</td>
        <td>Beginn</td>
        <td>Kursort</td>
    </tr>
    <?php foreach ($courses as $cours): ?>
        <tr>
            <td><?php echo $cours['kursnummer'] ?></td>
            <td><?php echo $cours['name'] ?></td>
            <td><?php echo $cours['beginndatum'] ?></td>
            <td><?php echo $cours['kursort'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include("../Layout/footer.php"); ?>
