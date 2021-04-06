<?= $this->extend("admin/master/master"); ?>
<?= $this->section("main"); ?>
<!-- BEGIN .app-main -->
<div class="app-main">
    <!-- BEGIN .main-heading -->
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>Quick Dashboard</h5>
                        <h6 class="sub-heading">Welcome to Unify Admin Template</h6>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END: .main-heading -->
    <!-- BEGIN .main-content -->
    <div class="main-content">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card block-300">
                    <div class="card-body">
                        <div id="mapAfrica" class="chart-height-md"></div>
                        <div class="info-stats">
                            <span class="info-label red"></span>
                            <p class="info-title">Overall Sales in Africa</p>
                            <h4 class="info-total">62,800</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col">
                <a href="#" class="block-140">
                    <div class="icon violet">
                        <i class="icon-shopping-cart2"></i>
                    </div>
                    <h5>2540</h5>
                    <p>Items Sold</p>
                </a>
                <a href="#" class="block-140">
                    <div class="icon pink">
                        <i class="icon-thumbs-up2"></i>
                    </div>
                    <h5>763</h5>
                    <p>Likes</p>
                </a>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col">
                <a href="#" class="block-140">
                    <div class="icon success">
                        <i class="icon-bell3"></i>
                    </div>
                    <h5>218</h5>
                    <p>Alerts</p>
                </a>
                <a href="#" class="block-140">
                    <div class="icon warning">
                        <i class="icon-location4"></i>
                    </div>
                    <h5>549</h5>
                    <p>Locations</p>
                </a>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <a href="#" class="block-140">
                    <div class="icon danger">
                        <i class="icon-archive3"></i>
                    </div>
                    <h5>367</h5>
                    <p>Pages</p>
                </a>
                <a href="#" class="block-140">
                    <div class="icon info">
                        <i class="icon-download5"></i>
                    </div>
                    <h5>854</h5>
                    <p>Downloads</p>
                </a>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <a class="block-300 center-text">
                    <div class="user-profile">
                        <img src="<?= base_url(); ?>/assets/admin/img/avatar1.svg" class="profile-thumb"
                            alt="User Thumb">
                        <h5 class="profile-name">Yuki Hayashi</h5>
                        <h6 class="profile-designation">UX Designer</h6>
                        <p class="profile-location">Japan</p>
                        <div class="ml-5 mr-5 chartist custom-two">
                            <div class="team-act"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Row end -->
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header">Statistics</div>
                    <div class="card-body">
                        <ul class="stats">
                            <li>
                                <span class="icon">
                                    <i class="icon-shopping-basket"></i>
                                </span>
                                Once a buyer completes checkout and
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-fire"></i>
                                </span>
                                A new ticket opened
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-camera"></i>
                                </span>
                                Thanks Sarah, I need your profile
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-lightbulb"></i>
                                </span>
                                That's A great idea!
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-emoji-happy"></i>
                                </span>
                                Tell us what you think
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-fire"></i>
                                </span>
                                A new item sold
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header">Conversation</div>
                    <div class="customScroll">
                        <div class="card-body">
                            <ul class="message-wrapper">
                                <li class="in">
                                    <img class="avatar" alt="48x48"
                                        src="<?= base_url(); ?>/assets/admin/img/avatar2.svg" />
                                    <div class="message">
                                        <a href="#" class="name">Elon Musk</a>
                                        <span class="date-time">Jan 18th, 2017</span>
                                        <div class="body">
                                            Convergence target enable syndicate <span>grow</span> end-to-end life-hacks,
                                            integrate engage <span>podcasting</span>."
                                        </div>
                                    </div>
                                </li>
                                <li class="out">
                                    <div class="empty-avatar">AS</div>
                                    <div class="message">
                                        <a href="#" class="name">Angela Serkel</a>
                                        <span class="date-time">Jan 15th, 2017</span>
                                        <div class="body">
                                            Transition, <span>widgets</span> users remix dynamic 24/365 holistic network
                                            effects <span>communities</span>, users, leading-edge e-services social."
                                        </div>
                                    </div>
                                </li>
                                <li class="in">
                                    <img class="avatar" alt="48x48"
                                        src="<?= base_url(); ?>/assets/admin/img/avatar2.svg" />
                                    <div class="message">
                                        <a href="#" class="name">Nkio Toyoda</a>
                                        <span class="date-time">Jan 10th, 2017</span>
                                        <div class="body">
                                            Need some <span>interesting looking</span> for your work in progress
                                            end-to-end life-hacks, integrate engage <span>podcasting.</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="out">
                                    <div class="empty-avatar red">VK</div>
                                    <div class="message">
                                        <a href="#" class="name">Viloke Kemishy</a>
                                        <span class="date-time">Jan 12th, 2017</span>
                                        <div class="body">
                                            Transition, <span>widgets</span> users remix dynamic 24/365 holistic network
                                            effects <span>communities</span>, users, leading-edge e-services social."
                                        </div>
                                    </div>
                                </li>
                                <li class="in">
                                    <img class="avatar" alt="48x48"
                                        src="<?= base_url(); ?>/assets/admin/img/avatar2.svg" />
                                    <div class="message">
                                        <a href="#" class="name">Devivo Gumevx</a>
                                        <span class="date-time">Jan 5th, 2017</span>
                                        <div class="body">
                                            Need some <span>interesting looking</span> for your work in progress
                                            end-to-end life-hacks, integrate engage <span>podcasting.</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- END: .main-content -->
</div>
<!-- END: .app-main -->

<?= $this->endSection(); ?>