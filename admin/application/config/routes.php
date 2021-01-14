<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['admin'] = 'admin/auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'admin/dashboard';

// Admin Locations
$route['location/country/add'] = 'admin/location/country_add';
$route['location/country/edit/(:num)'] = 'admin/location/country_edit/$1';
$route['location/country/del/(:num)'] = 'admin/location/country_del/$1';
$route['location/state/add'] = 'admin/location/state_add';
$route['location/state/edit/(:num)'] = 'admin/location/state_edit/$1';
$route['location/state/del/(:num)'] = 'admin/location/state_del/$1';
$route['location/city/add'] = 'admin/location/city_add';
$route['location/city/edit/(:num)'] = 'admin/location/city_edit/$1';
$route['location/city/del/(:num)'] = 'admin/location/city_del/$1';


//common

$route['imageupload'] = 'adminpanel/Category/Category/do_upload';
$route['multiimageupload'] = 'adminpanel/Category/Category/multido_upload';
$route['whitepaperupload'] = 'adminpanel/Category/Category/whitepaperupload';
// $route['whitepaperupload'] = 'adminpanel/Category/Category/whitepaperupload';

$route['broucherupload'] = 'adminpanel/Category/Category/broucherupload';
$route['galleryupload'] = 'adminpanel/Category/Category/Gallery_upload';
$route['authorupload'] = 'adminpanel/Category/Category/author_upload';
$route['studyupload'] = 'adminpanel/Category/Category/studyhub_upload';


$route['slugexistancycheck']='adminpanel/Category/Category/slugexistancycheck';
$route['slugexistancycheckid']='adminpanel/Category/Category/slugexistancycheckid';
$route['accreditations-add'] = 'adminpanel/Category/Category/accreditations';



// Category
$route['Category'] = 'adminpanel/Category/Category/categorylist';
$route['add-category'] = 'adminpanel/Category/Category/add';
$route['createcategory'] = 'adminpanel/Category/Category/AddCategory';
$route['addcategorysection'] = 'adminpanel/Category/Category/AddCategory_section';
$route['editcategory/(:num)'] = 'adminpanel/Category/Category/edit_Category/$1';

$route['editcategory/imageupload'] = 'adminpanel/Category/Category/do_upload';
$route['editcategory/updatecategory'] = 'adminpanel/Category/Category/update_Category';
$route['editcategory/updatecategorysection'] = 'adminpanel/Category/Category/update_Category_section';

$route['Category/enable-status/(:num)'] = 'adminpanel/Category/Category/enable_status/$1';
$route['Category/disable-status/(:num)'] = 'adminpanel/Category/Category/disable_status/$1';
$route['delete-category/(:num)'] = 'adminpanel/Category/Category/delete_category/$1';



//sub category
$route['subCategory'] = 'adminpanel/SubCategory/SubCategory/lists';
$route['add-subcategory'] = 'adminpanel/SubCategory/SubCategory/add';
$route['createsubcategory'] = 'adminpanel/SubCategory/SubCategory/AddCategory';
$route['addsubcategorysection'] = 'adminpanel/SubCategory/SubCategory/AddCategory_section';
$route['editsubcategory/(:num)'] = 'adminpanel/SubCategory/SubCategory/edit_Category/$1';
$route['Addsubcategoryscategory'] = 'adminpanel/SubCategory/SubCategory/addcategorycat';



$route['editsubcategory/updatesubcategory'] = 'adminpanel/SubCategory/SubCategory/update_Category';
$route['editsubcategory/updatesubcategorysection'] = 'adminpanel/SubCategory/SubCategory/update_Category_section';
$route['editsubcategory/updatesubcategoryscategory'] = 'adminpanel/SubCategory/SubCategory/update_Category_sub';


$route['subCategory/enable-status/(:num)'] = 'adminpanel/SubCategory/SubCategory/enable_status/$1';
$route['subCategory/disable-status/(:num)'] = 'adminpanel/SubCategory/SubCategory/disable_status/$1';




//Course Management


