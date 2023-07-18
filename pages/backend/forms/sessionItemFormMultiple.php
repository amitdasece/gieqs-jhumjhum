<div class="modal fade" id="modal-sessionItem" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
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
                                    <h5 class="mb-0">Edit Session Item Details</h5>
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
                                        <span id = "modalMessageArea-sessionItem" class="mb-0"></span>

                                    </div>
                                    <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
    <span id="topModalSuccess"></span>
</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="sessionItem-body">
                                <form id="sessionItem-form">
                                    <div class="form-group">
                                    <!-- EDIT -->

                                    
                                    <label for="SItimeFrom">Start Time</label>
                                        <div class="input-group mb-3">
                                            <input id="SItimeFrom" type="text" placeholder="hh:mm" data-toggle="time" class="form-control" name="SItimeFrom">
                                        </div>

                                        <label for="SItimeTo">End Time</label>
                                        <div class="input-group mb-3">
                                            <input id="SItimeTo" type="text" placeholder="hh:mm" data-toggle="time" class="form-control" name="SItimeTo">
                                        </div>
                                        
                                        <label for="SItitle">Title</label>
                                        <div class="input-group mb-3">
                                            <textarea id="SItitle" type="text" data-toggle="autosize" class="form-control" name="SItitle"></textarea>
                                        </div>

                                        <label for="SIdescription">Description</label>
                                        <div class="input-group mb-3">
                                            <textarea id="SIdescription" type="text" data-toggle="autosize" class="form-control" name="SIdescription"></textarea>
                                        </div>
                                        
                                        <label for="SIfaculty">faculty</label>
                                        <div class="input-group mb-3">
                                            <select id="SIfaculty" type="text" data-toggle="select" class="form-control" name="SIfaculty">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            
                                            </select>
                                        </div>

                                        <label for="SIlive">live</label>
                                        <div class="input-group mb-3">
                                            <select id="SIlive" type="text" data-toggle="select" class="form-control" name="SIlive">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                            </select>
                                        </div>

                                        <label for="SIurl_video">video attachment</label>
                                        <div class="input-group mb-3">
                                            <select id="SIurl_video" data-toggle="select" class="form-control" name="SIurl_video">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            
                                            </select>
                                        </div>

                                        



                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="submit-sessionItem-form btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>