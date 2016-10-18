{*
* @version     2.1
* @module      WebRotate 360 Product Viewer for Prestashop
* @author      WebRotate 360 LLC
* @copyright   Copyright (C) 2015 WebRotate 360 LLC. All rights reserved.
* @license     GNU General Public License version 2 or later (http://www.gnu.org/copyleft/gpl.html).
*}

<div class="product-tab-content" style="">
    <div class="panel product-tab">
        <h3>Configure 360 product view</h3>
        <div class="alert alert-info">
            Enter a URL pointing to the uploaded WebRotate 360 config xml file on your FTP (this xml file is auto-created under 360_assets in the published folder of your SpotEditor project). Try this test URL as needed: /modules/webrotate360/360assets/sampleshoe/config.xml.
            Alternatively, you can set a single Master Config URL under WebRotate 360 module settings for all products, and only use the Root Path setting below to specify the location of the folder with the 360 degree images for this product on your FTP (e.g /modules/webrotate360/360assets/sampleshoe/).<br>
        </div>
        <input type="hidden" name="rec_exists" value="{$rec_exists|escape:'html':'UTF-8'}">
        <div class="form-group">
            <label class="control-label col-lg-3" for="uploadable_files">
                <span class="label-tooltip" data-toggle="tooltip" title="qwd">
                    WebRotate 360 Config URL
                </span>
            </label>
            <div class="col-lg-9">
                <input name="config_file_url" class="form-control" value="{$config_file_url|escape:'html':'UTF-8'}" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="uploadable_files">
                <span class="label-tooltip" data-toggle="tooltip" title="qwd">
                    Root Path
                </span>
            </label>
            <div class="col-lg-9">
                <input name="root_path" class="form-control" value="{$root_path|escape:'html':'UTF-8'}" type="text">
            </div>
        </div>
        <div class="panel-footer">
            <a href="{$link->getAdminLink('AdminProducts')|escape:'html':'UTF-8'}" class="btn btn-default"><i class="process-icon-cancel"></i>Cancel</a>
            <button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i>Save</button>
            <button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i>Save and stay</button>
        </div>
    </div>
</div>


