<?php include("../init.php"); ?>
<?php include "../Layout/head.php"; ?>
<?php
$courseRepository = new App\Repositories\CourseRepository($pdo);
$courseNumber = $_GET['id'];
$course = $courseRepository->fetchCours($courseNumber);
$attendees = $courseRepository->fetchAllAttendees($courseNumber);
$events = $courseRepository->fetchAllEvents($courseNumber);
?>
<h1>Kurs: <?php echo $course->kursnummer . ' ' . $course->name; ?></h1>
<table class="table">
    <tr><td>Beginndatum: <?php echo $course->beginndatum ?></td></tr>
    <tr><td>Dauer: <?php echo $course->dauer ?></td></tr>
    <tr><td>Fachbereich: <?php echo $course->fachbereich ?></td></tr>
    <tr><td>Beschreibung: <?php echo $course->beschreibung ?></td></tr>
</table>

<?php if ($events) : ?>
<h1>Termine:</h1>
<table class="table">
    <tr>
        <td>Beginn</td>
        <td>Einheit</td>
        <td>Trainer</td>
    </tr>
    <?php foreach ($events as $event) : ?>
    <tr>
        <td><?php echo $event['beginn'] ?></td>
        <td><?php echo $event['dauer'] ?></td>
        <td><?php echo $event['trainer'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<h1>Es gibt keine Termine!</h1>
<?php endif; ?>

<?php if ($attendees): ?>
<h1>Teilnehmer:</h1>
<table class="table">
    <tr>
        <td>Vorname</td>
        <td>Nachname</td>
        <td>E-Mail</td>
        <td>Geburtsdatum</td>
    </tr>
    <?php foreach ($attendees as $attendee) : ?>
        <tr>
            <td><?php echo $attendee['vorname'] ?></td>
            <td><?php echo $attendee['nachname'] ?></td>
            <td><?php echo $attendee['email'] ?></td>
            <td><?php echo $attendee['geburtsdatum'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<h1>Es gibt keine Teilnehmer!</h1>
<?php endif; ?>

<?php include("../Layout/footer.php"); ?>
