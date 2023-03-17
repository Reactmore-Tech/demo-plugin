<?= $this->extend('admin/partials/main_layout') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
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
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3>
                <div class="card-tools">
                    <form action="<?= adminUrl('demo'); ?>" method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="q" class="form-control float-right" placeholder="<?= trans("search") ?>" value="<?= esc(inputGet('q', true)); ?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body records-card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="th-1"><?= trans('id'); ?></th>
                            <th class="th-2"><?= trans('event'); ?></th>
                            <th class="th-1"><?= trans('user'); ?></th>
                            <th class="th-2"><?= trans('date'); ?></th>
                        </tr>
                    </thead>
                    <tbody class="records-tbody">
                        <?php if (!empty($demo_data)) :
                            foreach ($demo_data as $demo) : ?>
                                <tr id="record-<?= $demo->id ?>">
                                    <td><?= $demo->id; ?></td>
                                    <td><?= $demo->event; ?></td>
                                    <td><?= $demo->user_id; ?></td>
                                    <td><?= formatDate($demo->created_at); ?></td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>

                </table>
            </div>
            <div class="card-footer p-2">
                <?= view('admin/includes/_pagination'); ?>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>