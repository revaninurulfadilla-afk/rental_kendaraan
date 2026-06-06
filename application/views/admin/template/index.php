<?php $this->load->view('template_admin/header'); ?>
<?php $this->load->view('template_admin/sidebar'); ?>
<?php $this->load->view('template_admin/topbar'); ?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <?php $this->load->view($content); ?>

        </div>
    </section>

</div>

<?php $this->load->view('template_admin/footer'); ?>
<?php $this->load->view('template_admin/script'); ?>