<?php
require_once(__ROOT__ . "View/View.php");
  require_once(__ROOT__ . "Model/UserModel.php");
  require_once(__ROOT__ . "Model/UsersModel.php");


class ViewAllQuestions extends View
{
    public function output()
    {
        $str = "";
        
        foreach($this->model->getQusetions() as $question)
        {
            $StudentName = new UserModel($question->getStudentId());
            //$studentName= new UserModel($StudentId->getUserId());
            $str= $str . '<div class="divTableRow">'.
            '<div class="divTableCell"> ' . $StudentName->getUserName() . " </div> ".
            '<div class="divTableCell"> ' . $question->getQuestion() . " </div> ".
            //'<div class="divTableCell"> ' . $question->getAnswer() . " </div> ".
           // '<div class="divTableCell"><a href="deleteQuestion.php?id='. $question->getID() .'">Delete</a></div> '.
            '</div>';
        }
        return $str;
    }
}?>