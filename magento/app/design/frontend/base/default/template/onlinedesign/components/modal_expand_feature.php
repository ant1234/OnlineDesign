<?php //if (!defined('ABSPATH')) exit; // Exit if accessed directly  ?>
<div id="dg-expand-feature"  class="modal fade nbdesigner_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom: 15px;">
                <b><?php echo $this->__("Template Designs") ?></b>
                <button style="margin-top: 0;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>	
            </div>            
            <div class="modal-body" >
                <span ng-click="resetAdminDesign()" class="shadow hover-shadow feature-button" data-toggle="tooltip" data-original-title="<?php echo $this->__("Reset Template") ?>"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                <span ng-click="loadAdminListDesign()" class="shadow hover-shadow feature-button" data-toggle="tooltip" data-original-title="<?php echo $this->__("Load Template") ?>"><i class="fa fa-search" aria-hidden="true"></i></span>
                <span ng-click="exportDesign()" class="shadow hover-shadow feature-button" data-toggle="tooltip" data-original-title="<?php echo $this->__("Export design to JSON") ?>"><i class="fa fa-cloud-download" aria-hidden="true"></i></span>
                <span ng-click="toggleImportArea()" class="shadow hover-shadow feature-button" data-toggle="tooltip" data-original-title="<?php echo $this->__("Import design from JSON") ?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
                <div class="design-editor-container" id="design-editor-container">
                    <textarea class="design-editor" rows="10" id="design-json-content" placeholder="<?php echo $this->__("Paste content in file design.json") ?>"></textarea>
                    <button ng-click="importDesign()" class="btn btn-primary shadow nbdesigner_upload btn-dialog"><?php echo $this->__("Apply") ?></button>
                </div>
                <div class="nbdesigner-list-template" id="nbdesigner-list-template">  
                    <h3>Have {{_.size(adminListTemplate)}} templates</h3>
                    <img ng-repeat="tem in adminListTemplate | limitTo : adminTemplatePageSize" ng-src="{{tem['src']}}" class="nbdesigner-template shadow hover-shadow" ng-click="loadExtraAdminDesign(tem['id'])"/>
                    <div ng-show="_.size(adminListTemplate) > 8 && _.size(adminListTemplate) > adminTemplatePageSize">
                        <button class="btn btn-primary shadow nbdesigner_upload btn-dialog" ng-click="adminTemplatePageSize = adminTemplatePageSize + 8"><?php echo $this->__("More") ?></button>
                        &nbsp;<?php echo $this->__("Displayed") ?> {{(adminTemplatePageSize < _.size(adminListTemplate)) ? adminTemplatePageSize : _.size(adminListTemplate)}}/{{_.size(adminListTemplate)}}
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>