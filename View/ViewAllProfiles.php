<?php
require_once(__ROOT__ . "View/View.php");
require_once(__ROOT__ . "Model/FacultyModel.php");
require_once(__ROOT__ . "Model/UserTypesModel.php");


class ViewAllProfiles extends View
{
    public function output()
    {
        $str = "";
        foreach($this->model->getStudents() as $user)
        {
            $faculty = new FacultyModel($user->getFacultyId());
            $type = new UserTypesModel($user->getUserTypeId());
            $str= $str . '<div class="divTableRow">'.
            '<div class="divTableCell"> <img style="height:100px; weight:10px" 
            src="../View/images/Students/' . $user->getImage() . '"> </div> '.
            '<div class="divTableCell"> ' . $user->getUserName() . " </div> ".
            '<div class="divTableCell"> ' . $faculty->getFaculty() . " </div> ".
            '<div class="divTableCell"> ' . $type->getType() . " </div> ".
            '<div class="divTableCell"> ' . $user->getCreatedAt() . " </div> ".
            '</div>';
        }
        return $str;
    }
}?>