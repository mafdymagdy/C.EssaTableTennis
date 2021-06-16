<?php
require_once(__ROOT__ . "View/View.php");
require_once(__ROOT__ . "Model/QuestionModel.php");
require_once(__ROOT__ . "Model/UserModel.php");


class RespondAllQuestions extends View
{
    public function output()
    {
        $str = "";
        
        foreach($this->model->getQusetions() as $question)
        {
            //$QuestionId = new QuestionModel($question->getStudentId());
            $StudentName = new UserModel($question->getStudentId());
            $str= $str . '<div class="divTableRow">'.
            '<div class="divTableCell"> ' . $StudentName->getUserName() . " </div> ".
            '<div class="divTableCell"> ' . $question->getQuestion() . " </div> ".
            '<div class="divTableCell"> ' . $question->getAnswer() . " </div> ".
            '<div class="divTableCell"><a href="editRespond.php?id='. $question->getID() .'">Add Respond</a></div> '.
            '</div>';
        }
        return $str;
    }
}?>