<?php
require_once(__ROOT__ . "View/View.php");
require_once(__ROOT__ . "Model/FacultyModel.php");

class ViewAllCourses extends View
{
    public function output()
    {
        $str = "";
        
        foreach($this->model->getCourses() as $course)
        {
            $faculty = new FacultyModel($course->getCourseFacultyId());
            $str= $str . '<div class="divTableRow">'.
            '<div class="divTableCell"> <img style="height:100px; weight:10px" 
            src="../View/images/Courses/' . $course->getImg() . '"> </div> '.
            '<div class="divTableCell"> ' . $faculty->getFaculty() . " </div> ".
            '<div class="divTableCell"> ' . $course->getCourseName() . " </div> ".
            '<div class="divTableCell"> ' . $course->getCoursePrice() . " </div> ".
            '<div class="divTableCell"><a href="editCourse.php?id='. $course->getID() .'">Edit</a></div>'.
            '<div class="divTableCell"><a href="deleteCourse.php?id='. $course->getID() .'">Delete</a></div> '.
            '</div>';
        }
        return $str;
    }
}?>