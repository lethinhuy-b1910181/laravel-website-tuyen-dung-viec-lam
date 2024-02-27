<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminJobLocationController;
use App\Http\Controllers\Admin\AdminJobExperienceController;
use App\Http\Controllers\Admin\AdminJobTypeController;
use App\Http\Controllers\Admin\AdminJobGenderController;
use App\Http\Controllers\Admin\AdminJobSalaryController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminCompanyLocationController;
use App\Http\Controllers\Admin\AdminCompanyIndustryController;
use App\Http\Controllers\Admin\AdminCompanySizeController;


use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminBlogPageController;
use App\Http\Controllers\Admin\AdminFaqPageController;
use App\Http\Controllers\Admin\AdminTermPageController;
use App\Http\Controllers\Admin\AdminPrivacyPageController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminPricingPageController;
use App\Http\Controllers\Admin\AdminOtherPageController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\Front\ForgetPasswordController;
use App\Http\Controllers\Front\JobListController;
use App\Http\Controllers\Front\CompanyListController;
// use App\Http\Controllers\Front\BlogController;

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Candidate\CandidateController;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login-form', [HomeController::class, 'form_login'])->name('login_form');
Route::get('terms-of-use', [TermsController::class, 'index'])->name('terms');
Route::get('job-categories', [JobCategoryController::class, 'categories'])->name('job_categories');
Route::get('blog', [PostController::class, 'index'])->name('blog');
Route::get('post/{slug}', [PostController::class, 'detail'])->name('post');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact_submit', [ContactController::class, 'submit'])->name('contact_submit');

Route::get('job-list', [JobListController::class, 'index'])->name('job_list');
Route::get('job/{id}', [JobListController::class, 'detail'])->name('job');
Route::get('detail-job/{id}', [JobListController::class, 'detail_job'])->name('detail-job');



 Route::get('company-list', [CompanyListController::class, 'index'])->name('company_list');
 Route::get('company-detail/{id}', [CompanyListController::class, 'detail'])->name('company');


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('create-account', [SignupController::class, 'index'])->name('signup');


