<?php $__env->startSection('content'); ?>

    <script>
        var revenueSourcesLabel = [<?php $__currentLoopData = $dashboard->plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($plan->title); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>];
        var revenueSourcesLabelData  = [<?php $__currentLoopData = $dashboard->plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> "<?php echo e(DB::table('subscriptions')->where('service_id', $plan->id)->where('payment_status', 1)->count()); ?>", <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
        var subscriptionOverviewChartLabel = <?php echo json_encode($dashboard->orders_data->period, 15, 512) ?>;
        var subscriptionOverviewChartData = <?php echo json_encode($dashboard->orders_data->earnings, 15, 512) ?>;
        var currencyLabel = '<?php echo e(__('symbol.' . config('settings.currency', 'USD'))); ?>';
        var updateCheckerUrl = '<?php echo e(route('backend.dashboard.check.for.update')); ?>';

    </script>
	
    <div class="row">
        <div class="col-12">
            <?php if($dashboard->server->max_execution_time < 300): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    max_execution_time is too low, please set it to 300 (current value: <?php echo e($dashboard->server->max_execution_time); ?>). max_execution_time sets the maximum time in seconds a script is allowed to run before it is terminated by the parser. The system required at least 300 seconds for running updates or converting the audio to various formats.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
			
            <?php if(! function_exists( 'simplexml_load_file' )): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    PHP extension <span class="badge badge-pill badge-danger">simplexml_load_file</span> is not installed, the system can't not import podcast rss without this extension.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
			
            <?php if(! extension_loaded('exif')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    PHP extension <span class="badge badge-pill badge-danger">exif</span> is not installed, the system can't not do the the upload media without this extension.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(! extension_loaded('fileinfo')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    PHP extension <span class="badge badge-pill badge-danger">fileinfo</span> is not installed, the system can't not do the the upload media without this extension.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($dashboard->server->post_max_size < 128): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    post_max_size is too low, please set it to 128MB or higher (current value: <?php echo e($dashboard->server->post_max_size); ?>MB). post_max_size sets the maximum of post data allowed. The system required at least 128MB for uploading a large audio file.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($dashboard->server->upload_max_filesize < 128): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    upload_max_filesize is too low, please set it to 128MB or higher (current value: <?php echo e($dashboard->server->upload_max_filesize); ?>MB). upload_max_filesize sets the maximum of an uploaded file. The system required at least 128MB for uploading a large audio file.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($dashboard->server->memory_limit < 32): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    memory_limit is too low, please set it to 32MB or higher (current value: <?php echo e($dashboard->server->memory_limit); ?>MB).
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>



        <?php if(\App\Models\Role::getValue('admin_songs')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-music"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->total_songs); ?> Songs</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.songs')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
		
        <?php if(\App\Models\Role::getValue('admin_artists')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-microphone"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->total_artists); ?> Artists</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.artists')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_albums')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-circle"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->total_albums); ?> Albums</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.albums')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>

            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_playlists')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-dark o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-play"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->total_playlists); ?> Playlists</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.playlists')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_users')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-gradient-info o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-users"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->statistics->total_users); ?> Users</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.users')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_subscriptions')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-secondary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->statistics->total_subscriptions); ?> Subscriptions</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.subscriptions')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_comments')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-money-bill"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->statistics->total_comments); ?> Comments</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.comments')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_posts')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-gradient-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-edit"></i>
                        </div>
                        <div class="mr-5 h2"><?php echo e($dashboard->statistics->total_posts); ?> Posts</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo e(route('backend.posts')); ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_earnings')): ?>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                        </div>
                        <div class="mr-5 h2"><?php echo e($stats->revenue); ?> <?php echo e(config('settings.currency', 'USD')); ?></div>
                        <p class="float-left mb-0">Total Revenue</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-secondary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                        </div>
                        <div class="mr-5 h2"><?php echo e($stats->commission); ?> <?php echo e(config('settings.currency', 'USD')); ?></div>
                        <p class="float-left mb-0">Artist's Commission</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                        </div>
                        <div class="mr-5 h2"><?php echo e($stats->song->revenue); ?> <?php echo e(config('settings.currency', 'USD')); ?></div>
                        <p class="float-left mb-0">Songs Sales</p>
                        <p class="float-right mb-0"><?php echo e($stats->song->count); ?> items</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                        </div>
                        <div class="mr-5 h2"><?php echo e($stats->album->revenue); ?> <?php echo e(config('settings.currency', 'USD')); ?></div>
                        <p class="float-left mb-0">Albums Sales</p>
                        <p class="float-right mb-0"><?php echo e($stats->album->count); ?> items</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
	
    <div id="update-alert" class="alert alert-info d-none" data-version="<?php echo e(env('APP_VERSION')); ?>">
        <p class="text-danger"><strong>You are using an outdated build version of the script, the version you are using: <?php echo e(env('APP_VERSION')); ?></strong></p>
        <p>At the moment, a new build of the script is available: <strong class="text-success new-version"></strong></p>
        <p class="beta-alert text-danger d-none"><strong>This version is a beta release and may contain elements that have not been fully tested. It is provided without warranty of any kind either express or implied. If you don't want to be a beta tester, please kindly wait for stable version which will be release soon.</strong></p>
        <p>To update your site to the latest version, you need to follow the link: <a href="<?php echo e(route('backend.upgrade')); ?>" class="badge badge-pill badge-success">Upgrade Music Engine</a></p>
        <p>You can view information about the new version of the script at <a href="https://codecanyon.net/item/musicengine-music-social-networking/28641149" class="text-primary" target="_blank">Music Engine <strong class="new-version"></strong></a></p>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-tools"></i> Quick access to site sections</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <?php if(\App\Models\Role::getValue('admin_users')): ?>
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.users')); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/users.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">Edit users</h5>
                                    Manage registered users, edit their profiles and block their accounts
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Models\Role::getValue('admin_settings')): ?>
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.settings')); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/settings.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">System settings</h5>
                                    Configure General Script Settings, displaying of news and comments, and security system of the script
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Models\Role::getValue('admin_pages')): ?>

                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.pages')); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/pages.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">Pages</h5>
                                    Create and edit pages that are rarely changed and have a permanent address
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Models\Role::getValue('admin_users')): ?>
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.users.edit', ['id' => auth()->user()->id])); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/profile.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">Personal settings</h5>
                                    Manage and configure your personal user profile.
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Models\Role::getValue('admin_roles')): ?>

                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.roles')); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/group.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">Configure user groups</h5>
                                    Create and manage user groups on the website, assign the permissions for these groups
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Models\Role::getValue('admin_email')): ?>

                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.email')); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/email.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">E-mail templates</h5>
                                    Configure e-mail templates to be sent by the script is case of the registration, password recovery, etc.
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Models\Role::getValue('admin_genres')): ?>
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.genres')); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/genres.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">Manage Genres</h5>
                                    Create and manage categories in music, appoint templates and the sort order for the categories
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Models\Role::getValue('admin_metatags')): ?>
                    <div class="col-xl-6 col-sm-6 mb-3">
                        <a class="quick" href="<?php echo e(route('backend.metatags')); ?>">
                            <div class="media">
                                <img src="<?php echo e(asset('backend/images/seo.svg')); ?>">
                                <div class="media-body">
                                    <h5 class="mt-0">Titles, descriptions, metatags</h5>
                                    In this section, you can assign specific meta tags for different pages for title, description, and keywords.
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
	
    <?php if(\App\Models\Role::getValue('admin_subscriptions')): ?>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-money-check-alt"></i> 15 Days Earnings Overview</h6>
                        <a href="<?php echo e(route('backend.reports')); ?>" class="m-0 font-weight-bold text-primary h6 float-right"><i class="fas fa-chart-bar"></i> Get Full Report</a>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="subscriptionOverviewChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="revenueSources"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(config('settings.google_analytics')): ?>
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-money-check-alt"></i> Streams per country this month</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myPolarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-male"></i> Streams per Age and Gender</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="AgeGenderChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fab fa-internet-explorer"></i> Top browsers</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="BrowsersChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-secret"></i> Visitors</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="VisitorsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
	
    <div class="row">
        <?php if(\App\Models\Role::getValue('admin_subscriptions')): ?>
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-shopping-cart"></i> Recent Orders</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Status</th>
                                <th class="desktop">Plan</th>
                                <th class="desktop">Billing</th>
                                <th>Amount</th>
                                <th class="desktop" width="120px">Created</th>
                            </tr>
                            </thead>
                            <?php $__currentLoopData = $dashboard->subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($order->user): ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('backend.users.edit', ['id' => $order->user->id])); ?>"><?php echo e($order->user->name); ?></a></td>
                                        <td>
                                            <?php if(\Carbon\Carbon::parse($order->trial_end)->gt(\Carbon\Carbon::now())): ?>
                                                <span class="badge badge-info">Trial ends <?php echo e(\Carbon\Carbon::parse($order->trial_end)->format('F j')); ?></span>
                                            <?php elseif(\Carbon\Carbon::parse($order->next_billing_date)->gt(\Carbon\Carbon::now())): ?>
                                                <span class="badge badge-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">in-Active</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="desktop"><a href="<?php echo e(route('backend.services.edit', ['id' => $order->service->id])); ?>"><?php echo e($order->service->title); ?></a></td>
                                        <td><span class="badge badge-secondary">Auto</span></td>
                                        <td><?php echo e(__('symbol.' . $order->currency)); ?><?php echo e(number_format($order->amount)); ?></td>
                                        <td class="desktop"><?php echo e(timeElapsedString($order->created_at)); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(\App\Models\Role::getValue('admin_users')): ?>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users"></i> Recent Users
                        </h6>
                    </div>
                    <div class="card-body users">
                        <?php $__currentLoopData = $dashboard->recentUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="media border-bottom pb-2 pt-2">
                                <div class="artwork">
                                    <img src="<?php echo e($user->artwork_url); ?>" class="media-object rounded-circle">
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="media-heading"><a href="<?php echo e(route('backend.users.edit', ['id' => $user->id])); ?>"><?php echo e($user->name); ?></a></h6>
                                    <p class="mb-0"><?php echo e($user->email); ?>  <span class="text-secondary float-right"><?php echo e(timeElapsedString($user->created_at)); ?></span></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
		
        <?php if(\App\Models\Role::getValue('admin_posts')): ?>
			
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-newspaper"></i> Recent posts</h6>
                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $dashboard->recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
                            <div class="media border-bottom pb-2 pt-2">
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="<?php echo e(route('backend.posts.edit', ['id' => $post->id])); ?>"><?php echo e($post->title); ?></a></h6>
                                    <p class="mb-0">by <a href="javascript:void(0);"><?php echo e($post->uname); ?></a><span class="text-secondary float-right"><?php echo e(timeElapsedString($post->created_at)); ?></span></p>
									
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php if(\App\Models\Role::getValue('admin_settings')): ?>
        <div class="card mt-4">
            <div class="card-header p-0">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-chart-line"></i> Operation Status of the website</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-cog"></i> System auto-check</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Operation Status of the website</td>
                                <td><?php echo $dashboard->statistics->system_status; ?></td>
                            </tr>
                            <tr>
                                <td>Site url</td>
                                <td><?php echo e($dashboard->statistics->site_url); ?></td>
                            </tr>
                            <tr>
                                <td>The total number of news articles</td>
                                <td><?php echo e($dashboard->statistics->total_posts); ?></td>
                            </tr>
                            <tr>
                                <td>News awaiting for verification</td>
                                <td><?php echo e($dashboard->statistics->awaiting_posts); ?></td>
                            </tr>
                            <tr>
                                <td>Total comments:</td>
                                <td><?php echo e($dashboard->statistics->total_comments); ?></td>
                            </tr>
                            <tr>
                                <td>Comments that are awaiting for moderation</td>
                                <td><?php echo e($dashboard->statistics->awaiting_comments); ?></td>
                            </tr><tr>
                                <td>Registered users</td>
                                <td><?php echo e($dashboard->statistics->total_users); ?></td>
                            </tr><tr>
                                <td>Banned users</td>
                                <td><?php echo e($dashboard->statistics->banned_users); ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Cache path</td>
                                <td><?php echo e($dashboard->statistics->cache_path); ?></td>
                            </tr> -->
                            <tr>
                                <td>The total number of artists</td>
                                <td><?php echo e($dashboard->statistics->total_artists); ?></td>
                            </tr>
                            <tr>
                                <td>Artists that are awaiting for moderation</td>
                                <td><?php echo e($dashboard->statistics->awaiting_artists); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-striped">
                            <tbody>
                            <?php echo $dashboard->information; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views/backend/dashboard/dashboard.blade.php ENDPATH**/ ?>