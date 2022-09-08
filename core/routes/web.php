<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::get('cron','SiteController@cron')->name('cron');



/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        Route::get('poll','PollController@index')->name('poll');
        Route::post('poll','PollController@pollStore')->name('poll');
        Route::post('poll/edit/{id}','PollController@pollEdit')->name('poll.edit');
        // Radio Jockey

        Route::get('rjs/all', 'RadioJockeyController@showall')->name('radio.jockey');
        Route::get('rjs/search', 'RadioJockeyController@searchJockey')->name('radio.jockey.search');
        Route::get('rjs/socail/search', 'RadioJockeyController@searchJockeySocial')->name('radio.jockey.social.search');
        Route::get('rjs/add', 'RadioJockeyController@createJockey')->name('radio.jockey.add');
        Route::get('rjs/details/{id}', 'RadioJockeyController@details')->name('radio.jockey.details');
        Route::post('rjs/add', 'RadioJockeyController@addJockey');
        Route::post('rjs/update/{jockey}', 'RadioJockeyController@update')->name('radio.jockey.update');

        Route::get('rjs/social', 'RadioJockeyController@social')->name('radio.social');
        Route::post('rjs/social/add', 'RadioJockeyController@socialAdd')->name('radio.social.store');
        Route::post('rjs/social/update', 'RadioJockeyController@socialupdate')->name('rjs.update');
        Route::post('rjs/social/{id}/delete', 'RadioJockeyController@removeSocial')->name('rjs.delete');

        // Event
        Route::get('event/create', 'EventController@createEvent')->name('event.create');
        Route::post('event/create', 'EventController@eventStore');

        Route::get('event/all', 'EventController@showAll')->name('event.all');
        Route::get('event/ajax', 'EventController@getEvent')->name('ajax');
        Route::post('event/all', 'EventController@swapEvent');

        Route::post('event/delete/{event}', 'EventController@delete')->name('event.delete');
        Route::post('archive/delete/{id}', 'EventController@archiveDelete')->name('archive.delete');

        Route::get('event/archive', 'EventController@archive')->name('event.archive');
        Route::get('event/details/{event}', 'EventController@eventDetails')->name('event.details');
        Route::post('event/details/{event}', 'EventController@eventDetailsUpdate');

        Route::get('event/search', 'EventController@eventSearch')->name('event.search');
        Route::post('temporary/save', 'RadioJockeyController@temporary')->name('radio.temporary');

        Route::get('archive/details/{id}','EventController@archiveDetails')->name('event.archive.details');
        Route::post('archive/details/{id}','EventController@archiveDetailsUpdate');
        Route::get('archive/event','EventController@archiveEventAll')->name('archive.event.no_url');
        Route::get('archive/event/search', 'EventController@archiveEventSearch')->name('archive.event.search');

        // Subscriber
        Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
        Route::get('subscriber/send-email', 'SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
        Route::post('subscriber/remove', 'SubscriberController@remove')->name('subscriber.remove');
        Route::post('subscriber/send-email', 'SubscriberController@sendEmail')->name('subscriber.sendEmail');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language.manage');
        Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
        Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdatepp')->name('language.manage.update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.import_lang');



        Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');



        // General Setting
        Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo_icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo_icon');

        // Plugin
        Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
        Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
        Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');


        // Email Setting
        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global');
        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting');
        Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.sendTestMail');


        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');


        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {


            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');



            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');

            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
    });
});


Route::get('event','SiteController@findEvents')->name('event');
Route::get('event/search','SiteController@eventSearch')->name('event.search');

Route::get('events','SiteController@allEvents')->name('events');
Route::get('jockey', 'SiteController@allJockeys')->name('jockey');
Route::get('jockeys/details/{id}','SiteController@jockeyDetails')->name('jockey.details');

Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contact', 'SiteController@contactSubmit');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');

Route::get('policy/{id}/{slug}','SiteController@policy')->name('policy');

Route::get('blog/{id}/{slug}', 'SiteController@blogDetails')->name('blog.details');
Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholderImage');
Route::get('/{slug}', 'SiteController@pages')->name('pages');
Route::get('/', 'SiteController@index')->name('home');
Route::post('poll/{id}', 'SiteController@pollVote')->name('poll');