/* Company */
Route::post('company_signup_submit', [SignupController::class, 'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}', [SignupController::class, 'company_signup_verify'])->name('company_signup_verify');
Route::post('company_login_submit', [LoginController::class, 'company_login_submit'])->name('company_login_submit');
Route::get('/company/logout', [LoginController::class,'company_logout'])->name('company_logout');    

Route::get('forget-password/company', [ForgetPasswordController::class, 'company_forget_password'])->name('company_forget_password');
Route::post('forget-password/company/submit', [ForgetPasswordController::class, 'company_forget_password_submit'])->name('company_forget_password_submit');
Route::get('reset-password/company/{token}/{email}', [ForgetPasswordController::class,'company_reset_password'])->name('company_reset_password');
Route::post('reset-password/company/submit', [ForgetPasswordController::class,'company_reset_password_submit'])->name('company_reset_password_submit');

/* Company Middleware*/
Route::middleware(['company:company'])->group(function(){
    Route::get('/company/home', [CompanyController::class,'index'])->name('company_home');    
    Route::get('/company/make-payment', [CompanyController::class,'make_payment'])->name('company_make_payment');    
    Route::get('/company/orders', [CompanyController::class,'orders'])->name('company_orders');    

    Route::post('/company/paypal/payment', [CompanyController::class, 'paypal'])->name('company_paypal');
    Route::get('/company/paypal/success', [CompanyController::class, 'paypal_success'])->name('company_paypal_success');
    Route::get('/company/paypal/cancel', [CompanyController::class, 'paypal_cancel'])->name('company_paypal_cancel');

    Route::get('/company/edit-profile', [CompanyController::class,'edit_profile'])->name('company_edit_profile');    
    Route::post('/company/edit-profile/update', [CompanyController::class,'edit_profile_update'])->name('company_edit_profile_update');    

    Route::get('/company/photo', [CompanyController::class,'photo'])->name('company_photo');    
    Route::post('/company/photo/submit', [CompanyController::class,'photo_submit'])->name('company_photo_submit');    
    Route::get('/company/photo/delete/{id}', [CompanyController::class,'photo_delete'])->name('company_photo_delete');    

    Route::get('/company/jobs', [CompanyController::class,'jobs'])->name('company_job');    
    Route::get('/company/jobs/status/{id}', [CompanyController::class,'update_status'])->name('company_job_status');    
    Route::get('/company/view-cv/{id}', [CompanyController::class,'view_cv'])->name('company_view_cv');    
    Route::post('company/change-job-status/{id}', [CompanyController::class, 'changeJobStatus'])->name('change-job-status');
    Route::get('/company/candidate-list/{id}', [CompanyController::class,'candidate_list'])->name('company_candidate_list');    

    Route::get('/company/create-job', [CompanyController::class,'job_create'])->name('company_job_create');    
    Route::get('/company/job-list', [CompanyController::class,'job_list'])->name('company_job_list');    
    Route::post('/company/create-job-submit', [CompanyController::class,'job_create_submit'])->name('company_job_create_submit');    
    Route::get('/company/edit-job/{id}', [CompanyController::class,'job_edit'])->name('company_job_edit');    
    Route::post('/company/edit-job/update/{id}', [CompanyController::class,'job_edit_update'])->name('company_job_edit_update');    
    Route::get('/company/job-delete/{id}', [CompanyController::class,'job_delete'])->name('company_job_delete');    

});
/* End  Company */

/* Candidate */
Route::post('candidate_signup_submit', [SignupController::class, 'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('candidate_signup_verify/{token}/{email}', [SignupController::class, 'candidate_signup_verify'])->name('candidate_signup_verify');
Route::post('candidate_login_submit', [LoginController::class, 'candidate_login_submit'])->name('candidate_login_submit');
Route::get('/candidate/logout', [LoginController::class,'candidate_logout'])->name('candidate_logout');    

Route::get('forget-password/candidate', [ForgetPasswordController::class, 'candidate_forget_password'])->name('candidate_forget_password');
Route::post('forget-password/candidate/submit', [ForgetPasswordController::class, 'candidate_forget_password_submit'])->name('candidate_forget_password_submit');
Route::get('reset-password/candidate/{token}/{email}', [ForgetPasswordController::class,'candidate_reset_password'])->name('candidate_reset_password');
Route::post('reset-password/candidate/submit', [ForgetPasswordController::class,'candidate_reset_password_submit'])->name('candidate_reset_password_submit');
/* Candidate Middleware*/
Route::middleware(['candidate:candidate'])->group(function(){
    Route::get('/candidate/home', [CandidateController::class,'index'])->name('candidate_home');    
    Route::get('/candidate/edit-profile', [CandidateController::class,'edit_profile'])->name('candidate_edit_profile');    
    Route::get('/candidate/change_password', [CandidateController::class,'change_password'])->name('candidate_change_password');    
    Route::post('/candidate/change-password-submit', [CandidateController::class,'change_password_submit'])->name('candidate_change_password_submit');    
    Route::post('/candidate/edit-profile/update', [CandidateController::class,'edit_profile_update'])->name('candidate_edit_profile_update');    
    Route::post('/candidate/edit-profile/update-cv', [CandidateController::class,'update_cv'])->name('candidate_update_cv');    

    Route::get('/candidate/bookmark-add/{id}', [CandidateController::class,'bookmark_add'])->name('candidate_bookmark_add');    
    Route::get('/candidate/my-job', [CandidateController::class,'my_job'])->name('my_job');    
    Route::get('/candidate/bookmark-delete/{id}', [CandidateController::class,'bookmark_delete'])->name('candidate_bookmark_delete');    
    Route::post('/candidate/apply-job/{id}', [CandidateController::class,'apply_job'])->name('candidate_apply_job');    


});
/* End Candidate */


/* Admin */
Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin_login');
Route::get('/admin/logout', [AdminLoginController::class,'logout'])->name('admin_logout');
Route::post('/admin/login-submit', [AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/forget-password', [AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class,'reset_password_submit'])->name('admin_reset_password_submit');

/* Admin Middleware*/
Route::middleware(['admin:admin'])->group(function(){
    Route::get('/admin/home', [AdminHomeController::class,'index'])->name('admin_home');    
    Route::get('/admin/company', [AdminHomeController::class,'company'])->name('admin_company');    
    Route::get('/admin/company/status/{id}', [AdminHomeController::class,'company_status'])->name('admin_company_status');    
    Route::get('/admin/candidate', [AdminHomeController::class,'candidate'])->name('admin_candidate');    
    Route::get('/admin/candidate/status/{id}', [AdminHomeController::class,'candidate_status'])->name('admin_candidate_status');    
    Route::get('/admin/job-manager', [AdminHomeController::class,'job'])->name('admin_job_manager');    
    Route::get('/admin/job-manager/status/{id}', [AdminHomeController::class,'job_status'])->name('admin_job_manager_status');    

    
    Route::get('/admin/edit-profile', [AdminProfileController::class,'index'])->name('admin_profile');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class,'profile_submit'])->name('admin_profile_submit');
   
    Route::get('/admin/home-page', [AdminHomePageController::class,'index'])->name('admin_home_page');
    Route::post('/admin/home-page/update', [AdminHomePageController::class,'update'])->name('admin_home_page_update');

    Route::get('/admin/faq-page', [AdminFaqPageController::class,'index'])->name('admin_faq_page');
    Route::post('/admin/faq-page/update', [AdminFaqPageController::class,'update'])->name('admin_faq_page_update');

    Route::get('/admin/blog-page', [AdminBlogPageController::class,'index'])->name('admin_blog_page');
    Route::post('/admin/blog-page/update', [AdminBlogPageController::class,'update'])->name('admin_blog_page_update');
    
    Route::get('/admin/term-page', [AdminTermPageController::class,'index'])->name('admin_term_page');
    Route::post('/admin/term-page/update', [AdminTermPageController::class,'update'])->name('admin_term_page_update');

    Route::get('/admin/privacy-page', [AdminPrivacyPageController::class,'index'])->name('admin_privacy_page');
    Route::post('/admin/privacy-page/update', [AdminPrivacyPageController::class,'update'])->name('admin_privacy_page_update');

    Route::get('/admin/contact-page', [AdminContactPageController::class,'index'])->name('admin_contact_page');
    Route::post('/admin/contact-page/update', [AdminContactPageController::class,'update'])->name('admin_contact_page_update');

    Route::get('/admin/pricing-page', [AdminPricingPageController::class,'index'])->name('admin_pricing_page');
    Route::post('/admin/pricing-page/update', [AdminPricingPageController::class,'update'])->name('admin_pricing_page_update');

    Route::get('/admin/other-page', [AdminOtherPageController::class,'index'])->name('admin_other_page');
    Route::post('/admin/other-page/update', [AdminOtherPageController::class,'update'])->name('admin_other_page_update');

    Route::get('/admin/job-category/view', [AdminJobCategoryController::class,'index'])->name('admin_job_category');    
    Route::get('/admin/job-category/create', [AdminJobCategoryController::class,'create'])->name('admin_job_category_create');    
    Route::post('/admin/job-category/store', [AdminJobCategoryController::class,'store'])->name('admin_job_category_store');    
    Route::get('/admin/job-category/edit/{id}', [AdminJobCategoryController::class,'edit'])->name('admin_job_category_edit');    
    Route::post('/admin/job-category/update/{id}', [AdminJobCategoryController::class,'update'])->name('admin_job_category_update');    
    Route::get('/admin/job-category/delete/{id}', [AdminJobCategoryController::class,'delete'])->name('admin_job_category_delete');    

    Route::get('/admin/job-location/view', [AdminJobLocationController::class,'index'])->name('admin_job_location');    
    Route::get('/admin/job-location/create', [AdminJobLocationController::class,'create'])->name('admin_job_location_create');    
    Route::post('/admin/job-location/store', [AdminJobLocationController::class,'store'])->name('admin_job_location_store');    
    Route::get('/admin/job-location/edit/{id}', [AdminJobLocationController::class,'edit'])->name('admin_job_location_edit');    
    Route::post('/admin/job-location/update/{id}', [AdminJobLocationController::class,'update'])->name('admin_job_location_update');    
    Route::get('/admin/job-location/delete/{id}', [AdminJobLocationController::class,'delete'])->name('admin_job_location_delete');    
    
    Route::get('/admin/job-experience/view', [AdminJobExperienceController::class,'index'])->name('admin_job_experience');    
    Route::get('/admin/job-experience/create', [AdminJobExperienceController::class,'create'])->name('admin_job_experience_create');    
    Route::post('/admin/job-experience/store', [AdminJobExperienceController::class,'store'])->name('admin_job_experience_store');    
    Route::get('/admin/job-experience/edit/{id}', [AdminJobExperienceController::class,'edit'])->name('admin_job_experience_edit');    
    Route::post('/admin/job-experience/update/{id}', [AdminJobExperienceController::class,'update'])->name('admin_job_experience_update');    
    Route::get('/admin/job-experience/delete/{id}', [AdminJobExperienceController::class,'delete'])->name('admin_job_experience_delete');    
    
    Route::get('/admin/job-type/view', [AdminJobTypeController::class,'index'])->name('admin_job_type');    
    Route::get('/admin/job-type/create', [AdminJobTypeController::class,'create'])->name('admin_job_type_create');    
    Route::post('/admin/job-type/store', [AdminJobTypeController::class,'store'])->name('admin_job_type_store');    
    Route::get('/admin/job-type/edit/{id}', [AdminJobTypeController::class,'edit'])->name('admin_job_type_edit');    
    Route::post('/admin/job-type/update/{id}', [AdminJobTypeController::class,'update'])->name('admin_job_type_update');    
    Route::get('/admin/job-type/delete/{id}', [AdminJobTypeController::class,'delete'])->name('admin_job_type_delete');    
    
    Route::get('/admin/job-gender/view', [AdminJobGenderController::class,'index'])->name('admin_job_gender');    
    Route::get('/admin/job-gender/create', [AdminJobGenderController::class,'create'])->name('admin_job_gender_create');    
    Route::post('/admin/job-gender/store', [AdminJobGenderController::class,'store'])->name('admin_job_gender_store');    
    Route::get('/admin/job-gender/edit/{id}', [AdminJobGenderController::class,'edit'])->name('admin_job_gender_edit');    
    Route::post('/admin/job-gender/update/{id}', [AdminJobGenderController::class,'update'])->name('admin_job_gender_update');    
    Route::get('/admin/job-gender/delete/{id}', [AdminJobGenderController::class,'delete'])->name('admin_job_gender_delete');    
    
    Route::get('/admin/job-salary/view', [AdminJobSalaryController::class,'index'])->name('admin_job_salary');    
    Route::get('/admin/job-salary/create', [AdminJobSalaryController::class,'create'])->name('admin_job_salary_create');    
    Route::post('/admin/job-salary/store', [AdminJobSalaryController::class,'store'])->name('admin_job_salary_store');    
    Route::get('/admin/job-salary/edit/{id}', [AdminJobSalaryController::class,'edit'])->name('admin_job_salary_edit');    
    Route::post('/admin/job-salary/update/{id}', [AdminJobSalaryController::class,'update'])->name('admin_job_salary_update');    
    Route::get('/admin/job-salary/delete/{id}', [AdminJobSalaryController::class,'delete'])->name('admin_job_salary_delete');    

    Route::get('/admin/job-nature/view', [AdminJobExperienceController::class,'nature'])->name('admin_job_nature');    
    Route::get('/admin/job-nature/create', [AdminJobExperienceController::class,'nature_create'])->name('admin_job_nature_create');    
    Route::post('/admin/job-nature/store', [AdminJobExperienceController::class,'nature_store'])->name('admin_job_nature_store');    
    Route::get('/admin/job-nature/edit/{id}', [AdminJobExperienceController::class,'nature_edit'])->name('admin_job_nature_edit');    
    Route::post('/admin/job-nature/update/{id}', [AdminJobExperienceController::class,'nature_update'])->name('admin_job_nature_update');    
    Route::get('/admin/job-nature/delete/{id}', [AdminJobExperienceController::class,'nature_delete'])->name('admin_job_nature_delete');    
   
    Route::get('/admin/job-level/view', [AdminJobExperienceController::class,'level'])->name('admin_job_level');    
    Route::get('/admin/job-level/create', [AdminJobExperienceController::class,'level_create'])->name('admin_job_level_create');    
    Route::post('/admin/job-level/store', [AdminJobExperienceController::class,'level_store'])->name('admin_job_level_store');    
    Route::get('/admin/job-level/edit/{id}', [AdminJobExperienceController::class,'level_edit'])->name('admin_job_level_edit');    
    Route::post('/admin/job-level/update/{id}', [AdminJobExperienceController::class,'level_update'])->name('admin_job_level_update');    
    Route::get('/admin/job-level/delete/{id}', [AdminJobExperienceController::class,'level_delete'])->name('admin_job_level_delete');    

    Route::get('/admin/company-location/view', [AdminCompanyLocationController::class,'index'])->name('admin_company_location');    
    Route::get('/admin/company-location/create', [AdminCompanyLocationController::class,'create'])->name('admin_company_location_create');    
    Route::post('/admin/company-location/store', [AdminCompanyLocationController::class,'store'])->name('admin_company_location_store');    
    Route::get('/admin/company-location/edit/{id}', [AdminCompanyLocationController::class,'edit'])->name('admin_company_location_edit');    
    Route::post('/admin/company-location/update/{id}', [AdminCompanyLocationController::class,'update'])->name('admin_company_location_update');    
    Route::get('/admin/company-location/delete/{id}', [AdminCompanyLocationController::class,'delete'])->name('admin_company_location_delete');    
    
    Route::get('/admin/company-industry/view', [AdminCompanyIndustryController::class,'index'])->name('admin_company_industry');    
    Route::get('/admin/company-industry/create', [AdminCompanyIndustryController::class,'create'])->name('admin_company_industry_create');    
    Route::post('/admin/company-industry/store', [AdminCompanyIndustryController::class,'store'])->name('admin_company_industry_store');    
    Route::get('/admin/company-industry/edit/{id}', [AdminCompanyIndustryController::class,'edit'])->name('admin_company_industry_edit');    
    Route::post('/admin/company-industry/update/{id}', [AdminCompanyIndustryController::class,'update'])->name('admin_company_industry_update');    
    Route::get('/admin/company-industry/delete/{id}', [AdminCompanyIndustryController::class,'delete'])->name('admin_company_industry_delete');    

    Route::get('/admin/company-size/view', [AdminCompanySizeController::class,'index'])->name('admin_company_size');    
    Route::get('/admin/company-size/create', [AdminCompanySizeController::class,'create'])->name('admin_company_size_create');    
    Route::post('/admin/company-size/store', [AdminCompanySizeController::class,'store'])->name('admin_company_size_store');    
    Route::get('/admin/company-size/edit/{id}', [AdminCompanySizeController::class,'edit'])->name('admin_company_size_edit');    
    Route::post('/admin/company-size/update/{id}', [AdminCompanySizeController::class,'update'])->name('admin_company_size_update');    
    Route::get('/admin/company-size/delete/{id}', [AdminCompanySizeController::class,'delete'])->name('admin_company_size_delete');    

    Route::get('/admin/why-choose/view', [AdminWhyChooseController::class,'index'])->name('admin_why_choose_item');    
    Route::get('/admin/why-choose/create', [AdminWhyChooseController::class,'create'])->name('admin_why_choose_item_create');    
    Route::post('/admin/why-choose/store', [AdminWhyChooseController::class,'store'])->name('admin_why_choose_item_store');    
    Route::get('/admin/why-choose/edit/{id}', [AdminWhyChooseController::class,'edit'])->name('admin_why_choose_item_edit');    
    Route::post('/admin/why-choose/update/{id}', [AdminWhyChooseController::class,'update'])->name('admin_why_choose_item_update');    
    Route::get('/admin/why-choose/delete/{id}', [AdminWhyChooseController::class,'delete'])->name('admin_why_choose_item_delete');    

    Route::get('/admin/post/view', [AdminPostController::class,'index'])->name('admin_post');    
    Route::get('/admin/post/create', [AdminPostController::class,'create'])->name('admin_post_create');    
    Route::post('/admin/post/store', [AdminPostController::class,'store'])->name('admin_post_store');    
    Route::get('/admin/post/edit/{id}', [AdminPostController::class,'edit'])->name('admin_post_edit');    
    Route::post('/admin/post/update/{id}', [AdminPostController::class,'update'])->name('admin_post_update');    
    Route::get('/admin/post/delete/{id}', [AdminPostController::class,'delete'])->name('admin_post_delete');    

    Route::get('/admin/faq/view', [AdminFaqController::class,'index'])->name('admin_faq');    
    Route::get('/admin/faq/create', [AdminFaqController::class,'create'])->name('admin_faq_create');    
    Route::post('/admin/faq/store', [AdminFaqController::class,'store'])->name('admin_faq_store');    
    Route::get('/admin/faq/edit/{id}', [AdminFaqController::class,'edit'])->name('admin_faq_edit');    
    Route::post('/admin/faq/update/{id}', [AdminFaqController::class,'update'])->name('admin_faq_update');    
    Route::get('/admin/faq/delete/{id}', [AdminFaqController::class,'delete'])->name('admin_faq_delete');    

    Route::get('/admin/package/view', [AdminPackageController::class,'index'])->name('admin_package');    
    Route::get('/admin/package/create', [AdminPackageController::class,'create'])->name('admin_package_create');    
    Route::post('/admin/package/store', [AdminPackageController::class,'store'])->name('admin_package_store');    
    Route::get('/admin/package/edit/{id}', [AdminPackageController::class,'edit'])->name('admin_package_edit');    
    Route::post('/admin/package/update/{id}', [AdminPackageController::class,'update'])->name('admin_package_update');    
    Route::get('/admin/package/delete/{id}', [AdminPackageController::class,'delete'])->name('admin_package_delete');    
  
});
/* End Admin */


