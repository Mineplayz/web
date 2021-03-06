<?php

// ::ZETA-PRODUCER-NO-COMPRESSION::

require_once('../afx.inc.php');

$loginController = new ZpsBackendResetPasswordController();
$viewBag = $loginController->HandleGetOrPost();

$title = "Kennwort zur&uuml;cksetzen";
?>

<?php require_once('_header.php') ?>

<!-- ##################################################################### -->

<?php if ($viewBag['tokenValid']) { ?>

    <script>
        $(function () {
            $('#drowssap').focus();
        });
    </script>

    <form method="post" action="<?=UrlHelper::GetCurrentFullUrl()?>" autocomplete="off" role="presentation">

        <?php require_once('_password-autocomplete-hider.php') ?>

        <div class="row delta-y-before-2 <?=ArrayHelper::GetValue($viewBag, 'pw.class')?> form-group">
            <div class="col-md-12">
                <label for="pw">Neues Kennwort</label>
            </div>
            <div class="col-md-12">
                <input type="password" placeholder="Neues Kennwort" id="drowssap" name="drowssap" class="form-control" style="max-width: 300px;" data-lpignore="true" />
            </div>
            <?php if ( ArrayHelper::HasValue($viewBag, 'pw.error') ) { ?>
            <div class="col-md-12 error-text">
                <?=$viewBag['pw.error']?>
            </div>
            <?php } ?>
        </div>

        <div class="row delta-y-before-2">
            <div class="col-md-12">
                <input class="btn btn-default btn-primary" type="submit" value="Kennwort zur&uuml;cksetzen" />
                <a href="<?=$viewBag['cancelUrl']?>" class="btn btn-default">Abbrechen</a>
            </div>
        </div>
    </form>

<?php } else { ?>

<div class="row delta-y-before-2">
    <div class="col-md-12">
        <a href="<?=$viewBag['cancelUrl']?>" class="btn btn-default">Zur&uuml;ck</a>
    </div>
</div>

<?php }  ?>

<!-- ##################################################################### -->

<?php require_once('_footer.php') ?>