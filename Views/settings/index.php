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
                <?= view('admin/includes/_messages'); ?>
                <div class="card plugin-card">
                    <div class="card-header">
                        <h3 class="card-title"><?= trans('demo_lang.demo_settings') ?></h3>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>