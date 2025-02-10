<!-- !PAGE CONTENT! -->
<div class="w3-container w3-padding w3-mobile" style="margin-left:15%;margin-right:3px; width:70%">


Resumed 15 March 2024 from November 2022
<h4>
Quiz Developer Notes
</h4>
		
<p class="w3-justify">
There is a table called quiz_data in the ci4_quiz database which holds the questions, choices
and the correct answer for each question in the quiz. Each row of the table contains all the information
for one question and is displayed with radio buttons and shuffled so that the questions can be re-arranged.
</p>
<br>
<p class="w3-justify">
The dummy data is currently about where certain cities are situated in South Africa.
There is a standard model called QuizModel.php which references the name of the table and
the fields in the table, there are no functions in the model.
</p>
<br>
<p  class="w3-justify">
I will start with explaining my logic for the online quiz1, the first quiz is called quiz1 and others
will follow with names like quiz2, quiz3 etc. The data is kept inside the quiz1_data table and the model for it is 
called Quiz1Model.php.
</p>
<br>
<p>
The following functions are in the controller called Quiz1.php and their logic is explained
below;
</p>
<br>
<p class="w3-justify">
There are a few class variables (global) that are declared just before the constructor function
and are initialized with a value inside the __construct(). e.g $this->score is set
to zero and $this->db is for handling database queries. The index() is used to fetch the questions
from the table and display them inside quiz/display_quiz.php with radio buttons. I have included var_dump()
at the top of the display_results.php page so that I can see exactly what was posted by the user!
</p>
<br>
<p>
index() - new Quiz1Model->findAll() which retrieves all the records from the quiz1_data table
</p>
<br>
<p class="w3-justify">
Next, there are three functions, one for handling the results once the user hits the submit button.
The functions are named as follows:<br>

getQuiz1() - manages sql query $quiz1 and returns a result.<br>
getQuiz2() - manages sql query $quiz2 and returns a result.<br>
getQuiz3() - manages sql query $quiz3 and returns a result.
</p>
<br>
<p>
Note that there can be any number of these functions depending on the number of rows in the database table.
</p>
<br>
<p>
results() - this function is responsible for displaying the correct information to the user such as
'Correct answers (green), Wrong answers (red) and the total number of correct scores are displayed at
the bottom of the quiz. To make this production ready, css styles need to be included, I am using W3.CSS for quiz1.
</p>
<br>	
<p>

</p>

</div>






	