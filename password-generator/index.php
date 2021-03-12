<?php 
$pagetitle = "PASSWORD GENERATOR";
?>

    <?php include('components/header.php')?>

    <div class="container-fluid password_generator_tools" id="webtools">
        <div class="row no-margins">
            <div class="col-lg-8">
                <div class="form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="p_length">Length: <span id="rangeCount"></span><span id="rangeStrength" class="ml-3"></span></label>
                                <input type="range" min="5" max="50" id="p_length" class="form-range" placeholder="Password Length" value="15" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="material-switch pull-right">
                                            <input id="p_i_symbols" type="checkbox"/>
                                            <label for="p_i_symbols" class="label-default"></label><span class="ml-3">Include Symbols (e.g: @\#/$({[]}))</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="material-switch pull-right">
                                            <input id="p_i_numbers" checked type="checkbox"/>
                                            <label for="p_i_numbers" class="label-default"></label><span class="ml-3">Include Numbers (e.g: 0-9)</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="material-switch pull-right">
                                            <input id="p_i_lowercase" checked type="checkbox"/>
                                            <label for="p_i_lowercase" class="label-default"></label><span class="ml-3">Include Lowercase (e.g: a-z)</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="material-switch pull-right">
                                            <input id="p_i_uppercase" checked type="checkbox"/>
                                            <label for="p_i_uppercase" class="label-default"></label><span class="ml-3">Include Uppercase (e.g: A-Z)</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12 text-right">
                            <div class="form-group">
                                <button type="button" class="btn btn-success mb-1" onclick="generate_password()"><i class="fa fa-code"></i> GENERATE</button>
                            </div>
                        </div>
                        <div class="col-lg-12" id="wrapper_1">
                            <div class="form-group">
                                <label for="passwordGenerated">Generated Password</label>
                                <textarea id="passwordGenerated" rows="4" readonly class="form-control"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#passwordGenerated">Copy to Clipboard</button>
                                <button type="button" class="btn btn-default mb-1" onclick="select_all_pass()">Select All</button>
                                <button type="button" class="btn btn-default mb-1" onclick="reset_all_pass()">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <a href="#" class="btn btn-default mb-1">LINK 1</a>
                    <a href="#" class="btn btn-default mb-1">LINK 2</a>
                    <a href="#" class="btn btn-default mb-1">LINK 3</a>
                    <a href="#" class="btn btn-default mb-1">LINK 4</a>
                    <a href="#" class="btn btn-default mb-1">LINK 5</a>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
            </div>
        </div>
    </div>

    <?php include('content/password-generator.php')?>
    <?php include('components/footer.php')?>