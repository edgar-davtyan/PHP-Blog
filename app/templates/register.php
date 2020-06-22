<div class="col-md-8">

    <div class="leave-comment mr0"><!--leave comment-->

        <h3 class="text-uppercase">Register</h3>
        <br>
        <form class="form-horizontal contact-form" role="form" method="post">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="Name"
                           value="<?= (!empty($date['name']["value"]) ? ($date['name']["value"]) : "") ?>">
                    <?= (!empty($date["name"]["error-message"]) ? "<p class='warning-message'>" . $date["name"]["error-message"] . "</p>" : "") ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Email"
                           value="<?= (!empty($date["email"]["value"]) ? $date["email"]["value"] : "") ?>">
                    <?= (!empty($date["email"]["error-message"]) ? "<p class='warning-message'>" . $date["email"]["error-message"] . "</p>" : "") ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="password" name="password"
                           placeholder="password">
                    <?= (!empty($date["password"]["error-message"]) ? "<p class='warning-message'>" . $date["password"]["error-message"] . "</p>" : "") ?>
                </div>
            </div>
            <button type="submit" name="submit" class="btn send-btn">Register</button>

        </form>
    </div><!--end leave comment-->
</div>
