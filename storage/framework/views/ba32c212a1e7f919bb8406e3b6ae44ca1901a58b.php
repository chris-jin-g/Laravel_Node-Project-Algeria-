<?php $__env->startSection('title', 'Configs Site '); ?>

<?php $__env->startSection('content'); ?>

<div>

    <div class="container-fluid">
        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-primary">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                                    aria-controls="general" aria-expanded="true">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="social-tab" data-toggle="tab" href="#social" role="tab"
                                    aria-controls="social" aria-expanded="false">Links</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="socialConfiguration-tab" data-toggle="tab"
                                    href="#socialConfiguration" role="tab" aria-controls="socialConfiguration"
                                    aria-expanded="false">Social config</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="provider-tab" data-toggle="tab" href="#provider" role="tab"
                                    aria-controls="provider" aria-expanded="false">Search Method</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="api-tab" data-toggle="tab" href="#api" role="tab"
                                    aria-controls="api" aria-expanded="false">API config</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="mailconfig-tab" data-toggle="tab" href="#mailconfig" role="tab"
                                    aria-controls="mailconfig" aria-expanded="false">Mail Config</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pushnotification-tab" data-toggle="tab"
                                    href="#pushnotification" role="tab" aria-controls="pushnotification"
                                    aria-expanded="false">Push Notification</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " id="others-tab" data-toggle="tab" href="#others" role="tab"
                                    aria-controls="others" aria-expanded="false">More</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content">
                    
                    <div class="tab-pane active in" id="general">
                        <div class="row">
                            <div class="col-md-9">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form" autocomplete="off">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <label for="site_title"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Site_Name'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.site_title', 'Tranxit')); ?>"
                                                name="site_title" required id="site_title"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Site_Name'); ?>">
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <label for="site_logo"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Site_Logo'); ?></label>
                                        <div class="col-xs-9">
                                            <?php if(config('constants.site_logo')!=''): ?>
                                            <img style="height: 90px; margin-bottom: 15px;"
                                                src="<?php echo e(config('constants.site_logo', asset('logo-black.png'))); ?>">
                                            <?php endif; ?>
                                            <input type="file" accept="image/*" name="site_logo"
                                                class="dropify form-control-file" id="site_logo"
                                                aria-describedby="fileHelp">
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <label for="site_icon"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Site_Icon'); ?></label>
                                        <div class="col-xs-9">
                                            <?php if(config('constants.site_icon')!=''): ?>
                                            <img style="height: 90px; margin-bottom: 15px;"
                                                src="<?php echo e(config('constants.site_icon')); ?>">
                                            <?php endif; ?>
                                            <input type="file" accept="image/*" name="site_icon"
                                                class="dropify form-control-file" id="site_icon"
                                                aria-describedby="fileHelp">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="skin"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.site_skin'); ?></label>
                                        <div class="col-xs-9">
                                            <select class="form-control" id="skin" name="menu_skin" autocomplete="off">
                                                <option value="purple" <?php if(Config::get('constants.menu_skin')=='purple'
                                                    ): ?> selected <?php endif; ?>>Purple</option>
                                                <option value="azure" <?php if(Config::get('constants.menu_skin')=='azure'): ?>
                                                    selected <?php endif; ?>>Azure</option>
                                                <option value="green" <?php if(Config::get('constants.menu_skin')=='green'): ?>
                                                    selected <?php endif; ?>>Green</option>
                                                <option value="orange" <?php if(Config::get('constants.menu_skin')=='orange'
                                                    ): ?> selected <?php endif; ?>>orange</option>
                                                <option value="danger" <?php if(Config::get('constants.menu_skin')=='danger'
                                                    ): ?> selected <?php endif; ?>>danger</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="timezone"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.timezone'); ?></label>
                                        <div class="col-xs-9">
                                            <select class="form-control" id="timezone" name="timezone"
                                                autocomplete="off">
                                                <option value="UTC" <?php if(Config::get('constants.timezone')=='UTC' ): ?>
                                                    selected <?php endif; ?>>Select Timezone</option>
                                                <option value="Pacific/Midway"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Midway' ): ?> selected
                                                    <?php endif; ?>>(GMT-11:00) Midway Island, Samoa</option>
                                                <option value="America/Adak"
                                                    <?php if(Config::get('constants.timezone')=='America/Adak' ): ?> selected
                                                    <?php endif; ?>>(GMT-10:00) Hawaii-Aleutian</option>
                                                <option value="Etc/GMT+10"
                                                    <?php if(Config::get('constants.timezone')=='Etc/GMT+10' ): ?> selected
                                                    <?php endif; ?>>(GMT-10:00) Hawaii</option>
                                                <option value="Pacific/Marquesas"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Marquesas' ): ?>
                                                    selected <?php endif; ?>>(GMT-09:30) Marquesas Islands</option>
                                                <option value="Pacific/Gambier"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Gambier' ): ?> selected
                                                    <?php endif; ?>>(GMT-09:00) Gambier Islands</option>
                                                <option value="America/Anchorage"
                                                    <?php if(Config::get('constants.timezone')=='America/Anchorage' ): ?>
                                                    selected <?php endif; ?>>(GMT-09:00) Alaska</option>
                                                <option value="America/Ensenada"
                                                    <?php if(Config::get('constants.timezone')=='America/Ensenada' ): ?> selected
                                                    <?php endif; ?>>(GMT-08:00) Tijuana, Baja California</option>
                                                <option value="Etc/GMT+8"
                                                    <?php if(Config::get('constants.timezone')=='Etc/GMT+8' ): ?> selected
                                                    <?php endif; ?>>(GMT-08:00) Pitcairn Islands</option>
                                                <option value="America/Los_Angeles"
                                                    <?php if(Config::get('constants.timezone')=='America/Los_Angeles' ): ?>
                                                    selected <?php endif; ?>>(GMT-08:00) Pacific Time (US & Canada)</option>
                                                <option value="America/Denver"
                                                    <?php if(Config::get('constants.timezone')=='America/Denver' ): ?> selected
                                                    <?php endif; ?>>(GMT-07:00) Mountain Time (US & Canada)</option>
                                                <option value="America/Chihuahua"
                                                    <?php if(Config::get('constants.timezone')=='America/Chihuahua' ): ?>
                                                    selected <?php endif; ?>>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                <option value="America/Dawson_Creek"
                                                    <?php if(Config::get('constants.timezone')=='America/Dawson_Creek' ): ?>
                                                    selected <?php endif; ?>>(GMT-07:00) Arizona</option>
                                                <option value="America/Belize"
                                                    <?php if(Config::get('constants.timezone')=='America/Belize' ): ?> selected
                                                    <?php endif; ?>>(GMT-06:00) Saskatchewan, Central America</option>
                                                <option value="America/Cancun"
                                                    <?php if(Config::get('constants.timezone')=='America/Cancun' ): ?> selected
                                                    <?php endif; ?>>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                <option value="Chile/EasterIsland"
                                                    <?php if(Config::get('constants.timezone')=='Chile/EasterIsland' ): ?>
                                                    selected <?php endif; ?>>(GMT-06:00) Easter Island</option>
                                                <option value="America/Chicago"
                                                    <?php if(Config::get('constants.timezone')=='America/Chicago' ): ?> selected
                                                    <?php endif; ?>>(GMT-06:00) Central Time (US & Canada)</option>
                                                <option value="America/New_York"
                                                    <?php if(Config::get('constants.timezone')=='America/New_York' ): ?> selected
                                                    <?php endif; ?>>(GMT-05:00) Eastern Time (US & Canada)</option>
                                                <option value="America/Havana" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT-05:00) Cuba</option>
                                                <option value="America/Bogota" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT-05:00) Bogota, Lima, Quito, Rio Branco
                                                </option>
                                                <option value="America/Caracas"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-04:30) Caracas</option>
                                                <option value="America/Santiago"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-04:00) Santiago</option>
                                                <option value="America/La_Paz" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT-04:00) La Paz</option>
                                                <option value="Atlantic/Stanley"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-04:00) Faukland Islands</option>
                                                <option value="America/Campo_Grande"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-04:00) Brazil</option>
                                                <option value="America/Goose_Bay"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-04:00) Atlantic Time (Goose Bay)</option>
                                                <option value="America/Glace_Bay"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-04:00) Atlantic Time (Canada)</option>
                                                <option value="America/St_Johns"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-03:30) Newfoundland</option>
                                                <option value="America/Araguaina"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-03:00) UTC-3</option>
                                                <option value="America/Montevideo"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-03:00) Montevideo</option>
                                                <option value="America/Miquelon"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-03:00) Miquelon, St. Pierre</option>
                                                <option value="America/Godthab"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-03:00) Greenland</option>
                                                <option value="America/Argentina/Buenos_Aires"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-03:00) Buenos Aires</option>
                                                <option value="America/Sao_Paulo"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-03:00) Brasilia</option>
                                                <option value="America/Noronha"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-02:00) Mid-Atlantic</option>
                                                <option value="Atlantic/Cape_Verde"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-01:00) Cape Verde Is.</option>
                                                <option value="Atlantic/Azores"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT-01:00) Azores</option>
                                                <option value="Europe/Belfast" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT) Greenwich Mean Time : Belfast</option>
                                                <option value="Europe/Dublin" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT) Greenwich Mean Time : Dublin</option>
                                                <option value="Europe/Lisbon" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT) Greenwich Mean Time : Lisbon</option>
                                                <option value="Europe/London" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT) Greenwich Mean Time : London</option>
                                                <option value="Africa/Abidjan" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT) Monrovia, Reykjavik</option>
                                                <option value="Europe/Amsterdam"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
                                                </option>
                                                <option value="Europe/Belgrade"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague
                                                </option>
                                                <option value="Europe/Brussels"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                <option value="Africa/Algiers" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT+01:00) West Central Africa</option>
                                                <option value="Africa/Windhoek"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+01:00) Windhoek</option>
                                                <option value="Asia/Beirut" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+02:00) Beirut</option>
                                                <option value="Africa/Cairo" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+02:00) Cairo</option>
                                                <option value="Asia/Gaza" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+02:00) Gaza</option>
                                                <option value="Africa/Blantyre"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+02:00) Harare, Pretoria</option>
                                                <option value="Asia/Jerusalem" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT+02:00) Jerusalem</option>
                                                <option value="Europe/Minsk" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+02:00) Minsk</option>
                                                <option value="Asia/Damascus" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT+02:00) Syria</option>
                                                <option value="Europe/Moscow" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT+03:00) Moscow, St. Petersburg, Volgograd
                                                </option>
                                                <option value="Africa/Addis_Ababa"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+03:00) Nairobi</option>
                                                <option value="Asia/Tehran" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+03:30) Tehran</option>
                                                <option value="Asia/Dubai" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+04:00) Abu Dhabi, Muscat</option>
                                                <option value="Asia/Yerevan" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+04:00) Yerevan</option>
                                                <option value="Asia/Kabul" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+04:30) Kabul</option>
                                                <option value="Asia/Yekaterinburg"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+05:00) Ekaterinburg</option>
                                                <option value="Asia/Tashkent" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT+05:00) Tashkent</option>
                                                <option value="Asia/Kolkata" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi
                                                </option>
                                                <option value="Asia/Katmandu" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT+05:45) Kathmandu</option>
                                                <option value="Asia/Dhaka" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+06:00) Astana, Dhaka</option>
                                                <option value="Asia/Novosibirsk"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+06:00) Novosibirsk</option>
                                                <option value="Asia/Rangoon" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+06:30) Yangon (Rangoon)</option>
                                                <option value="Asia/Bangkok" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                <option value="Asia/Krasnoyarsk"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+07:00) Krasnoyarsk</option>
                                                <option value="Asia/Hong_Kong" <?php if(Config::get('constants.timezone')==''
                                                    ): ?> selected <?php endif; ?>>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi
                                                </option>
                                                <option value="Asia/Irkutsk" <?php if(Config::get('constants.timezone')=='' ): ?>
                                                    selected <?php endif; ?>>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                <option value="Australia/Perth"
                                                    <?php if(Config::get('constants.timezone')=='' ): ?> selected <?php endif; ?>>
                                                    (GMT+08:00) Perth</option>
                                                <option value="Australia/Eucla"
                                                    <?php if(Config::get('constants.timezone')=='Australia/Eucla' ): ?> selected
                                                    <?php endif; ?>>(GMT+08:45) Eucla</option>
                                                <option value="Asia/Tokyo"
                                                    <?php if(Config::get('constants.timezone')=='Asia/Tokyo' ): ?> selected
                                                    <?php endif; ?>>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                <option value="Asia/Seoul"
                                                    <?php if(Config::get('constants.timezone')=='Asia/Seoul' ): ?> selected
                                                    <?php endif; ?>>(GMT+09:00) Seoul</option>
                                                <option value="Asia/Yakutsk"
                                                    <?php if(Config::get('constants.timezone')=='Asia/Yakutsk' ): ?> selected
                                                    <?php endif; ?>>(GMT+09:00) Yakutsk</option>
                                                <option value="Australia/Adelaide"
                                                    <?php if(Config::get('constants.timezone')=='Australia/Adelaide' ): ?>
                                                    selected <?php endif; ?>>(GMT+09:30) Adelaide</option>
                                                <option value="Australia/Darwin"
                                                    <?php if(Config::get('constants.timezone')=='Australia/Darwin' ): ?> selected
                                                    <?php endif; ?>>(GMT+09:30) Darwin</option>
                                                <option value="Australia/Brisbane"
                                                    <?php if(Config::get('constants.timezone')=='Australia/Brisbane' ): ?>
                                                    selected <?php endif; ?>>(GMT+10:00) Brisbane</option>
                                                <option value="Australia/Hobart"
                                                    <?php if(Config::get('constants.timezone')=='Australia/Hobart' ): ?> selected
                                                    <?php endif; ?>>(GMT+10:00) Hobart</option>
                                                <option value="Asia/Vladivostok"
                                                    <?php if(Config::get('constants.timezone')=='Asia/Vladivostok' ): ?> selected
                                                    <?php endif; ?>>(GMT+10:00) Vladivostok</option>
                                                <option value="Australia/Lord_Howe"
                                                    <?php if(Config::get('constants.timezone')=='Australia/Lord_Howe' ): ?>
                                                    selected <?php endif; ?>>(GMT+10:30) Lord Howe Island</option>
                                                <option value="Etc/GMT-11"
                                                    <?php if(Config::get('constants.timezone')=='Etc/GMT-11' ): ?> selected
                                                    <?php endif; ?>>(GMT+11:00) Solomon Is., New Caledonia</option>
                                                <option value="Asia/Magadan"
                                                    <?php if(Config::get('constants.timezone')=='Asia/Magadan' ): ?> selected
                                                    <?php endif; ?>>(GMT+11:00) Magadan</option>
                                                <option value="Pacific/Norfolk"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Norfolk' ): ?> selected
                                                    <?php endif; ?>>(GMT+11:30) Norfolk Island</option>
                                                <option value="Asia/Anadyr"
                                                    <?php if(Config::get('constants.timezone')=='Asia/Anadyr' ): ?> selected
                                                    <?php endif; ?>>(GMT+12:00) Anadyr, Kamchatka</option>
                                                <option value="Pacific/Auckland"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Auckland' ): ?> selected
                                                    <?php endif; ?>>(GMT+12:00) Auckland, Wellington</option>
                                                <option value="Etc/GMT-12"
                                                    <?php if(Config::get('constants.timezone')=='Etc/GMT-12' ): ?> selected
                                                    <?php endif; ?>>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                <option value="Pacific/Chatham"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Chatham' ): ?> selected
                                                    <?php endif; ?>>(GMT+12:45) Chatham Islands</option>
                                                <option value="Pacific/Tongatapu"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Tongatapu' ): ?>
                                                    selected <?php endif; ?>>(GMT+13:00) Nuku'alofa</option>
                                                <option value="Pacific/Kiritimati"
                                                    <?php if(Config::get('constants.timezone')=='Pacific/Kiritimati' ): ?>
                                                    selected <?php endif; ?>>(GMT+14:00) Kiritimati</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_number"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Contact_Number'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="number"
                                                value="<?php echo e(config('constants.contact_number', '911')); ?>"
                                                name="contact_number" required id="contact_number"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Contact_Number'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_email"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Contact_Email'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="email"
                                                value="<?php echo e(config('constants.contact_email', '')); ?>"
                                                name="contact_email" required id="contact_email"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Contact_Email'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sos_number"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.SOS_Number'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="number"
                                                value="<?php echo e(config('constants.sos_number', '911')); ?>" name="sos_number"
                                                required id="sos_number"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.SOS_Number'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tax_percentage"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Copyright_Content'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.site_copyright', '&copy; '.date('Y').' Thinkin Cab')); ?>"
                                                name="site_copyright" id="site_copyright"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Copyright_Content'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="social">
                        <div class=" row">
                            <div class="col-md-8">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <label for="store_link_android"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Android_user_link'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.store_link_android_user', '')); ?>"
                                                name="store_link_android_user" id="store_link_android_user"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Android_user_link'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Android_provider_link'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.store_link_android_provider', '')); ?>"
                                                name="store_link_android_provider" id="store_link_android_provider"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Android_provider_link'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Ios_user_Link'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.store_link_ios_user', '')); ?>"
                                                name="store_link_ios_user" id="store_link_ios_user"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Ios_user_Link'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Ios_provider_Link'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.store_link_ios_provider', '')); ?>"
                                                name="store_link_ios_provider" id="store_link_ios_provider"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Ios_provider_Link'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Facebook_Link'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.store_facebook_link', '')); ?>"
                                                name="store_facebook_link" id="store_facebook_link"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Facebook_Link'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Instagram_Link'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.store_instagram_link', '')); ?>"
                                                name="store_instagram_link" id="store_instagram_link"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Instagram_Link'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Twitter_Link'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.store_twitter_link', '')); ?>"
                                                name="store_twitter_link" id="store_twitter_link"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.Twitter_Link'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios" class="col-xs-3 bmd-label-floating">Versão App Andorid
                                            User</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.version_android_user', '')); ?>"
                                                name="version_android_user" id="version_android_user"
                                                placehold="Código da Versão">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios" class="col-xs-3 bmd-label-floating">Versão App Andorid
                                            Driver</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.version_android_provider', '')); ?>"
                                                name="version_android_provider" id="version_android_provider"
                                                placehold="Código da Versão">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios" class="col-xs-3 bmd-label-floating">Versão App IOS
                                            User</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.version_ios_user', '')); ?>"
                                                name="version_ios_user" id="version_ios_user"
                                                placehold="Código da Versão">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_link_ios" class="col-xs-3 bmd-label-floating">Versão App IOS
                                            Driver</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.version_ios_provider', '')); ?>"
                                                name="version_ios_provider" id="version_ios_provider"
                                                placehold="Código da Versão">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="socialConfiguration">
                        <div class=" row">
                            <div class="col-md-8">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <label for="social_login"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Social_Login'); ?></label>
                                        <div class="col-xs-9">
                                            <select class="form-control" id="social_login" name="social_login"
                                                autocomplete="off">
                                                <option value="1" <?php if(config('constants.social_login', 0)==1): ?> selected
                                                    <?php endif; ?>><?php echo app('translator')->getFromJson('admin.Enable'); ?></option>
                                                <option value="0" <?php if(config('constants.social_login', 0)==0): ?> selected
                                                    <?php endif; ?>><?php echo app('translator')->getFromJson('admin.Disable'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="social_container"
                                        style=" <?php if(config('constants.social_login', 0) == 0): ?> display: none;  <?php endif; ?>  ">
                                        <hr>
                                        <div class="form-group">
                                            <label for="store_link_android"
                                                class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.facebook_client_id'); ?></label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text"
                                                    value="<?php echo e(Config::get('constants.facebook_client_id')); ?>"
                                                    name="facebook_client_id" id="facebook_client_id"
                                                    placehold="<?php echo app('translator')->getFromJson('admin.setting.facebook_client_id'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="store_link_android"
                                                class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.facebook_client_secret'); ?></label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text"
                                                    value="<?php echo e(Config::get('constants.facebook_client_secret')); ?>"
                                                    name="facebook_client_secret" id="facebook_client_secret"
                                                    placehold="<?php echo app('translator')->getFromJson('admin.setting.facebook_client_secret'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="store_link_android"
                                                class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.facebook_redirect'); ?></label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text"
                                                    value="<?php echo e(Config::get('constants.facebook_redirect')); ?>"
                                                    name="facebook_redirect" id="facebook_redirect"
                                                    placehold="<?php echo app('translator')->getFromJson('admin.setting.facebook_redirect'); ?>">
                                            </div>
                                        </div>

                                        <br><br>


                                        <div class="form-group">
                                            <label for="store_link_android"
                                                class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.google_client_id'); ?></label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text"
                                                    value="<?php echo e(Config::get('constants.google_client_id')); ?>"
                                                    name="google_client_id" id="google_client_id"
                                                    placehold="<?php echo app('translator')->getFromJson('admin.setting.google_client_id'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="store_link_android"
                                                class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.google_client_secret'); ?></label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text"
                                                    value="<?php echo e(Config::get('constants.google_client_secret')); ?>"
                                                    name="google_client_secret" id="google_client_secret"
                                                    placehold="<?php echo app('translator')->getFromJson('admin.setting.google_client_secret'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="store_link_android"
                                                class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.google_redirect'); ?></label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text"
                                                    value="<?php echo e(Config::get('constants.google_redirect')); ?>"
                                                    name="google_redirect" id="google_redirect"
                                                    placehold="<?php echo app('translator')->getFromJson('admin.setting.google_redirect'); ?>">
                                            </div>
                                        </div>

                                        <hr>
                                    </div>

                                    <div class="form-group">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="provider">
                        <div class=" row">
                            <div class="col-md-10">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <label for="provider_select_timeout"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Provider_Accept_Timeout'); ?>
                                            (Secs)</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="number"
                                                value="<?php echo e(config('constants.provider_select_timeout', '60')); ?>"
                                                name="provider_select_timeout" required id="provider_select_timeout"
                                                placehold="Provider Timout">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="provider_search_radius"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.Provider_Search_Radius'); ?>
                                            (Kms)</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="number"
                                                value="<?php echo e(config('constants.provider_search_radius', '100')); ?>"
                                                name="provider_search_radius" required id="provider_search_radius"
                                                placehold="Provider Search Radius">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="distance"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.distance'); ?></label>
                                        <div class="col-xs-9">
                                            <select name="distance" class="form-control">
                                                <option value="Kms" <?php if(config('constants.distance')=='Kms' ): ?> selected
                                                    <?php endif; ?>>Kms</option>
                                                <option value="Miles" <?php if(config('constants.distance')=='Miles' ): ?>
                                                    selected <?php endif; ?>>Miles</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane" id="api">
                        <div class=" row">
                            <div class="col-md-10">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">

                                        <label for="map_key"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.map_key'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(Config::get('constants.map_key')); ?>" name="map_key" required
                                                id="map_key" placehold="<?php echo app('translator')->getFromJson('admin.setting.map_key'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook_app_version"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.fb_app_version'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(Config::get('constants.facebook_app_version')); ?>"
                                                name="facebook_app_version" required id="facebook_app_version"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.fb_app_version'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook_app_id"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.fb_app_id'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(Config::get('constants.facebook_app_id')); ?>"
                                                name="facebook_app_id" required id="facebook_app_id"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.fb_app_id'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="facebook_app_secret"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.fb_app_secret'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(Config::get('constants.facebook_app_secret')); ?>"
                                                name="facebook_app_secret" required id="facebook_app_secret"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.fb_app_secret'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="mailconfig">
                        <div class=" row">
                            <div class="col-md-10">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form">
                                    <?php echo e(csrf_field()); ?>



                                    <div class="form-group" id="mail_request">
                                        <label for="stripe_secret_key" class="col-xs-3 bmd-label-floating">
                                            <?php echo app('translator')->getFromJson('admin.setting.send_mail'); ?> </label>
                                        <div class="col-xs-9">
                                            <div class="float-xs-left mr-1"><input
                                                    <?php if(config('constants.send_email')==1): ?> checked <?php endif; ?>
                                                    name="send_email" type="checkbox" class="js-switch"
                                                    data-color="#43b968" id="mailchk"></div>
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="social_login"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_driver'); ?></label>
                                        <div class="col-xs-9">
                                            <select class="form-control" name="mail_driver" required id="mail_driver">
                                                <option value="SMTP" <?php if(config('constants.mail_driver')=='SMTP' ): ?>
                                                    selected <?php endif; ?>><?php echo app('translator')->getFromJson('admin.setting.smtp'); ?></option>
                                                <option value="MAILGUN" <?php if(config('constants.mail_driver')=='MAILGUN' ): ?>
                                                    selected <?php endif; ?>><?php echo app('translator')->getFromJson('admin.setting.mailgun'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="mail_host"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_host'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_host')); ?>" name="mail_host" required
                                                id="mail_host" placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_host'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="mail_port"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_port'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_port')); ?>" name="mail_port" required
                                                id="mail_port" placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_port'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="mail_username"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_username'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_username')); ?>" name="mail_username"
                                                required id="mail_username"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_username'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="mail_password"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_password'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_password')); ?>" name="mail_password"
                                                required id="mail_password"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_password'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="mail_from_address"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_from_address'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="email"
                                                value="<?php echo e(config('constants.mail_from_address')); ?>"
                                                name="mail_from_address" required id="mail_from_address"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_from_address'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="mail_from_name"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_from_name'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_from_name')); ?>" name="mail_from_name"
                                                required id="mail_from_name"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_from_name'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail">
                                        <label for="mail_encryption"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_encryption'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_encryption')); ?>"
                                                name="mail_encryption" required id="mail_encryption"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_encryption'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail mail_domain">
                                        <label for="mail_domain"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_domain'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_domain')); ?>" name="mail_domain"
                                                id="mail_domain" placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_domain'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group hidemail mail_secret">
                                        <label for="mail_secret"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.mail_secret'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.mail_secret')); ?>" name="mail_secret"
                                                id="mail_secret" placehold="<?php echo app('translator')->getFromJson('admin.setting.mail_secret'); ?>">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="pushnotification">
                        <div class=" row">
                            <div class="col-md-10">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group">
                                        <label for="mail_driver"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.environment'); ?></label>
                                        <div class="col-xs-9">
                                            <select name="environment" required id="environment" class="form-control">
                                                <option value="development">Development</option>
                                                <option value="production">Production</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mail_driver"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.ios_push_user_pem'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="file" value="" name="user_pem"
                                                id="user_pem" placehold="<?php echo app('translator')->getFromJson('admin.setting.ios_push_user_pem'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mail_driver"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.ios_push_provider_pem'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="file" value="" name="provider_pem"
                                                id="provider_pem"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.ios_push_provider_pem'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mail_host"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.ios_push_password'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(Config::get('constants.ios_push_password')); ?>"
                                                name="ios_push_password" required id="ios_push_password"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.ios_push_password'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mail_port"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.android_push_key'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(Config::get('constants.android_push_key')); ?>"
                                                name="android_push_key" required id="android_push_key"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.android_push_key'); ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="others">
                        <div class=" row">
                            <div class="col-md-10">
                                <form class="form-horizontal" action="<?php echo e(route('admin.settings.store')); ?>" method="POST"
                                    enctype="multipart/form-data" role="form">
                                    <?php echo e(csrf_field()); ?>



                                    <div class="form-group" id="referral_request">
                                        <label for="stripe_secret_key" class="col-xs-3 bmd-label-floating">
                                            <?php echo app('translator')->getFromJson('admin.setting.referral'); ?> </label>
                                        <div class="col-xs-9">
                                            <div class="float-xs-left mr-1"><input <?php if(config('constants.referral')==1): ?>
                                                    checked <?php endif; ?> name="referral" type="checkbox" class="js-switch"
                                                    data-color="#43b968" id="refchk"></div>
                                        </div>
                                    </div>

                                    <div class="form-group hideref">
                                        <label for="referral_count"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.referral_count'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="number"
                                                value="<?php echo e(config('constants.referral_count')); ?>" name="referral_count"
                                                required id="referral_count"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.referral_count'); ?>" min="0">
                                        </div>
                                    </div>

                                    <div class="form-group hideref">
                                        <label for="referral_amount"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.setting.referral_amount'); ?></label>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="number"
                                                value="<?php echo e(config('constants.referral_amount')); ?>"
                                                name="referral_amount" required id="referral_amount"
                                                placehold="<?php echo app('translator')->getFromJson('admin.setting.referral_amount'); ?>" min="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stripe_secret_key" class="col-xs-3 bmd-label-floating"> Atribuição
                                            Manual </label>
                                        <div class="col-xs-9">
                                            <div class="float-xs-left mr-1"><input
                                                    <?php if(config('constants.manual_request')==1): ?> checked <?php endif; ?>
                                                    name="manual_request" type="checkbox" class="js-switch"
                                                    data-color="#43b968"></div>
                                        </div>
                                    </div>



                                    <div class="form-group" id="broadcast_request">
                                        <label id="unicast" for="broadcast_request"
                                            class="col-xs-3 bmd-label-floating">Solicitação Única </label>
                                        <div class="col-xs-1">
                                            <div class="float-xs-left mr-1"><input
                                                    <?php if(config('constants.broadcast_request')==1): ?> checked <?php endif; ?>
                                                    name="broadcast_request" id="bdchk" type="checkbox"
                                                    class="js-switch" data-color="#43b968"></div>
                                        </div>
                                        <label id="broadcast" for="broadcast_request"
                                            class="col-xs-2 col-form-label"></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="stripe_secret_key" class="col-xs-3 bmd-label-floating">Verificação
                                            OTP</label>
                                        <div class="col-xs-9">
                                            <div class="float-xs-left mr-1"><input <?php if(config('constants.ride_otp')==1): ?>
                                                    checked <?php endif; ?> name="ride_otp" type="checkbox" class="js-switch"
                                                    data-color="#43b968"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="stripe_secret_key" class="col-xs-3 bmd-label-floating">Verificação
                                            Pedágio</label>
                                        <div class="col-xs-9">
                                            <div class="float-xs-left mr-1"><input <?php if(config('constants.ride_toll')==1): ?>
                                                    checked <?php endif; ?> name="ride_toll" type="checkbox" class="js-switch"
                                                    data-color="#43b968"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="booking_prefix"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.payment.booking_id_prefix'); ?></label>
                                        <div class="col-xs-8">
                                            <input class="form-control" type="text"
                                                value="<?php echo e(config('constants.booking_prefix', '0')); ?>"
                                                id="booking_prefix" name="booking_prefix" min="0" max="4"
                                                placehold="Booking ID Prefix">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="base_price"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.payment.currency'); ?>
                                            ( <strong><?php echo e(config('constants.currency', '$')); ?> </strong>)
                                        </label>
                                        <div class="col-xs-8">
                                            <select name="currency" class="form-control" required>
                                                <option <?php if(config('constants.currency')=="R$" ): ?> selected <?php endif; ?>
                                                    value="R$">Real (BRL)</option>
                                                <option <?php if(config('constants.currency')=="$" ): ?> selected <?php endif; ?>
                                                    value="$">US Dollar (USD)</option>
                                                <option <?php if(config('constants.currency')=="₹" ): ?> selected <?php endif; ?>
                                                    value="₹"> Indian Rupee (INR)</option>
                                                <option <?php if(config('constants.currency')=="د.ك" ): ?> selected <?php endif; ?>
                                                    value="د.ك">Kuwaiti Dinar (KWD)</option>
                                                <option <?php if(config('constants.currency')=="د.ب" ): ?> selected <?php endif; ?>
                                                    value="د.ب">Bahraini Dinar (BHD)</option>
                                                <option <?php if(config('constants.currency')=="﷼" ): ?> selected <?php endif; ?>
                                                    value="﷼">Omani Rial (OMR)</option>
                                                <option <?php if(config('constants.currency')=="£" ): ?> selected <?php endif; ?>
                                                    value="£">British Pound (GBP)</option>
                                                <option <?php if(config('constants.currency')=="€" ): ?> selected <?php endif; ?>
                                                    value="€">Euro (EUR)</option>
                                                <option <?php if(config('constants.currency')=="CHF" ): ?> selected <?php endif; ?>
                                                    value="CHF">Swiss Franc (CHF)</option>
                                                <option <?php if(config('constants.currency')=="ل.د" ): ?> selected <?php endif; ?>
                                                    value="ل.د">Libyan Dinar (LYD)</option>
                                                <option <?php if(config('constants.currency')=="B$" ): ?> selected <?php endif; ?>
                                                    value="B$">Bruneian Dollar (BND)</option>
                                                <option <?php if(config('constants.currency')=="S$" ): ?> selected <?php endif; ?>
                                                    value="S$">Singapore Dollar (SGD)</option>
                                                <option <?php if(config('constants.currency')=="AU$" ): ?> selected <?php endif; ?>
                                                    value="AU$"> Australian Dollar (AUD)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if(Setting::get('demo_mode', 0) != 1): ?>
                                    <div class="form-group">
                                        <label for="stripe_secret_key"
                                            class="col-xs-3 bmd-label-floating"><?php echo app('translator')->getFromJson('admin.db_backup'); ?></label>
                                        <div class="col-xs-9">
                                            <div class="float-xs-left mr-1"> <a href="<?php echo e(route('admin.dbbackup')); ?>"
                                                    class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.db_backup_btn'); ?> <i
                                                        class="fa fa-download" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                                        <div class="col-xs-10">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.setting.Update_Site_Settings'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    switchbroadcast();
    switchreferral();
    switchmail();
    switchMailDomain();
    $('#broadcast_request').click(function (e) {
        switchbroadcast();
    });
    $('#referral_request').click(function (e) {
        switchreferral();
    });
    $('#mail_request').click(function (e) {
        switchmail();
        switchMailDomain();
    });
    $('#mail_driver').click(function (e) {
        switchMailDomain();
    });


    $('select[name=social_login]').on('change', function (e) {
        var value = $(this).val();
        $('.social_container').hide();
        $('.social_container input').prop('disabled', true);
        if (value == 1) {
            $('.social_container').show();
            $('.social_container input').prop('disabled', false);
        }

    });

    function switchbroadcast() {
        var isChecked = $("#bdchk").is(":checked");
        if (isChecked) {
            $("#broadcast").text('Solicitação Simultânea');
            $("#unicast").text('');
        } else {
            $("#unicast").text('Solicitação Única');
            $("#broadcast").text('');
        }
    }

    function switchreferral() {
        var isChecked = $("#refchk").is(":checked");
        if (isChecked) {
            $(".hideref").show();
        } else {
            $(".hideref").hide();
        }
    }

    function switchmail() {
        var isChecked = $("#mailchk").is(":checked");
        if (isChecked) {
            $(".hidemail").find('input').attr('required', true);
            $(".hidemail").show();
        } else {
            $(".hidemail").find('input').attr('required', false);
            $(".hidemail").hide();
        }
    }

    function switchMailDomain() {
        var mailDriver = $("#mail_driver").val();
        if (mailDriver == "SMTP") {
            $(".hidemail").find('.mail_secret').attr('required', false);
            $(".hidemail").find('.mail_domain').attr('required', false);
            $(".mail_secret").hide();
            $(".mail_domain").hide();
        } else {
            $(".hidemail").find('.mail_secret').attr('required', true);
            $(".hidemail").find('.mail_domain').attr('required', true);
            $(".mail_secret").show();
            $(".mail_domain").show();
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>