<?php namespace Modules\Quiz\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;
use Config\Database;
use Config\Services;
use Modules\Quiz\Model\QuizModel;
use Modules\Result\Model\ResultModel;

/* use the Templates module for the partial views */
use App\Modules\Templates\Controllers;


/**
 *
 */
class Quiz extends BaseController
{
    //instance variables
    protected Session $session;
    public $builder;
    public QuizModel $quizModel;
    public int $score;
    public string $users; //to be used for teachers dropdown

    /**
     *
     */
    public function __construct()
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        //initialise Codeigniter Services
        $this->session = Services::session();
        $this->request = Services::request();
        $db = Database::connect();
        //instantiate the Quiz model which is used in this class
        $this->quizModel = new QuizModel();
        $this->db = Database::connect();
        $this->session->start(); //start the session services in CodeIgniter 4
        $this->score = 0; //set the score to zero
/*
        //if a user is logged in, then fetch their credentials
        if (auth()->loggedIn()) {
            $this->user = auth()->user()->username; //fetch the username from shield auth()
            $this->user_id = auth()->id(); //fetch the user_id from shield auth()
        }
*/
    }


    /**
     * @return string
     */
    public function index(): string
    {
        $data['title'] = 'Multiple-Choice Quiz';
        $quizModel = new QuizModel();
        $data['question'] = $quizModel->findAll();
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\create_quiz', $data);
    }

    /**
     * @return string
     */
    public function find_teachers_quiz(): string
    {
        //grab the teachers name in a session for later use
        $data['title'] = 'Find Teachers Quiz';
        $model = model(QuizModel::class);
        //initialise Codeigniter Services
        $this->session = Services::session();
        $this->request = Services::request();

        $teacher = $this->request->getPost('teacher');
        $this->session->set('teacher', $teacher); //grab the teachers name in a session

        if ($this->request->getPost('teacher')) {
            $data['query'] = $model->get_teachers_quiz(); //based on search criteria
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\take_quiz', $data);
        } else {
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\error_select_a_teacher', $data);
        }
    }


    public function resultDisplay()
    {
        //initialise Codeigniter Services
        $this->session = Services::session();
        $this->request = Services::request();

        if ($this->request->getPost('ID1') and $this->request->getPost('ID2') and $this->request->getPost('ID3')
            and $this->request->getPost('ID4') and $this->request->getPost('ID5') !== NULL)
        {
            $data['posted'] = array(
                'ques1' => $this->request->getPost('ID1'),
                'ques2' => $this->request->getPost('ID2'),
                'ques3' => $this->request->getPost('ID3'),
                'ques4' => $this->request->getPost('ID4'),
                'ques5' => $this->request->getPost('ID5'),
            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID1'));
            $this->session->set('your_answer2', $this->request->getPost('ID2'));
            $this->session->set('your_answer3', $this->request->getPost('ID3'));
            $this->session->set('your_answer4', $this->request->getPost('ID4'));
            $this->session->set('your_answer5', $this->request->getPost('ID5'));


            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\result_display', $data);

        }

        if ($this->request->getPost('ID6') and $this->request->getPost('ID7') and $this->request->getPost('ID8')
            and $this->request->getPost('ID9') and $this->request->getPost('ID10') !== NULL)
        {
            $data['posted'] = array(
                'ques6' => $this->request->getPost('ID6'),
                'ques7' => $this->request->getPost('ID7'),
                'ques8' => $this->request->getPost('ID8'),
                'ques9' => $this->request->getPost('ID9'),
                'ques10' => $this->request->getPost('ID10'),
            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID6'));
            $this->session->set('your_answer2', $this->request->getPost('ID7'));
            $this->session->set('your_answer3', $this->request->getPost('ID8'));
            $this->session->set('your_answer4', $this->request->getPost('ID9'));
            $this->session->set('your_answer5', $this->request->getPost('ID10'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\result_display', $data);

        }

        if ($this->request->getPost('ID11') and $this->request->getPost('ID12') and $this->request->getPost('ID13')
            and $this->request->getPost('ID14') and $this->request->getPost('ID15') !== NULL)
        {
            $data['posted'] = array(
                'ques11' => $this->request->getPost('ID11'),
                'ques12' => $this->request->getPost('ID12'),
                'ques13' => $this->request->getPost('ID13'),
                'ques14' => $this->request->getPost('ID14'),
                'ques15' => $this->request->getPost('ID15'),
            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID11'));
            $this->session->set('your_answer2', $this->request->getPost('ID12'));
            $this->session->set('your_answer3', $this->request->getPost('ID13'));
            $this->session->set('your_answer4', $this->request->getPost('ID14'));
            $this->session->set('your_answer5', $this->request->getPost('ID15'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\result_display', $data);

        }

        if ($this->request->getPost('ID16') and $this->request->getPost('ID17') and $this->request->getPost('ID18')
            and $this->request->getPost('ID19') and $this->request->getPost('ID20') !== NULL)
        {
            $data['posted'] = array(
                'ques16' => $this->request->getPost('ID16'),
                'ques17' => $this->request->getPost('ID17'),
                'ques18' => $this->request->getPost('ID18'),
                'ques19' => $this->request->getPost('ID19'),
                'ques20' => $this->request->getPost('ID20'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID16'));
            $this->session->set('your_answer2', $this->request->getPost('ID17'));
            $this->session->set('your_answer3', $this->request->getPost('ID18'));
            $this->session->set('your_answer4', $this->request->getPost('ID19'));
            $this->session->set('your_answer5', $this->request->getPost('ID20'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\result_display', $data);

        }

        if ($this->request->getPost('ID21') and $this->request->getPost('ID22') and $this->request->getPost('ID23')
            and $this->request->getPost('ID24') and $this->request->getPost('ID25') !== NULL)
        {
            $data['posted'] = array(
                'ques21' => $this->request->getPost('ID21'),
                'ques22' => $this->request->getPost('ID22'),
                'ques23' => $this->request->getPost('ID23'),
                'ques24' => $this->request->getPost('ID24'),
                'ques25' => $this->request->getPost('ID25'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID21'));
            $this->session->set('your_answer2', $this->request->getPost('ID22'));
            $this->session->set('your_answer3', $this->request->getPost('ID23'));
            $this->session->set('your_answer4', $this->request->getPost('ID24'));
            $this->session->set('your_answer5', $this->request->getPost('ID25'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\result_display', $data);

        }

        if ($this->request->getPost('ID26') and $this->request->getPost('ID27') and $this->request->getPost('ID28')
            and $this->request->getPost('ID29') and $this->request->getPost('ID30') !== NULL)
        {
            $data['posted'] = array(
                'ques26' => $this->request->getPost('ID26'),
                'ques27' => $this->request->getPost('ID27'),
                'ques28' => $this->request->getPost('ID28'),
                'ques29' => $this->request->getPost('ID29'),
                'ques30' => $this->request->getPost('ID30'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID26'));
            $this->session->set('your_answer2', $this->request->getPost('ID27'));
            $this->session->set('your_answer3', $this->request->getPost('ID28'));
            $this->session->set('your_answer4', $this->request->getPost('ID29'));
            $this->session->set('your_answer5', $this->request->getPost('ID30'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\result_display', $data);

        }

        if ($this->request->getPost('ID31') and $this->request->getPost('ID32') and $this->request->getPost('ID33')
            and $this->request->getPost('ID34') and $this->request->getPost('ID35') !== NULL)
        {
            $data['posted'] = array(
                'ques31' => $this->request->getPost('ID31'),
                'ques32' => $this->request->getPost('ID32'),
                'ques33' => $this->request->getPost('ID33'),
                'ques34' => $this->request->getPost('ID34'),
                'ques35' => $this->request->getPost('ID35'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID31'));
            $this->session->set('your_answer2', $this->request->getPost('ID32'));
            $this->session->set('your_answer3', $this->request->getPost('ID33'));
            $this->session->set('your_answer4', $this->request->getPost('ID34'));
            $this->session->set('your_answer5', $this->request->getPost('ID35'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\result_display', $data);

        }
        else
        {
            echo $this->radio_button_errors(); //All the questions must be answered
        }


    } //end function



    public function submit_create_form(): string //displays a new form to enter quiz details
    {
        $data['title'] = 'Create Quiz';
        $model = model(QuizModel::class);
        $data['rowCount'] = $model->getNumRows();
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\create_quiz', $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function create(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        $posted_data = $this->request->getPost(['question', 'choice1', 'choice2', 'choice3', 'choice4', 'answer']);

        // Checks whether the submitted data passes the validation rules.
        if (!$this->validateData($posted_data, [

            'question' => [
                'label' => 'Question',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice1' => [
                'label' => 'Answer A',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice2' => [
                'label' => 'Answer B',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice3' => [
                'label' => 'Answer C',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice4' => [
                'label' => 'Answer D',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'answer' => [
                'label' => 'Correct Answer',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
        ])) {
            // When the validation fails, return the form and show error messages if they exist..
            return $this->submit_create_form();
        }

        // Get the validated data that was posted.
        $posts = $this->validator->getValidated();
        // Instantiate the model to use
        $model = model(QuizModel::class);
        // Save validated post data to the database
        $model->save([
            'question' => $posts['question'],
            'choice1' => $posts['choice1'],
            'choice2' => $posts['choice2'],
            'choice3' => $posts['choice3'],
            'choice4' => $posts['choice4'],
            'answer' => $posts['answer'],
            'user_id' => $this->user_id,
            'user' => $this->user,
            //$insert_id = $this->db->insertID(),
            //use this service before using $this->>session
            //$this->session = \Config\Services::session(),
            //$this->session->set('insert_id', $insert_id),
        ]);

        /*
         * // get the current user's id
                $user_id = auth()->id();
         */

        //Redirect the user to see all the questions
        return $this->response->redirect(base_url('quiz/display'));
    }

    public function display(): string
    {

        //if a user is logged in, then fetch their credentials
        if (auth()->loggedIn())
        {
            $data['title'] = 'Display Quiz';
            $model = model(QuizModel::class);
            $data['query'] = $model->get_quiz();
            return view('\Modules\Templates\Views\Public\header')
                . view('\Modules\Quiz\Views\pages\quiz\display_quiz', $data);
        }
        else
        {
            return view('\Modules\Templates\Views\Public\header')
                .view('\Modules\Home\Views\index'); //return user to the home page
        }
    }


    // get posts from the form fields upon submission
    public function get_data_from_post(): array
    {
        $data['question'] = $this->request->getPost('question');
        $data['choice1'] = $this->request->getPost('choice1');
        $data['choice2'] = $this->request->getPost('choice2');
        $data['choice3'] = $this->request->getPost('choice3');
        $data['choice4'] = $this->request->getPost('choice4');
        $data['answer'] = $this->request->getPost('answer');
        return $data;
    }

    // displays records from the database ready for editing!
    public function edit(): string
    {
        //get the sal_id either from post or from the url
        if ($this->request->getPost()) {
            $quizID = $this->request->getpost('quizID');
        } else {
            //catch the quizID from the url
            $quizID = $this->request->getUri()->getSegment(3);
        }
        $data['heading'] = " ";  //sets a heading for the page
        $model = model(QuizModel::class);
        $data['query'] = $model->get_where($quizID); //query a row matching the quiz_id
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\edit_quiz', $data);

    }

    //updates form values then updates the database
    public function update(): string
    {
        //catch the quiz_id from the url
        $quizID = $this->request->getUri()->getSegment(3);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $data = $this->get_data_from_post();
            $model = model(QuizModel::class);
            //call the update function in model
            $model->update_question($quizID, $data);
        } else {
            echo 'Sorry, no data is available';
        }

        $model = model(QuizModel::class);
        $data['query'] = $model->get_quiz(); //get_where($quiz_id);
        //$data['message'] = $this->session->setFlashdata
        //('message', 'The data was successfully updated');
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\display_quiz', $data);

    }

    //deletes a single record in the database
    public function delete(): string
    {
        $model = model(QuizModel::class);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $quizID = $this->request->getPost('quizID');
        } else {
            //catch the quiz_id from the url
            $quizID = $this->request->getUri()->getSegment(3);
        }
        $model->_delete($quizID);
        //redirects to the same page after updating changes
        //return redirect()->to($_SERVER['HTTP_REFERER']);
        $data['title'] = 'Delete';
        $data['query'] = $model->get_quiz(); //for drop down
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\display_quiz', $data);
    }

    public function submit_results_form(): string //displays a new form to enter quiz details
    {
        $data['title'] = 'Submit Result';
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\submit_results', $data);
    }

    /* submits the quiz takers results to the tbl_result table in the database */
    public function submit_results(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        $data['title'] = 'Submit Result';
        $posted_data = $this->request->getPost(['quiz_taker', 'class', 'your_answer1',
            'your_answer2', 'your_answer3', 'your_answer4', 'final']);
        // Checks whether the submitted data passed the validation rules.
        if (!$this->validateData($posted_data, [

            'quiz_taker' => [
                'label' => 'Name',
                'rules' => 'required|min_length[4]|max_length[52]'
            ],
            'class' => [
                'label' => 'Section',
                'rules' => 'required|max_length[52]'
            ],
            // no rules required when retrieving a values from session
        ])) {
            // When the validation fails, return the form and show error messages if they exist..
            return $this->submit_results_form();
        }
        // Get the validated data that was posted.
        $posts = $this->validator->getValidated();
        // instantiate the model to use
        $model = model(ResultModel::class);
        // Save validated post data to the database
        $model->save([
            'quiz_taker' => $posts['quiz_taker'],
            'class' => $posts['class'],
            'your_answer1' => $this->session->get('your_answer1'),
            'your_answer2' => $this->session->get('your_answer2'),
            'your_answer3' => $this->session->get('your_answer3'),
            'your_answer4' => $this->session->get('your_answer4'),
            'final' => $this->session->get('score'),
            'user' => $this->session->get('teacher'), //session from the dropdown form
        ]);

        //Redirect the user to see all of the results from the quiz1 controller
        //return $this->response->redirect(base_url('success'));
        return $this->response->redirect(base_url('quiz/success'));
        //return redirect()->to($_SERVER['HTTP_REFERER'],'refresh');
    }

    public function success(): string
    {
        $data['title'] = 'Success';
        //return $this->response->redirect(base_url('quiz/results'));
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\success', $data);
    }

    //if any of the radio button answers are not selected...then
    public function radio_button_errors(): string
    {
        $data['title'] = 'Radio Button Errors';
        $data['message'] = '<h6 class="w3-container w3-padding w3-text-sand w3-center">' . 'Please answer ALL the questions' . '</h6>';
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\radio_button_errors', $data);
    }


    public function find_teacher(): string
    {
        $model = model(QuizModel::class);
        $data['title'] = 'Find Teacher';
        $data['teachers'] = $model->get_teachers_names(); //gets the unique teachers names for a dropdown
        return view('\Modules\Templates\Views\Public\header')
            . view('\Modules\Quiz\Views\pages\quiz\find_teacher', $data);

    }


    /*
        public function getAnswerForQuizID1()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz1 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '" AND quizID = 1')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz1)) {
                //print_r($quiz1);
                return $quiz1['answer']; //returns the correct answer for question 1
            }
        }


        public function getAnswerForQuizID2()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz2 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '" AND quizID = 2')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz2)) {
                //print_r($quiz2);
                return $quiz2['answer']; //return the correct value for question 2
            }
        }


        public function getAnswerForQuizID3()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz3 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '" AND quizID = 3')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz3)) {
                //print_r($quiz3);
                return $quiz3['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID4()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz4 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '" AND quizID = 4')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz4)) {
                //print_r($quiz4);
                return $quiz4['answer']; //return the correct value for question
            }
        }


        public function getAnswerForQuizID5()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz5 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '" AND quizID = 5')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz5)) {
                //print_r($quiz3);
                return $quiz5['answer']; //return the correct value for question
            }
        }

        // ******************** for Mrs.Martin quiz 6-10 *********************************
        public function getAnswerForQuizID6()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz6 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 6')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz6)) {
                //print_r($quiz6);
                return $quiz6['answer']; //returns the correct answer for question 1
            }
        }


        public function getAnswerForQuizID7()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz7 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 7')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz7)) {
                //print_r($quiz7);
                return $quiz7['answer']; //return the correct value for question 2
            }
        }


        public function getAnswerForQuizID8()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz8 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 8')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz8)) {
                //print_r($quiz8);
                return $quiz8['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID9()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz9 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 9')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz9)) {
                //print_r($quiz9);
                return $quiz9['answer']; //return the correct value for question
            }
        }


        public function getAnswerForQuizID10()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz10 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 10')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz10)) {
                //print_r($quiz10);
                return $quiz10['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID11()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz11 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 11')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz11)) {
                //print_r($quiz11);
                return $quiz11['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID12()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz12 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 12')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz12)) {
                //print_r($quiz3);
                return $quiz12['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID13()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz13 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 13')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz13)) {
                //print_r($quiz13);
                return $quiz13['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID14()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz14 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 14')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz14)) {
                //print_r($quiz14);
                return $quiz14['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID15()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz15 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 15')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz15)) {
                //print_r($quiz15);
                return $quiz15['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID16()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz16 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 16')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz16)) {
                //print_r($quiz16);
                return $quiz16['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID17()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz17 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 17')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz17)) {
                //print_r($quiz3);
                return $quiz17['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID18()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz18 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 18')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz18)) {
                //print_r($quiz3);
                return $quiz18['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID19()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz19 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 19')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz19)) {
                //print_r($quiz19);
                return $quiz19['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID20()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz20 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 20')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz20)) {
                //print_r($quiz20);
                return $quiz20['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID21()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz21 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 21')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz21)) {
                //print_r($quiz21);
                return $quiz21['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID22()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz22 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 22')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz22)) {
                //print_r($quiz20);
                return $quiz22['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID23()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz23 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 23')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz23)) {
                //print_r($quiz23);
                return $quiz23['answer']; //return the correct value for question
            }
        }

        public function getAnswerForQuizID24()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz24 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 24')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz24)) {
                //print_r($quiz20);
                return $quiz24['answer']; //return the correct value for question
            }
        }


        public function getAnswerForQuizID25()
        {
            //$data = $this->db->table("quiz_data")->get()->getResult(); OR USE
            try {
                $quiz25 = $this->db->query('SELECT answer FROM quiz_questions WHERE quizID = 25')->getRowArray();
            } catch (Exception $e) {
            }
            //echo "<pre>";
            if (!empty($quiz25)) {
                //print_r($quiz20);
                return $quiz25['answer']; //return the correct value for question
            }
        }

    */
    // function for counting the number of rows in the table for each teacher and returns an array
    public function countRowsForEachTeacher(): int|string
    {
        //$table = $this->get_table();
        $db = \Config\Database::connect();
        $this->builder = $db->table('quiz_questions');
        $this->builder->select('user');
        $this->builder->where('user', $this->session->get('teacher'));
        $query = $this->builder->countAllResults();
        return $query;
    }

    /*
       public function getQuestionAnswerArrayForEachTeacher(): array
       {
           if ($this->countRowsForEachTeacher() == 5) //counts the number of rows for the teacher
           {
               try {
                   $question1 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '"')->getResultArray();
               } catch (Exception $e) {
               }
               //echo "<pre>";
               if (!empty($question1[0]['answer'])) {
                   //use this service before using $this->>session
                   $this->session = \Config\Services::session();
                   $this->session->set('answer1', $question1[0]['answer']); //this returns the first answer in the group of four answers
               }

               try {
                   $question2 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '"')->getResultArray();
               } catch (Exception $e) {
               }
               //echo "<pre>";
               if (!empty($question2[1]['answer'])) {
                   //use this service before using $this->>session
                   $this->session = \Config\Services::session();
                   $this->session->set('answer2', $question2[1]['answer']); //this returns the first answer in the group of four answers
               }

               try {
                   $question3 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '"')->getResultArray();
               } catch (Exception $e) {
               }
               //echo "<pre>";
               if (!empty($question3[2]['answer'])) {
                   //use this service before using $this->>session
                   $this->session = \Config\Services::session();
                   $this->session->set('answer3', $question3[2]['answer']); //this returns the third answer in the group of four answers
               }

               try {
                   $question4 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '"')->getResultArray();
               } catch (Exception $e) {
               }
               //echo "<pre>";
               if (!empty($question4[3]['answer'])) {
                   //use this service before using $this->>session
                   $this->session = \Config\Services::session();
                   $this->session->set('answer4', $question4[3]['answer']); //this returns the fourth answer in the group of four answers
               }

               try {
                   $question5 = $this->db->query('SELECT answer FROM quiz_questions WHERE user = "' . $this->session->get('teacher') . '"')->getResultArray();
               } catch (Exception $e) {
               }
               //echo "<pre>";
               if (!empty($question5[4]['answer'])) {
                   //use this service before using $this->>session
                   $this->session = \Config\Services::session();
                   $this->session->set('answer5', $question5[4]['answer']); //this returns the fifth answer in the group of four answers
               }

           } else {
               echo view('partials/header') //load the appropriate error page
                   . view('pages/quiz/error_enter_five_questions');
           }

       } //end of function
   */

    /*
        public function results(): void
        {
            $this->getQuestionAnswerArrayForEachTeacher();
            //initialise a request service
            $this->request = Services::request();
            //initialise a session service
            $this->session = Services::session();

            if ($this->request->getPost('ID1') and $this->request->getPost('ID2') and $this->request->getPost('ID3')
                and $this->request->getPost('ID4') and $this->request->getPost('ID5') !== NULL) {

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 1' . '</h4>';
                if ($this->session->get('answer1') == $this->request->getPost('ID1')) {
                    $data['your_answer1'] = $this->getAnswerForQuizID1(); //fetches the correct answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                    $data["status"] = 'Correct';
                    $data['score1'] = $this->score + 1; //increment the score by 1
                    //$data['message'] = '<p style="color:green">' . 'Correct Answer' . '</p>';
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score1'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer1'] = $this->request->getPost(); //fetches the posted answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 2' . '</h4>';
                if ($this->session->get('answer2') == $this->request->getPost('ID2')) {
                    $data['your_answer2'] = $this->getAnswerForQuizID2(); //fetches the correct answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                    $data["status"] = 'Correct';
                    $data['score2'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score2'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer2'] = $this->request->getPost('ID2'); //fetches the posted answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);


                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 3' . '</h4>';
                if ($this->session->get('answer3') == $this->request->getPost('ID3')) {
                    $data['your_answer3'] = $this->getAnswerForQuizID3(); //fetches the correct answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                    $data["status"] = 'Correct';
                    $data['score3'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score3'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer3'] = $this->request->getPost('ID3'); //fetches the posted answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);


                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 4' . '</h4>';
                if ($this->session->get('answer4') == $this->request->getPost('ID4')) {
                    $data['your_answer4'] = $this->getAnswerForQuizID4(); //fetches the correct answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                    $data["status"] = 'Correct';
                    $data['score4'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score4'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer4'] = $this->request->getPost('ID4'); //fetches the posted answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 5' . '</h4>';
                if ($this->session->get('answer5') == $this->request->getPost('ID5')) {
                    $data['your_answer5'] = $this->getAnswerForQuizID5(); //fetches the correct answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                    $data["status"] = 'Correct';
                    $data['score5'] = $this->score + 1; //increment the score by 1
                    $data['message'] = '<p style="color:green">' . 'Correct Answer' . '</p>';
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score5'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer5'] = $this->request->getPost('ID5'); //fetches the posted answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                }
                $data['final'] = ($data['score5'] + $data['score4'] + $data['score3'] + $data['score2'] + $data['score1']);
                $this->session->set('final', $data['final']);
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

            }
            //else
            //{
            //echo $this->radio_button_errors();
            //}


            if ($this->request->getPost('ID6') and $this->request->getPost('ID7') and $this->request->getPost('ID8')
                and $this->request->getPost('ID9') and $this->request->getPost('ID10') !== NULL) {

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 1' . '</h4>';
                if ($this->session->get('answer1') == $this->request->getPost('ID6')) {
                    $data['your_answer1'] = $this->getAnswerForQuizID6(); //fetches the correct answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                    $data["status"] = 'Correct';
                    $data['score1'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score1'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer1'] = $this->request->getPost('ID6'); //fetches the posted answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 2' . '</h4>';
                if ($this->session->get('answer2') == $this->request->getPost('ID7')) {
                    $data['your_answer2'] = $this->getAnswerForQuizID7(); //fetches the correct answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                    $data["status"] = 'Correct';
                    $data['score2'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score2'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer2'] = $this->request->getPost('ID7'); //fetches the posted answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 3' . '</h4>';
                if ($this->session->get('answer3') == $this->request->getPost('ID8')) {
                    $data['your_answer3'] = $this->getAnswerForQuizID8(); //fetches the correct answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                    $data["status"] = 'Correct';
                    $data['score3'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score3'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer3'] = $this->request->getPost('ID8'); //fetches the posted answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 4' . '</h4>';
                if ($this->session->get('answer4') == $this->request->getPost('ID9')) {
                    $data['your_answer4'] = $this->getAnswerForQuizID9(); //fetches the correct answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                    $data["status"] = 'Correct';
                    $data['score4'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data['headline'] = '<h4>' . 'Question 10' . '</h4>';
                    $data["status"] = 'Wrong';
                    $data['score4'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer4'] = $this->request->getPost('ID9'); //fetches the posted answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 5' . '</h4>';

                if ($this->session->get('answer5') == $this->request->getPost('ID10')) {
                    $data['your_answer5'] = $this->getAnswerForQuizID10(); //fetches the correct answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                    $data["status"] = 'Correct';
                    $data['score5'] = $this->score + 1; //increment the score by 1
                    $data['message'] = '<p style="color:green">' . 'Correct Answer' . '</p>';
                    $data['title'] = 'Your Result';
                } else {
                    $data['headline'] = '<h4>' . 'Question 5' . '</h4>';
                    $data["status"] = 'Wrong';
                    $data['score5'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer5'] = $this->request->getPost('ID10'); //fetches the posted answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                }
                $data['final'] = ($data['score5'] + $data['score4'] + $data['score3'] + $data['score2'] + $data['score1']);
                $this->session->set('final', $data['final']);
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

            }

            if ($this->request->getPost('ID11') and $this->request->getPost('ID12') and $this->request->getPost('ID13')
                and $this->request->getPost('ID14') and $this->request->getPost('ID15') != NULL) {
                //initialise Codeigniter Services
                $this->session = Services::session();
                $this->request = Services::request();

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 1' . '</h4>';
                if ($this->session->get('answer1') == $this->request->getPost('ID11')) {
                    $data['your_answer1'] = $this->getAnswerForQuizID11(); //fetches the correct answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                    $data["status"] = 'Correct';
                    $data['score1'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong ';
                    $data['score1'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer1'] = $this->request->getPost('ID11'); //fetches the posted answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);


                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 2' . '</h4>';
                if ($this->session->get('answer2') == $this->request->getPost('ID12')) {
                    //$data['answer'] = $this->getQuestionAnswersForEachTeacher();
                    $data['your_answer2'] = $this->getAnswerForQuizID12(); //fetches the correct answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                    $data["status"] = 'Correct';
                    $data['score2'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score2'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer2'] = $this->request->getPost('ID12'); //fetches the posted answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 3' . '</h4>';
                if ($this->session->get('answer3') == $this->request->getPost('ID13')) {
                    $data['your_answer3'] = $this->getAnswerForQuizID13(); //fetches the correct answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                    $data["status"] = 'Correct';
                    $data['score3'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score3'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer3'] = $this->request->getPost('ID13'); //fetches the posted answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 4' . '</h4>';
                if ($this->session->get('answer4') == $this->request->getPost('ID14')) {
                    $data['your_answer4'] = $this->getAnswerForQuizID14(); //fetches the correct answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                    $data["status"] = 'Correct';
                    $data['score4'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score4'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer4'] = $this->request->getPost('ID14'); //fetches the posted answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 5' . '</h4>';
                if ($this->session->get('answer5') == $this->request->getPost('ID15')) {
                    $data['your_answer4'] = $this->getAnswerForQuizID15(); //fetches the correct answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                    $data["status"] = 'Correct';
                    $data['score5'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score5'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer4'] = $this->request->getPost('ID15'); //fetches the posted answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                }
                $data['final'] = ($data['score5'] + $data['score4'] + $data['score3'] + $data['score2'] + $data['score1']);
                $this->session->set('final', $data['final']);
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

            }

            if ($this->request->getPost('ID16') and $this->request->getPost('ID17') and $this->request->getPost('ID18')
                and $this->request->getPost('ID19') and $this->request->getPost('ID20') != NULL) {
                //initialise Codeigniter Services
                $this->session = Services::session();
                $this->request = Services::request();

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 1' . '</h4>';
                if ($this->session->get('answer1') == $this->request->getPost('ID16')) {
                    $data['your_answer1'] = $this->getAnswerForQuizID16(); //fetches the correct answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                    $data["status"] = 'Correct';
                    $data['score1'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong ';
                    $data['score1'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer1'] = $this->request->getPost('ID16'); //fetches the posted answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);


                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 2' . '</h4>';
                if ($this->session->get('answer2') == $this->request->getPost('ID17')) {
                    $data['your_answer2'] = $this->getAnswerForQuizID17(); //fetches the correct answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                    $data["status"] = 'Correct';
                    $data['score2'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score2'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer2'] = $this->request->getPost('ID17'); //fetches the posted answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 3' . '</h4>';
                if ($this->session->get('answer3') == $this->request->getPost('ID18')) {
                    $data['your_answer3'] = $this->getAnswerForQuizID18(); //fetches the correct answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                    $data["status"] = 'Correct';
                    $data['score3'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score3'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer3'] = $this->request->getPost('ID18'); //fetches the posted answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 4' . '</h4>';
                if ($this->session->get('answer4') == $this->request->getPost('ID19')) {
                    $data['your_answer4'] = $this->getAnswerForQuizID19(); //fetches the correct answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                    $data["status"] = 'Correct';
                    $data['score4'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score4'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer4'] = $this->request->getPost('ID19'); //fetches the posted answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 5' . '</h4>';
                if ($this->session->get('answer5') == $this->request->getPost('ID20')) {
                    $data['your_answer5'] = $this->getAnswerForQuizID20(); //fetches the correct answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                    $data["status"] = 'Correct';
                    $data['score5'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score5'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer5'] = $this->request->getPost('ID20'); //fetches the posted answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                }
                $data['final'] = ($data['score5'] + $data['score4'] + $data['score3'] + $data['score2'] + $data['score1']);
                $this->session->set('final', $data['final']);
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

            }


            if ($this->request->getPost('ID21') and $this->request->getPost('ID22') and $this->request->getPost('ID23')
                and $this->request->getPost('ID24') and $this->request->getPost('ID25') != NULL)
            {
                //initialise Codeigniter Services
                $this->session = Services::session();
                $this->request = Services::request();

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 1' . '</h4>';
                if ($this->session->get('answer1') == $this->request->getPost('ID21')) {
                    $data['your_answer1'] = $this->getAnswerForQuizID21(); //fetches the correct answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                    $data["status"] = 'Correct';
                    $data['score1'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong ';
                    $data['score1'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer1'] = $this->request->getPost('ID21'); //fetches the posted answer
                    $this->session->set('your_answer1', $data['your_answer1']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);


                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 2' . '</h4>';
                if ($this->session->get('answer2') == $this->request->getPost('ID22')) {
                    $data['your_answer2'] = $this->getAnswerForQuizID22(); //fetches the correct answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                    $data["status"] = 'Correct';
                    $data['score2'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score2'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer2'] = $this->request->getPost('ID22'); //fetches the posted answer
                    $this->session->set('your_answer2', $data['your_answer2']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 3' . '</h4>';
                if ($this->session->get('answer3') == $this->request->getPost('ID23')) {
                    $data['your_answer3'] = $this->getAnswerForQuizID23(); //fetches the correct answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                    $data["status"] = 'Correct';
                    $data['score3'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score3'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer3'] = $this->request->getPost('ID23'); //fetches the posted answer
                    $this->session->set('your_answer3', $data['your_answer3']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 4' . '</h4>';
                if ($this->session->get('answer4') == $this->request->getPost('ID24')) {
                    $data['your_answer4'] = $this->getAnswerForQuizID24(); //fetches the correct answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                    $data["status"] = 'Correct';
                    $data['score4'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score4'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer4'] = $this->request->getPost('ID24'); //fetches the posted answer
                    $this->session->set('your_answer4', $data['your_answer4']);
                }
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

                //if the session value equals the getPost() function then......
                $data['headline'] = '<h4>' . 'Question 5' . '</h4>';
                if ($this->session->get('answer5') == $this->request->getPost('ID25'))
                {
                    $data['your_answer5'] = $this->getAnswerForQuizID25(); //fetches the correct answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                    $data["status"] = 'Correct';
                    $data['score5'] = $this->score + 1; //increment the score by 1
                    $data['title'] = 'Your Result';
                } else {
                    $data["status"] = 'Wrong';
                    $data['score5'] = $this->score; //$score remain as zero
                    $data['title'] = 'Your Result';
                    $data['your_answer5'] = $this->request->getPost('ID25'); //fetches the posted answer
                    $this->session->set('your_answer5', $data['your_answer5']);
                }
                $data['final'] = ($data['score5'] + $data['score4'] + $data['score3'] + $data['score2'] + $data['score1']);
                $this->session->set('final', $data['final']);
                echo view('partials/header')
                    . view('pages/quiz/display_results', $data);

            } else {
                echo $this->radio_button_errors();
            }

        }
    */

} //end of class






