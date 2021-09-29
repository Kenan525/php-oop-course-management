<?php include("../init.php"); ?>
<?php include "../Layout/head.php"; ?>
<?php
$courseRepository = new App\Repositories\CourseRepository($pdo);
$subjectAreas = $courseRepository->fetchAllSubjectAreas();
if ($_POST["subjectArea"] === 'alle' || empty($_POST)) {
    $courses = $courseRepository->fetchCourses();
} else {
    $value = $_POST['subjectArea'];
    $courses = $courseRepository->fetchCoursesByArea($value);
}
?>
<h1>Kurse nach Fachbgebiet</h1>

<form action="subjectArea.php" method="post">
    <label>
        <select name="subjectArea">
            <option value="alle" disabled selected>Alle</option>
            <?php foreach ($subjectAreas as $subjectArea): ?>
            <option value="<?php echo $subjectArea['id']; ?>"><?php echo $subjectArea['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <input type="submit" name="suche" value="Suche">
</form>
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
