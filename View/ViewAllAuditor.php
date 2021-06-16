<?php
require_once(__ROOT__ . "View/View.php");
require_once(__ROOT__ . "Model/ContactModel.php");
require_once(__ROOT__ . "Model/FacultyModel.php");


class ViewAllAuditor extends View
{
    public function output()
    {
        $str = "";
        
        foreach($this->model->getContacts() as $m)
        {
            $faculty = new FacultyModel($m->getCourseFacultyId());
            $str= $str . '<div class="divTableRow">'.
            '<div class="divTableCell"> <img style="height:100px; weight:10px" 
            src="../View/images/Courses/' . $m->getCourseImage() . '"> </div> '.            '<div class="divTableCell"> ' . $m->getSuggestedCourseName() . " </div> ".
            '<div class="divTableCell"> ' . $faculty->getFaculty() . " </div> ".
            '<div class="divTableCell"> ' . $m->getStudentMessage() . " </div> ".
            '<div class="divTableCell"> ' . $m->getAdminRespond() . " </div> ".
            '<div class="divTableCell"> ' . $m->getAuditorComment() . " </div> ".
            '<div class="divTableCell"><a href="editAuditor.php?id='. $m->getID() .'">Add or change your Comment </a></div> '.
            '</div>';
        }
        return $str;
    }
}?>