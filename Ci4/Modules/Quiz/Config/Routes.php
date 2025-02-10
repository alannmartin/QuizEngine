<?php


namespace Modules\Quiz\Config;

/*
    Without necessarily needing to add a prefix to the group, you can pass an empty string in place of the
    prefix and the routes in the group will be routed as though the group never existed but with the given route
    config options:
*/

    //e.g this is the routes group for the Quiz module at the specified namespace
    $routes->group('',['namespace' => '\Modules\Quiz\Controllers'], static function ($routes)
    {
        //All of the routes need for this module

        $routes->match(['GET','POST'],'quiz/create', 'Quiz::create'); //create a new quiz question
        $routes->match(['GET','POST'],'quiz/save', 'Quiz::save'); //save the quiz questions
        $routes->match(['GET','POST'],'quiz/success', 'Quiz::success'); //save the quiz questions
        $routes->match(['GET','POST'],'quiz/display', 'Quiz::display'); //show the quiz questions
        $routes->match(['GET','POST'],'quiz/delete/(:num)', 'Quiz::delete/$1');//delete a quiz question
        $routes->match(['GET','POST'],'quiz/edit/(:num)', 'Quiz::edit/$1');//edit quiz question
        $routes->match(['GET','POST'],'quiz/update/(:num)', 'Quiz::update/$1');//update quiz question
        $routes->match(['GET','POST'],'quiz/submit_results', 'Quiz::submit_results'); //submit results to the database
        $routes->match(['GET','POST'],'quiz/resultDisplay', 'Quiz::resultDisplay');
        $routes->match(['GET','POST'],'quiz/find_teacher', 'Quiz::find_teacher'); //find your teacher
        $routes->match(['GET','POST'],'quiz/find_teachers_quiz', 'Quiz::find_teachers_quiz'); //find teachers quiz




    });


