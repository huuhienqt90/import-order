<div class="wrap">
    <h2><?php _e( "Import Order Settings", __TEXTDOMAIN__ ); ?></h2>
    <?php
        if( isset( $_POST['izw-save-import-setting'])){
            update_option('izw_import_export_settings', $_POST );
            do_action( 'izw_update_setting_fields');
            do_action( 'izw_exip_uninstall' );
            do_action( 'izw_exip_install' );
        }
        if( isset( $_POST['izw-export-product'])){
            IZWEB_Import_Export::izw_process_export_product();
        }
        if( isset( $_POST['izw-export-order'])){
            IZWEB_Import_Export::izw_process_export_order();
        }

        if( isset( $_POST['izw-update-product'])){
            IZWEB_Import_Export::izw_process_import_product();
        }
        if( isset( $_POST['izw-update-order'])){
            IZWEB_Import_Export::izw_process_import_order();
        }
        $import_folder = __IZWIEPATH__."imports";
        $export_folder = __IZWIEPATH__."exports";
        $izw_import_data = get_option( 'izw_import_export_settings');
        $data = array(
            'ftp_server' => !(empty( $izw_import_data['ftp_server'] ) ) ? $izw_import_data['ftp_server'] : '',
            'ftp_username' => !(empty( $izw_import_data['ftp_username'] ) ) ? $izw_import_data['ftp_username'] : '',
            'ftp_password' => !(empty( $izw_import_data['ftp_password'] ) ) ? $izw_import_data['ftp_password'] : '',
            'ftp_port' => !(empty( $izw_import_data['ftp_port'] ) ) ? $izw_import_data['ftp_port'] : '21',

            'import_folder' => !(empty( $izw_import_data['import_folder'] ) ) ? $izw_import_data['import_folder'] : $import_folder,
            'export_folder' => !(empty( $izw_import_data['export_folder'] ) ) ? $izw_import_data['export_folder'] : $export_folder,
            'import_time' => !(empty( $izw_import_data['import_time'] ) ) ? $izw_import_data['import_time'] : '',
            'export_time' => !(empty( $izw_import_data['export_time'] ) ) ? $izw_import_data['export_time'] : '',
            'product_number' => !(empty( $izw_import_data['product_number'] ) ) ? $izw_import_data['product_number'] : '12345',
            'order_number' => !(empty( $izw_import_data['order_number'] ) ) ? $izw_import_data['order_number'] : '12345',
        );
        $data = apply_filters( 'izw_field_settings', $data );
    ?>
    <div class="izw-import-order-settings">
        <form name="" action="" method="post">
            <table class="form-table">
                <tbody>
                    <?php do_action( 'izw_before_field_settings'); ?>
                    <tr>
                        <th scope="row" colspan="2"><h3>FTP information</h3></th>
                    </tr>
                    <tr>
                        <th scope="row"><label for="ftp_server">FTP Server</label></th>
                        <td>
                            <input class="regular-text" id="ftp_server" name="ftp_server" value="<?php echo $data['ftp_server']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="ftp_username">FTP Username</label></th>
                        <td>
                            <input class="regular-text" id="ftp_username" name="ftp_username" value="<?php echo $data['ftp_username']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="ftp_password">FTP Password</label></th>
                        <td>
                            <input type="password" class="regular-text" id="ftp_password" name="ftp_password" value="<?php echo $data['ftp_password']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="ftp_port">FTP & explicit FTPS port</label></th>
                        <td>
                            <input class="regular-text" id="ftp_port" name="ftp_port" value="<?php echo $data['ftp_port']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2"><h3>Import/Export Informations</h3></th>
                    </tr>
                    <tr>
                        <th scope="row"><label for="import_folder">Import Form Folder</label></th>
                        <td>
                            <input class="regular-text" id="import_folder" name="import_folder" value="<?php echo $data['import_folder']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="export_folder">Export To Folder</label></th>
                        <td>
                            <input class="regular-text" id="export_folder" name="export_folder" value="<?php echo $data['export_folder']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="import_time">Import Time</label></th>
                        <td>
                            <select name="import_time">
                                <?php echo get_schedule_time($data['import_time']); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="export_time">Export Time</label></th>
                        <td>
                            <select name="export_time">
                                <?php echo get_schedule_time($data['export_time']); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="product_number">Product Number</label></th>
                        <td>
                            <input type="text" name="product_number" value="<?php echo $data['product_number'] ; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="order_number">Order Number</label></th>
                        <td>
                            <input type="text" name="order_number" value="<?php echo $data['order_number'] ; ?>" />
                        </td>
                    </tr>
                    <?php do_action( 'izw_after_field_settings'); ?>
                </tbody>
            </table>
            <?php submit_button( 'Save Change', 'primary','izw-save-import-setting'); ?>
            <h2>Button To Test</h2>
            <p class="submit">
                <input type="submit" name="izw-export-product" id="izw-export-product" class="button button-primary" value="Export Product">
                <input type="submit" name="izw-export-order" id="izw-export-order" class="button button-primary" value="Export Order">
                <input type="submit" name="izw-update-product" id="izw-update-product" class="button button-primary" value="Update Product">
                <input type="submit" name="izw-update-order" id="izw-update-order" class="button button-primary" value="Update Order">
            </p>
        </form>
    </div>
</div><!-- END .wrap -->