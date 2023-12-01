<?php

use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\FocusProductsController as AdminFocusProductsController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\FocusProductsController;
use App\Http\Controllers\frontend\HomeController;

//ADMIN ROUTE
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/get-session-data', [AdminAuthController::class, 'get_session_data'])->name('get_session_data');

    //PROFILE ROUTE
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/update-profile', [ProfileController::class, 'update_profile'])->name('update_profile');
    Route::post('/update-password', [ProfileController::class, 'update_password'])->name('update_password');

    //HOME ROUTE
    Route::get('/home', [AdminHomeController::class, 'home'])->name('home');
    Route::post('/update-home', [AdminHomeController::class, 'update_home'])->name('update_home');
    Route::get('/delect-banner-image/{id}', [AdminHomeController::class, 'delect_banner_image'])->name('delect_banner_image');
    Route::get('/delect-about-image/{id}', [AdminHomeController::class, 'delect_about_image'])->name('delect_about_image');

    //COMPANY ROUTE
    Route::get('/company', [AdminAboutController::class, 'company'])->name('company');
    Route::post('/update-company', [AdminAboutController::class, 'update_company'])->name('update_company');
    Route::get('/delect-company-image/{id}', [AdminAboutController::class, 'delect_company_image'])->name('delect_company_image');

    //TESTIMONIAL ROUTE
    Route::get('/testimonial-list', [AdminAboutController::class, 'testimonial_list'])->name('testimonial_list');
    Route::get('/add-testimonial', [AdminAboutController::class, 'add_testimonial'])->name('add_testimonial');
    Route::post('/add-testimonial-action', [AdminAboutController::class, 'add_testimonial_action'])->name('add_testimonial_action');
    Route::get('/edit-testimonial/{id}', [AdminAboutController::class, 'edit_testimonial'])->name('edit_testimonial');
    Route::post('/edit-testimonial-action/{id}', [AdminAboutController::class, 'edit_testimonial_action'])->name('edit_testimonial_action');
    Route::get('/delete-testimonial/{id}', [AdminAboutController::class, 'delete_testimonial'])->name('delete_testimonial');
    Route::get('/testimonial-status/{id}', [AdminAboutController::class, 'testimonial_status'])->name('testimonial_status');
    Route::get('/delete-testimonial-image/{id}', [AdminAboutController::class, 'delect_testimonial_image'])->name('delect_testimonial_image');

    //SERVICE ROUTE
    Route::get('/service-list', [AdminServiceController::class, 'service_list'])->name('service_list');
    Route::get('/add-service', [AdminServiceController::class, 'add_service'])->name('add_service');
    Route::post('/add-service-action', [AdminServiceController::class, 'add_service_action'])->name('add_service_action');
    Route::get('/edit-service/{id}', [AdminServiceController::class, 'edit_service'])->name('edit_service');
    Route::post('/edit-service-action/{id}', [AdminServiceController::class, 'edit_service_action'])->name('edit_service_action');
    Route::get('/delete-service/{id}', [AdminServiceController::class, 'delete_service'])->name('delete_service');
    Route::get('/service-status/{id}', [AdminServiceController::class, 'service_status'])->name('service_status');
    Route::get('/show-home-page/{id}', [AdminServiceController::class, 'show_home_page'])->name('show_home_page');
    Route::get('/delete-service-image/{id}', [AdminServiceController::class, 'delect_service_image'])->name('delect_service_image');
    Route::get('/delete-service-map/{id}', [AdminServiceController::class, 'delect_service_map'])->name('delect_service_map');

    //PRICE CATEGORY ROUTE
    Route::get('/price-category-list', [AdminServiceController::class, 'price_category_list'])->name('price_category_list');
    Route::get('/add-price-category', [AdminServiceController::class, 'add_price_category'])->name('add_price_category');
    Route::post('/add-price-category-action', [AdminServiceController::class, 'add_price_category_action'])->name('add_price_category_action');
    Route::get('/edit-price-category/{id}', [AdminServiceController::class, 'edit_price_category'])->name('edit_price_category');
    Route::post('/edit-price-category-action/{id}', [AdminServiceController::class, 'edit_price_category_action'])->name('edit_price_category_action');
    Route::get('/delete-price-category/{id}', [AdminServiceController::class, 'delete_price_category'])->name('delete_price_category');

    //PRICE ROUTE
    Route::get('/price-list', [AdminServiceController::class, 'price_list'])->name('price_list');
    Route::get('/add-price', [AdminServiceController::class, 'add_price'])->name('add_price');
    Route::post('/add-price-action', [AdminServiceController::class, 'add_price_action'])->name('add_price_action');
    Route::get('/edit-price/{id}', [AdminServiceController::class, 'edit_price'])->name('edit_price');
    Route::post('/edit-price-action/{id}', [AdminServiceController::class, 'edit_price_action'])->name('edit_price_action');
    Route::get('/delete-price/{id}', [AdminServiceController::class, 'delete_price'])->name('delete_price');

    //RELATION ROUTE
    Route::get('/relation-list', [AdminServiceController::class, 'relation_list'])->name('relation_list');
    Route::get('/add-relation', [AdminServiceController::class, 'add_relation'])->name('add_relation');
    Route::post('/add-relation-action', [AdminServiceController::class, 'add_relation_action'])->name('add_relation_action');
    Route::get('/edit-relation/{id}', [AdminServiceController::class, 'edit_relation'])->name('edit_relation');
    Route::post('/edit-relation-action/{id}', [AdminServiceController::class, 'edit_relation_action'])->name('edit_relation_action');
    Route::get('/delete-relation/{id}', [AdminServiceController::class, 'delete_relation'])->name('delete_relation');

    //PRODUCTS ROUTE
    Route::get('/product-list', [AdminFocusProductsController::class, 'product_list'])->name('product_list');
    Route::get('/add-product', [AdminFocusProductsController::class, 'add_product'])->name('add_product');
    Route::post('/add-product-action', [AdminFocusProductsController::class, 'add_product_action'])->name('add_product_action');
    Route::get('/edit-product/{id}', [AdminFocusProductsController::class, 'edit_product'])->name('edit_product');
    Route::post('/edit-product-action/{id}', [AdminFocusProductsController::class, 'edit_product_action'])->name('edit_product_action');
    Route::get('/delete-product/{id}', [AdminFocusProductsController::class, 'delete_product'])->name('delete_product');
    Route::get('/product-status/{id}', [AdminFocusProductsController::class, 'product_status'])->name('product_status');
    Route::get('/delete-product-image/{id}', [AdminFocusProductsController::class, 'delect_product_image'])->name('delect_product_image');

    //PRODUCT SEO ROUTE
    Route::get('/edit-product-seo', [AdminFocusProductsController::class, 'edit_product_seo'])->name('edit_product_seo');
    Route::post('/edit-product-seo-action', [AdminFocusProductsController::class, 'edit_product_seo_action'])->name('edit_product_seo_action');

    //CATEGORY ROUTE
    Route::get('/category-list', [AdminFocusProductsController::class, 'category_list'])->name('category_list');
    Route::get('/add-category', [AdminFocusProductsController::class, 'add_category'])->name('add_category');
    Route::post('/add-category-action', [AdminFocusProductsController::class, 'add_category_action'])->name('add_category_action');
    Route::get('/edit-category/{id}', [AdminFocusProductsController::class, 'edit_category'])->name('edit_category');
    Route::post('/edit-category-action/{id}', [AdminFocusProductsController::class, 'edit_category_action'])->name('edit_category_action');
    Route::get('/delete-category-action/{id}', [AdminFocusProductsController::class, 'delete_category_action'])->name('delete_category_action');
    Route::get('/update-category-status/{id}', [AdminFocusProductsController::class, 'update_category_status'])->name('update_category_status');

    //BLOG ROUTE
    Route::get('/blog-list', [AdminBlogController::class, 'blog_list'])->name('blog_list');
    Route::get('/add-blog', [AdminBlogController::class, 'add_blog'])->name('add_blog');
    Route::post('/add-blog-action', [AdminBlogController::class, 'add_blog_action'])->name('add_blog_action');
    Route::get('/edit-blog/{id}', [AdminBlogController::class, 'edit_blog'])->name('edit_blog');
    Route::post('/edit-blog-action/{id}', [AdminBlogController::class, 'edit_blog_action'])->name('edit_blog_action');
    Route::get('/delete-blog-action/{id}', [AdminBlogController::class, 'delete_blog_action'])->name('delete_blog_action');
    Route::get('/update-blog-status/{id}', [AdminBlogController::class, 'update_blog_status'])->name('update_blog_status');

    //BLOG SEO ROUTE
    Route::get('/edit-blog-seo', [AdminBlogController::class, 'edit_blog_seo'])->name('edit_blog_seo');
    Route::post('/edit-blog-seo-action', [AdminBlogController::class, 'edit_blog_seo_action'])->name('edit_blog_seo_action');

    //CONTACT ROUTE
    Route::get('/contact-page', [AdminContactController::class, 'contact_page'])->name('contact_page');
    Route::post('/edit-contact-page-action', [AdminContactController::class, 'edit_contact_page_action'])->name('edit_contact_page_action');

    //SETTING ROUTE
    Route::get('/edit-setting', [SettingController::class, 'edit_setting'])->name('edit_setting');
    Route::post('/edit-setting-action', [SettingController::class, 'edit_setting_action'])->name('edit_setting_action');
    Route::get('/delete-header-image', [SettingController::class, 'delect_header_image'])->name('delect_header_image');
    Route::get('/delete-footer-image', [SettingController::class, 'delect_footer_image'])->name('delect_footer_image');

});

