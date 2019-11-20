<?php
require_once("internal/settings/index.php");
require_once("internal/session/validate-session.php");

$heading = $modules->loadHeading();
$module = $modules->load();

if (!$module) {
    header("location: " . $modules->getModuleUrlByKey("TRANSACTIONS_REGISTER_DEBIT"));
    die;
}


ob_start("sanitize_output");
?>
<!DOCTYPE html>
<html lang="pt-br">

<!-- begin::Head -->
<head>
    <base href="<?= SERVER_ADDRESS; ?>">
    <meta charset="utf-8"/>
    <title>Samara&Leonardo | Gestão Financeira</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="assets/css/compiled/samaraleonardo.min.css">
    <link rel="manifest" href="/manifest.json?v=1.2">
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

<!-- begin::Page loader -->

<!-- end::Page Loader -->

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="index.php">
            <img alt="Logo" src="assets/media/logos/logo-2-sm.png"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more-1"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
                <div class="kt-header__top">
                    <div class="kt-container ">

                        <!-- begin:: Brand -->
                        <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
                            <div class="kt-header__brand-logo">
                                <a href="index.php">
                                    <img alt="Logo" src="assets/media/logos/logo-2.png"
                                         class="kt-header__brand-logo-default"/>
                                    <img alt="Logo" src="assets/media/logos/logo-2-sm.png"
                                         class="kt-header__brand-logo-sticky"/>
                                </a>
                            </div>
                        </div>

                        <!-- end:: Brand -->

                        <?php if (!true) { ?>
                            <!-- begin:: Header Topbar -->
                            <div class="kt-header__topbar">

                                <!--begin: Notifications -->
                                <div class="kt-header__topbar-item dropdown">
                                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown"
                                         data-offset="10px,10px">
											<span class="kt-header__topbar-icon  kt-pulse kt-pulse--warning">

												<!--<i class="flaticon2-bell-alarm-symbol"></i>-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1"
                                                     class="kt-svg-icon kt-svg-icon--warning">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                              fill="#000000" opacity="0.3"/>
														<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                              fill="#000000"/>
													</g>
												</svg> <span class="kt-pulse__ring"></span>
											</span>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                        <form>

                                            <!--begin: Head -->
                                            <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b"
                                                 style="background-image: url(assets/media/misc/bg-1.jpg)">
                                                <h3 class="kt-head__title">
                                                    User Notifications
                                                    &nbsp;
                                                    <span class="btn btn-success btn-sm btn-bold btn-font-md">23 new</span>
                                                </h3>
                                                <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" data-toggle="tab"
                                                           href="#topbar_notifications_notifications" role="tab"
                                                           aria-selected="true">Alerts</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab"
                                                           href="#topbar_notifications_events" role="tab"
                                                           aria-selected="false">Events</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab"
                                                           href="#topbar_notifications_logs" role="tab"
                                                           aria-selected="false">Logs</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!--end: Head -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show"
                                                     id="topbar_notifications_notifications"
                                                     role="tabpanel">
                                                    <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll"
                                                         data-scroll="true" data-height="300" data-mobile-height="200">
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-line-chart kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New order has been received
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    2 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-box-1 kt-font-brand"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New customer is registered
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    3 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-chart2 kt-font-danger"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    Application has been approved
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    3 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-image-file kt-font-warning"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New file has been uploaded
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    5 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-drop kt-font-info"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New user feedback received
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    8 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    System reboot has been successfully completed
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    12 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-favourite kt-font-danger"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New order has been placed
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    15 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#"
                                                           class="kt-notification__item kt-notification__item--read">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-safe kt-font-primary"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    Company meeting canceled
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    19 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-psd kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New report has been received
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    23 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon-download-1 kt-font-danger"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    Finance report has been generated
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    25 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon-security kt-font-warning"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New customer comment recieved
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    2 days ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-pie-chart kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New customer is registered
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    3 days ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                    <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll"
                                                         data-scroll="true" data-height="300" data-mobile-height="200">
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-psd kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New report has been received
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    23 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon-download-1 kt-font-danger"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    Finance report has been generated
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    25 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-line-chart kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New order has been received
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    2 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-box-1 kt-font-brand"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New customer is registered
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    3 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-chart2 kt-font-danger"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    Application has been approved
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    3 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-image-file kt-font-warning"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New file has been uploaded
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    5 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-drop kt-font-info"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New user feedback received
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    8 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    System reboot has been successfully completed
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    12 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-favourite kt-font-brand"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New order has been placed
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    15 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#"
                                                           class="kt-notification__item kt-notification__item--read">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-safe kt-font-primary"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    Company meeting canceled
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    19 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-psd kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New report has been received
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    23 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon-download-1 kt-font-danger"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    Finance report has been generated
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    25 hrs ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon-security kt-font-warning"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New customer comment recieved
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    2 days ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="kt-notification__item">
                                                            <div class="kt-notification__item-icon">
                                                                <i class="flaticon2-pie-chart kt-font-success"></i>
                                                            </div>
                                                            <div class="kt-notification__item-details">
                                                                <div class="kt-notification__item-title">
                                                                    New customer is registered
                                                                </div>
                                                                <div class="kt-notification__item-time">
                                                                    3 days ago
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                    <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                                                        <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                                            <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                                                All caught up!
                                                                <br>No new notifications.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!--end: Notifications -->

                                <!--begin: Quick actions -->
                                <div class="kt-header__topbar-item dropdown">
                                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown"
                                         data-offset="10px,10px">
											<span class="kt-header__topbar-icon">

												<!--<i class="flaticon2-gear"></i>-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1"
                                                     class="kt-svg-icon kt-svg-icon--success">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                              height="16" rx="1.5"/>
														<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                              rx="1.5"/>
														<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                              rx="1.5"/>
														<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                              rx="1.5"/>
													</g>
												</svg> </span>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                        <form>

                                            <!--begin: Head -->
                                            <div class="kt-head kt-head--skin-dark"
                                                 style="background-image: url(assets/media/misc/bg-1.jpg)">
                                                <h3 class="kt-head__title">
                                                    S&L Ecossistema
                                                    <span class="kt-space-15"></span>
                                                    <span class="btn btn-success btn-sm btn-bold btn-font-md">você tem 23 pendências</span>
                                                </h3>
                                            </div>

                                            <!--end: Head -->

                                            <!--begin: Grid Nav -->
                                            <div class="kt-grid-nav kt-grid-nav--skin-light">
                                                <div class="kt-grid-nav__row">
                                                    <a href="#" class="kt-grid-nav__item">
															<span class="kt-grid-nav__icon">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1"
                                                                     class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z"
                                                                              fill="#000000" opacity="0.3"/>
																		<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z"
                                                                              fill="#000000"/>
																	</g>
																</svg> </span>
                                                        <span class="kt-grid-nav__title">Financeiro</span>
                                                        <span class="kt-grid-nav__desc">Gestão Econômica</span>
                                                    </a>
                                                    <a href="#" class="kt-grid-nav__item"
                                                       style="webkit-filter: grayscale(100%);filter: grayscale(100%);">
															<span class="kt-grid-nav__icon">
                                                                <i class="fad fa-home-alt"
                                                                   style="--fa-secondary-opacity: 1.0;--fa-primary-color: #B6EBDB; --fa-secondary-color: #0ABB87;"></i>
                                                            </span>
                                                        <span class="kt-grid-nav__title">Administração</span>
                                                        <span class="kt-grid-nav__desc">Adm. Residencial</span>
                                                    </a>
                                                </div>
                                                <div class="kt-grid-nav__row">
                                                    <a href="#" class="kt-grid-nav__item"
                                                       style="webkit-filter: grayscale(100%);filter: grayscale(100%);">
															<span class="kt-grid-nav__icon">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1"
                                                                     class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                                                              fill="#000000"/>
																		<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                                                              fill="#000000" opacity="0.3"/>
																	</g>
																</svg> </span>
                                                        <span class="kt-grid-nav__title">Projetos</span>
                                                        <span class="kt-grid-nav__desc">Planejamentos</span>
                                                    </a>
                                                    <a href="#" class="kt-grid-nav__item"
                                                       style="webkit-filter: grayscale(100%);filter: grayscale(100%);">
															<span class="kt-grid-nav__icon">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1"
                                                                     class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
																		<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                              fill="#000000" fill-rule="nonzero"/>
																	</g>
																</svg> </span>
                                                        <span class="kt-grid-nav__title">Pessoas</span>
                                                        <span class="kt-grid-nav__desc">Recursos Humanos</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <!--end: Grid Nav -->
                                        </form>
                                    </div>
                                </div>

                                <!--end: Quick actions -->

                                <!--begin: Quick panel -->
                                <div class="kt-header__topbar-item kt-header__topbar-item--quick-panel"
                                     data-toggle="kt-tooltip" title="Quick panel" data-placement="left">
                                    <div class="kt-header__topbar-wrapper">
											<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">

												<!--<i class="flaticon2-cube-1"></i>-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1"
                                                     class="kt-svg-icon kt-svg-icon--danger">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
														<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                              fill="#000000" opacity="0.3"/>
													</g>
												</svg> </span>
                                    </div>
                                </div>

                                <!--end: Quick panel -->

                                <!--begin: User bar -->
                                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown"
                                         data-offset="10px,10px"
                                         aria-expanded="false">
                                        <span class="kt-header__topbar-welcome">Olá,</span>
                                        <span class="kt-header__topbar-username">{{first_name}}</span>

                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden-">L</span>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

                                        <!--begin: Head -->
                                        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                                             style="background-image: url(assets/media/misc/bg-1.jpg)">
                                            <div class="kt-user-card__avatar">
                                                <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg"/>

                                                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                                <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">L</span>
                                            </div>
                                            <div class="kt-user-card__name">
                                                {{username}}
                                            </div>
                                            <div class="kt-user-card__badge">
                                                <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
                                            </div>
                                        </div>

                                        <!--end: Head -->

                                        <!--begin: Navigation -->
                                        <div class="kt-notification">
                                            <a href="custom/apps/user/profile-1/personal-information.html"
                                               class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        My Profile
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        Account settings and more
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="custom/apps/user/profile-3.html" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-mail kt-font-warning"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        My Messages
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        Inbox and tasks
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="custom/apps/user/profile-2.html" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-rocket-1 kt-font-danger"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        My Activities
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        Logs and notifications
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="custom/apps/user/profile-3.html" class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-hourglass kt-font-brand"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        My Tasks
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        latest tasks and projects
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="custom/apps/user/profile-1/overview.html"
                                               class="kt-notification__item">
                                                <div class="kt-notification__item-icon">
                                                    <i class="flaticon2-cardiogram kt-font-warning"></i>
                                                </div>
                                                <div class="kt-notification__item-details">
                                                    <div class="kt-notification__item-title kt-font-bold">
                                                        Billing
                                                    </div>
                                                    <div class="kt-notification__item-time">
                                                        billing & statements <span
                                                                class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="kt-notification__custom kt-space-between">
                                                <a href="custom/user/login-v2.html" target="_blank"
                                                   class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                                                <a href="custom/user/login-v2.html" target="_blank"
                                                   class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
                                            </div>
                                        </div>

                                        <!--end: Navigation -->
                                    </div>
                                </div>

                                <!--end: User bar -->
                            </div>
                        <?php } ?>
                        <!-- end:: Header Topbar -->
                    </div>
                </div>
                <div class="kt-header__bottom">
                    <div class="kt-container ">

                        <!-- begin: Header Menu -->
                        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
                                    class="la la-close"></i></button>
                        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
                                <ul class="kt-menu__nav ">
                                    <?php echo $modules->getMenuStructure(); ?>
                                </ul>
                            </div>

                        </div>

                        <!-- end: Header Menu -->
                    </div>
                </div>
            </div>
            <!-- end:: Header -->
            <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Content Head -->
                    <?php if ($heading) require_once($heading); ?>
                    <!-- end:: Content Head -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
                        <div id="slApplication">

                            <?php if ($module) {
                                require_once($module);
                            } ?>
                        </div>
                    </div>


                    <!-- end:: Content -->
                </div>
            </div>

            <!-- begin:: Footer -->
            <div class="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer">
                <div class="kt-footer__bottom">
                    <div class="kt-container ">
                        <div class="kt-footer__wrapper">
                            <div class="kt-footer__logo">
                                <a href="index.php">
                                    <img alt="Logo" src="assets/media/logos/logo-2-sm.png">
                                </a>
                                <div class="kt-footer__copyright">
                                    2019&nbsp;&copy;&nbsp;
                                    <a href="http://samaraleonardo.com" target="_blank">Samara&Leonardo</a>
                                </div>
                            </div>
                            <div class="kt-footer__menu">
                                <a href="http://hubwei.com" target="_blank">Hubwei Holdings</a>
                                <a href="http://metodopags.com" target="_blank">Método Pags</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end:: Footer -->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Quick Panel -->
