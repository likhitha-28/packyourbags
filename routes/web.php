<?php

use App\Models\Hotel\HotelApproved;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Hotel\HotelActions;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Hotel\HotelImageController;
use App\Http\Controllers\Hotel\HotelReserveController;
use App\Http\Controllers\Home\HomeRedirectionController;
use App\Http\Controllers\Admin\HotelApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/live-search', [WelcomeController::class, 'liveSearch'])->name('live.search');
Route::get('/search-result',[WelcomeController::class, 'searchResult']);
Route::get('/booking-page/{name}',[WelcomeController::class, 'bookingPage']);
Route::post('/filter-hotels', [FilterController::class, 'filterHotels'])->name('filter.hotels');
Route::get('/check-availability', [BookingController::class, 'checkAvailabilityFrom']);
Route::post('/book-now', [BookingController::class, 'bookNow'])->middleware('attach.userdata');
Route::get('/my-bookings', [BookingController::class, 'showMyBookings'])->name('my-bookings');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function () {
    // Your authenticated routes or views
});


//admin routes add middleware
Route::get('/admin',[AdminController::class, 'showCorrectHomepage']);
Route::post('/admin/register',[AdminController::class, 'register']);
Route::post('/admin/login',[AdminController::class, 'login']);
Route::post('/admin/logout',[AdminController::class, 'logout']);


Route::middleware('admin')->group(function () {

});
//pending hotels
Route::get('/hotel-list-pending',[HotelApplicationController::class, 'viewApplications']);
///hotel-list-pending

//home routes before login

Route::get('/hotel-application', [HomeRedirectionController::class, 'showHotelregistration']);

Route::post('/send-app', [HotelController::class, 'storeApplication']);

Route::get('/fill_form', [HomeRedirectionController::class, 'fillForm']);



Route::get('/hotel',[HotelController::class, 'showCorrectHomepage']);
Route::post('/hotel/register',[HotelController::class, 'register']);
Route::post('/hotel/login',[HotelController::class, 'login']);
Route::post('/hotel/logout',[HotelController::class, 'logout']);

Route::get('/movedata',[AdminController::class, 'moveData']);
Route::get('/individual-page/{id}',[HotelApplicationController::class, 'individualPage']);


Route::post('/accept-hotel/{id}', [HotelApplicationController::class, 'acceptHotel'])->name('acceptHotel');
Route::post('/reject-hotel/{id}', [HotelApplicationController::class, 'dontAddHotel'])->name('rejectHotel');
Route::get('/accepte-hotel', [HotelApplicationController::class, 'loginDetalis']); 

Route::get('/accepted-hotels',[HotelApplicationController::class, 'viewAccepted']);
Route::get('/accepted-hotels-edit',[HotelApplicationController::class, 'editAccepted']);


Route::get('/create-credentials/{id}', [HotelApplicationController::class, 'showCreateCredentialsForm']);
Route::post('/send-details/{id}', [HotelApplicationController::class, 'sendDetails'])->name('sendDetails');
Route::get('/delete-hotel/{id}', [HotelApplicationController::class, 'deleteHotel']);


Route::post('/add-user', [HotelApplicationController::class, 'createUser']); 
Route::get('/add-info', [HotelApplicationController::class, 'addInfo']);
//view-reservations 
Route::get('/view-reservations', [HotelReserveController::class, 'viewReservations']);
Route::get('/view_hotel/{hotel_approved_id}', [HotelReserveController::class, 'viewHotelDetatils'])->name('view_hotel');
Route::get('/edit_hotel/{hotel_approved_id}', [HotelActions::class, 'editView']);


//Route::get('add_images_page', [HotelActions::class, 'addImagesPage']);

Route::post('/store-images', [HotelActions::class, 'store']);
Route::post('/save-images', [HotelActions::class, 'saveImages'])->name('save.images');

Route::put('edit-hotel/{hotel}', [HotelActions::class, 'editTask']);
//fullcalender
Route::get('/get-available-dates', [HomeRedirectionController::class, 'availableDates']);
Route::get('/about-us', [HomeRedirectionController::class, 'aboutUs']);



Route::get('addImages', [HotelImageController::class, 'create'])->name('hotelImages.create');
Route::post('storeImages', [HotelImageController::class, 'store'])->name('hotelImages.store');


Route::get('/review', [ReviewController::class, 'showReviewForm'])->middleware('auth');
Route::post('/submit-review', [ReviewController::class, 'submitReview'])->middleware('auth');
Route::post('/view-availability-cal', [CalendarController::class, 'checkAvailability']);
Route::get('/my-reviews', [ReviewController::class, 'showMyReviews'])->name('my-reviews');



//stripe test routes

Route::get('/stripe', [StripeController::class, 'index'])->name('index');
Route::post('/checkout', [StripeController::class, 'checkout']);
Route::get('/success', [StripeController::class, 'success'])->name('success');








Route::get('/edit-hotel/{id}', [HotelApplicationController::class, 'editHotel']);

Route::get('/add_hotel', [HotelApplicationController::class, 'addHotel']);
Route::post('/add-hotel', [HotelApplicationController::class, 'addHotelInDB']);

Route::delete('/delete-booking/{booking}', [BookingController::class, 'delete']);


Route::post('/accept-booking/{id}', [BookingController::class, 'acceptBooking'])->name('acceptBooking');
Route::post('/reject-boooking/{id}', [BookingController::class, 'dontAccept'])->name('rejectBooking');

//confirmed-reservations
Route::get('/confirmed-reservations', [HotelReserveController::class, 'confirmedReservations']);


