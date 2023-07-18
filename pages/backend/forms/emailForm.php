<div class="modal fade" id="modal-email" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
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
                                    <h5 class="mb-0">Edit Email Details</h5>
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
                                        <span id = "modalMessageArea-email" class="mb-0"></span>

                                    </div>
                                    <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
    <span id="topModalSuccess"></span>
</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="email-body">
                                <form id="email-form">
                                    <div class="form-group">
                                    <!-- EDIT -->

                            
                                    
                                    <label for="name">name</label>
                                        <div class="input-group mb-3">
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>

                                        <label for="description">description</label>
                                        <div class="input-group mb-3">
                                            <textarea id="description" type="text" data-toggle="autosize" class="form-control" name="description"></textarea>
                                        </div>

                                        <label for="asset_type">asset_type</label>
                                        <div class="input-group mb-3">
                                            <select id="asset_type" type="text" data-toggle="select" class="form-control" name="asset_type">
                                            <option value="1" selected>1 - Email</option>
                                            </select>
                                        </div>

                                        <label for="assetid">assetid</label>
                                        <div class="input-group mb-3">
                                            <select id="assetid" type="text" data-toggle="select" class="form-control" name="assetid">
                                            <option value="<?php echo $sessionIdentifier; ?>"><?php echo $sessionIdentifier . ' ' . $assets_paid->getname(); ?></option>
                                            <option value=""></option>
                                            </select>
                                        </div>

                                        <label for="path">path</label>
                                        <div class="dropzone" id="id_dropzone"></div>

                                        <!-- <div class="input-group mb-3">
                                            <input id="path" type="file" class="form-control" name="path" accept=".html">
                                        </div> -->

                                        <label for="send_date">send_date</label>
                                        <div class="input-group mb-3">
                                            <input id="send_date" type="text" class="form-control" name="send_date">
                                        </div>

                                        <label for="time_send">time_send</label>
                                        <div class="input-group mb-3">
                                            <input id="time_send" type="text" class="form-control" name="time_send" placeholder="hh:mm:ss">
                                        </div>


                                        



                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="submit-email-form btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>