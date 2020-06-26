<div class="col-md-8">

    <div class="leave-comment mr0"><!--leave comment-->
        <h3 class="text-uppercase">Login</h3>
        <br>
        <?= (!empty($date["authorization"]["error-message"]) ? "<p class='warning-message-reg'>" . $date["authorization"]["error-message"] . "</p>" : "") ?>
        <form class="form-horizontal contact-form" role="form" method="post">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Email"
                           value="<?= (!empty($date["email"]["value"])) ? $date["email"]["value"] : "" ?>">
                    <?= (!empty($date["email"]["error-message"]) ? "<p class='warning-message'>" . $date["email"]["error-message"] . "</p>" : "") ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="password">
                    <?= (!empty($date["password"]["error-message"]) ? "<p class='warning-message'>" . $date["password"]["error-message"] . "</p>" : "") ?>
                </div>
            </div>
            <button type="submit" name="submit" class="btn send-btn">Login</button>

        </form>
    </div><!--end leave comment-->
</div>