$route['add-course'] = 'adminpanel/Course/Course/add';
$route['Createcourse'] = 'adminpanel/Course/Course/AddCourse';
$route['addCoursesection'] = 'adminpanel/Course/Course/addCoursesection';
$route['edit-course/(:num)'] = 'adminpanel/Course/Course/edit_Course/$1';
$route['courses']='adminpanel/Course/Course/lists';
$route['addrealatedcourses'] = 'adminpanel/Course/Course/addrealatedcourses';
$route['add-coursecategory'] = 'adminpanel/Course/Course/addcoursecategory';
$route['add-Course-accreditations'] = 'adminpanel/Course/Course/addCourseaccreditations';
$route['courses/disable-status/(:num)'] = 'adminpanel/Course/Course/disable_status/$1';
$route['edit-course/updatecourse'] = 'adminpanel/Course/Course/updateCourse';
$route['edit-course/updateCoursesection'] = 'adminpanel/Course/Course/updateCoursesection';
$route['edit-course/updaterealatedcourses'] = 'adminpanel/Course/Course/updaterealatedcourses';
$route['edit-course/update-coursecategory'] = 'adminpanel/Course/Course/updatecoursecategory';
$route['edit-course/update-Course-accreditations'] = 'adminpanel/Course/Course/updateCourseaccreditations';



$route['coursefaq/(:num)'] = 'adminpanel/Course/Course_faq/CoursefaqManagement/$1';
$route['coursefaq/add'] = 'adminpanel/Course/Course_faq/addcoursefaqs';
$route['coursefaq/update'] = 'adminpanel/Course/Course_faq/updatecoursefaqs';
$route['coursefaq/get'] = 'adminpanel/Course/Course_faq/getcoursefaqsbyid';
$route['coursefaq/delete'] = 'adminpanel/Course/Course_faq/Deletecoursefaq';



$route['Brouchers/(:num)'] = 'adminpanel/Course/Course_faq/Manage_broucher/$1';



$route['coursebatch/(:num)'] = 'adminpanel/Course/Course_faq/CoursebatchManagement/$1';
$route['coursebatch/add'] = 'adminpanel/Course/Course_faq/addcoursebatch';
$route['coursebatch/update'] = 'adminpanel/Course/Course_faq/updatecoursebatch';
$route['coursebatch/get'] = 'adminpanel/Course/Course_faq/getcoursebatchbyid';
$route['coursebatch/delete'] = 'adminpanel/Course/Course_faq/deletecoursebatch';



$route['add-casestudy'] = 'adminpanel/Casestudy/Casestudy/add';
$route['Createcasestudy'] = 'adminpanel/Casestudy/Casestudy/AddCasestudy';
$route['updatecasestudy'] = 'adminpanel/Casestudy/Casestudy/updatecasestudy';
$route['edit-casestudy/(:num)'] = 'adminpanel/Casestudy/Casestudy/editcase/$1';
$route['delete-casestudy/(:num)'] = 'adminpanel/Casestudy/Casestudy/deletecase/$1';
 $route['Casestudy']='adminpanel/Casestudy/Casestudy/lists';
// $route['addrealatedcourses'] = 'adminpanel/Course/Course/addrealatedcourses';
// $route['add-coursecategory'] = 'adminpanel/Course/Course/addcoursecategory';
// $route['add-Course-accreditations'] = 'adminpanel/Course/Course/addCourseaccreditations';




//white papers

$route['whitepaper'] = 'adminpanel/Whitepaper/Whitepaper/lists';
$route['add-whitepaper'] = 'adminpanel/Whitepaper/Whitepaper/add_whitepaper';

$route['Createwhitepaper'] = 'adminpanel/Whitepaper/Whitepaper/Createwhitepaper';

$route['edit-whitepaper/(:num)'] = 'adminpanel/Whitepaper/Whitepaper/edit_whitepaper/$1';
$route['edit-whitepaper/updatewhitepaper'] = 'adminpanel/Whitepaper/Whitepaper/updatewhitepaper';

//testimonials
$route['Testimonials'] = 'adminpanel/Others/Others/Testimonials';
$route['Testimonials/add'] = 'adminpanel/Others/Others/add_testimonial';
$route['Testimonials/delete/(:num)'] = 'adminpanel/Others/Others/delete_testimonial/$1';
$route['Testimonials/update'] = 'adminpanel/Others/Others/update_testimonial';


$route['home-testimonials'] = 'adminpanel/Others/Others/home_testimonials';
$route['home-testimonials/add/(:num)'] = 'adminpanel/Others/Others/Home_testi_add/$1';
$route['home-testimonials/delete/(:num)'] = 'adminpanel/Others/Others/delete_home_testimonial/$1';


