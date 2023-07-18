<div class="modal fade" id="modal-asset" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content mc1 bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                        <img src="../../assets/img/icons/gieqsicon.png">
                                    </div>
                                </div>
                                <div class="text-left">
                                    <h5 class="mb-0">Edit Asset Details</h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <div>
                                        <h6 class="mb-0"></h6>
                                        <span id = "modalMessageArea-asset" class="mb-0"></span>

                                    </div>
                                    <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
    <span id="topModalSuccess"></span>
</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="asset-body">
                                <form id="asset-form">
                                    <div class="form-group">
                                    <!-- EDIT -->

                                    
                                        <label for="Assettype">Asset Type</label>
                                        <div class="input-group mb-3">
                                            <select id="Assettype" type="text" data-toggle="select" class="form-control" name="Assettype">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="1">Video</option>
                                            <option value="2">Set of Images</option>
                                            <option value="3">Patient</option>
                                            <option value="4">Academic Reference</option>
                                            <option value="5">Presentation</option>
                                            </select>
                                        </div>
                                    
                                        <label for="Assethref">Asset Reference</label>
                                        <div class="input-group mb-3">
                                            <input id="Assethref" type="text" class="form-control" name="Assethref">
                                        </div>

                                        <label for="Assetlocation">Asset Location</label>
                                        <div class="input-group mb-3">
                                            <select id="Assetlocation" type="text" data-toggle="select" class="form-control" name="Assetlocation">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="1">Online</option>
                                            <option value="2">Offline HDD, (include in reference where)</option>
                                            <option value="3">Patient</option>
                                            </select>
                                        </div>

                                        <label for="Assetendoscopy_wiki_id">Endoscopy Wiki Link</label>
                                        <div class="input-group mb-3">
                                            <input id="Assetendoscopy_wiki_id" type="text" class="form-control" name="Assetendoscopy_wiki_id">
                                            <button id="assetCheck" type="button" class="btn btn-xs btn-secondary">check</button>
                                        </div>

                                        <label for="Assetdescription">Description</label>
                                        <div class="input-group mb-3">
                                            <textarea id="Assetdescription" type="text" data-toggle="autosize" class="form-control" name="SIdescription"></textarea>
                                        </div>
                                        
                                        <!-- <div class="dropzone" id="id_dropzone"></div> -->
                                        
                                        



                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="submit-asset-form btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>