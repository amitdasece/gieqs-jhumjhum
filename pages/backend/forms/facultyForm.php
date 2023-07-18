<div class="modal fade" id="modal-faculty" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
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
                                    <h5 class="mb-0">Edit Faculty Details</h5>
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
                                        <span id = "modalMessageArea" class="mb-0"></span>

                                    </div>
                                    <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
    <span id="topModalSuccess"></span>
</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="faculty-body">
                                <form id="faculty-form">
                                    <div class="form-group">
                                    <!-- EDIT -->

                                    
                                    <label for="title">title</label>
                                        <div class="input-group mb-3">
                                            <select id="title" type="text" data-toggle="select" class="form-control" name="title">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="Professor">Professor</option>
                                            <option value="Dr">Dr</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            </select>
                                        </div>


                                        <label for="firstname">firstname</label>
                                        <div class="input-group mb-3">
                                            <input id="firstname" type="text" class="form-control" name="firstname">
                                        </div>

                                        <label for="surname">surname</label>
                                        <div class="input-group mb-3">
                                            <input id="surname" type="text" class="form-control" name="surname">
                                        </div>

                                        <label for="type">faculty type</label>
                                        <div class="input-group mb-3">
                                            <select id="type" type="text" data-toggle="select" class="form-control" name="type">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="1">International</option>
                                            <option value="2">National</option>
                                            <option value="3">Moderator</option>
                                            <option value="4">Speaker</option>
                                            <option value="5">UZ Gent Staf</option>
                                            <option value="6">UZ Gent Assistant</option>
                                            </select>
                                        </div>

                                        

                                        



                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="submit-<?php echo $databaseName;?>-form btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>