$route['corporate-testimonials'] = 'adminpanel/Others/Others/corporate_testimonials';
$route['corporate-testimonials/add/(:num)'] = 'adminpanel/Others/Others/corporate_testi_add/$1';
$route['corporate-testimonials/delete/(:num)'] = 'adminpanel/Others/Others/delete_corporate_testimonial/$1';

$route['course-testimonials'] = 'adminpanel/Others/Others/course_testimonials';
$route['course-testimonials/add/(:num)'] = 'adminpanel/Others/Others/course_testi_add/$1';
$route['course-testimonials/delete/(:num)'] = 'adminpanel/Others/Others/delete_course_testimonial/$1';

$route['Accreditations'] = 'adminpanel/Others/Others/Accreditations';


//gallery

$route['gallery'] = 'adminpanel/Others/Others/gallery';
$route['enquiry'] = 'adminpanel/Others/Others/all_enquries';
$route['enquiry-search'] = 'adminpanel/Others/Others/sort_enquries';


// studyhub
$route['authormanagement'] = 'adminpanel/Studyhub/Studyhub/Authormanagement';

$route['studyhub'] = 'adminpanel/Studyhub/Studyhub/studyhub_list';
$route['add-studyhub'] = 'adminpanel/Studyhub/Studyhub/Add_studyhub';
$route['add-studyhubsection'] = 'adminpanel/Studyhub/Studyhub/Addstudyhub_section';
$route['add-studyhubrelated'] = 'adminpanel/Studyhub/Studyhub/Addstudy_related';
$route['delete-studyhub/(:num)'] = 'adminpanel/Studyhub/Studyhub/delete_stydyhub/$1';


$route['add-studyhub'] = 'adminpanel/Studyhub/Studyhub/Add_studyhub';
$route['add-studyhubsection'] = 'adminpanel/Studyhub/Studyhub/Addstudyhub_section';
$route['add-studyhubrelated'] = 'adminpanel/Studyhub/Studyhub/Addstudy_related';

$route['edit-studyhub/(:num)'] = 'adminpanel/Studyhub/Studyhub/update_studyhub/$1';
$route['update-studyhubsection'] = 'adminpanel/Studyhub/Studyhub/updatestudyhub_section';
$route['update-studyhubrelated'] = 'adminpanel/Studyhub/Studyhub/updatestudy_related';

$route['studyhub-home'] = 'adminpanel/Studyhub/Studyhub/studyhub_home';
$route['studyhub-home-recent-add/(:num)'] = 'adminpanel/Studyhub/Studyhub/recent_studyhub_add/$1';
$route['studyhub-home-recomment-add/(:num)'] = 'adminpanel/Studyhub/Studyhub/recomment_studyhub_add/$1';
$route['studyhub-home-popular-add/(:num)'] = 'adminpanel/Studyhub/Studyhub/popular_studyhub_add/$1';

$route['studyhub-home-recent-delete/(:num)'] = 'adminpanel/Studyhub/Studyhub/recent_studyhub_delete/$1';
$route['studyhub-home-recomment-delete/(:num)'] = 'adminpanel/Studyhub/Studyhub/recomment_studyhub_delete/$1';
$route['studyhub-home-popular-delete/(:num)'] = 'adminpanel/Studyhub/Studyhub/popular_studyhub_delete/$1';




//home management


$route['home-upcoming'] = 'adminpanel/Homemanagement/Homemanagement/Home_Upcoming_management';
$route['home-upcoming/add/(:num)'] = 'adminpanel/Homemanagement/Homemanagement/Home_Upcoming_add/$1';
$route['home-upcoming/delete/(:num)'] = 'adminpanel/Homemanagement/Homemanagement/Home_Upcoming_delete/$1';


//menu management

$route['header-menu'] = 'adminpanel/Menumanagement/Header_menu/Header_menu_view';
$route['add-header-menu'] = 'adminpanel/Menumanagement/Header_menu/add_header_menu';
$route['update-category-order'] = 'adminpanel/Menumanagement/Header_menu/update_category_order';

$route['footer-menu'] = 'adminpanel/Menumanagement/Header_menu/Footer_menu_view';
$route['add-footer-menu'] = 'adminpanel/Menumanagement/Header_menu/add_footer_menu';





