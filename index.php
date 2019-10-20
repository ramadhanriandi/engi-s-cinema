<?php
    
/**
 * Router
 *
 * Main router for this project
 * 
 * php version 7.2.19
 *
 * @category   Router
 * @package    Router
 * @subpackage Index
 * @author     Riandi-Isa-Ivan <13517xxx@std.stei.itb.ac.id>
 * @license    gitlab.informatika.org/if3110-wbd-2019/tugas-besar-1-2019 IF3130
 * @link       gitlab.informatika.org/if3110-2019-01-k02-15/tugas-besar-1-2019
 */

$request = $_SERVER['REQUEST_URI'];

if ($request == '/' || $request == '' || $request == 'home') {
    include __DIR__ . '/templates/home.php';
} else if ($request == '/login' ) {
    include __DIR__ . '/templates/login.php';
} else if ($request == '/register' ) {
    include __DIR__ . '/templates/register.php';
} else if ($request == '/logout') {
    include __DIR__ . '/templates/logout.php';
} else if (preg_match('/^\/search\?+/', $request)) {
    include __DIR__ . '/templates/search.php';
} else if (preg_match('/^\/movie\?+/', $request)) {
    include __DIR__ . '/templates/detail.php';
} else if (preg_match('/^\/booking\?+/', $request)) {
    include __DIR__ . '/templates/book.php';
} else if ($request == '/history') {
    include __DIR__ . '/src/api/transaction/history.php';
    render(1);
} else if (preg_match('/^\/review\?+.*/', $request)) {
    include __DIR__ . '/templates/Review.php';
} else if (preg_match('/api\/./', $request)) {
    include __DIR__ . '/src/api/api_views.php';
    $args = explode('/', rtrim($request, '/')); 
    $args = array_slice($args, 2); 
    apiList($args);
} else {
    include __DIR__ . '/templates/404.php';
}