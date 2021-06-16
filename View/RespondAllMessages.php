<?php
require_once(__ROOT__ . "View/View.php");
require_once(__ROOT__ . "Model/FacultyModel.php");
require_once(__ROOT__ . "Model/UserModel.php");

class RespondAllMessages extends View
{
    public function output()
    {
        $str = "";
        
        foreach($this->model->getContacts() as $message)
        {
            $faculty = new FacultyModel($message->getCourseFacultyId());
            $StudentName = new UserModel($message->getUserId());
            $str= $str . '<div class="divTableRow">'.
            '<div class="divTableCell"> <img style="height:100px; weight:10px" 
            src="../View/images/Courses/' . $message->getCourseImage() . '"> </div> '.
            '<div class="divTableCell"> ' . $message->getSuggestedCourseName() . " </div> ".
            '<div class="divTableCell"> ' . $faculty->getFaculty() . " </div> ".
            '<div class="divTableCell"> ' . $StudentName->getUserName() . " </div> ".
            '<div class="divTableCell"> ' . $message->getStudentMessage() . " </div> ".
            '<div class="divTableCell"> ' . $message->getAdminRespond() . " </div> ".
            '<div class="divTableCell"> ' . $message->getHRPenalty() . " </div> ".
            '<div class="divTableCell"><a href="editRespondMessage.php?id='. $message->getID() .'">Add Respond</a></div> '.

            '</div>';
        }
        return $str;
    }
}?>