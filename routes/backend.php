<?php

Route::group(['middleware' => 'admins','prefix' => 'trang-quan-tri','namespace' => 'Backend'],function(){

    Route::get('/','DashboardController@index')->name('dashboard.index');
    Route::get('/profile','DashboardController@profile')->name('dashboard.profile');
    Route::post('/profile','DashboardController@updateProfile');

    Route::group(['prefix' => 'du-lieu'],function(){

        Route::group(['prefix' => 'giao-vien'],function(){
            Route::get('/','TeacherController@index')->name('teacher.index');
            Route::get('/add','TeacherController@add')->name('teacher.add');
            Route::post('/add','TeacherController@store');
            Route::get('/edit/{id}','TeacherController@edit')->name('teacher.edit');
            Route::post('/edit/{id}','TeacherController@update');
            Route::get('/delete/{id}','TeacherController@delete');
            // them file excel
            Route::get('/add-file','TeacherController@addFile')->name('teacher.add.file');
            Route::post('/add-file','TeacherController@saveFile');
        });
        Route::group(['prefix' => 'hoc-vien'],function(){
            Route::get('/','StudentController@index')->name('student.index');
            Route::get('/add','StudentController@add')->name('student.add');
            Route::post('/add','StudentController@store');
            Route::get('/edit/{id}','StudentController@edit')->name('student.edit');
            Route::post('/edit/{id}','StudentController@update');
            Route::get('/delete/{id}','StudentController@delete');

            //them file excel
            Route::get('/add-file','StudentController@addFile')->name('student.add.file');
            Route::post('/add-file','StudentController@saveFile');
        });
        Route::group(['prefix' => 'chuyen-de'],function(){
            Route::get('/','ThematicController@index')->name('thematic.index');
            Route::get('/add','ThematicController@add')->name('thematic.add');
            Route::post('/add','ThematicController@store');
            Route::get('/edit/{id}','ThematicController@edit')->name('thematic.edit');
            Route::post('/edit/{id}','ThematicController@update');
            Route::get('/delete/{id}','ThematicController@delete');
        });
        Route::group(['prefix' => 'cau-hoi'],function(){
            Route::get('/','QuestionsController@index')->name('questions.index');
            Route::get('/add','QuestionsController@add')->name('questions.add');
            Route::post('/add','QuestionsController@store');
            Route::get('/edit/{id}','QuestionsController@edit')->name('questions.edit');
            Route::post('/edit/{id}','QuestionsController@update');
            Route::get('/delete/{id}','QuestionsController@delete');
            //answers(dap-an)

            Route::get('/edit/answers/{id}','AnswersController@edit')->name('answers.edit');
            Route::post('/edit/answers/{id}','AnswersController@update');
            Route::get('/edit/answers-essay/{id}','AnswersController@editEssay')->name('answersEssay.edit');
            Route::post('/edit/answers-essay/{id}','AnswersController@updateEssay');
            Route::get('/delete/answers/{id}','AnswersController@delete');
        });

        Route::group(['prefix' => 'de-thi'], function () {
            Route::get('/','ExamController@index')->name('admin.exam.index');
            Route::post('/add','ExamController@createExam')->name('admin.exam.add');
            //Route::post('/add','ExamController@createExam');
            Route::get('/{id}/show','ExamController@show')->name('admin.exam.show');
            Route::get('/{id}/delete','ExamController@delete')->name('admin.exam.delete');
            Route::get('/{id}/list-questions','ExamController@ListQuestions')->name('admin.exam.listQuestions');
            Route::post('/{id}/showlistQuestions','ExamController@showlistQuestions');
        });

        Route::group(['prefix' => 'cham-diem'], function () {
            Route::get('/','MarkController@index')->name('admin.mark.index');
            Route::get('/{id}/markEssay','MarkController@markEssay')->name('admin.mark.essay');
            Route::post('/{id}/markEssay','MarkController@createMarkEssay');
            Route::get('/{id}/delete','MarkController@delete')->name('admin.mark.delete');
        });
    });
});