<?php
    $fields = array(
        'email_lists' => get_option("cvo_notifications_email_lists",''),
        'email_subject' => get_option("cvo_notifications_email_subject",''),
        'google_container_script' => get_option("cvo_notifications_google_container_script",''),
        'company_address' => get_option("cvo_notifications_company_address",''),
        'company_phone' => get_option("cvo_notifications_company_phone",''),
    );

    if (isset($_POST)) {
        if (isset($_POST['email_subject']) && !empty($_POST['email_subject'])) {
            $fields['email_subject'] = $_POST['email_subject'];
            update_option("cvo_notifications_email_subject", $fields['email_subject']);
        }

        if (isset($_POST['email_lists']) && !empty($_POST['email_lists'])) {
            $fields['email_lists'] = $_POST['email_lists'];
            update_option("cvo_notifications_email_lists", $fields['email_lists']);
        }

        if (isset($_POST['google_container_script']) && !empty($_POST['google_container_script'])) {
            $fields['google_container_script'] = stripslashes($_POST['google_container_script']);
            update_option("cvo_notifications_google_container_script", $fields['google_container_script']);
        }

        if (isset($_POST['company_address']) && !empty($_POST['company_address'])) {
            $fields['company_address'] = stripslashes($_POST['company_address']);
            update_option("cvo_notifications_company_address", $fields['company_address']);
        }

        if (isset($_POST['company_phone']) && !empty($_POST['company_phone'])) {
            $fields['company_phone'] = stripslashes($_POST['company_phone']);
            update_option("cvo_notifications_company_phone", $fields['company_phone']);
        }

    }
 ?>
<div class="wrap">
    <h2>Convertro General Settings Page</h2>
    <form method="POST" action="">
        <hr><h3>Company information</h3>
        <table class="form-table">
            <tr>
                <th><label for="company_address">Company Address:</label></th>
                <td>
                    <input type="text" name="company_address" value="<?php echo $fields['company_address']; ?>">
                </td>
            </tr>
            <tr>
                <th><label for="company_phone">Company Phone:</label></th>
                <td>
                    <input type="text" name="company_phone" value="<?php echo $fields['company_phone']; ?>">
                </td>
            </tr>
        </table>

        <hr><h3>Notifications</h3>
        <table class="form-table">
            <tr>
                <th><label for="email_subject">Email subject line:</label></th>
                <td>
                    <input type="text" name="email_subject" value="<?php echo $fields['email_subject']; ?>">
                </td>
            </tr>
            <tr>
                <th><label for="primary_email">Email addresses:</label> <span>Separated by comma</span></th>
                <td>
                    <textarea name="email_lists" cols="50" rows="7"><?php echo $fields['email_lists']; ?></textarea>
                </td>
            </tr>
        </table>

        <hr><h3>Google tag container</h3>
        <table class="form-table">
            <tr>
                <th><label for="google_container_script">Paste Google Container:</label></th>
                <td><textarea name="google_container_script" cols="50" rows="7"><?php echo $fields['google_container_script']; ?></textarea></td>
            </tr>

        </table>
        <p>
            <input type="submit" value="Save" class="button-primary"/>
        </p>
    </form>
</div>