<?php if (isset($_GET['msg'])): ?>
<div class="container" style="margin-top: 30px">
    <?php if ($_GET['msg'] == "success"): ?>
    <div class="alert alert-success">
        <h4>Success</h4>
        <p>booking request submitted successfully</p>
    </div>
    <?php elseif ($_GET['msg'] == "not_logged_in"): ?>
    <div class="alert alert-danger">
        <h4>Failure</h4>
        <p>not logged in. LOGIN to book the provider!</p>
    </div>
    <?php elseif ($_GET['msg'] == "failed"): ?>
    <div class="alert alert-danger">
        <h4>Failure</h4>
        <p>Problem while booking appointment! Please try again later!</p>
    </div>
    <?php endif; ?>
</div>
<?php endif;
