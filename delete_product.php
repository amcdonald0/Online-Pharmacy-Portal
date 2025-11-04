<?php
require_once('database.php');

//Get IDs
$student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
$course_id = filter_input(INPUT_POST, 'course_id');

// Delete the student from the database
if ($student_id != false && $course_id !=NULL){
    $query = 'DELETE FROM sk_students
            WHERE studentID = :student_id';
   $statement = $db-> prepare($query);
   $statement->bindValue(':student_id', $course_id);
   $statement->execute();
   $statemet->closeCursor();
}

// Display the Home page
include('index.php');