<div id="kt_quick_panel" class="kt-quick-panel">
    <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
    <div class="kt-quick-panel__nav">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x"
            role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
            </li>
        </ul>
    </div>
    <div class="kt-quick-panel__content">
        <div class="tab-content">
            <div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
                <div class="kt-notification">
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-line-chart kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New order has been received
                            </div>
                            <div class="kt-notification__item-time">
                                2 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-box-1 kt-font-brand"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New customer is registered
                            </div>
                            <div class="kt-notification__item-time">
                                3 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-chart2 kt-font-danger"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                Application has been approved
                            </div>
                            <div class="kt-notification__item-time">
                                3 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-image-file kt-font-warning"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New file has been uploaded
                            </div>
                            <div class="kt-notification__item-time">
                                5 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-drop kt-font-info"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New user feedback received
                            </div>
                            <div class="kt-notification__item-time">
                                8 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                System reboot has been successfully completed
                            </div>
                            <div class="kt-notification__item-time">
                                12 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-favourite kt-font-danger"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New order has been placed
                            </div>
                            <div class="kt-notification__item-time">
                                15 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item kt-notification__item--read">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-safe kt-font-primary"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                Company meeting canceled
                            </div>
                            <div class="kt-notification__item-time">
                                19 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-psd kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New report has been received
                            </div>
                            <div class="kt-notification__item-time">
                                23 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon-download-1 kt-font-danger"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                Finance report has been generated
                            </div>
                            <div class="kt-notification__item-time">
                                25 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon-security kt-font-warning"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New customer comment recieved
                            </div>
                            <div class="kt-notification__item-time">
                                2 days ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-pie-chart kt-font-warning"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New customer is registered
                            </div>
                            <div class="kt-notification__item-time">
                                3 days ago
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
                <div class="kt-notification-v2">
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon-bell kt-font-brand"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                5 new user generated report
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Reports based on sales
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-box kt-font-danger"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                2 new items submited
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                by Grog John
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon-psd kt-font-brand"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                79 PSD files generated
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Reports based on sales
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-supermarket kt-font-warning"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                $2900 worth producucts sold
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Total 234 items
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon-paper-plane-1 kt-font-success"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                4.5h-avarage response time
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Fostest is Barry
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-information kt-font-danger"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                Database server is down
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                10 mins ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-mail-1 kt-font-brand"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                System report has been generated
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Fostest is Barry
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-hangouts-logo kt-font-warning"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                4.5h-avarage response time
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Fostest is Barry
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings"
                 role="tabpanel">
                <form class="kt-form">
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Notifications:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Case Tracking:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Support Portal:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Generate Reports:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Report Export:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Allow Data Collection:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Member singup:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Enable Customer Portal:</label>
                        <div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
											<span></span>
										</label>
									</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end::Quick Panel -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#374afb",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->

