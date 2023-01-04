<?php
//        $a = new SCWoocommerceApi();
//        pr($a->SCgetValues("products"));

//pr($_COOKIE);
//session_start();
//ob_start();
//pr($_SESSION);
//pr("denemesene");

?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="h4">Suitcentury Plugin Settings</div>

            <hr class="my-1">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <div class="list-group">
                <div type="button" class="list-group-item list-group-item-action active" data-bs-toggle="tab"
                     data-bs-target="#nav-dashboard">
                    Dashboard
                </div>

                <div type="button" class="list-group-item list-group-item-action" data-bs-toggle="tab"
                     data-bs-target="#nav-general">
                    General
                </div>

                <div type="button" class="list-group-item list-group-item-action" data-bs-toggle="tab"
                     data-bs-target="#nav-user">
                    Endpoints
                </div>

<!--                <div type="button" class="list-group-item list-group-item-action" data-bs-toggle="tab"-->
<!--                     data-bs-target="#nav-product">-->
<!--                    Products Settings-->
<!--                </div>-->
            </div>
        </div>

        <div class="col-10">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-dashboard">
                    <div class="alert alert-primary">
                        Dashboard
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-general">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-auto">
                                <div class="alert alert-primary">
                                    General
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="alert alert-success">
                                    olur olur
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-user">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">
                                <div class="alert alert-primary">
                                    Login Route :
                                </div>
                            </div>

                            <div class="col-10">
                                <div class="alert alert-danger">
                                    <div class="btn btn-success">GET</div>    '/wp-json/sc/v1/login'
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-success">
                                    { <br>
                                    &nbsp&nbsp&nbsp&nbsp"email":"test@test.com",<br>
                                    &nbsp&nbsp&nbsp&nbsp"password":"******"<br>
                                    }
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">
                                <div class="alert alert-primary">
                                    Register Route :
                                </div>
                            </div>

                            <div class="col-10">
                                <div class="alert alert-danger">
                                    <div class="btn btn-primary">POST</div>    '/wp-json/sc/v1/register'
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-success">
                                    { <br>
                                    &nbsp&nbsp&nbsp&nbsp"username": "typztrk",<br>
                                    &nbsp&nbsp&nbsp&nbsp"email":"test@test.com",<br>
                                    &nbsp&nbsp&nbsp&nbsp"password":"******"<br>
                                    }
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">
                                <div class="alert alert-primary">
                                    Event Route :
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="alert alert-danger">
                                    <div class="btn btn-success">GET</div>    '/wp-json/sc/v1/events/{id}'
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="alert alert-danger">
                                    <div class="btn btn-primary">POST</div>    '/wp-json/sc/v1/events/'
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-success">
                                    { <br>
                                    &nbsp&nbsp&nbsp&nbsp"user_id"   : "{int}",<br>
                                    &nbsp&nbsp&nbsp&nbsp"state"     : "{string}",<br>
                                    &nbsp&nbsp&nbsp&nbsp"date"  : "{yyyy-mm-dd HH:mm:ss}"<br>
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-product">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-auto">
                                <div class="alert alert-primary">
                                    Product Route :
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="alert alert-success">
                                    '/wp-json/sc/v1/product'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