//FRONTEND ROUTE
    //NEWSLETTER ROUTE
    Route::get('/newsletter-list', [AdminContactController::class, 'newsletter_list'])->name('newsletter_list');
    Route::post('/add-newsletter', [AdminContactController::class, 'add_newsletter'])->name('add_newsletter');
    Route::post('/newsletter-action', [AdminContactController::class, 'submit_newsletter'])->name('submit_newsletter');
    Route::post('/filter-attendance', [AdminContactController::class, 'filter_attendance'])->name('filter_attendance');
//ADMIN LOGIN ROUTE
Route::get('/admin/login', [AdminAuthController::class, 'admin_login'])->name('login');
Route::post('/admin-login-action', [AdminAuthController::class, 'admin_login_action'])->name('admin.login.action');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about-us', [AboutController::class, 'about_us'])->name('about_us');
Route::get('/service-details/{slug}', [HomeController::class, 'service_details'])->name('service_details');
Route::get('/products', [FocusProductsController::class, 'products'])->name('products');
Route::get('/product-details/{slug}', [FocusProductsController::class, 'product_details'])->name('product_details');
Route::get('/category/{id}', [FocusProductsController::class, 'product_cat'])->name('product_cat');
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('/blog-details/{slug}', [BlogController::class, 'blog_details'])->name('blog_details');
Route::get('/contact-us', [ContactController::class, 'contact_us'])->name('contact_us');
Route::post('/contact-form-action', [ContactController::class, 'contact_form_action'])->name('contact_form_action');
Route::post('/service-enquiry-form-action', [ContactController::class, 'service_enquiry_form_action'])->name('service_enquiry_form_action');
Route::post('/product-enquiry-form-action', [ContactController::class, 'product_enquiry_form_action'])->name('product_enquiry_form_action');
Route::get('/get-map', [ContactController::class, 'get_map'])->name('get_map');
