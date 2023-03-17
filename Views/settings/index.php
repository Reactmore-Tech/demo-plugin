<?= $this->extend('admin/partials/main_layout') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= adminUrl() ?>"><?= trans('dashboard') ?></a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <?= view('admin/plugin/_nav_plugins') ?>
            </div>
            <div class="col-md-9">
                <form class="z-form" data-csrf="manual" data-client-validation="true" action="<?= base_url('admin/demo/demoSettingsPost'); ?>" method="post" enctype="multipart/form-data">
                    <div class="response-message"></div>
                    <?= csrf_field(); ?>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= trans('demo_lang.demo_settings') ?></h3>
                        </div>
                        
                        <div class="card-body">
                            <input type="hidden" name="id" value="1">
                            <div class="form-group clearfix">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <label><?= trans('demo_lang.mode_debug'); ?></label>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 icheck-primary d-inline">
                                        <input type="radio" id="rb_mode_debug_1" value="1" name="mode_debug" <?= get_demo_setting('mode_debug') == "1" ? 'checked' : ''; ?>>
                                        <label for="rb_mode_debug_1"><?= trans("active"); ?></label>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 icheck-primary d-inline">
                                        <input type="radio" id="rb_mode_debug_2" value="0" name="mode_debug" <?= get_demo_setting('mode_debug') != "1" ? 'checked' : ''; ?>>
                                        <label for="rb_mode_debug_2"><?= trans("inactive"); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" data-is-selected="select" class="btn btn-primary float-right"><?= trans('save_changes'); ?></button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>