<!--begin:: Vendor Plugins -->


<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="assets/js/jquery.mask.js" type="text/javascript"></script>
<script type="text/javascript" src="/samaraleonardo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
            $(".money,#amount").mask('0000000.00', {reverse: true});
        }, 1000);
    });
</script>
<script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="assets/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
<script src="assets/plugins/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="assets/plugins/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="assets/plugins/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="assets/plugins/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="assets/plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="assets/plugins/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/dropzone.init.js" type="text/javascript"></script>
<script src="assets/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="assets/plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="assets/plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="assets/plugins/general/raphael/raphael.js" type="text/javascript"></script>
<script src="assets/plugins/general/morris.js/morris.js" type="text/javascript"></script>
<script src="assets/plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="assets/plugins/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="assets/plugins/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="assets/plugins/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="assets/plugins/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="assets/plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--begin:: Vendor Plugins for custom pages -->
<script src="assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/plugins/custom/@fullcalendar/core/main.js" type="text/javascript"></script>
<script src="assets/plugins/custom/@fullcalendar/daygrid/main.js" type="text/javascript"></script>
<script src="assets/plugins/custom/@fullcalendar/google-calendar/main.js" type="text/javascript"></script>
<script src="assets/plugins/custom/@fullcalendar/interaction/main.js" type="text/javascript"></script>
<script src="assets/plugins/custom/@fullcalendar/list/main.js" type="text/javascript"></script>
<script src="assets/plugins/custom/@fullcalendar/timegrid/main.js" type="text/javascript"></script>
<script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="assets/plugins/custom/flot/dist/es5/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/custom/flot/source/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/plugins/custom/flot/source/jquery.flot.categories.js" type="text/javascript"></script>
<script src="assets/plugins/custom/flot/source/jquery.flot.pie.js" type="text/javascript"></script>
<script src="assets/plugins/custom/flot/source/jquery.flot.stack.js" type="text/javascript"></script>
<script src="assets/plugins/custom/flot/source/jquery.flot.crosshair.js" type="text/javascript"></script>
<script src="assets/plugins/custom/flot/source/jquery.flot.axislabels.js" type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
<script src="assets/plugins/custom/js/global/integration/plugins/datatables.init.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
<script src="assets/plugins/custom/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
<script src="assets/plugins/custom/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js" type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js" type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js" type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.print.js" type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js"
        type="text/javascript"></script>
<script src="assets/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="assets/plugins/custom/jqvmap/dist/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>
<script src="assets/plugins/custom/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="assets/plugins/custom/tinymce/themes/silver/theme.js" type="text/javascript"></script>
<script src="assets/plugins/custom/tinymce/themes/mobile/theme.js" type="text/javascript"></script>
<script src="assets/plugins/custom/jkanban/dist/jkanban.min.js" type="text/javascript"></script>

<!--end:: Vendor Plugins for custom pages -->

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page)
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
-->
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page)
<script src="assets/js/pages/dashboard.js" type="text/javascript"></script> -->
<?= $modules->scripts(); ?>
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>